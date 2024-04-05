<<<<<<< HEAD
<?php
=======
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/js/app.js"></script>


<?php

>>>>>>> main
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

<<<<<<< HEAD
defined( 'ABSPATH' ) || exit;
=======
defined('ABSPATH') || exit;
>>>>>>> main

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
<<<<<<< HEAD
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
=======
do_action('woocommerce_before_single_product');

if (post_password_required()) {
>>>>>>> main
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<<<<<<< HEAD
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
=======
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<div class="summary entry-summary">
		<?php

>>>>>>> main
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
<<<<<<< HEAD
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

=======
		do_action('woocommerce_single_product_summary');
		?>

	</div>

	

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>




>>>>>>> main
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
<<<<<<< HEAD
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
=======
	do_action('woocommerce_after_single_product_summary');
	?>
</div>
<div id="related-products-container"></div>
<button id="load-more-related-products">Visa fler produkter</button>


<?php do_action('woocommerce_after_single_product'); ?>
>>>>>>> main
