<?php


//belet kategori
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//delet Additional information
add_filter( 'woocommerce_product_tabs', 'remove_prod_tabs', 9999 );
  
function remove_prod_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}