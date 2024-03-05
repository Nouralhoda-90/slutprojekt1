<?php
/**
 * Custom Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- Custom Footer -->
<div style="background-color: #f8f8f8; padding: 20px;">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td align="center">
                <p style="font-size: 14px; color: #666;"><?php echo esc_html( get_option( 'woocommerce_email_footer_text' ) ); ?></p>
            </td>
        </tr>
    </table>
</div>
<!-- End Custom Footer -->
