<?php

//Homepage Icons
function services_shortcode() {
    ob_start();
    ?>
    <div class="services">
        <div class="services-content">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/freeshipping.png'); ?></span>
            <span class="services-text">FREE SHIPPING</span>
        </div>
        <div class="services-content money-back">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/moneyback.png'); ?></span>
            <span class="services-text">100% MONEY BACK</span>
        </div>
        <div class="services-content">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/support.png'); ?></span>
            <span class="services-text">SUPPORT 24/7</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('services', 'services_shortcode');

//Shortcode "bedsheet sets" in homepage
function moody_studio_shortcode_draw_box($attr)
{
    $attr = shortcode_atts(
        array(
        ),
        $attr,
        "box"
    );
    
    
       return '<div class="box">
       <h2>BEDSHEET SETS</h2>
       <h3>300 kr</h3>
       <h4>700 kr</h4>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
       </div>';

}
add_shortcode("box", "moody_studio_shortcode_draw_box");