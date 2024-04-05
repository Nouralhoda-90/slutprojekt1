<?php
/**
 * Checkout review order template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

// Apply free shipping automatically when the subtotal is $1000 or more
function apply_free_shipping_based_on_subtotal( $rates, $package ) {
    // Get the cart subtotal
    $subtotal = WC()->cart->get_subtotal();

    // Check if the subtotal is $1000 or more
    if ( $subtotal >= 1000 ) {
        // Loop through available shipping rates
        foreach ( $rates as $rate_key => $rate ) {
            // Check if the shipping method is flat rate
            if ( 'flat_rate' === $rate->method_id ) {
                // Set the shipping cost to zero
                $rates[$rate_key]->cost = 0;
                break; // Exit the loop since we found the flat rate
            }
        }
    }

    return $rates;
}
add_filter( 'woocommerce_package_rates', 'apply_free_shipping_based_on_subtotal', 10, 2 );

// Output the order review section
do_action( 'woocommerce_checkout_before_order_review' ); ?>

<div id="order_review" class="woocommerce-checkout-review-order">
    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
</div>

<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
