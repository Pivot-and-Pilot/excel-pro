<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
  exit; // Exit if accessed directly
}
?>

<section class="section-has-aside">
  <div class="max-width-wrapper">
    <aside class="aside-left">

    <?php wc_print_notices(); ?>

    <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

    <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    <div class="u-columns" id="customer_login" class="<?php if(isset($_POST['register'])){echo 'state-register';} ?>">

      <div class="u-column1 col-1">

    <?php endif; ?>

        <svg id="svg-login" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 255 212"><defs><style></style><clipPath id="clip-path"><rect class="cls-1" x="47.62" y="0.31" width="159.77" height="211.4"/></clipPath></defs><g class="cls-2"><path class="cls-3" d="M175.95,49.38c0,27.09-21.7,49.05-48.45,49.05s-48.45-22-48.45-49.05S100.75.32,127.5.32s48.45,22,48.45,49.05"/><path class="cls-3" d="M207.38,168.12c0-29.47-23.8-53.57-52.91-53.57H100.52c-29.11,0-52.91,24.11-52.91,53.57v43.59H207.38Z"/></g></svg>

        <form class="woocomerce-form woocommerce-form-login login" method="post">

          <?php do_action( 'woocommerce_login_form_start' ); ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="email" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" placeholder="password"/>
          </p>

          <?php do_action( 'woocommerce_login_form' ); ?>

          <p class="form-row">
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <!-- <input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" /> -->
            <button class="button-orange button-login" data-text="Login" name="login" value="value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><span>Login</span></button>
            <label style="display: none;" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
              <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
            </label>
          </p>
          <p class="woocommerce-LostPassword lost_password">
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Forgot your password?', 'woocommerce' ); ?></a>
          </p>

          <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>

    <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

      </div>

      <div class="u-column2 col-2">

        <svg id="svg-login" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 255 212"><defs><style></style><clipPath id="clip-path"><rect class="cls-1" x="47.62" y="0.31" width="159.77" height="211.4"/></clipPath></defs><g class="cls-2"><path class="cls-3" d="M175.95,49.38c0,27.09-21.7,49.05-48.45,49.05s-48.45-22-48.45-49.05S100.75.32,127.5.32s48.45,22,48.45,49.05"/><path class="cls-3" d="M207.38,168.12c0-29.47-23.8-53.57-52.91-53.57H100.52c-29.11,0-52.91,24.11-52.91,53.57v43.59H207.38Z"/></g></svg>

        <form method="post" class="register">

          <?php do_action( 'woocommerce_register_form_start' ); ?>

          <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
              <input placeholder="Username" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
            </p>

          <?php endif; ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input placeholder="Email" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
          </p>

          <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
              <input placeholder="Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
            </p>

          <?php endif; ?>

          <!-- Spam Trap -->
          <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

          <?php do_action( 'woocommerce_register_form' ); ?>

          <p class="woocommerce-FormRow form-row">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <!-- <input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" /> -->
            <button class="button-orange button-login" data-text="Register" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><span>Register</span></button>
          </p>

          <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

      </div>

    </div>
    <?php endif; ?>

    <?php do_action( 'woocommerce_after_customer_login_form' ); ?>

    <article class="article-login">
      <h4>Don't have an account?</h4>
      <p>Become an <b>ExcelPro</b> today! Our interactive platform makes it fun and easy.</p>
      <button id="button_register" class="button-green button-auto-width" data-text="Register"><span>Register</span></button>
    </article>

  </aside><aside class="aside-right">
    <article class="article-center">
      <h4>Are you an educator?</h4>
      <p>If you are an educator and thinking of using our book as part of your course, you might be eligible to get an educator package.</p>
      <a href="<?php echo site_url('/educator-packages');?>"><button class="button-green button-auto-width" data-text="Learn More"><span>Learn More</span></button></a>
    </article>
  </aside>

</div>
</section>