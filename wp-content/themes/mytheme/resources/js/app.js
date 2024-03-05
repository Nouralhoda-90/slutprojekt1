

import "./sortingfilter";


jQuery(document).ready(function($) {
    $('.woocommerce').before($('.woocommerce-notices-wrapper'));
});



jQuery(document).ready(function($) {
    // This function handles the shipping options based on the selected shipping method
    function handleShippingOptions() {
        // Check if the selected shipping method is free shipping
        if ($('input[name^="shipping_method"]:checked').val() === 'free_shipping:1') {
            // If free shipping is selected, hide all shipping options except the selected one
            $('input[name^="shipping_method"]').not(':checked').closest('ul').hide();
            
            // Update the shipping information to indicate that it's free
            $('.shipping').html('<th class="shipping" colspan="1">Shipping:</th><td class="shipping-amount" colspan="1">0kr</td>');
        } else {
            // If a shipping method other than free shipping is selected, show all shipping options
            $('input[name^="shipping_method"]').closest('tr').show();
            
            // Clear the shipping total if there was a previous value
            $('.shipping-total').text('');
        }
    }

    // Call the function to handle shipping options when the page loads
    handleShippingOptions();

    // Attach an event listener to handle changes in the shipping method selection
    $('input[name^="shipping_method"]').on('change', function() {
        // Call the function to handle shipping options whenever the shipping method changes
        handleShippingOptions();
    });
});



//changing the default text on dropdown menu on product page
jQuery(document).ready(function($) {
    $('.variations label').hide();
    $('.variations select').each(function() {
        var attributeLabel = $('label[for="' + $(this).attr('id') + '"]').text().replace(':', ''); 
        var newText = 'Select ' + attributeLabel;
        $(this).prepend('<option value="">' + newText + '</option>');
    });
});