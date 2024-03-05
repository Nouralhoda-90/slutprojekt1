<?php
add_action( 'init', 'remove_default_loop_rating' );

function remove_default_loop_rating() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}

//AJAX for updating cart totals
add_action('wp_ajax_update_cart_count', 'update_cart_count_ajax');
add_action('wp_ajax_nopriv_update_cart_count', 'update_cart_count_ajax');

function update_cart_count_ajax() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}



//changing the proceed to checkout text on the button to Continue to checkout
add_filter( 'woocommerce_cart_totals_after_order_total', 'change_checkout_button_text' );
function change_checkout_button_text( $cart_totals ) {
    if ( is_cart() ) {
        echo '<script>jQuery(document).ready(function($) { $("a.checkout-button").text("Continue to Checkout"); });</script>';
    }
}

add_filter( 'gettext', 'change_subtotal_text', 20, 3 );
function change_subtotal_text( $translated_text, $text ) {
    if ( $text === 'Subtotal' ) {
        $translated_text = 'Order value';
    }
    return $translated_text;
}

//Free shipping is applied automatically when the order amount exceeds the free shipping amount that is set up in WC settings
add_action('woocommerce_cart_calculate_fees', 'apply_free_shipping_based_on_order_amount');
function apply_free_shipping_based_on_order_amount() {
    $free_shipping_settings = get_option('woocommerce_free_shipping_1_settings');
    if (isset($free_shipping_settings['min_amount'])) {
        $minimum_amount_for_free_shipping = floatval($free_shipping_settings['min_amount']);

        if (WC()->cart->subtotal >= $minimum_amount_for_free_shipping) {
            foreach (WC()->shipping()->get_shipping_methods() as $shipping_method_id => $shipping_method) {
                if ($shipping_method_id !== 'free_shipping') {
                    unset(WC()->session->chosen_shipping_methods[$shipping_method_id]);
                    unset(WC()->session->chosen_shipping_methods);
                    WC()->cart->calculate_shipping();
                }
            }
        }
    }
}



