<?php
add_action( 'init', 'remove_default_loop_rating' );

function remove_default_loop_rating() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}


// single product---------------

//delet kategorier
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//delet"Additional information"
add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 9999 );
  
function remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

// ------------     CART HOOKS         -------------------- //
add_action('woocommerce_cart_totals_before_order_total', 'add_custom_inputs_above_subtotal');

function add_custom_inputs_above_subtotal() {
    ?>
    <div class="custom-inputs">
        <div class="discount-code">
            <p>ADD A DISCOUNT CODE</p>
            <input type="text" name="discount_code">
            <button>ADD</button>
        </div>

        <div class="login-offers">
            <p>Log in to use your member offers.</p>
            <button class="log-in-btn">LOG IN</button>
        </div>
    </div>
    <?php
}

//trying to remove the coupon code form
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

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



