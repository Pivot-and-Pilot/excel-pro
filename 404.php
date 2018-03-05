<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package excelpro
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<section class="section-header section-grey">

			  	<div class="max-width-wrapper">

			    	<article class="article-404">

			      		<h3>Whoops, that page was not found!</h3>

			      		<p>Perhaps you would like to head home?</p>

			      		<a href="<?php echo site_url(); ?>"><button class="button-green button-50" data-text="Go To Home"><span>Go To Home</span></button></a>

			    	</article>

			  	</div>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
