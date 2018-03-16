<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package excelpro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta name="google-site-verification" content="V5t4PDuM9OTFsSN98uVJyAZWCLYO-dR7UtCb00j_SVg" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="//cloud.typenetwork.com/projects/1613/fontface.css/" rel="stylesheet" type="text/css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="loader">
	<div class="loader-wrapper">
		<table id="loader-table">
			<tbody>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td class="bar-container"><figure class="figure-bar figure-bar-1"></figure></td><td></td><td class="bar-container"><figure class="figure-bar figure-bar-2"></figure></td><td></td><td class="bar-container"><figure class="figure-bar figure-bar-3"></figure></td><td></td><td class="bar-container"><figure class="figure-bar figure-bar-4"></figure></td><td></td><td class="bar-container"><figure class="figure-bar figure-bar-5"></figure></td><td></td></tr>
			</tbody>
		</table>
	</div>
	<script id="loader_script">document.getElementById("loader").className += " js-loaded";</script>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'excelpro' ); ?></a>

	<nav class="nav-shortcuts">
		<div class="max-width-wrapper">
			<?php if(is_user_logged_in()): ?>
				<?php $current_user = wp_get_current_user(); ?>
					<span class="login" href="<?php echo site_url('/my-account'); ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/nav-login.svg' ?>"/><?php echo $current_user->display_name; ?>
						<div class="user-menu">
							<a href="<?php echo site_url('/my-account'); ?>">My Books</a>
							<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
						</div>
					</span>
			<?php else: ?>	
				<a class="login" href="<?php echo site_url('/my-account'); ?>"><img src="<?php echo get_template_directory_uri() . '/img/nav-login.svg' ?>"/>Login</a>
			<?php endif; ?>
			<a class="errata" href="<?php echo site_url('/errata'); ?>"><img src="<?php echo get_template_directory_uri() . '/img/nav-errata.svg' ?>"/>Errata</a>
			<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><img src="<?php echo get_template_directory_uri() . '/img/nav-cart.svg' ?>"/>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</a>
		</div>
	</nav>

	<header id="masthead" class="site-header <?php if(!is_front_page() && !is_page('educator-packages') && !is_page('testimonials')){echo 'state-opaque';} ?><?php if(is_singular('chapters') || is_singular('product') || is_page('my-account') || is_page('working-files') || is_page('checkout') || is_page('cart') || is_404()){echo ' state-locked';} ?>">
		<div class="max-width-wrapper">
			<div class="site-branding">
				<div class="site-logo">
					<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>"/></a>
				</div>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle hamburger" aria-controls="primary-menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div id="primary-menu" class="menu">
					<ul aria-expanded="false" class=" nav-menu">
					<?php if(is_user_logged_in()): ?>
						<li><a href="<?php echo site_url('/working-files'); ?>">Download Working Files</a></li>
					<?php endif ?>
						<li><a href="<?php echo site_url('/contents'); ?>">Book Contents</a></li>
						<li><a href="<?php echo site_url('/educator-packages'); ?>">Educator Packages</a></li>
						<li><a id="button_buy" data-text="Get Excelling in Life Today" href="<?php echo site_url('/shop') ?>"><span>Get Excelling In Life Today</span></a></li>
					</ul>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
