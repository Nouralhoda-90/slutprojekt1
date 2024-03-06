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

    // Handle click event of custom checkout button
    $('#custom_checkout_button').on('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Perform client-side form validation
        if (validateForm()) {
            // If validation passes, submit the form
            $('#checkout_form').submit();
        } else {
            // If validation fails, display error message or take appropriate action
            alert('Please fill in all required fields.');
        }
    });

    // Form validation function for checkout button
    function validateForm() {
        // Assume all fields are valid initially
        var isValid = true;

        // Iterate through each required input field
        $('input[required]').each(function() {
            // Check if the field is empty
            if ($(this).val().trim() === '') {
                // If empty, mark the form as invalid
                isValid = false;
                return false; // Exit the loop early
            }
        });

        // Return the validation result
        return isValid;
    }
});
