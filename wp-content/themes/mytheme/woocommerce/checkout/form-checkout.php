<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);
?>

<form name="checkout" id="checkout_form" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <?php if ($checkout->get_checkout_fields()) : ?>
        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
        <div class="custom-col2-set" id="customer_details">
            <div class="custom-col-1">
                <?php do_action('woocommerce_checkout_billing'); ?>
            </div>
            <div class="custom-col-2">
                <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>
        </div>
        <?php do_action('woocommerce_checkout_after_customer_details'); ?>
    <?php endif; ?>
    <div class="custom-order-and-checkout">
        <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
        <h3 id="custom_order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>
        <?php do_action('woocommerce_checkout_before_order_review'); ?>
        <div id="order_review" class="woocommerce-checkout-review-order custom-checkout-review-order">
            <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>
    </div>
    <?php do_action('woocommerce_checkout_after_order_review'); ?>
</form>

<!-- Custom Checkout Button -->
<button id="custom_checkout_button">Proceed to Checkout</button>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<!-- JavaScript Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle click event of custom checkout button
    document.getElementById('custom_checkout_button').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Submit the checkout form
        document.getElementById('checkout_form').submit();
    });
});
</script>

<?php
// Add a hook to remove the default WooCommerce checkout button
add_action('woocommerce_checkout_order_review', 'remove_default_checkout_button', 1);
function remove_default_checkout_button() {
    remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
}
?>
