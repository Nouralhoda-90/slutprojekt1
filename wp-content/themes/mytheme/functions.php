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



function custom_div_shortcode( $atts, $content = null ) {
    
    $atts = shortcode_atts( array(
        'class' => '', 
    ), $atts, 'custom_div' );

    
    ?>
    <div class="custom-div <?php echo esc_attr( $atts['class'] ); ?>">
        
        <div class="inner-div">
            <p class="p-text1">Member Exclusive</p>
            <p class="p-text2">15% off everything + extra 100:- off for plus status</p>
            <p class="p-text3">Not a member? Join now to shop.</p>
        </div>
       
    </div>
    <?php
    
}


add_shortcode( 'custom_div', 'custom_div_shortcode' );

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


