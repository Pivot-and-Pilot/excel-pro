<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package excelpro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      
			<section class="section-first">
        <h1 class="book-content__header max-width-wrapper">Book Contens</h1>
        <div class="book-content__all-chapter-wrap max-width-wrapper">
          <?php
            // check if the repeater field has rows of data
          if( have_rows('chapter') ):
            // loop through the rows of data
            while ( have_rows('chapter') ) : the_row();
          ?>

            <div class="book-content__single-chapter-wrap">
              <h4 class="book-content__single-chapter__title"><?php the_sub_field('chapter_title'); ?></h4>

            <?php
            if( have_rows('chapter_section') ):
              // loop through the rows of data
              while ( have_rows('chapter_section') ) : the_row();
            ?>
              <h5 class="book-content__single-chapter__section-title"><?php the_sub_field('chapter_section_title'); ?></h5>
          
              <h5 class="book-content__single-chapter__section-subtitle"><?php the_sub_field('chapter_section_subtitle'); ?></h5>

            <?php
              endwhile;
            endif;
            ?>
            </div>

          <?php
            endwhile;
          endif;
          ?>
        </div>  
      
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
