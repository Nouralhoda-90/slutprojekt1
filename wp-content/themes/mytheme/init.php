<?php


require_once('vite.php');

require_once('settings.php');

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