<?php
/**
 * Custom Order Confirmation Email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/custom-order-confirmation-email.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Ensure that the order object is accessible
if ( ! isset( $order ) ) {
    return;
}

// Get the order ID
$order_id = $order->get_id();

// Get the order object
$order = wc_get_order( $order_id );

// Get the customer's name
$customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();

// Get the order date
$order_date = $order->get_date_created()->format( 'F j, Y' );

// Get the order number
$order_number = $order->get_order_number();

// Get the order total
$order_total = $order->get_formatted_order_total();

// Get the order items
$order_items = $order->get_items();

// Hook to output the email header
do_action( 'woocommerce_email_header', $email_heading, $email );

// Hook to output the customer details
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

// Hook to output the order details
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

// Hook to output the order meta
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

// Hook to output additional content if provided
if ( $additional_content ) {
    echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

// Custom function to output additional content
function custom_additional_content() {
    // Add your custom content here
    echo '<p>🎉 Thank you for choosing Moody Store! We appreciate your order and are excited to fulfill it with care. If you have any questions or need assistance, feel free to contact our friendly customer support team. Happy shopping! 🛍️</p>';
}

// Hook to output additional content via a custom function
add_action( 'woocommerce_email_footer', 'custom_additional_content' );

// Hook to output the email footer
do_action( 'woocommerce_email_footer', $email );
?>
