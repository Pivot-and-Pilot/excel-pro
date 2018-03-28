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

if ( !is_user_logged_in() ) {wp_redirect(site_url('my-account'));exit;}

get_header(); ?>

  <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <section class="section-header">

                <div class="max-width-wrapper">

                    <article class="article-header">

                        <h3>Working Files</h3>

                        <p>Navigate through the chapters using the tabs below and download the working spreadsheets!</p>

                        <a href="<?php the_field('download_all_zip'); ?>" download><button class="button-green button-max-width" data-text="Download All Files"><span>Download All Files</span></button></a>

                        <p>Feeling stuck? Download the answer keys here</p>

                        <a href="<?php the_field('download_all_zip'); ?>" download><button class="button-green button-max-width" data-text="Download Answer Keys"><span>Download Answer Keys</span></button></a>

                    </article>

                </div>

            </section>

            <ul class="ul-worksheets">

            <?php foreach(AVAILABLE_CHAPTERS as $index=>$chapterPrefix): ?>

            <?php if(get_field($chapterPrefix . '_download_1')): ?>
                <li class="chapter-entry">

                    <p class="p-title"><?php echo AVAILABLE_CHAPTERS_NAMES[$index]; ?></p>

                    <div class="chapter-accordion">

                        <h2><?php echo get_field($chapterPrefix . "_title", EXCELPRO_PRODUCT_ID); ?></h2>

                        <div class="chapter-links">

                        <?php foreach(range(1, 10) as $downloadPostfix):?>

                        <?php if(get_field($chapterPrefix . "_download_" . $downloadPostfix)): ?>

                            <?php 
                                $linkURI = get_field($chapterPrefix . "_download_" . $downloadPostfix);
                                $explodedURI = explode('/', $linkURI);
                            ?>

                            <a class="a-download" href="<?php echo $linkURI; ?>" download><?php echo end($explodedURI); ?></a>

                        <?php endif ?>

                        <?php endforeach ?>

                        </div>

                    </div>

                </li>

            <?php endif ?>

          <?php endforeach ?>

      </ul>


    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();
