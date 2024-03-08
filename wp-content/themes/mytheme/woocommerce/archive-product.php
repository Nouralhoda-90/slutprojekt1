<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 */
do_action( 'woocommerce_before_main_content' );
?>

<div class="woocommerce-wrap">
    <header class="woocommerce-products-header">
        <!-- Breadcrumb -->
        <?php
        /**
         * Hook: woocommerce_archive_description.
         */
        do_action( 'woocommerce_archive_description' );
        echo do_shortcode('[custom_filter_sort_line]');
        ?>
    </header>

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
            <ul class="products" id="product-list">
                <?php
                // Display initial 12 products
                $args = array(
                    'post_type'      => 'product',
<<<<<<< Updated upstream
                    'posts_per_page' => 12,
=======
                    'posts_per_page' => 9,
>>>>>>> Stashed changes
                );
                $query = new WP_Query($args);

                // Loop through and display products
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        wc_get_template_part('content', 'product');
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <!-- Load More button -->
            <div id="load-more-container">
                <button id="load-more-button">Load More Products</button>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loadMoreButton = document.getElementById('load-more-button');
        const productList = document.getElementById('product-list');
        let nextPage = 2;

        loadMoreButton.addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = xhr.responseText;
                    if (response.trim() === '') {
                        // No more products to load, hide the button
                        loadMoreButton.style.display = 'none';
                    } else {
                        // Append the new products to the product list
                        productList.insertAdjacentHTML('beforeend', response);
                        nextPage++;
                    }
                } else {
                    console.error('Request failed. Returned status of ' + xhr.status);
                }
            };
            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send('action=mytheme_load_more_products&page=' + nextPage + '&nonce=<?php echo wp_create_nonce('mytheme_lazy_load_nonce'); ?>');
        });
    });
</script>
