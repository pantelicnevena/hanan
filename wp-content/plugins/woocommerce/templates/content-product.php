<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;



ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );

foreach ($terms as $term) {
	$product_cat_id = $term->term_id;
	error_log( $product_cat_id );
	break;
}

$term = get_term_by( 'id', $product_cat_id, 'product_cat', 'ARRAY_A' );
if ($term['name'] == 'donation') return;


// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % 3 || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % 3 ) {
	$classes[] = 'last';
}
array_push($classes, 'mdl-cell');
array_push($classes, 'mdl-cell--4-col');
array_push($classes, 'mdl-card');
array_push($classes, 'mdl-shadow--4dp');
array_push($classes, 'shop-card');
array_push($classes, 'mdl-cell--4-col');

?>

<div <?php post_class( $classes ); ?>>
	<a href="<?php print_r($product->add_to_cart_url())?>">
		<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
	</a>

	<div class="mdl-card__supporting-text">
		<a href="<?php print_r($product->add_to_cart_url())?>">
			<h3><?php the_title(); ?></h3>
		</a>
	</div>
	<div class="mdl-card__actions mdl-card--border">
		<a href="<?php print_r($product->add_to_cart_url())?>" class="mdl-button mdl-js-button mdl-button--raised mdl-color--teal-500 mdl-color-text--white shop-button">
			Buy
		</a>

		<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
	</div>

</div>



<!--

<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	 <a href="<?php print_r($product->add_to_cart_url())?>">

		<?php
/**
 * woocommerce_before_shop_loop_item_title hook
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
do_action( 'woocommerce_before_shop_loop_item_title' );
?>

		<h3><?php the_title(); ?></h3>

		<?php
/**
 * woocommerce_after_shop_loop_item_title hook
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
do_action( 'woocommerce_after_shop_loop_item_title' );
?>

	</a>

	<?php

/**
 * woocommerce_after_shop_loop_item hook
 *
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
do_action( 'woocommerce_after_shop_loop_item' );

?>

</li>
-->