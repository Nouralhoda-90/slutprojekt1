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




// functions.php eller ett plugin-fil

add_action('init', 'remove_woocommerce_result_count');

function remove_woocommerce_result_count()
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
}

function custom_bedroom_page_content()
{
    echo '<p class="custom-page-content">Its easy to transform your bedroom interior with our great selection of accessories.</p>';
}

add_action('woocommerce_archive_description', 'custom_bedroom_page_content');




/// HOMEPAGE

function custom_theme_customize_register($wp_customize)
{
    $wp_customize->add_section('homepage_settings', array(
        'title'    => __('Homepage inställningar', 'textdomain'),
        'priority' => 120,
    ));

    //Ikon 1

    $wp_customize->add_setting('icon_image_1', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icon_image_1', array(
        'label'    => __('Bild för ikon 1', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'icon_image_1',
    )));


    $wp_customize->add_setting('icon_text_1', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('icon_text_1', array(
        'label'    => __('Text för ikon 1', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));


    // Ikon 2
    $wp_customize->add_setting('icon_image_2', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icon_image_2', array(
        'label'    => __('Bild för ikon 2', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'icon_image_2',
    )));


    $wp_customize->add_setting('icon_text_2', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('icon_text_2', array(
        'label'    => __('Text för ikon 2', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    // Ikon 3

    $wp_customize->add_setting('icon_image_3', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icon_image_3', array(
        'label'    => __('Bild för ikon 3', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'icon_image_3',
    )));


    $wp_customize->add_setting('icon_text_3', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('icon_text_3', array(
        'label'    => __('Text för ikon 3', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));


    // Banner

    $wp_customize->add_setting('banner_heading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('banner_heading', array(
        'label'    => __('Banner Rubrik', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('banner_subheading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('banner_subheading', array(
        'label'    => __('Banner Subheading', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('banner_background_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_background_image', array(
        'label'    => __('Banner Bakgrundsbild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'banner_background_image',
    )));

    $wp_customize->add_setting('banner_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('banner_button_text', array(
        'label'    => __('Banner Knapp Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    // Kolumner under Banner

    $wp_customize->add_setting('left_column_heading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('left_column_heading', array(
        'label'    => __('Vänster Kolumn Rubrik', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('left_column_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'left_column_image', array(
        'label'    => __('Vänster Kolumn Bild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'left_column_image',
    )));

    $wp_customize->add_setting('left_column_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('left_column_button_text', array(
        'label'    => __('Vänster Kolumn Knapp Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    // Höger kolumn inställningar
    $wp_customize->add_setting('right_column_heading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('right_column_heading', array(
        'label'    => __('Höger Kolumn Rubrik', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('right_column_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'right_column_image', array(
        'label'    => __('Höger Kolumn Bild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'right_column_image',
    )));

    $wp_customize->add_setting('right_column_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('right_column_button_text', array(
        'label'    => __('Höger Kolumn Knapp Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    // Produkt bilder 1

    $wp_customize->add_setting('first_image_background', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'first_image_background', array(
        'label'    => __('Första Bildens Bakgrundsbild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'first_image_background',
    )));

    $wp_customize->add_setting('first_image_heading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('first_image_heading', array(
        'label'    => __('Första Bildens Rubrik', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('first_image_paragraph', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('first_image_paragraph', array(
        'label'    => __('Första Bildens Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('first_image_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('first_image_button_text', array(
        'label'    => __('Första Bildens Knapp Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));



    $wp_customize->add_setting('second_image_background', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'second_image_background', array(
        'label'    => __('Andra Bildens Bakgrundsbild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'second_image_background',
    )));

    $wp_customize->add_setting('second_image_heading', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('second_image_heading', array(
        'label'    => __('Andra Bildens Rubrik', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('second_image_paragraph', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('second_image_paragraph', array(
        'label'    => __('Andra Bildens Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('second_image_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('second_image_button_text', array(
        'label'    => __('Andra Bildens Knapp Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));


    $wp_customize->add_setting('banner_second_background_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_second_background_image', array(
        'label'    => __('Banner Bakgrundsbild - Second', 'textdomain'),
        'section'  => 'banner_second_settings',
        'settings' => 'banner_second_background_image',
    )));


    ///MAIL
    $wp_customize->add_setting('homepage_h1_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('homepage_h1_text', array(
        'label'    => __('H1 Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));

    // P Text
    $wp_customize->add_setting('homepage_p_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('homepage_p_text', array(
        'label'    => __('P Text', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'textarea',
    ));

    // Knappens Bild
    $wp_customize->add_setting('homepage_button_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_button_image', array(
        'label'    => __('Knappens Bild', 'textdomain'),
        'section'  => 'homepage_settings',
        'settings' => 'homepage_button_image',
    )));

    // Knappens Text
    $wp_customize->add_setting('homepage_button_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('homepage_email_placeholder', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('homepage_email_placeholder', array(
        'label'    => __('Email Placeholder', 'textdomain'),
        'section'  => 'homepage_settings',
        'type'     => 'text',
    ));


    // Product 1
    
}
add_action('customize_register', 'custom_theme_customize_register');


function save_newsletter_settings()
{
    if (isset($_POST['newsletter_settings_nonce']) && wp_verify_nonce($_POST['newsletter_settings_nonce'], 'save_newsletter_settings')) {
        update_option('newsletter_h1', $_POST['newsletter_h1']);
        update_option('newsletter_p', $_POST['newsletter_p']);
        update_option('newsletter_button_image', $_POST['newsletter_button_image']);
    }
}

add_action('admin_post_save_newsletter_settings', 'save_newsletter_settings');

