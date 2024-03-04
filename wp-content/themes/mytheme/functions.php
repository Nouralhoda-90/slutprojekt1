<?php

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

/**
 * change checkout button text
 */
add_filter('woocommerce_proceed_to_checkout', 'customize_checkout_button_text');
function customize_checkout_button_text()
{
    return 'Check Out';
}



function display_advantages_shortcode() {
    ob_start(); ?>

    <div class="advantages">
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/shipping.svg' ); ?></span>
            <span class="text">FREE SHIPPING</span>
        </div>
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/money-back.svg' ); ?></span>
            <span class="text">100% MONEY BACK</span>
        </div>
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/support.svg' ); ?></span>
            <span class="text">SUPPORT 24/7</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// Override the WooCommerce breadcrumb function
function my_custom_woocommerce_breadcrumb( $args = array() ) {
    $args = wp_parse_args(
        $args,
        apply_filters(
            'woocommerce_breadcrumb_defaults',
            array(
                'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">', // Change the wrap before HTML
                'wrap_after'  => '</nav>', // Change the wrap after HTML
                'before'      => '',
                'after'       => '',
                'delimiter'   => '', // Remove default delimiter
                'home'        => _x( 'home page', 'breadcrumb', 'woocommerce' ),
            )
        )
    );

    // Define an empty array to store breadcrumb items
    $breadcrumbs = array();

    // Home link
    $breadcrumbs[] = '<a href="' . home_url() . '">' . $args['home'] . '</a>';

    // Custom breadcrumb items
    
    $breadcrumbs[] = '<span>/</span><span>brand</span>';
    $breadcrumbs[] = '<span>/</span><span>h&amp;m home</span>';
    $breadcrumbs[] = '<span>/</span><span>bedroom</span>';

    // Output the breadcrumb navigation
    echo $args['wrap_before'];
    echo $args['before'];

    // Output each breadcrumb item with the delimiter
    echo implode( '', $breadcrumbs );

    echo $args['after'];
    echo $args['wrap_after'];
}

// Hook into the woocommerce_breadcrumb function
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'my_custom_woocommerce_breadcrumb', 20 );



//customized filter
function custom_categories_filter_shortcode() {
    ob_start();
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

    $categories = get_categories($args);

    if ($categories) {
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        }
        echo '</ul>';
?>
        <div class="custom-filter">
            <p class="custom-gender">Gender</p>
            <div class="custom-man">
                <input type="checkbox" id="myCheckbox1" name="myCheckbox" value="checked"><span class="custom-span1">Man</span>

            </div>
            <div class="custom-woman">
                <input type="checkbox" id="myCheckbox2" name="myCheckbox" value="checked"><span class="custom-span2">Woman</span>

            </div>

            <div class="custom-color-filter">
                <p class="custom-color">Color</p>
                <div class="custom-color1"> <span class="custom-FFF"></span><span class="custom-a323334"></span><span class="custom-C4C4C4"></span><span class="custom-F2C94C"></span><span class="custom-F2994A"></span><span class="custom-EB5757"></span></div>
                <div class="custom-color2"> <span class="custom-BB6BD9"></span><span class="custom-a56CCF2"></span><span class="custom-C6FCF97"></span><span class="custom-a219653"></span><span class="custom-a2F80ED"></span><span class="custom-DF1313"></span></div>
                <div class="custom-color3"> <span class="custom-a770505"></span><span class="custom-a0A5D8B"></span><span class="custom-AD5B12"></span><span class="custom-a4F0E8B"></span><span class="custom-a0A7090"></span><span class="custom-a156008"></span></div>
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
    }

    return ob_get_clean();
}


add_shortcode( 'custom_categories_filter', 'custom_categories_filter_shortcode' );




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
            <p class="p-text3">Not a member? Join now to shop.</p>
        </div>
    </div>

    <?php
    // Return the buffered output
    return ob_get_clean();
}
add_shortcode( 'custom_unique_div', 'custom_unique_div_shortcode' );

// Custom function to display subcategory information
function display_subcategory_details( $atts, $content = null ) {
    // Shortcode attributes
    $atts = shortcode_atts( array(
        'class' => '', 
    ), $atts, 'show_details_shortcode' ); 

    // Output HTML
    ?>
    <div class="custom-div2 <?php echo esc_attr( $atts['class'] ); ?>">
        <div class="subcategory-details">
            <h3 class="h1-text1">BEDROOM</h3>
            <p class="p-text5">It's easy to transform your bedroom interior with our great selection of accessories.</p> 
        </div>
    </div>
    <div class="link">
        <div class="text10"> <span class="models">Models</span> <span class="prod">Products</span> </div>
    </div>
    <?php
}

// Register shortcode
add_shortcode( 'display_subcategory_details', 'display_subcategory_details' );




function mytheme_woocommerce_template_loop_product_thumbnail(){
    echo '<div class="image-frame">';

    global $product;
    if($product->is_on_sale()){
        echo '<span class="onsale"> Rea </span>';
    }
    $categories = $product->get_category_ids();
    foreach($categories as $category){
        $term = get_term_by('id', $category, 'product_cat');

        if($term->name == 'Nyheter'){
            echo '<span class="new"> Nyhet </span>';
            break;
        }
    }
    
   
    echo woocommerce_get_product_thumbnail();
    echo '</div>';
}

add_action('woocommerce_before_shop_loop_item_title', 'mytheme_woocommerce_template_loop_product_thumbnail');
