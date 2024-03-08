<?php

// require_once('shortcodes.php');
require_once('vite.php');
<<<<<<< Updated upstream
require_once('ajax.php');
=======

>>>>>>> Stashed changes

require_once('settings.php');
// require_once('checkout-hooks.php');



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

