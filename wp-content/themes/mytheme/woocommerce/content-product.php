<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="product-item">
    <div class="product-image">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         */
        do_action( 'woocommerce_before_shop_loop_item' );

        // Output the product image
        echo '<a href="' . esc_url( get_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
        echo woocommerce_get_product_thumbnail();
        echo '</a>';
        ?>
    </div>

    <div class="product-details-price">
        <div class="product-details">
            <?php
            // Output the product title
            echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';

            // Output the product color attribute
            $colors = wc_get_product_terms( $product->get_id(), 'pa_color', array( 'fields' => 'names' ) );
            if ( $colors ) {
                echo '<p class="product-color">Colors: ' . implode( ', ', $colors ) . '</p>';
            }
            ?>
        </div>

        <div class="product-price">
            <?php
            // Output the product price
            echo '<span class="price">' . $product->get_price_html() . '</span>';
            ?>
        </div>
    </div>
</div>
