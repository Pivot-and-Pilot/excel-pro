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

        <div class="max-width-wrapper">
          
          <div class="book-content__logo">
            <img src="<?php the_field('logo') ?>" alt="">
          </div>

          <div class="book-content__header">Chapter Contents</div>

          <div class="book-content__chapter-contents-wrap">
            <?php
            // check if the repeater field has rows of data
            if( have_rows('chapter') ):
              // loop through the rows of data
              while ( have_rows('chapter') ) : the_row();
            ?>
                <!-- display a sub field value -->
                <div class="book-content__chapter-contents-item">
                  <h4 class="book-content__chapter-title"><?php the_sub_field('chapter_title'); ?></h4>
                  <div class="learning-objective">
                    <?php the_sub_field('chapter_sub_title'); ?>
                  </div>
                  <div class="book-content__chapter-content"><?php the_sub_field('chapter_content'); ?></div>
                </div>
            <?php
              endwhile;
            endif;
            ?>
          </div>

          <div class="book-content__table-of-contents-header">Table of Contents</div>

          <div class="book-content__table-of-contents-wrap">
            <?php
            if( have_rows('table_of_contents') ):
              while( have_rows('table_of_contents') ): the_row();
            ?>  
              <div class="book-content__table-of-contents-item">
                <div class="book-content__table-of-contents-title"><?php the_sub_field('table_of_contents_title') ?></div>
                <div class="book-content__table-of-contents-content"><?php the_sub_field('table_of_contents_content'); ?></div>          
              </div>
            <?php
              endwhile;
            endif;
            ?>
          </div>

        </div>
        
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
