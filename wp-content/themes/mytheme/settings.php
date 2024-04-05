<?php


if (!is_admin()) {
    return;
}

//add menu into dashboard settings


function mytheme_add_settings()
{
    add_submenu_page(
        "options-general.php",
        "Butik001",
        "Customize sitting",
        "edit_pages",
        "my_butik_id",
        "mytheme_add_setting_callback"
    );
}
add_action('admin_menu', 'mytheme_add_settings');

function mytheme_add_setting_callback()
{
?>
    <div class="wrap">
        <h2 style="margin-bottom: 30px;">My Theme Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields("butik");
            do_settings_sections("butik");
            submit_button();
            ?>
        </form>
    </div>
<?php
}

//registrerar inställningar tillgängliga på sidan "Butik"
function mytheme_add_settings_init()
{
  
    add_settings_section(
        'butik_general',
        'Store General Setting',
        'mytheme_add_settings_section_general',
        'butik'
    );

  
    register_setting(
        "butik",
        "store_message"
    );

    add_settings_field(
        "store_message",
        "Store Message",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_message",
            "option_type" => "text"
        )
    );

   
    register_setting(
        "butik",
        "store_name"
    );

    add_settings_field(
        "store_name",
        "Store Name",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_name",
            "option_type" => "text"
        )
    );

   //footer
    register_setting(
        "butik",
        "store_footer_info"
    );

    add_settings_field(
        "store_footer_info",
        "Store Footer Infomation",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_footer_info",
            "option_type" => "textarea"
        )
    );
  //address-
    register_setting(
        "butik",
        "store_address"
    );

    add_settings_field(
        "store_address",
        "Store Address",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_address",
            "option_type" => "text"
        )
    );
  //Tel.
    register_setting(
        "butik",
        "store_tel"
    );

    add_settings_field(
        "store_tel",
        "Store phone Number",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_tel",
            "option_type" => "text"
        )
    );
   
    register_setting(
        "butik",
        "store_email"
    );

    add_settings_field(
        "store_email",
        "Store Email",
        "mytheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_email",
            "option_type" => "text"
        )
    );



   
    // open hours
   
    register_setting(
        "butik",
        "store_open"
    );

    add_settings_field(
        "store_open",              //id
        "Open Time",               //title(will be shown on setting-butik page)
        "mytheme_section_setting", //callback function
        "butik",                   //page
        "butik_general",           //section
        array(                     //multiple parameter
            "option_name" => "store_open",
            "option_type" => "time"
        )
    );

    
    register_setting(
        "butik",
        "store_shop_hero_title"
    );

    add_settings_field(
        "store_shop_hero_title",      //id
        "Shop hero title",            //title(will be shown on setting-butik page)
        "mytheme_section_setting",    //callback function
        "butik",                      //page
        "butik_general",              //section
        array(                        //multiple parameter
            "option_name" => "store_shop_hero_title",
            "option_type" => "textarea"
        )
    );

   
    register_setting(
        "butik",
        "store_shop_hero_sub_title"
    );

    add_settings_field(
        "store_shop_hero_sub_title",    //id
        "Shop hero sub title",         //title(will be shown on setting-butik page)
        "mytheme_section_setting",    //callback function
        "butik",                      //page
        "butik_general",              //section
        array(                        //multiple parameter
            "option_name" => "store_shop_hero_sub_title",
            "option_type" => "textarea"
        )
    );
    
    register_setting(
        "butik",
        "shortcode_shop_info"
    );

    add_settings_field(
        "shortcode_shop_info",       //id
        "Shop  info",             //title(will be shown on setting-butik page)
        "mytheme_section_setting",    //callback function
        "butik",                      //page
        "butik_general",              //section
        array(                        //multiple parameter
            "option_name" => "store_shop_hero_info",
            "option_type" => "text"
        )
    );


}
add_action('admin_init', 'mytheme_add_settings_init');


function mytheme_add_settings_section_general()
{
    echo "<hr>";
    echo "<p> General settings for the store.</p>";
    echo "<hr>";
}

// draw the Settings page
function mytheme_section_setting($args)
{
    $option_name = $args["option_name"];
    $option_type = $args["option_type"];
    $option_value = get_option($args["option_name"]);

    //render in HTML
    if ($option_type === 'textarea') {
        // render a textarea element
        echo '<textarea id="' . esc_attr($option_name) . '" 
        name="' . esc_attr($option_name) . '"
        rows="5" 
        cols="50">' . esc_textarea($option_value) . '</textarea>';
    } else {
        // render a input element
        echo '<input type="' . esc_attr($option_type) . '" 
                     id="' . esc_attr($option_name) . '" 
                     name="' . esc_attr($option_name) . '" 
                     value="' . esc_attr($option_value) . '"
              />';
    }
}