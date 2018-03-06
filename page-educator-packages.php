<?php
/**
 * Educator Packages template 
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
                  <?php the_content(); ?>
                </article>
            </header>
          </div>

          <div id="m-timeline-container">

            <div class="m-timeline" id="timeline">
              <div class="l-container">
                  <article class="text-closer">
                    <img class="m-icon" src="<?php echo get_template_directory_uri() . '/img/educator-form.svg' ?>"/>
                    <?php the_field('icon_1_text'); ?>
                  </article>
                  <article class="text-closer">
                    <img class="m-icon" src="<?php echo get_template_directory_uri() . '/img/educator-verification.svg' ?>"/>
                    <?php the_field('icon_2_text'); ?>
                  </article>
                  <!-- <article class="text-closer">
                    <img class="m-icon" src="<?php echo get_template_directory_uri() . '/img/educator-credit.svg' ?>"/>
                    <?php the_field('icon_3_text'); ?>
                  </article> -->
                  <article class="text-closer">
                    <img class="m-icon" src="<?php echo get_template_directory_uri() . '/img/educator-ticket.svg' ?>"/>
                    <?php the_field('icon_4_text'); ?>
                  </article>
                  <article class="text-closer">
                    <img class="m-icon" src="<?php echo get_template_directory_uri() . '/img/educator-cart.svg' ?>"/>
                    <?php the_field('icon_5_text'); ?>
                  </article>
              </div>
            </div>

            <div class="l-container m-controller">
              <a><img class="m-icon s-hidden" id="timeline-left" src="<?php echo get_template_directory_uri() . '/img/arrow-right-final.svg'; ?>"/></a>
              <a><img class="m-icon" id="timeline-right" src="<?php echo get_template_directory_uri() . '/img/arrow-right-final.svg'; ?>"/></a>
            </div>

        </div>

        <div class="l-container">
          <a href="#educator-application-form">
            <article class="text-next">
              <p>Start Application</p>
            </article>
          </a>
        </div>

      </div>

      <p><i><b>I've read the instructions, take me to the form</b></i></p>
    </section> -->

    <section id="educator-application-form">
      <div class="max-width-wrapper">
        <article class="article-educator article-form">
          <h3>Educator Application Form</h3>
          <p>Fill out the form as best as you can. We will review your application, verify your status as an educator, and send you a confirmation email.</p>
          <?php echo do_shortcode('[contact-form-7 id="52" title="Contact form 1"]'); ?>
        </article>
      </div>
    </section>


    <?php endwhile ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
