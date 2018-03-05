<?php
/**
 * Testimonials Template
 *
 * @package excelpro
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php while(have_posts()): the_post(); ?>

      <div class="l-landing theme-gradient">
        <div class="l-container">
          <header class="m-header">
              <article>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
              </article>
          </header>
          <div class="slider-testimonial">
            <?php foreach(range(1,6) as $count): ?>
              <?php if(get_field('testimonial_' . $count)): ?>
                <article class="article-testimonial">
                  <?php the_field('testimonial_' . $count); ?>
                </article>
              <?php endif ?>
            <?php endforeach ?>
          </div>
          <div class="controller">
          </div>
        </div>
      </div>



    <?php endwhile ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
