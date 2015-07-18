<?php
/*
Plugin Name: WooCommerce Amazon Payments Advanced Gateway
Plugin URI: http://woothemes.com/woocommerce
Description: Amazon Payments Advanced is embedded directly into your existing web site, and all the buyer interactions with Amazon Payments Advanced take place in embedded widgets so that the buyer never leaves your site. Buyers can log in using their Amazon account, select a shipping address and payment method, and then confirm their order. Requires an Amazon Seller account with the Amazon Payments Advanced service provisioned. Supports DE, UK, and US.
Version: 1.4.1
Author: WooThemes
Author URI: http://woothemes.com

	Copyright: © 2009-2011 WooThemes.
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Required functions
 */
if ( ! function_exists( 'woothemes_queue_update' ) ) {
	require_once( 'woo-includes/woo-functions.php' );
}

/**
 * Plugin updates
 */
woothemes_queue_update( plugin_basename( __FILE__ ), '9865e043bbbe4f8c9735af31cb509b53', '238816' );

class WC_Amazon_Payments_Advanced {

	private $settings;
	private $reference_id;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->settings = get_option( 'woocommerce_amazon_payments_advanced_settings' );

		if ( empty( $this->settings['cart_button_display_mode'] ) ) {
			$this->settings['cart_button_display_mode'] = 'button';
		}

		if ( empty( $this->settings['seller_id'] ) ) {
			$this->settings['seller_id'] = '';
		}

		if ( empty( $this->settings['sandbox'] ) ) {
			$this->settings['sandbox'] = 'yes';
		}

		if ( empty( $this->settings['enabled'] ) ) {
			$this->settings['enabled'] = 'no';
		}

		if ( empty( $this->settings['hide_standard_checkout_button'] ) ) {
			$this->settings['hide_standard_checkout_button'] = 'no';
		}

		$this->reference_id = ! empty( $_REQUEST['amazon_reference_id'] ) ? $_REQUEST['amazon_reference_id'] : '';

