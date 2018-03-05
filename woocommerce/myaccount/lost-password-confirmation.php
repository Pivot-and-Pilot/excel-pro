<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
wc_print_notices();
wc_print_notice( __( 'Password reset email has been sent.', 'woocommerce' ) );
?>

<section>

    <div class="max-width-wrapper">

        <article class="article-header">

            <h3>Your password has been reset.</h3>

            <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'woocommerce' ) ); ?></p>

            <a href="<?php echo site_url('/my-account'); ?>"><button class="button-orange button-max-width" data-text="Click Here to Login"><span>Click Here to Login</span></button></a>

        </article>

    </div>

</section>