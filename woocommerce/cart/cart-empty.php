<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
wc_print_notices();
/**
 * @hooked wc_empty_cart_message - 10
 */
if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
  <p class="p-crimson"><i>Your cart is currently empty.</i></p>
  <a class="wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
    <button class="button-green" data-text="Return to shop"><span><?php _e( 'Return to shop', 'woocommerce' ) ?></span></button>
  </a>
<?php endif; ?>