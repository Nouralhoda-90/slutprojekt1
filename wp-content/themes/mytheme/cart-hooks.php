<?php

//skapar en form för rabattkoder som lagts i cart totals istället för under shop table
add_action( 'woocommerce_before_cart_totals', 'display_coupon_form_above_cart_totals', 10 );

function display_coupon_form_above_cart_totals() {
    if ( wc_coupons_enabled() ) { ?>
        <p>ADD A DISCOUNT CODE</p>
        <form class="woocommerce-coupon-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <div class="coupon above-cart-totals">
                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( '', 'woocommerce' ); ?>" style="width: 100%" /> 
                <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'ADD', 'woocommerce' ); ?>" style="width: 20%"><?php esc_attr_e( 'ADD', 'woocommerce' ); ?></button>
            </div>
        </form>
    <?php }
}

//skapar upp en button för login som lägger sig under discount
add_action( 'woocommerce_cart_totals_before_shipping', 'add_extra_button_above_shipping', 5 );

function add_extra_button_above_shipping() {
    ?>
    <div class="login-btn">
        <p>Log in to use your member offers.</p>
        <button type="button" class="button" id="login_button"><?php esc_html_e( 'LOG IN', 'woocommerce' ); ?></button>
    </div>
    <?php
}

//Om kunden når minst 1000kr försvinner alla fraktalternativ som kostar och endast free shipping är tillgänglig
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

//ändrar texten på proceed to checkout button
function woocommerce_button_proceed_to_checkout() {
    $checkout_url = WC()->cart->get_checkout_url();

    ?>
    <a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e( 'CONTINUE TO CHECKOUT' ); ?></a>
    <?php
}

//text inne i cart när varukorgen är tom
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() {
    $html  = '<p class="cart-empty">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) );
    echo $html . '</p>';
}

//flyttar på cross-sells from default postition till längst ner på sidan
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );

 //ändrar från 2 till 4 columns 
add_filter( 'woocommerce_cross_sells_columns', 'change_cross_sells_columns' );
 
function change_cross_sells_columns( $columns ) {
return 4;
}

//byter namn på cross-sells heading
add_filter( 'woocommerce_product_cross_sells_products_heading', 'change_cross_sells_heading' );
function change_cross_sells_heading() {
	return 'Also You May Buy';
}

//max 4 cross sells produkter kommer att visas
add_filter( 'woocommerce_cross_sells_total', 'change_max_cross_sells_products' );
  
function change_max_cross_sells_products( $columns ) {
return 4;
}