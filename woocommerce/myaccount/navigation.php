<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
do_action( 'woocommerce_before_account_navigation' );

global $product, $woocommerce, $woocommerce_loop;
$columns = 3;
$current_user = wp_get_current_user();

$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish'
);

$loop = new WP_Query($args);

$purchasedBooks = 0;

while($loop->have_posts()){
  $loop->the_post();
  if(wc_customer_bought_product( $current_user->user_email, $current_user->ID, get_the_ID())){
    $purchasedBooks = $purchasedBooks + 1;
  }
}
wp_reset_postdata();
$loop->rewind_posts();

?>

<section class="section-header section-grey">

  <div class="max-width-wrapper">

    <article class="article-header">

      <h3>Welcome <?php echo $current_user->user_firstname; ?>!</h3>

      <p>Find your purchased books below.</p>

    </article>

  </div>

</section>

  <?php if(!in_array('administrator', $current_user->roles) && $purchasedBooks === 0): ?>

    <section>

        <div class="max-width-wrapper">

          <article class="article-align-left">

            <p class="p-message"><i>You have no books in your shelf.</i></p>

            <a href="<?php echo site_url('/shop'); ?>"><button class="button-green">Go To Shop</button></a>

          </article>

      </div>

    </section>

  <?php else: ?>

  <section class="section-gradient">

    <div class="max-width-wrapper">

    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <?php if(in_array('administrator', $current_user->roles) || wc_customer_bought_product( $current_user->user_email, $current_user->ID, get_the_ID())): ?>

        <?php if(get_field('alternate_version')): ?>

        <article class="article-product">

          <img src="<?php the_post_thumbnail_url(); ?>"/>

          <h3><?php the_title(); ?></h3>

          <?php the_content(); ?>

          <div class="reader-links">

            <?php $book = new BookController(get_the_ID()); ?>

            <?php $book_alternate = new BookController(get_field('alternate_version')->ID); ?>

            <a href="<?php echo get_permalink() . '#' . $book->last_read_chapter ?>"><button class="button-transparent" data-text="Read For Windows"><span>Read For Windows</span></button></a>

            <a href="<?php echo get_permalink(get_field('alternate_version')) . '#' . $book_alternate->last_read_chapter ?>"><button class="button-transparent" data-text="Read For Mac"><span>Read For Mac</span></button></a>

            <?php if ( in_array( 'teacher', $current_user->roles ) || in_array('administrator', $current_user->roles)): ?> 

              <a class="button-teacher" href=""><button class="button-transparent" data-text="Download Teacher Bundle"><span>Download Teacher Bundle</span></button></a>

            <?php endif?>

          </div>

        </article>

        <?php endif ?>

      <?php endif?>

    <?php endwhile ?>

      </div>

  </section>

  <?php wp_reset_postdata(); ?>

  <?php endif ?>