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
      
			<section class="section-first book-content">
        <div class="book-content__logo">
          <img src="<?php the_field('logo') ?>" alt="">
        </div>
        <h4 class="book-content__header">Chapter contents for website</h4>
        
        <?php
        // check if the repeater field has rows of data
        if( have_rows('chapter') ):
          // loop through the rows of data
          while ( have_rows('chapter') ) : the_row();
        ?>
            <!-- display a sub field value -->
            <h4 class="book-content__chapter-title"><?php the_sub_field('chapter_title'); ?></h4>
            <div class="learning-objective"><p>Learning objectives:</p></div>
            <div class="book-content__chapter-content"><?php the_sub_field('chapter_content'); ?></div>
        <?php
          endwhile;
        endif;
        ?>

      
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
