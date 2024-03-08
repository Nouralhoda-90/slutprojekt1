<?php
require_once('sorteringfilter.php');


<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes

if (!defined('ABSPATH')) {
    exit;
}

require_once(get_template_directory() . "/init.php");
//test
/**
 * support Woocommerce function
 */
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');



// Override the WooCommerce breadcrumb function
function my_custom_woocommerce_breadcrumb($args = array())
{
    $args = wp_parse_args(
        $args,
        apply_filters(
            'woocommerce_breadcrumb_defaults',
            array(
                'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">',
                'wrap_after' => '</nav>',
                'before' => '',
                'after' => '',
                'delimiter' => '',
                'home' => _x('home page', 'breadcrumb', 'woocommerce'),
            )
        )
    );

    // Define an empty array to store breadcrumb items
    $breadcrumbs = array();

    // Home link
    $breadcrumbs[] = '<a href="' . home_url() . '">' . $args['home'] . '</a>';

    // Custom breadcrumb items
    $breadcrumbs[] = '<span>/</span><a href="' . home_url('/brand') . '">Brand</a>';
    $breadcrumbs[] = '<span>/</span><a href="' . home_url('/h-and-m-home') . '">H&amp;M Home</a>';

  // Manually set the current category
$current_category_name = "Bedroom";

// Current page (category name)
$breadcrumbs[] = '<span>/</span>' . $current_category_name ;


    // Output the breadcrumb navigation
    echo $args['wrap_before'];
    echo $args['before'];

    // Output each breadcrumb item with the delimiter
    echo implode('', $breadcrumbs);

    echo $args['after'];
    echo $args['wrap_after'];
}

// Hook into the woocommerce_breadcrumb function
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'my_custom_woocommerce_breadcrumb', 20);




// Custom categories filter shortcode with widget registration
function my_custom_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Custom Sidebar', 'my-moody-studio-theme'),
        'id' => 'custom-filter',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'my-moody-studio-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'my_custom_widgets_init');

