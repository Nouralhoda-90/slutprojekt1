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


function newsletter_shortcode() {
    ob_start();
    ?>
    <div class="newsletter">
        <div class="newsletter-signup">
            <h2>SIGN UP FOR THE NEWSLETTER</h2>
            <span>Subscribe for the latest stories and promotions</span>
        </div>
        <div class="newsletter-submit">
            <form>
                <input type="email" id="email" name="email" placeholder="Enter you e-mail address">
                <button type="submit" name="submit">
                    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/resources/images/newsletter.svg" alt="Submit">
                </button>            
            </form>        
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('newsletter', 'newsletter_shortcode');


//Shortcode-box till "bedsheet sets" i home
function moody_studio_shortcode_draw_box($attr)
{
    $attr = shortcode_atts(
        array(
        ),
        $attr,
        "box"
    );

       return '<div class="bedsheet box">
       <h2>BEDSHEET SETS</h2>
       <h3>500 kr</h3>
       <h4>2200 kr</h4>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
       </div>';

}
add_shortcode("box", "moody_studio_shortcode_draw_box");
