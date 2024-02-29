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