// Custom categories filter shortcode with widget registration
function custom_categories_filter_shortcode_with_widget() {
    // Register custom sidebar widget
    if (!function_exists('my_custom_widgets_init')) {
        function my_custom_widgets_init()
        {
            
            register_sidebar(array(
                'name' => esc_html__('Custom Sidebar', 'my-moody-studio-theme'),
                'id' => 'custom-filter',
                'description' => esc_html__('Add widgets here to appear in your sidebar.', 'my-moody-studio-theme'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
        }
        add_action('widgets_init', 'my_custom_widgets_init');
    }

    ob_start();

    $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'ID',
        'order'        => 'ASC', 
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0
    );

    
    // Output the filter chart HTML
    ?>
    <div class="custom-filter-chart"> 
    <div class="related-words">
         <p class="word">New arrivals</p>
         <ul>
             <li id="new">New arrivals</li>
             </ul>
        </div>

        <div class="related-words">
           
        </div>
        <div class="related-words">
            <p class="word">Shop by room</p>
            <ul>
            <li class="custom-red">Bedroom</li>

                <li>duvet cover sets</li>
                <li>sheets</li>
                <li>bedspreads & blankets</li>
                <li>blankets</li>
                <li>curtains</li>
                <li>pillowcases</li>
                <li>rugs</li>
                <li>living room</li>
                <li>child room</li>
                <li>bathroom</li>
                <li>Outdoor</li>
            </ul>
        </div>
        <div class="related-words">
            <p class="word">Shop by concept</p>
            <ul>
                <li>Conscious</li>
                <li>premium quality</li>
                <li>classic collection</li>
            </ul>
        </div>
    </div>
    <?php  
    
    

    // Output the rest of the filter shortcode content
    ?>
    <div class="custom-filter">
        <div class="custom-gender"><p>Gender</p>
        <div class="custom-man">
            <input type="checkbox" id="myCheckbox1" name="myCheckbox" value="checked"><span class="custom-span1">Man</span>
        </div>
        <div class="woman">
                <input type="checkbox" id="myCheckbox2" name="myCheckbox" value="checked"><span class="span2">Woman</span>
                </div>
            </div>
            <div class="custom-color-filter">
  <p class="custom-color">Color</p>
  <div class="custom-color-row">
    <span class="custom-color-circle" style="background-color: #F34;"></span>
    <span class="custom-color-circle" style="background-color: #323334;"></span>
    <span class="custom-color-circle" style="background-color: #C4C4C4;"></span>
    <span class="custom-color-circle" style="background-color: #F2C94C;"></span>
    <span class="custom-color-circle" style="background-color: #F2994A;"></span>
    <span class="custom-color-circle" style="background-color: #EB5757;"></span>
  </div>
  <div class="custom-color-row">
    <span class="custom-color-circle" style="background-color: #BB6BD9;"></span>
    <span class="custom-color-circle" style="background-color: #9CF2;"></span>
    <span class="custom-color-circle" style="background-color: #C6FCF9;"></span>
    <span class="custom-color-circle" style="background-color: #219653;"></span>
    <span class="custom-color-circle" style="background-color: #2F80ED;"></span>
    <span class="custom-color-circle" style="background-color: #DF1313;"></span>
  </div>
  <div class="custom-color-row">
    <span class="custom-color-circle" style="background-color: #770505;"></span>
    <span class="custom-color-circle" style="background-color: #0A5D8B;"></span>
    <span class="custom-color-circle" style="background-color: #AD5B12;"></span>
    <span class="custom-color-circle" style="background-color: #4F0E8B;"></span>
    <span class="custom-color-circle" style="background-color: #0A7090;"></span>
    <span class="custom-color-circle" style="background-color: #156008;"></span>
  </div>
</div>
        <div class="custom-price-filter">
            <p class="custom-price">Price</p>
            <div class="custom-price1-1"><input type="checkbox" id="myCheckbox4" name="myCheckbox" value="checked"><span class="custom-span2">0 - 200</span></div>
            <div class="custom-price1-2"><input type="checkbox" id="myCheckbox5" name="myCheckbox" value="checked"><span class="custom-span2">200 - 500</span></div>
            <div class="custom-price1-3"><input type="checkbox" id="myCheckbox6" name="myCheckbox" value="checked"><span class="custom-span2">500 - 1000</span></div>
            <div class="custom-price1-4"><input type="checkbox" id="myCheckbox7" name="myCheckbox" value="checked"><span class="custom-span2">1 000 - 1 500</span></div>
            <div class="custom-price1-5"><input type="checkbox" id="myCheckbox8" name="myCheckbox" value="checked"><span class="custom-span2">1 500 - 3 000</span></div>
            <div class="custom-price1-6"><input type="checkbox" id="myCheckbox9" name="myCheckbox" value="checked"><span class="custom-span2">3 000 - 10 000</span></div>
        </div>
    </div>
    <?php

    return ob_get_clean();
}

add_shortcode( 'custom_categories_filter', 'custom_categories_filter_shortcode_with_widget' );










// Function to show the store message in a div
function custom_unique_div_shortcode( $atts, $content = null ) {
    // Define default attributes and override if provided
    $atts = shortcode_atts( array(
        'class' => 'unique-class', // Add your unique class here
    ), $atts, 'custom_unique_div' );

    // Start output buffering
    ob_start(); ?>

<div class="custom-div <?php echo esc_attr( $atts['class'] ); ?>">
    <div class="inner-div">
        <p class="p-text1">Member Exclusive</p>
        <p class="p-text2">15% off everything + extra 100:- off for plus status</p>
        <p class="p-text3">Not a member? <a href="#">Join now to shop</a>.</p>
    </div>
</div>


    <?php
    // Return the buffered output
    return ob_get_clean();
}
add_shortcode( 'custom_unique_div', 'custom_unique_div_shortcode' );



// Custom function to display subcategory information
function display_subcategory_details($atts, $content = null)
{
    // Shortcode attributes
    $atts = shortcode_atts(array(
        'class' => '',
        'current_category_name' => '', // Attribute to hold current category name
    ), $atts, 'show_details_shortcode');

    // Output HTML
    ob_start(); ?>
    <div class="custom-div2 <?php echo esc_attr($atts['class']); ?>">
        <div class="subcategory-details">
            <h3 class="h1-text1"><?php echo esc_html($atts['current_category_name']); ?></h3>
            <p class="p-text5">It's easy to transform your be interior with our great selection of accessories.</p>
        </div>
    </div>
    <div class="link">
        <div class="text10"> <span class="models">Models</span> <span class="prod">Products</span> </div>
    </div>
    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('display_subcategory_details', 'display_subcategory_details');




<<<<<<< Updated upstream







function my_theme_enqueue_scripts()
{
    // Enqueue your app.js file
    wp_enqueue_script("mytheme_app", get_template_directory_uri() . "/resources/js/app.js", array('jquery'), '1.0', true);

    // Localize your script with the appropriate AJAX URL and nonce
    wp_localize_script('mytheme_app', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mytheme_app')
    ));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');



add_action('init', function () {
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 12);
    add_action('woocommerce_before_shop_loop_item_title', 'custom_woocommerce_template_loop_product_thumbnail', 12);
});

if (!function_exists('custom_woocommerce_template_loop_product_thumbnail')) {
    function custom_woocommerce_template_loop_product_thumbnail()
    {
        echo custom_woocommerce_get_product_thumbnail();
    }
}

if (!function_exists('custom_woocommerce_get_product_thumbnail')) {
    function custom_woocommerce_get_product_thumbnail($size = 'shop_catalog')
    {
        global $post, $woocommerce;
        $output = '';

        if (has_post_thumbnail()) {
            $src = get_the_post_thumbnail_url($post->ID, $size);
            $output .= '<img class="lazy" src="your-placeholder-image.png" data-src="' . $src . '" data-srcset="' . $src . '" alt="Lazy loading image">';
        } else {
            $output .= wc_placeholder_img($size);
        }

        return $output;
    }
}



=======
>>>>>>> Stashed changes
// AJAX action to load more products
add_action('wp_ajax_mytheme_load_more_products', 'mytheme_load_more_products');
add_action('wp_ajax_nopriv_mytheme_load_more_products', 'mytheme_load_more_products');

function mytheme_load_more_products()
{
    // Verify nonce for security
    check_ajax_referer('mytheme_lazy_load_nonce', 'nonce');

    // Get the page number from the AJAX request
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Define arguments for querying more products
    $args = array(
        'post_type'      => 'product',
<<<<<<< Updated upstream
        'posts_per_page' => 12, // Adjust the number of products per page as needed
=======
        'posts_per_page' => 9, // Adjust the number of products per page as needed
>>>>>>> Stashed changes
        'paged'          => $page,
    );

    // Query more products
    $query = new WP_Query($args);

    // Start output buffering
    ob_start();

    // Loop through and display products
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
    }

    // Reset post data
    wp_reset_postdata();

    // Get the buffered output
    $output = ob_get_clean();

    // Send the HTML markup of the new products in the AJAX response
    echo $output;

    // Ensure the AJAX request completes
    wp_die();
<<<<<<< Updated upstream
}



function enqueue_custom_scripts() {
    // Enqueue your JavaScript file with ajaxurl as a dependency
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/resources/js/app.js', array('jquery'), false, true);

    // Pass ajaxurl to the script
    wp_localize_script('custom-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


/**
 * Apply free shipping automatically when the subtotal is $1000 or more
 */
function apply_free_shipping_based_on_subtotal( $rates, $package ) {
    // Get the cart subtotal
    $subtotal = WC()->cart->get_subtotal();

    // Check if the subtotal is $1000 or more
    if ( $subtotal >= 1000 ) {
        // Loop through available shipping rates
        foreach ( $rates as $rate_key => $rate ) {
            // Check if the shipping method is flat rate
            if ( 'flat_rate' === $rate->method_id ) {
                // Set the shipping cost to zero
                $rates[$rate_key]->cost = 0;
                break; // Exit the loop since we found the flat rate
            }
        }
    }

    return $rates;
}
add_filter( 'woocommerce_package_rates', 'apply_free_shipping_based_on_subtotal', 10, 2 );




//-------------------CART---------------------


add_filter('gettext', 'change_subtotal_to_order_value', 20, 3);
function change_subtotal_to_order_value($translated_text, $text, $domain)
{
    if ($text === 'Subtotal') {
        $translated_text = __('Order Value:', 'woocommerce');
    }
    return $translated_text;
}

add_filter('gettext', 'change_shipping_label', 20, 3);
function change_shipping_label($translated_text, $text, $domain)
{
    if ($text === 'Shipping') {
        $translated_text = __('Shipping:', 'woocommerce');
    }
    return $translated_text;
}

add_filter('gettext', 'change_proceed_to_checkout_text', 20, 3);
function change_proceed_to_checkout_text($translated_text, $text, $domain)
{
    if ($text === 'Proceed to checkout') {
        $translated_text = __('CONTINUE TO CHECKOUT', 'woocommerce');
    }
    return $translated_text;
}

=======
}


>>>>>>> Stashed changes

