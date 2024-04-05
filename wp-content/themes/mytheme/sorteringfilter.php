<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
// Function to generate the HTML content for the filter-sort line
function custom_filter_sort_line_shortcode() {
    // Output the filter-sort line HTML
    ob_start();
    ?>
    <div id="custom-filter-sort-container" class="custom-filter-sort-container">
        <div class="filter-sort"> 
            <img class="filter-icon" src="<?php echo esc_url( get_template_directory_uri() ) . '/resources/images/filter.png'; ?>">
            <p class="filter-text"> FILTER & SORT</p>
            <div class="sorting-options" style="display: none;">
                <a href="#" data-orderby="title">Alphabetical</a>
                <a href="#" data-orderby="price-high-to-low">Price: High to Low</a>
                <a href="#" data-orderby="price-low-to-high">Price: Low to High</a>
                <a href="#" data-orderby="newest">Newest</a>
            </div>
        </div>
    </div>
    <div id="product-container">
        <!-- Products will be displayed here -->
    </div>
    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>'; // Correctly localize the AJAX URL

        jQuery(document).ready(function($) {
            $('.filter-sort').click(function(e) {
                e.preventDefault();
                $('.sorting-options').slideToggle('fast');
            });

            $('.sorting-options a').on('click', function(e) {
                e.preventDefault();
                var orderby = $(this).data('orderby');
                var data = {
                    action: 'custom_sort_products',
                    orderby: orderby
                };
                $.post(ajaxurl, data, function(response) {
                    $('#product-container').html(response);
                });
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.custom-filter-sort-container').length) {
                    $('.sorting-options').hide();
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
}

// Register the shortcode
function register_custom_filter_sort_line_shortcode() {
    add_shortcode('custom_filter_sort_line', 'custom_filter_sort_line_shortcode');
}
add_action('init', 'register_custom_filter_sort_line_shortcode');

// AJAX handler to fetch sorted products
function custom_sort_products_callback() {
    $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : 'date'; // Default sorting by date

    // Your product query based on sorting
    $args = array(
        'post_type' => 'product',
        'orderby'   => $orderby,
        'posts_per_page' => -1 // Retrieve all products
        // Add more query parameters as needed
    );
    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        echo '<div class="product-container">'; // Start product container
        while ($query->have_posts()) {
            $query->the_post();
            // Output product HTML markup
            ?>
            <div class="product-item">
                <div class="product-image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="product-details">
                    <h2><?php the_title(); ?></h2>
                    <div class="product-description">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>'; // Close product container
        wp_reset_postdata();
    } else {
        echo 'No products found';
    }

    $html = ob_get_clean();
    echo $html;

    wp_die();
}


add_action('wp_ajax_custom_sort_products', 'custom_sort_products_callback');
add_action('wp_ajax_nopriv_custom_sort_products', 'custom_sort_products_callback'); // Allow AJAX for non-logged-in users
?>