		if ( isset( $_POST['post_data'] ) ) {
			parse_str( $_POST['post_data'], $post_data );

			if ( isset( $post_data['amazon_reference_id'] ) ) {
				$this->reference_id = $post_data['amazon_reference_id'];
			}
		}

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_links' ) );
		add_action( 'init', array( $this, 'init_gateway' ) );
		add_action( 'wp_loaded', array( $this, 'init_handlers' ), 11 );
		add_action( 'wp_footer', array( $this, 'maybe_hide_standard_checkout_button' ) );
	}

	/**
	 * Maybe hide standard WC checkout button on the cart, if enabled
	 *
	 * @since 3.0.0
	 */
	public function maybe_hide_standard_checkout_button() {
		if ( 'yes' === $this->settings['enabled'] && 'yes' === $this->settings['hide_standard_checkout_button'] ) {
			?>
				<style type="text/css">
					.woocommerce a.checkout-button,
					.woocommerce input.checkout-button,
					.cart input.checkout-button,
					.cart a.checkout-button,
					.widget_shopping_cart a.checkout {
						display: none !important;
					}
				</style>
			<?php
		}
	}

	/**
	 * Plugin page links
	 */
	public function plugin_links( $links ) {
		$plugin_links = array(
			'<a href="http://support.woothemes.com/">' . __( 'Support', 'woocommerce-gateway-amazon-payments-advanced' ) . '</a>',
			'<a href="http://docs.woothemes.com/document/amazon-payments-advanced/">' . __( 'Docs', 'woocommerce-gateway-amazon-payments-advanced' ) . '</a>',
		);

		return array_merge( $plugin_links, $links );
	}

	/**
	 * Init gateway
	 */
	public function init_gateway() {
		if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
			return;
		}

		load_plugin_textdomain( 'woocommerce-gateway-amazon-payments-advanced', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		switch ( WC()->countries->get_base_country() ) {
			case 'GB' :
				define( 'WC_AMAZON_PA_WIDGETS_URL', 'https://static-eu.payments-amazon.com/OffAmazonPayments/uk/' . ( $this->settings['sandbox'] == 'yes' ? 'sandbox/' : '' ) . 'js/Widgets.js?sellerId=' . $this->settings['seller_id'] );
				define( 'WC_AMAZON_WIDGET_ENDPOINT', 'https://payments' . ( $this->settings['sandbox'] == 'yes' ? '-sandbox' : '' ) . '.amazon.co.uk' );
				define( 'WC_AMAZON_REGISTER_URL', 'https://sellercentral-europe.amazon.com/gp/on-board/workflow/Registration/login.html?passthrough%2Fsource=internal-landing-select&passthrough%2F*entries*=0&passthrough%2FmarketplaceID=A2WQPBGJ59HSXT&passthrough%2FsuperSource=OAR&passthrough%2F*Version*=1&passthrough%2Fld=APRPWOOCOMMERCE&passthrough%2Faccount=cba&passthrough%2FwaiveFee=1' );
			break;
			case 'DE' :
				define( 'WC_AMAZON_PA_WIDGETS_URL', 'https://static-eu.payments-amazon.com/OffAmazonPayments/de/' . ( $this->settings['sandbox'] == 'yes' ? 'sandbox/' : '' ) . 'js/Widgets.js?sellerId=' . $this->settings['seller_id'] );
				define( 'WC_AMAZON_WIDGET_ENDPOINT', 'https://payments' . ( $this->settings['sandbox'] == 'yes' ? '-sandbox' : '' ) . '.amazon.de' );
				define( 'WC_AMAZON_REGISTER_URL', 'https://sellercentral-europe.amazon.com/gp/on-board/workflow/Registration/login.html?passthrough%2Fsource=internal-landing-select&passthrough%2F*entries*=0&passthrough%2FmarketplaceID=A1OCY9REWJOCW5&passthrough%2FsuperSource=OAR&passthrough%2F*Version*=1&passthrough%2Fld=APRPWOOCOMMERCE&passthrough%2Faccount=cba&passthrough%2FwaiveFee=1' );
			break;
			default :
				define( 'WC_AMAZON_PA_WIDGETS_URL', 'https://static-na.payments-amazon.com/OffAmazonPayments/us/' . ( $this->settings['sandbox'] == 'yes' ? 'sandbox/' : '' ) . 'js/Widgets.js?sellerId=' . $this->settings['seller_id'] );
				define( 'WC_AMAZON_WIDGET_ENDPOINT', 'https://payments' . ( $this->settings['sandbox'] == 'yes' ? '-sandbox' : '' ) . '.amazon.com' );
				define( 'WC_AMAZON_REGISTER_URL', 'https://sellercentral.amazon.com/hz/me/sp/signup?solutionProviderOptions=mws-acc%3B&marketplaceId=AGWSWK15IEJJ7&solutionProviderToken=AAAAAQAAAAEAAAAQ1XU19m0BwtKDkfLZx%2B03RwAAAHBZVsoAgz2yhE7DemKr0y26Mce%2F9Q64kptY6CRih871XhB7neN0zoPX6c1wsW3QThdY6g1Re7CwxJkhvczwVfvZ9BvjG1V%2F%2FHrRgbIf47cTrdo5nNT8jmYSIEJvFbSm85nWxpvHjSC4CMsVL9s%2FPsZt&solutionProviderId=A1BVJDFFHQ7US4' );
			break;
		}

		include_once( 'includes/class-wc-gateway-amazon-payments-advanced.php' );
		include_once( 'includes/class-wc-amazon-payments-advanced-order-handler.php' );

		add_filter( 'woocommerce_payment_gateways',  array( $this, 'add_gateway' ) );
	}

	/**
	 * Load handlers for cart and orders after WC Cart is loaded.
	 */
	public function init_handlers() {
		// Disable if no seller ID
		if ( empty( $this->settings['seller_id'] ) || $this->settings['enabled'] == 'no' ) {
			return;
		}

		// Disable for subscriptions until supported
		if ( ! is_admin() && class_exists( 'WC_Subscriptions_Cart' ) && WC_Subscriptions_Cart::cart_contains_subscription() && 'no' === get_option( WC_Subscriptions_Admin::$option_prefix . '_accept_manual_renewals', 'no' ) ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );

		if ( $this->settings['cart_button_display_mode'] == 'button' ) {
			add_action( 'woocommerce_proceed_to_checkout', array( $this, 'checkout_button' ), 12 );
		} elseif ( $this->settings['cart_button_display_mode'] == 'banner' ) {
			add_action( 'woocommerce_before_cart', array( $this, 'checkout_message' ), 5 );
		}

		add_action( 'woocommerce_before_checkout_form', array( $this, 'checkout_message' ), 5 );
		add_action( 'before_woocommerce_pay', array( $this, 'checkout_message' ), 5 );

		if ( empty( $this->reference_id ) ) {
			return;
		}

		//add_filter( 'woocommerce_cart_needs_payment', '__return_true' );
		add_action( 'woocommerce_checkout_before_customer_details', array( $this, 'payment_widget' ), 20 );
		add_action( 'woocommerce_checkout_before_customer_details', array( $this, 'address_widget' ), 10 );
		add_action( 'woocommerce_checkout_init', array( $this, 'remove_checkout_fields' ) );
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'remove_gateways' ) );
		add_action( 'woocommerce_checkout_update_order_review', array( $this, 'get_customer_details' ) );
	}

	/**
	 *  Checkout Button
	 *
	 *  Triggered from the 'woocommerce_proceed_to_checkout' action.
	 */
	public function checkout_button() {
		?><div id="pay_with_amazon"></div><?php
	}

	/**
	 *  Checkout Message
	 */
	public function checkout_message() {
		if ( empty( $this->reference_id ) )
			echo '<div class="woocommerce-info info"><div id="pay_with_amazon"></div> ' . apply_filters( 'woocommerce_amazon_pa_checkout_message', __( 'Have an Amazon account?', 'woocommerce-gateway-amazon-payments-advanced' ) ) . '</div>';
	}

	/**
	* Add Amazon gateway to WC
	*
	* @param  array $methods
	* @return array of methods
	*/
	public function add_gateway( $methods ) {
		$methods[] = 'WC_Gateway_Amazon_Payments_Advanced';
		return $methods;
	}

	/**
	 * Add scripts
	 */
	public function scripts() {
		wp_enqueue_style( 'amazon_payments_advanced', plugins_url( 'assets/css/style.css', __FILE__ ) );

		wp_enqueue_script( 'amazon_payments_advanced_widgets', WC_AMAZON_PA_WIDGETS_URL, '', '1.0', true );

		wp_enqueue_script( 'amazon_payments_advanced', plugins_url( 'assets/js/amazon-checkout.js', __FILE__ ), array( 'amazon_payments_advanced_widgets' ), '1.0', true );

		$redirect_page = is_cart() ? add_query_arg( 'amazon_payments_advanced', 'true', get_permalink( woocommerce_get_page_id( 'checkout' ) ) ) : esc_url_raw( add_query_arg( 'amazon_payments_advanced', 'true' ) );

		$is_pay_page   = function_exists( 'is_checkout_pay_page' ) ? is_checkout_pay_page() : is_page( woocommerce_get_page_id( 'pay' ) );

		wp_localize_script( 'amazon_payments_advanced', 'amazon_payments_advanced_params', array(
			'seller_id'                 => $this->settings['seller_id'],
			'reference_id'              => $this->reference_id,
			'redirect'                  => $redirect_page,
			'is_checkout_pay_page'      => $is_pay_page,
		) );
	}

	/**
	 * Output the address widget HTML
	 */
	public function address_widget() {
		?>
		<div class="col2-set">
			<div class="col-1">
				<?php
				if ( WC()->cart->needs_shipping() ) {
					?><h3><?php _e( 'Shipping Address', 'woocommerce-gateway-amazon-payments-advanced' ); ?></h3><?php
				} else {
					?><h3><?php _e( 'Your Address', 'woocommerce-gateway-amazon-payments-advanced' ); ?></h3><?php
				}
				?>
				<div id="amazon_addressbook_widget"></div>
				<input type="hidden" name="amazon_reference_id" value="<?php echo $this->reference_id; ?>" />
			</div>
		<?php
	}

	/**
	 * Output the payment method widget HTML
	 */
	public function payment_widget() {
		$checkout = WC_Checkout::instance();
		?>
			<div class="col-2">
				<h3><?php _e( 'Payment Method', 'woocommerce' ); ?></h3>
				<div id="amazon_wallet_widget"></div>
				<input type="hidden" name="amazon_reference_id" value="<?php echo $this->reference_id; ?>" />
			</div>
		</div>

		<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

			<?php if ( $checkout->enable_guest_checkout ) : ?>

				<p class="form-row form-row-wide create-account">
					<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce-gateway-amazon-payments-advanced' ); ?></label>
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

			<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

				<div class="create-account">

					<h3><?php _e( 'Create Account', 'woocommerce-gateway-amazon-payments-advanced' ); ?></h3>
					<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce-gateway-amazon-payments-advanced' ); ?></p>

					<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

						<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

					<?php endforeach; ?>

					<div class="clear"></div>

				</div>

			<?php endif; ?>

			<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

		<?php endif; ?>
		<?php
	}

	/**
	 * Remove checkout fields
	 * @param  object $checkout
	 */
	public function remove_checkout_fields( $checkout ) {
		// New accounts need an email
		$checkout->checkout_fields['account'] = array_merge( array( 'billing_email' => $checkout->checkout_fields['billing']['billing_email'] ), $checkout->checkout_fields['account'] );
		$checkout->checkout_fields['account']['billing_email']['class'] = '';
		$checkout->checkout_fields['billing'] 	= array();
		$checkout->checkout_fields['shipping']  = array();

		remove_action( 'woocommerce_checkout_billing', array( $checkout,'checkout_form_billing' ) );
		remove_action( 'woocommerce_checkout_shipping', array( $checkout,'checkout_form_shipping' ) );

		//$checkout->enable_signup         = false;
		//$checkout->enable_guest_checkout = true;
		//$checkout->must_create_account   = false;
	}

	/**
	 * Remove all gateways except amazon
	 */
	public function remove_gateways( $gateways ) {
		foreach ( $gateways as $gateway_key => $gateway ) {
			if ( $gateway_key !== 'amazon_payments_advanced' ) {
				unset( $gateways[ $gateway_key ] );
			}
		}
		return $gateways;
	}

	/**
	 * Get customer details from amazon
	 */
	public function get_customer_details() {
		try {

			// Update order reference with amounts
			$amazon = new WC_Gateway_Amazon_Payments_Advanced();

			$response = $amazon->api_request( array(
				'Action'                 => 'GetOrderReferenceDetails',
				'AmazonOrderReferenceId' => $this->reference_id,
			) );

			if ( is_wp_error( $response ) ) {
				throw new Exception( $response->get_error_message() );
			}

			if ( ! isset( $response['GetOrderReferenceDetailsResult']['OrderReferenceDetails']['Destination']['PhysicalDestination'] ) ) {
				return;
			}

			$address = $response['GetOrderReferenceDetailsResult']['OrderReferenceDetails']['Destination']['PhysicalDestination'];

			if ( ! empty( $address['CountryCode'] ) ) {
				WC()->customer->set_country( $address['CountryCode'] );
				WC()->customer->set_shipping_country( $address['CountryCode'] );
			}

			if ( ! empty( $address['StateOrRegion'] ) ) {
				WC()->customer->set_state( $address['StateOrRegion'] );
				WC()->customer->set_shipping_state( $address['StateOrRegion'] );
			}

			if ( ! empty( $address['PostalCode'] ) ) {
				WC()->customer->set_postcode( $address['PostalCode'] );
				WC()->customer->set_shipping_postcode( $address['PostalCode'] );
			}

			if ( ! empty( $address['City'] ) ) {
				WC()->customer->set_city( $address['City'] );
				WC()->customer->set_shipping_city( $address['City'] );
			}

		} catch( Exception $e ) {
			wc_add_notice( __( 'Error:', 'woocommerce-gateway-amazon-payments-advanced' ) . ' ' . $e->getMessage(), 'error' );
			return;
		}
	}
}

$GLOBALS['wc_amazon_payments_advanced'] = new WC_Amazon_Payments_Advanced();
