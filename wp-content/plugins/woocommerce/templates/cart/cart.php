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

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
            ?>
            <div class="panel panel-danger" style="border-radius: 25px;">
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>
                <div class="panel-heading" style="border-radius: 25px 25px 0 0;">
                    <div class="panel-title row">
                        <div class="col-md-11">
                            <h3 class="panel-title">
                            <?php
                            if (!$_product->is_visible()) {
                                echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                            } else {
                                echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s </a>', esc_url($_product->get_permalink($cart_item)), $_product->get_title()), $cart_item, $cart_item_key);
                            }

                            // Meta data
                            echo WC()->cart->get_item_data($cart_item);

                            // Backorder notification
                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                            }?>
                            </h3>
                        </div>
                        <div class="col-md-1">
                            <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>
                        </div>
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-md-3">
                        <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                        if ( ! $_product->is_visible() ) {
                            echo $thumbnail;
                        } else {
                            printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
                        }
                        ?>
                    </div>
                    <div class="col-md-9">
                        <?php /*print_r( $_product->get_post_data()->post_content)*/?> <!--This is Product description-->
                        <?php print_r( $_product->get_post_data()->post_excerpt)?> <!--This is Product short description-->
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="product-price"><p>Price:
                                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></p>
                                </div>
                                <div class="product-quantity"><p>
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
                                </div>
                                <div class="product-subtotal"><p>Total:
                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        <?php
        }
    }
    do_action( 'woocommerce_cart_contents' );
    ?>
    <div class="update-cart">
        <input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" style="float:right"/>
        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart' ); ?>
        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </div>

    <?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

    <?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
