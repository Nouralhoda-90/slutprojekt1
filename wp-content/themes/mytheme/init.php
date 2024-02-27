<?php


require_once('vite.php');
require_once('ajax.php');
require_once("settings.php");
// require_once("shortcodes.php");

function mytheme_enqueue()
{
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("mystyle", $theme_directory . "/style.css");
    
}
add_action("wp_enqueue_scripts", "mytheme_enqueue");

function mytheme_init()
{
    // add theme support
    add_theme_support('post-thumbnails');

    // register MENU
    $menus = array(
        'huvudmeny' => 'huvudmeny',
        'menyikoner'=>'menyikoner',
        'footer_meny' => 'footer_meny',
        'footer_meny2' => 'footer_meny2',
        'socialamedierikoner'=>'socialamedierikoner',
     
    );
    register_nav_menus($menus);
}
add_action("after_setup_theme", "mytheme_init");
