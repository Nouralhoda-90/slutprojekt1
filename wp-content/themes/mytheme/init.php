<?php

require_once('shortcodes.php');
require_once('vite.php');
require_once('ajax.php');
require_once('settings.php');

function my_theme_enqueue() {    
    $data = array(
        "name" => get_option("blogname"),
        "option" => get_option("myoption"),

    );
    wp_localize_script("app", "myvariables", $data);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue');


function mytheme_init()
{
    // add theme support
    add_theme_support('post-thumbnails');

    // register MENU
    $menu = array(
        'huvudmeny' => 'huvudmeny',
        'menyikoner'=>'menyikoner',
        'footer_social_media' => 'footer_social_media',
        'footer_shopping' => 'footer_shopping',
        'footer_links' => 'footer_links',
        'footer_blog' => 'footer_blog'
    );
    register_nav_menus($menu);
}
add_action("after_setup_theme", "mytheme_init");

// function enqueue_custom_scripts() {
//     // Enqueue  JavaScript file
//     wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/resources/js/app.js', array(), '1.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );
