<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 */
do_action( 'woocommerce_before_main_content' );
?>

<div class="header-wrapper">

    <header class="woocommerce-products-header">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>
    </header>
</div>

    <div class="woocommerce-content">
        <div class="woocommerce-sidebar">
            <?php
            // Display custom filter section
            if ( function_exists( 'custom_filter_section' ) ) {
                custom_filter_section();
            }
            // Echo the shortcode directly without PHP tags
            echo do_shortcode( '[custom_categories_filter]' );
            ?>
        </div>

        <div class="woocommerce-main-content">
            <ul class="products">
                <?php
                // Display notices and product loop
                if (woocommerce_product_loop()) {
                    do_action('woocommerce_before_shop_loop');
                    $loop_counter = 0;
                    while (have_posts()) {
                        the_post();
                        do_action('woocommerce_shop_loop');
                        // Add a wrapper div for each product
                        echo '<li class="product-item">';
                        wc_get_template_part('content', 'product');
                        echo '</li>';
                        $loop_counter++;
                        if ($loop_counter % 3 === 0 && $loop_counter < 12) {
                            echo '</ul><ul class="products">';
                        }
                    }
                    do_action('woocommerce_after_shop_loop');
                } else {
                    do_action('woocommerce_no_products_found');
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
?>
