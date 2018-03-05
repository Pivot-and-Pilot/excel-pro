<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package excelpro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php while(have_posts()): the_post(); ?>  

    <section class="section-landing section-gradient">
      <div class="max-width-wrapper">
        <?php echo $post->post_content ?>
        <div id="slider-homepage" class="slider">
          <div class="slider-image"><img src="<?php the_field('landing_image_1'); ?>"/></div>
          <div class="slider-image"><img src="<?php the_field('landing_image_2'); ?>"/></div>
          <div class="slider-image"><img src="<?php the_field('landing_image_3'); ?>"/></div>
          <div class="slider-image"><img src="<?php the_field('landing_image_4'); ?>"/></div>
        </div>
        <figure>
          <?php the_field('landing_orange_box_text') ?>
        </figure>
        <hr/>
        <?php the_field('learn_more_text') ?>
      </div>
    </section>


    <?php get_template_part('template-parts/front-page', 'section-1'); ?>

    <?php get_template_part('template-parts/front-page', 'section-2'); ?>

    <?php get_template_part('template-parts/front-page', 'section-3'); ?>

    <?php get_template_part('template-parts/front-page', 'section-4'); ?>

    <?php get_template_part('template-parts/front-page', 'section-5'); ?>

    <?php get_template_part('template-parts/front-page', 'section-6'); ?>

    <?php get_template_part('template-parts/front-page', 'section-7'); ?>

    <?php endwhile ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
