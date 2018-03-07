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

$digitalExcel = wc_get_product(25);

get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <section class="section-first section-gradient-alternate">

        <div class="max-width-wrapper">

          <article class="article-header">

            <h3>Get Excelling in Life today!</h3>

            <h2>Let Excel&reg; manage the repetitive &amp; tedious tasks of everyday life.</h2>

          </article>

          <article class="article-digital article-digital-alternate">

            <h2>A One of a Kind Learning Experience</h2>

            <p>Our interactive e-textbook has been created to ensure that learning Excel&reg; is as easy and seamless as possible.</p>

            <picture class="picture-laptop picture-laptop-alternate">

              <figure class="figure-price">$<?php echo $digitalExcel->get_price(); ?><span class="currency">USD</span></figure>

              <div id="video_player">

                <div id="screen">
                  
                  <?php $shopPage = get_page_by_title('shop'); ?>
                  <video id="video-1" src="<?php echo get_field('video_id_1', $shopPage); ?>" loop autoplay></video>
                  <video id="video-2" src="<?php echo get_field('video_id_2', $shopPage); ?>" loop></video>
                  <video id="video-3" src="<?php echo get_field('video_id_3', $shopPage); ?>" loop></video>

                </div>

              </div>

            </picture>

            <p>Use the buttons below to check out some of our e-reader's functionalities:</p>

          </article>

          <!-- <script src="https://player.vimeo.com/api/player.js"></script> -->

          <ul class="ul-functions">

            <li class="play_video" data-iframe-ref="video_one">

              <img class="img-icon" src="<?php echo get_template_directory_uri() . '/img/icon-scalable-text.svg' ?>"/>
              
              <button class="button-black" data-text="Scalable Text"><span>Scalable Text</span></button>

            </li>

            <li class="play_video" data-iframe-ref="video_two">

              <img class="img-icon" src="<?php echo get_template_directory_uri() . '/img/icon-bookmark.svg' ?>"/>
              
              <button class="button-black" data-text="Quick Bookmarks"><span>Quick Bookmarks</span></button>

            </li>

            <li class="play_video" data-iframe-ref="video_three">

              <img class="img-icon" src="<?php echo get_template_directory_uri() . '/img/icon-optimization.svg' ?>"/>
              
              <button class="button-black" data-text="Optimized For Any Device"><span>Optimized For Any Device</span></button>

            </li>

          </ul>

          <a href="<?php echo $digitalExcel->add_to_cart_url(); ?>"><button class="button-orange button-add-to-cart" data-text="Buy The E-Textbook For Only $<?php echo $digitalExcel->get_price(); ?>"><span>Buy The E-Textbook For Only $<?php echo $digitalExcel->get_price(); ?></span></button></a>

          <article class="article-physical article-physical-alternate">

            <picture class="picture-book">

              <figure class="figure-price figure-price-shipping">Coming soon<span class="currency"></span></figure>

              <img src="<?php echo get_template_directory_uri() . '/img/book-cover.jpg' ?>"/>

            </picture>

            <!-- this is the amazon part, uncomment to show -->
            <!-- <div class="align-right">

              <h2><b>Print isn't dead!</b><br>Buy our printed book on</h2>

              <a><svg id="svg-amazon" class="svg-vendor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.06 44.11"><path d="M25.68,25.52h3.77c1,0,1.26-.23,1.26-1.27,0-4.18,0-8.36,0-12.54A11.45,11.45,0,0,1,31.14,8,2.64,2.64,0,0,1,34,6a2.48,2.48,0,0,1,2.37,2.32,16.39,16.39,0,0,1,.19,3.28q0,6.42,0,12.84c0,.77.29,1.06,1.05,1.07h3.83c1,0,1.2-.25,1.21-1.21q0-5.54,0-11.07a33.87,33.87,0,0,1,.1-3.82,4.29,4.29,0,0,1,.67-2.1,3,3,0,0,1,3.35-1.12,2.45,2.45,0,0,1,1.67,2.55c0,.65,0,1.29,0,1.94q0,6.83,0,13.66c0,.88.29,1.17,1.14,1.17H53.4c.95,0,1.21-.26,1.21-1.22q0-5.27,0-10.54c0-2.37,0-4.75,0-7.12A6.35,6.35,0,0,0,53,2.16,6.58,6.58,0,0,0,42.53,3.73c-.12.24-.15.52-.41.72C41,1.9,39.34.26,36.45.25s-4.86,1.49-6,4.18c0-.88,0-1.77,0-2.65s-.29-1-1-1q-1.86,0-3.72,0c-.82,0-1.08.27-1.08,1.1q0,11.31,0,22.61c0,.77.28,1.06,1.05,1.06"/><path d="M71.62,13.87c0,.45,0,.9,0,1.35a7.33,7.33,0,0,1-1,4.27A3.85,3.85,0,0,1,68.85,21a2.65,2.65,0,0,1-3.78-2.14c-.48-2.87,1.06-4.83,4.14-5.28a19.81,19.81,0,0,1,2-.16c.31,0,.41.09.39.4m-.4-4c-1.71.23-3.43.34-5.12.69a13.27,13.27,0,0,0-3.25,1,7.94,7.94,0,0,0-4.23,8.84,6,6,0,0,0,4.55,5.14,9.79,9.79,0,0,0,4.55,0,8.72,8.72,0,0,0,4.45-2.72c.25-.26.37-.3.58,0a9.51,9.51,0,0,0,2,2.36c.62.52,1,.54,1.57,0l2.77-2.43c.9-.78,1-1,.22-1.93a6.56,6.56,0,0,1-1.44-4.47c.05-1.43,0-2.87,0-4.3h0c0-1.71,0-3.42,0-5.12A6.28,6.28,0,0,0,73.54.82a12.9,12.9,0,0,0-9.79.31,7.4,7.4,0,0,0-4.42,5.4c-.23,1,0,1.28.91,1.4,1.21.15,2.42.28,3.63.4.69.07.91-.11,1.12-.81a3.37,3.37,0,0,1,3.2-2.68,2.83,2.83,0,0,1,3.32,2.31,13.81,13.81,0,0,1,.1,2.47c0,.33-.22.25-.4.27"/><path d="M13.22,13.91c0,.47,0,.94,0,1.41a7.92,7.92,0,0,1-.79,3.81,4.24,4.24,0,0,1-1.66,1.76A2.69,2.69,0,0,1,6.63,18.7c-.31-2.84,1.14-4.62,4.15-5.07a19.49,19.49,0,0,1,2-.16c.33,0,.44.1.42.43m7.49,6.77a6.16,6.16,0,0,1-1.26-3.94c0-1.57,0-3.14,0-4.71h0c0-1.73,0-3.45,0-5.18A6.25,6.25,0,0,0,15,.78,13,13,0,0,0,6,.86,7.56,7.56,0,0,0,.89,6.64c-.19.85,0,1.16.88,1.27,1.23.15,2.46.29,3.69.41.68.07.93-.13,1.13-.81A3.37,3.37,0,0,1,9.83,4.82a2.84,2.84,0,0,1,3.33,2.83c.05.58,0,1.18.06,1.76,0,.37-.12.44-.45.48-1.71.2-3.43.33-5.12.67A11.58,11.58,0,0,0,3.6,12.07,8,8,0,0,0,.19,20.3a6,6,0,0,0,4.55,5.27,9.79,9.79,0,0,0,4.6,0A8.32,8.32,0,0,0,13.65,23c.41-.43.56-.3.8.11a9.09,9.09,0,0,0,1.85,2.18c.64.55,1,.57,1.62,0,.84-.73,1.66-1.47,2.5-2.19,1.24-1.07,1.26-1.09.29-2.4"/><path d="M144.06,9.63a30.3,30.3,0,0,0-.22-3.7c-.42-3.39-2.41-5.4-5.7-5.65a5.58,5.58,0,0,0-5.67,2.9c-.31.54-.57,1.11-.85,1.67h-.09q0-1.52,0-3c0-.79-.24-1.05-1-1.06q-1.83,0-3.66,0c-.81,0-1.09.29-1.09,1.1q0,11.25,0,22.5c0,.88.29,1.17,1.14,1.17h3.6c1.17,0,1.38-.21,1.38-1.4q0-6.33,0-12.66a8.35,8.35,0,0,1,.82-3.87A2.81,2.81,0,0,1,135.61,6c1.08.14,1.77.87,2.09,2.21a7.18,7.18,0,0,1,.21,1.69q0,7.21,0,14.43c0,.93.26,1.2,1.16,1.2h3.83c.86,0,1.14-.28,1.14-1.17q0-7.36,0-14.73"/><path d="M115.38,18.22a5.33,5.33,0,0,1-.77,1.76,2.71,2.71,0,0,1-4.68-.18,9.34,9.34,0,0,1-1-3.94c-.08-.88-.1-1.76-.12-2.27a22.16,22.16,0,0,1,.45-5.74,5.73,5.73,0,0,1,.51-1.3A2.8,2.8,0,0,1,112.69,5,2.64,2.64,0,0,1,115,6.88a14.85,14.85,0,0,1,.77,4.85,22.84,22.84,0,0,1-.44,6.49m-10.78-14A14.46,14.46,0,0,0,102.31,11a17.57,17.57,0,0,0,1.56,9.73,9.24,9.24,0,0,0,15.7,1.68,14.28,14.28,0,0,0,2.85-9,17.07,17.07,0,0,0-2.06-8.53,9.38,9.38,0,0,0-15.77-.65"/><path d="M88.63,32.32a3.2,3.2,0,0,0-.72.23,73.91,73.91,0,0,1-25.37,5.78,74.15,74.15,0,0,1-23.2-2.62,73.25,73.25,0,0,1-17.53-7.3,2.56,2.56,0,0,0-.63-.29.62.62,0,0,0-.76.28.69.69,0,0,0,.1.82,3.53,3.53,0,0,0,.38.37,54.45,54.45,0,0,0,9,6.64A55.9,55.9,0,0,0,58.33,44a54.74,54.74,0,0,0,12.31-1.41,50.69,50.69,0,0,0,17.14-7.05,12.53,12.53,0,0,0,1.83-1.34,1,1,0,0,0,.29-1.27,1.13,1.13,0,0,0-1.27-.61"/><path d="M97.93,18.58a17.32,17.32,0,0,0-7-1.17l2.27-3.29Q96,10,98.87,5.92a3,3,0,0,0,.74-1.69c0-.86,0-1.73,0-2.59,0-.67-.29-1-1-1H84.24c-.63,0-.92.31-.93.94,0,1,0,1.92,0,2.89s.22,1.14,1.13,1.14h6.85c.14,0,.31-.09.43.11l-.42.63L83.2,18.15a3.49,3.49,0,0,0-.7,2c0,1.3,0,2.59,0,3.89,0,.77.53,1.07,1.21.74a16.54,16.54,0,0,1,15,0c.81.38,1.31.06,1.31-.86,0-.71,0-1.41,0-2.12,0-2,.19-2.15-2.12-3.14"/><path d="M95.65,27.16a13.53,13.53,0,0,0-4.4-.59,15.46,15.46,0,0,0-3.07.27,12.59,12.59,0,0,0-5.3,2.09c-.27.2-.54.46-.42.82s.5.3.8.27c1.65-.18,3.31-.35,5-.43a11.42,11.42,0,0,1,3.8.3,1.33,1.33,0,0,1,1.12,1.44A6.14,6.14,0,0,1,93,32.89a37.77,37.77,0,0,1-2,6.2c-.12.33-.27.65-.38,1a.57.57,0,0,0,.08.66.53.53,0,0,0,.7,0,5.33,5.33,0,0,0,.76-.62,13.87,13.87,0,0,0,3.13-4.83,15.79,15.79,0,0,0,1.35-6.74,1.37,1.37,0,0,0-1.05-1.36"/></svg></a>

              <h2>Download For:</h2>

              <nav class="nav-ebooks">

                <a><svg id="svg-ibooks" class="svg-vendor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 173.09 60.18"><path d="M15.71.18h2.88a6.73,6.73,0,0,0,.67.12,19.2,19.2,0,0,1,9.56,3.3,11.88,11.88,0,0,1,5.24,7,26.73,26.73,0,0,1,.63,6c.06,14.28,0,28.56,0,42.85,0,.19,0,.38-.07.78-.14-.3-.21-.41-.24-.52A16,16,0,0,0,27,50.54a19.94,19.94,0,0,0-14.4-2.1,25.19,25.19,0,0,0-9.9,4.41c-.61.44-1.28.94-2.06.55S0,52.21,0,51.52q0-7.15,0-14.31,0-13.52,0-27A6,6,0,0,1,2.48,5.11,23.76,23.76,0,0,1,12.23.74C13.38.5,14.55.37,15.71.18"/><path d="M51.86.18h3.56a2.39,2.39,0,0,0,.45.13A23.44,23.44,0,0,1,66.85,4a14.81,14.81,0,0,1,2.92,2.52c1.1,1.23,1.09,2.85,1.09,4.41q0,20.32,0,40.65a4.36,4.36,0,0,1-.07.81c-.18,1-.71,1.3-1.62.93a9.06,9.06,0,0,1-1.58-.94c-5.72-3.85-11.94-5.49-18.73-3.87a16.43,16.43,0,0,0-12.39,11c-.05.14-.13.28-.19.42l-.15,0V59.3q0-20.36,0-40.72c0-2,.14-3.92.25-5.87a10.86,10.86,0,0,1,3-6.79A17.1,17.1,0,0,1,48.72.73c1-.22,2.09-.37,3.13-.55"/><path class="cls-1" d="M171.78,27.23l.75-1.48a8.24,8.24,0,0,0-2.18-1,9.14,9.14,0,0,0-2.52-.35,6.48,6.48,0,0,0-3.73,1,3.41,3.41,0,0,0-1.49,3,3.33,3.33,0,0,0,.67,2.16,4.4,4.4,0,0,0,1.62,1.26,20.46,20.46,0,0,0,2.49.9q1.3.41,2,.71a3.42,3.42,0,0,1,1.23.84,2,2,0,0,1,.49,1.38,2.08,2.08,0,0,1-1,1.86,4.49,4.49,0,0,1-2.51.64A7.54,7.54,0,0,1,165,37.7a7.38,7.38,0,0,1-2.33-1.42l-.78,1.39a7,7,0,0,0,2.58,1.57,9.39,9.39,0,0,0,3.19.55,6.7,6.7,0,0,0,3.91-1.09,3.59,3.59,0,0,0,1.57-3.15,3.45,3.45,0,0,0-.7-2.25A4.62,4.62,0,0,0,170.71,32a20.12,20.12,0,0,0-2.55-.91,18.79,18.79,0,0,1-2-.68,3.61,3.61,0,0,1-1.19-.8,1.76,1.76,0,0,1-.48-1.28,1.88,1.88,0,0,1,.88-1.7,4.28,4.28,0,0,1,2.34-.57,7.73,7.73,0,0,1,2.12.3,7.38,7.38,0,0,1,1.94.86m-10.9,12.5-6.38-9.31,5.71-5.89h-2.32l-8.18,8.29V18.22h-1.94V39.73h1.94V35.33l3.42-3.51,5.39,7.92Zm-25-13.57a5.8,5.8,0,0,1,3,.75,5.22,5.22,0,0,1,2,2.12,7.07,7.07,0,0,1,0,6.24,5.22,5.22,0,0,1-2,2.12,6.18,6.18,0,0,1-5.92,0,5.22,5.22,0,0,1-2-2.12,7.06,7.06,0,0,1,0-6.24,5.22,5.22,0,0,1,2-2.12,5.8,5.8,0,0,1,3-.75m0-1.68a8,8,0,0,0-3.94,1,7,7,0,0,0-2.73,2.71,7.86,7.86,0,0,0-1,3.94,8,8,0,0,0,1,4,7,7,0,0,0,2.73,2.73,8.49,8.49,0,0,0,7.89,0,7,7,0,0,0,2.73-2.73,8,8,0,0,0,1-4,7.86,7.86,0,0,0-1-3.94,7,7,0,0,0-2.73-2.71,8,8,0,0,0-3.94-1M118,26.16a5.8,5.8,0,0,1,3,.75A5.22,5.22,0,0,1,123,29a7.07,7.07,0,0,1,0,6.24,5.22,5.22,0,0,1-2,2.12,6.18,6.18,0,0,1-5.92,0,5.22,5.22,0,0,1-2-2.12A7.07,7.07,0,0,1,113,29a5.22,5.22,0,0,1,2-2.12,5.8,5.8,0,0,1,3-.75m0-1.68a8,8,0,0,0-3.94,1,7,7,0,0,0-2.73,2.71,7.86,7.86,0,0,0-1,3.94,8,8,0,0,0,1,4A7,7,0,0,0,114,38.82a8.49,8.49,0,0,0,7.89,0,7,7,0,0,0,2.73-2.73,8,8,0,0,0,1-4,7.86,7.86,0,0,0-1-3.94,7,7,0,0,0-2.73-2.71,8,8,0,0,0-3.94-1M99.8,37.94H93.39V30.16H99.8a6.94,6.94,0,0,1,4,1A3.27,3.27,0,0,1,105.29,34a3.35,3.35,0,0,1-1.44,2.89,6.85,6.85,0,0,1-4,1m0-9.54H93.39V21.26H99.8a5.19,5.19,0,0,1,3.33.9,3.12,3.12,0,0,1,1.19,2.61,3.22,3.22,0,0,1-1.19,2.68,5.24,5.24,0,0,1-3.33.94m.09-9h-8.5v20.3H100a8.85,8.85,0,0,0,5.39-1.45,4.78,4.78,0,0,0,1.94-4.06,4.92,4.92,0,0,0-1.25-3.45,5.48,5.48,0,0,0-3.48-1.65,4.74,4.74,0,0,0,2.8-1.59,4.59,4.59,0,0,0,1-3,4.47,4.47,0,0,0-1.72-3.73,7.57,7.57,0,0,0-4.77-1.35M84.43,18.8a1.34,1.34,0,0,0-1.36,1.36,1.37,1.37,0,0,0,.39,1,1.29,1.29,0,0,0,1,.41,1.26,1.26,0,0,0,.94-.41,1.37,1.37,0,0,0,.39-1,1.35,1.35,0,0,0-.38-1,1.27,1.27,0,0,0-1-.39m-1,20.94h1.94V24.54H83.45Z"/></svg></a>

                <a><svg id="svg-kobo" class="svg-vendor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125.5 67.5"><path d="M101.75,51.21c-3.33,0-6.66-.08-10,.07-1.54.07-3.08,0-4.63.09-1.21.09-2.43.09-3.65.13h-.15c-.92.2-1.87.19-2.8.34a24.45,24.45,0,0,0-4.69,1.21,19.79,19.79,0,0,0-3.06,1.46,11.21,11.21,0,0,0-4.68,5c-.17.36-.29.75-.44,1.12s-.21.34-.55.36-.4-.28-.46-.51a8.43,8.43,0,0,0-2.16-3.55,14.55,14.55,0,0,0-2.91-2.23,18.65,18.65,0,0,0-5.43-2.18A39.77,39.77,0,0,0,51,51.64c-1.11-.12-2.23-.15-3.34-.23-1.62-.12-3.25-.08-4.87-.09-5.06-.06-10.12,0-15.17,0H12.45a1.39,1.39,0,0,0-.74.17c-2,1.14-4,2.26-6,3.39L1.06,57.47.09,58c-.06,0-.11.08-.09.15a.18.18,0,0,0,.14.11l.19,0c.89.09,1.77.22,2.66.27,1.56.08,3.11.22,4.67.21,5.33,0,10.66.06,16-.09,2.78-.08,5.56,0,8.34-.09,2.45-.09,4.9,0,7.36-.1,2-.09,4.09,0,6.14-.09,1.75-.07,3.51,0,5.27,0a29.93,29.93,0,0,1,3.79.23,23.54,23.54,0,0,1,4.75,1,9.27,9.27,0,0,1,5.63,4.73,12.89,12.89,0,0,1,1,2.67c.11.45.11.45.59.45h1.37c.39,0,.42,0,.5-.37a12.15,12.15,0,0,1,1.19-2.94,10,10,0,0,1,2.56-3,10.91,10.91,0,0,1,4.24-2,27.22,27.22,0,0,1,5.2-.66c1.3-.06,2.59-.13,3.9-.11.39,0,.77.08,1.16.08,4,0,8.09-.07,12.14.09,1,0,2,0,3.07,0,.47,0,.5,0,.5-.5q0-3.16,0-6.32c0-.48-.08-.57-.56-.57"/><path d="M17,40.23h5.66c.42,0,.44,0,.45-.43,0-.07,0-.13,0-.19V27.05a2.35,2.35,0,0,1,0-.38c0-.12.11-.17.21-.08a1.68,1.68,0,0,1,.24.3l1,1.42q4.07,5.77,8.14,11.54a.83.83,0,0,0,.77.39c1.17,0,2.34,0,3.51,0H40.4c.17,0,.36.05.48-.14-.22-.3-.44-.58-.64-.86L32.66,28.65,30,24.92c-.29-.4-.28-.4,0-.77l1.77-2.05,8-9.23a.4.4,0,0,0,.13-.27.53.53,0,0,0-.4-.08h-7a.78.78,0,0,0-.67.3c-.77.93-1.57,1.84-2.36,2.76l-5.79,6.77c-.13.15-.24.45-.45.38s-.12-.4-.12-.6q0-10.76,0-21.52c0-.51,0-.53-.5-.53H17.08c-.49,0-.51,0-.51.52V39.72c0,.5,0,.5.47.5"/><path class="cls-1" d="M112.75,30.88a8.93,8.93,0,0,1-1,3.15,4.5,4.5,0,0,1-4.6,2.24,4.41,4.41,0,0,1-3.84-2.85,8,8,0,0,1-.47-1.42,18.42,18.42,0,0,1-.43-2.9c-.09-1.24-.11-2.47-.09-3.71a19.35,19.35,0,0,1,.6-5,5.82,5.82,0,0,1,1.71-2.92,4.35,4.35,0,0,1,2.43-1,5.39,5.39,0,0,1,2.26.2,4.23,4.23,0,0,1,2.48,2.12,9.46,9.46,0,0,1,1,3.16,28.94,28.94,0,0,1,.27,4.67,24.77,24.77,0,0,1-.29,4.21M120,27.56a23,23,0,0,0-.13-3.89,17.17,17.17,0,0,0-1.3-5.16,11,11,0,0,0-3.1-4.15A11.15,11.15,0,0,0,109.44,12a14.81,14.81,0,0,0-6,.51A10.49,10.49,0,0,0,99,15.07a11.54,11.54,0,0,0-2.8,4.69,19.67,19.67,0,0,0-.92,6.47c0,.45,0,1.11,0,1.77s.11,1.31.2,2a14.65,14.65,0,0,0,2.05,5.92,10.11,10.11,0,0,0,4.23,3.8,12.48,12.48,0,0,0,4.89,1.19,14.3,14.3,0,0,0,6.12-.9,10.11,10.11,0,0,0,3.66-2.5A12.18,12.18,0,0,0,119,33.1a20.5,20.5,0,0,0,1-5.53"/><path class="cls-1" d="M47.29,25.21a18.41,18.41,0,0,1,.67-5,5.75,5.75,0,0,1,1.35-2.43A4.25,4.25,0,0,1,52,16.52a5.53,5.53,0,0,1,2.35.23A4.45,4.45,0,0,1,57,19.35a12.7,12.7,0,0,1,.89,4,26.8,26.8,0,0,1,.1,2.88,25,25,0,0,1-.4,5.24,7.87,7.87,0,0,1-1.11,2.86,4.27,4.27,0,0,1-3.57,1.94,4.75,4.75,0,0,1-3.05-.79,4.82,4.82,0,0,1-1.59-2,12,12,0,0,1-.85-3.5,32.13,32.13,0,0,1-.16-4.76m-5,10.2a10.38,10.38,0,0,0,3.61,3.78,12.21,12.21,0,0,0,6,1.7,14.65,14.65,0,0,0,4.63-.49,10.61,10.61,0,0,0,3.54-1.68,11.81,11.81,0,0,0,4.33-6.94,22.56,22.56,0,0,0,.58-6,23.23,23.23,0,0,0-.38-3.88,13.21,13.21,0,0,0-3-6.52,10.39,10.39,0,0,0-5.18-3.08,13.16,13.16,0,0,0-2.78-.43,14.66,14.66,0,0,0-5.89.8,10,10,0,0,0-3.83,2.5A12.27,12.27,0,0,0,41,20.58a23.55,23.55,0,0,0-.72,6.08,29.88,29.88,0,0,0,.31,3.62,15.16,15.16,0,0,0,1.72,5.14"/><path class="cls-1" d="M114,51.77c0-.54,0-.55-.53-.55h-6.38c-.5,0-.54,0-.54.5q0,3.18,0,6.36c0,.49,0,.52.52.52h6.43c.5,0,.5,0,.5-.52,0-1,0-2.09,0-3.13s0-2.12,0-3.18"/><path class="cls-1" d="M125.5,51.7c0-.41-.07-.47-.48-.48h-6.44c-.47,0-.51,0-.51.49q0,3.16,0,6.32c0,.49.06.55.57.55H125c.5,0,.53,0,.53-.52,0-1,0-2.09,0-3.14h0c0-1.08,0-2.15,0-3.23"/><path class="cls-1" d="M68.65,15.41v0c0,4.65,0,9.29,0,13.94,0-4.65,0-9.29,0-13.94m16,5.36A18,18,0,0,1,85,23.49c.05.9,0,1.8,0,2.7a21.3,21.3,0,0,1-.07,3.37,14.65,14.65,0,0,1-.78,3.62,6.14,6.14,0,0,1-1,1.79,3.79,3.79,0,0,1-3.44,1.31,4.48,4.48,0,0,1-1.95-.55,4.38,4.38,0,0,1-1.88-2.5,15.32,15.32,0,0,1-.68-3.83c-.07-1-.1-2-.1-2.93A22.11,22.11,0,0,1,75.71,21a9.25,9.25,0,0,1,1.6-3.48,3.84,3.84,0,0,1,6.2.24,8.74,8.74,0,0,1,1.14,3m-16.14,9.4a19.13,19.13,0,0,0,.65,3.49,9.63,9.63,0,0,0,4.41,5.71,11.12,11.12,0,0,0,4.74,1.46,4.28,4.28,0,0,1,.53.06,8.26,8.26,0,0,0,2.47.05,13,13,0,0,0,2.9-.51,12,12,0,0,0,2-.8,9.66,9.66,0,0,0,3.85-3.79,12.93,12.93,0,0,0,1.13-2.54,20.07,20.07,0,0,0,.53-2.3,16.56,16.56,0,0,0,.33-2.57,36.17,36.17,0,0,0-.35-7.21,15.77,15.77,0,0,0-1.92-5.46,8.06,8.06,0,0,0-6.55-3.91,9.28,9.28,0,0,0-4.29.61,8.05,8.05,0,0,0-2.8,2,10.53,10.53,0,0,0-.76.94c0,.07-.09.14-.19.11s-.09-.12-.09-.2,0-.19,0-.29q0-1.93,0-3.86,0-5.28,0-10.57c0-.55,0-.56-.58-.56H69c-.57,0-.61,0-.61.61q0,7.19,0,14.38,0,6.73,0,13.46a14.91,14.91,0,0,0,.08,1.73"/></svg></a>

              </nav>

            </div> -->

          </article>

        </div>

      </section>

    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();
