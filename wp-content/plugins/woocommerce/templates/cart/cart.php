<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <div class="mdl-cell mdl-cell--8-col">

        <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    ?>
                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                    <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
                        <div class="mdl-card__title mdl-color--teal-500">
                            <h3 class="mdl-color-text--white panel-title">
                                <?php
                                if (!$_product->is_visible()) {
                                    echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                } else {
                                    echo apply_filters('woocommerce_cart_item_name', sprintf('<a class="mdl-color-text--white" href="%s">%s </a>', esc_url($_product->get_permalink($cart_item)), $_product->get_title()), $cart_item, $cart_item_key);
                                }

                                // Meta data
                                echo WC()->cart->get_item_data($cart_item);

                                // Backorder notification
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                                }?>
                            </h3>

                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="mdl-grid">

                                <div class="mdl-cell mdl-cell--3-col">
                                    <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                    if ( ! $_product->is_visible() ) {
                                        echo $thumbnail;
                                    } else {
                                        printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
                                    }
                                    ?>
                                </div>
                                <div class="mdl-cell mdl-cell--7-col shop-cart-desc">
                                    <?php /*print_r( $_product->get_post_data()->post_content)*/?> <!--This is Product description-->
                                    <?php print_r( $_product->get_post_data()->post_excerpt)?> <!--This is Product short description-->
                                </div>
                                <div class="mdl-cell mdl-cell--2-col">
                                    <p>Price:
                                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></p>
                                    <p>
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input( array(
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                'min_value'   => '0'
                                            ), $_product, false );
                                        }

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                                        ?></p>
                                    <p>Total:
                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="mdl-card__menu">

                            <?php echo apply_filters( 'woocommerce_cart_item_remove_link',
                                sprintf( '<a class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white"'.
                                    ' href="%s" title="%s"><i class="material-icons">close</i></a>',
                                    esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                    __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>


                        </div>
                    </div>
                    <?php
                }
            }
            do_action( 'woocommerce_cart_contents' );
            ?>
            <div class="update-cart" style="float: right;">
                <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </div>
            <div class="clearfix"></div>
            <?php do_action( 'woocommerce_after_cart_table' ); ?>

        </form>


    </div>
    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>





    <div class="mdl-cell mdl-cell--6-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <div class="mdl-cell mdl-cell--4-col">

        <?php do_action( 'woocommerce_cart_collaterals' ); ?>

    </div>
    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>




    <?php do_action( 'woocommerce_after_cart' ); ?>
</div>