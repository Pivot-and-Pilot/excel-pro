<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if(is_singular('product')){
  wp_enqueue_style( 'excelpro-style-reader', get_template_directory_uri() . '/style-reader.css' );}

$current_user = wp_get_current_user();

function bought_main_version($current_user, $id){
  if(get_field('main_version', $id)){
    return wc_customer_bought_product( $current_user->email, $current_user->ID, get_field('main_version', $id)->ID );
  } else {
    return wc_customer_bought_product( $current_user->email, $current_user->ID, $id );
  }
}

if(!bought_main_version($current_user, $post->ID)){
  wp_redirect(site_url('/shop'));
}

get_header(); ?>

<?php $bookController = new BookController($post->ID); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php if( bought_main_version($current_user, get_the_ID()) ): ?>
          
          <div id="reader" data-api-url="<?php echo site_url('/book-api'); ?>" data-chapter-index="0" data-product-id="<?php the_ID(); ?>" data-title="<?php the_title(); ?>" data-current-date="<?php echo date('d/m/y'); ?>">

            <header>

              <div class="max-width-wrapper">

                <h3>Excelling in Life</h3>

              </div>

              <menu class="menu-aside-controller">
                <div class="max-width-wrapper">
                  <a class="toggle-sidebar" href="#chapter_list"><menuitem><img class="img-icon-small" src="<?php echo get_template_directory_uri() . '/img/hamburger.png' ?>"/><span>Chapters</span></menuitem></a>
                  <a class="toggle-sidebar" href="#bookmark_list"><menuitem><img class="img-icon-small" src="<?php echo get_template_directory_uri() . '/img/icon-bookmark.svg' ?>"/><span>Bookmarks</span></menuitem></a>
                </div>
              </menu>

              <button id="button_scroll_up"></button>
              <div id="font_range"><input type="range" min="12" max="20" value="16" step="1"/></div>
            </header>

            <main id="main_reader">
              
              <aside id="chapter_list">
                <ul>
                  <?php foreach($bookController->chapters as $chapter): ?>
                    <?php if(get_field($chapter->field_name)): ?>
                    
                      <a class="chapter-permalink <?php if($chapter->is_completed){echo 'state-completed';} ?>" data-chapter-name="<?php echo $chapter->title; ?>" href="#<?php echo $chapter->field_name ?>">
                        <li class="chapter-entry">
                          <figure class="chapter-percentage"></figure>
                          <p class="p-title"><input type="button"><span><?php the_field($chapter->field_name . '_title'); ?></span></p>
                        </li>
                      </a>
                    <?php endif ?>
                  <?php endforeach ?>
                </ul>

                <a class="close-sidebar" href="#">
                  <button class="hamburger state-active">
                    <span></span>
                    <span></span>
                    <span></span>
                  </button>
                </a>
              </aside>
              
              <aside id="bookmark_list">

                <div class="bookmark-container">

                  <h2><img class="img-icon-small" src="<?php echo get_template_directory_uri() . '/img/icon-bookmark.svg' ?>"/>Bookmarks</h2>
                  <input id="bookmark_search" class="js-load" type="text"/>

                  <div class="no-bookmarks state-hidden">
                    <noscript><p class="p-crimson"><i>Please Enable Javascript To Use Bookmarks</i></p></noscript>
                    <p class="p-crimson"><i id="bookmark_message">You Have No Bookmarks</i></p>
                    <p class="p-crimson">Using your mouse, highlight the text that you would like to add into your bookmarks.</p>
                  </div>

                  <li class="bookmark-entry bookmark-entry-template" data-chapter-id="" data-start-node-path="" data-start-node-offset="" data-end-node-path=""  data-end-node-offset="">
                    <button class="bookmark-delete">&times;</button>
                    <a class="bookmark-reveal">
                      <p class="p-crimson"><i></i></p>
                      <p class="p-crimson bookmark-excerpt"></p>
                    </a>
                  </li>

                  <ul class="bookmark-list js-load">

                    <?php foreach($bookController->bookmarks as $bookmark): ?>
                      <li class="bookmark-entry" data-chapter-index="<?php echo $bookmark['chapterIndex'] ?>" data-start-node-path="<?php echo $bookmark['startNodePath'] ?>" data-start-node-offset="<?php echo $bookmark['startNodeOffset']?>" data-end-node-path="<?php echo $bookmark['endNodePath']?>"  data-end-node-offset="<?php echo $bookmark['endNodeOffset'] ?>">
                        <button class="bookmark-delete"></button>
                        <a class="bookmark-reveal">
                          <p class="p-crimson"><i><?php echo str_replace('_', ' ', AVAILABLE_CHAPTERS[$bookmark['chapterIndex']]) ?> - <?php echo $bookmark['date'] ?></i></p>
                          <p class="p-crimson bookmark-excerpt"></p>
                        </a>
                      </li>
                    <?php endforeach ?>

                  </ul>
                </div>

                <a class="close-sidebar" href="#">
                  <button class="hamburger state-active">
                    <span></span>
                    <span></span>
                    <span></span>
                  </button>
                </a>

              </aside>



              <div id="main_reader_inner">
                <div id="chapter_content">
                <?php foreach(AVAILABLE_CHAPTERS as $available_chapter): ?>
                  <?php if(get_field($available_chapter)): ?>
                    <article id="<?php echo $available_chapter ?>" class="article-chapter"><?php the_field($available_chapter);?></article>
                  <? endif ?>
                <?php endforeach ?>
                <div id="bookmark_popup">
                  <div class="arrow"></div>
                  <img class="img-icon-small" src="<?php echo get_template_directory_uri() . '/img/icon-bookmark-white.svg' ?>"/>
                  <button id="bookmark_create"></button>
                  <button id="bookmark_cancel"></button>
                </div>
              </div>
            </main>

          </div>

        <script src="<?php echo get_template_directory_uri() . '/js/reader.js' ?>"></script>

        <?php else: ?>

          <section class="section-first">
            <div class="max-width-wrapper">
              <?php wc_get_template_part( 'content', 'single-product' ); ?>
            </div>
          </section>

        <?php endif ?>

      <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php get_footer();
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */