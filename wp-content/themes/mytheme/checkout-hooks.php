<?php

add_filter('woocommerce_checkout_fields', 'remove_billing_address_2_and_company_fields');
//Hook för att ta bort vissa feilds jag ej vill ha med i checkout.
function remove_billing_address_2_and_company_fields($fields) {
    // Ta bort adressens andra radfält
    if (isset($fields['billing']['billing_address_2'])) {
        unset($fields['billing']['billing_address_2']);
    }

    // Ta bort företagsfältet
    if (isset($fields['billing']['billing_company'])) {
        unset($fields['billing']['billing_company']);
    }

    return $fields;
}