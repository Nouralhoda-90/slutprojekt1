<?php

require_once("vite.php");
require_once("settings.php");
require_once('shortcodes.php');


//initial theme
require_once(get_template_directory() . "/init.php");


function mytheme_add_woocommerce_support()
{ 
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');





//Product 


add_filter('woocommerce_get_breadcrumb', 'remove_first_breadcrumb', 10, 2);

function remove_first_breadcrumb($crumbs, $breadcrumb)
{
    array_shift($crumbs);
    return $crumbs;
}

add_filter('gettext', 'change_related_products_text', 20, 3);
function change_related_products_text($translated_text, $text, $domain)
{
    if ($text === 'Related products') {
        $translated_text = __('Also You May Like', 'woocommerce');
    }
    return $translated_text;
}

add_action('woocommerce_single_product_summary', 'add_miniature_image_after_short_description', 25);
function add_miniature_image_after_short_description()
{
    global $product;

    if (has_post_thumbnail($product->get_id())) {
        $thumbnail_url = get_the_post_thumbnail_url($product->get_id(), 'thumbnail');
        echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" class="miniature-image" />';
    }
}

add_action('woocommerce_single_product_summary', 'add_not_available_text', 25);
function add_not_available_text()
{
    echo '<div class="not-available">';
    echo '<img src="http://wordpress_slutprojekt.test/wp-content/uploads/2024/04/pin.png">';
    echo '<span class="text">Not available in stores</span>';
    echo '</div>';
}


add_filter('woocommerce_product_single_add_to_cart_text', 'change_add_to_cart_button_text');

function change_add_to_cart_button_text($text)
{
    return __('ADD TO SHOPPING BAG', 'woocommerce');
}

//CART


add_filter('gettext', 'change_subtotal_to_order_value', 20, 3);
function change_subtotal_to_order_value($translated_text, $text, $domain)
{
    if ($text === 'Subtotal') {
        $translated_text = __('Order Value:', 'woocommerce');
    }
    return $translated_text;
}

add_filter('gettext', 'change_shipping_label', 20, 3);
function change_shipping_label($translated_text, $text, $domain)
{
    if ($text === 'Shipping') {
        $translated_text = __('Shipping:', 'woocommerce');
    }
    return $translated_text;
}

add_filter('gettext', 'change_proceed_to_checkout_text', 20, 3);
function change_proceed_to_checkout_text($translated_text, $text, $domain)
{
    if ($text === 'Proceed to checkout') {
        $translated_text = __('CONTINUE TO CHECKOUT', 'woocommerce');
    }
    return $translated_text;
}







//Shortcode för related products i cart


function custom_related_products_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'limit' => 2,
        'left_arrow_image' => 'http://wordpress_slutprojekt.test/wp-content/uploads/2024/04/left-arrow.png',
        'right_arrow_image' => 'http://wordpress_slutprojekt.test/wp-content/uploads/2024/04/right-arrow.png',
        'title' => 'Also You May Buy',
    ), $atts, 'custom_related_products');

    $cart_items = WC()->cart->get_cart();
    $related_product_ids = array();

    foreach ($cart_items as $cart_item) {
        $product_id = $cart_item['product_id'];
        $related_products = wc_get_products(array(
            'limit' => intval($atts['limit']),
            'exclude' => array($product_id),
            'orderby' => 'rand',
            'return' => 'ids',
        ));

        $related_product_ids = array_merge($related_product_ids, $related_products);
    }

    $related_product_ids = array_unique($related_product_ids);
    $related_products = wc_get_products(array(
        'include' => $related_product_ids,
    ));

    if (!empty($related_products)) {
        ob_start();
        echo '<div class="related-products">';
        echo '<h2>' . esc_html($atts['title']) . '</h2>';
        echo '<div class="related-products-container">';

        echo '<div class="related-product-arrow-left"><img src="' . esc_url($atts['left_arrow_image']) . '" alt="Left Arrow"></div>';

        foreach ($related_products as $related_product) {
            echo '<div class="related-product">';
            echo '<a href="' . esc_url($related_product->get_permalink()) . '">' . $related_product->get_image() . '</a>';
            echo '<h3>' . $related_product->get_name() . '</h3>';
            if ($related_product->get_rating_count() > 0) {
                echo '<div class="product-rating">' . wc_get_rating_html($related_product->get_average_rating(), $related_product->get_rating_count()) . '</div>';
            } else {
                echo '<div class="product-rating">' . wc_get_rating_html(0, 5) . '</div>';
            }
            echo '<p>' . $related_product->get_price_html() . '</p>';
            echo '</div>';
        }

        echo '<div class="related-product-arrow-right"><img src="' . esc_url($atts['right_arrow_image']) . '" alt="Right Arrow"></div>';

        echo '</div>'; 
        echo '</div>'; 
        return ob_get_clean();
    } else {
        return ''; 
    }
}
add_shortcode('custom_related_products', 'custom_related_products_shortcode');