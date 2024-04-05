<?php
require_once('sorteringfilter.php');



if (!defined('ABSPATH')) {
    exit;
}
require_once("init.php");
require_once("hooks.php");

require_once(get_template_directory() . "/init.php");



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



function custom_div_shortcode( $atts, $content = null ) {
    
    $atts = shortcode_atts( array(
        'class' => '', 
    ), $atts, 'custom_div' );

    
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
    
}


add_shortcode( 'custom_div', 'custom_div_shortcode' );



