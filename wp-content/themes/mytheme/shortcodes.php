<?php
function services_shortcode() {
    ob_start();
    ?>
    <div class="services">
        <div class="services-content">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/freeshipping.svg'); ?></span>
            <span class="services-text">FREE SHIPPING</span>
        </div>
        <div class="services-content money-back">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/moneyback.svg'); ?></span>
            <span class="services-text">100% MONEY BACK</span>
        </div>
        <div class="services-content">
            <span class="services-icon"><?php echo file_get_contents(get_template_directory_uri() . '/resources/images/support.svg'); ?></span>
            <span class="services-text">SUPPORT 24/7</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('services', 'services_shortcode');