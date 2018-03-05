<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package excelpro
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="max-width-wrapper">

			<div class="footer-half">
				<p class="p-title">Let's Get Social!</p>
				<nav class="nav-social">
					<a target="_blank" href=""><svg class="svg-social" id="svg-instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 154.08 146.47"><defs><clipPath id="clip-path"><rect class="cls-1" width="154.08" height="146.47"/></clipPath></defs><g class="cls-2"><path class="cls-3" d="M123.69,36.48a9.54,9.54,0,0,1-9.77-9.29,9.78,9.78,0,0,1,19.54,0,9.54,9.54,0,0,1-9.78,9.29M77,112.06c-22.56,0-40.85-17.39-40.85-38.83S54.48,34.4,77,34.4s40.85,17.39,40.85,38.83S99.6,112.06,77,112.06M0,146.47H154.08V0H0Z"/></g></svg></a>
					<a target="_blank" href=""><svg class="svg-social" id="svg-twitter" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 73.7 59.9" style="enable-background:new 0 0 73.7 59.9;" xml:space="preserve"><path d="M73.7,2.6l-13.5,2c-1.7-1.7-3.8-3.1-6.3-3.9C45.8-1.9,37,2.6,34.4,10.8C32.7,16,34,21.5,37.3,25.5 c-6.9-2.9-11.7-9.6-12.2-17.3c-7.2,2.9-12.4,9.9-12.6,18.1c-0.2,8.8,5.3,16.5,13.2,19.4C16.9,49.3,6.8,47.3,0,41.1 c9.1,17.1,30.3,23.7,47.5,14.8c15.2-7.8,22.4-25.1,18-41L73.7,2.6z"/></svg></a>
					<a target="_blank" href="https://www.facebook.com/ExcelProSeries/"><svg class="svg-social" id="svg-facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.61 100.2"><path d="M35.65,21a7.25,7.25,0,0,0-2.27,5.74v4.68h16V47.19h-16v53H9.75v-53H0V31.43H9.75V24.75q0-11.49,7.68-18.09T37.12.05A44.46,44.46,0,0,1,52.61,2.86l-3.07,18a27.14,27.14,0,0,0-8-1.87A8.54,8.54,0,0,0,35.65,21Z"/></svg></a>
					<a target="_blank" href="https://www.linkedin.com/in/andr%C3%A9s-varhola-a5b70a45/"><svg class="svg-social" id="svg-linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116.87 105.72"><path d="M21.87,3.77a12.39,12.39,0,0,1,3.54,9.15A12.45,12.45,0,0,1,21.87,22a12.1,12.1,0,0,1-9,3.6,12.08,12.08,0,0,1-9-3.6A12.44,12.44,0,0,1,.31,12.92,12.38,12.38,0,0,1,3.85,3.77a12.21,12.21,0,0,1,9-3.54A12.23,12.23,0,0,1,21.87,3.77ZM1.24,33.48H24.88v72.24H1.24Z"/><path d="M109.73,40q7.14,7.48,7.14,20.16v45.53H93.24V67q0-6.14-3.34-9.68A11.72,11.72,0,0,0,81,53.78a13.71,13.71,0,0,0-9.68,3.87,15.76,15.76,0,0,0-4.47,9.88v38.19H43V33.48H66.8V45.24a25.65,25.65,0,0,1,9.95-9.48,29.47,29.47,0,0,1,14-3.2Q102.58,32.55,109.73,40Z"/></svg></a>
				</nav>
			</div><div class="footer-half">
				<p class="p-title">Questions or Concerns?</p>
				<a href="mailto:info@excelpro.com"><h3>info@excelpro.com</h3></a>
			</div>

			<div class="footer-half">
				<article>
					<p>Found a mistake in our book?<br>Tell us more in our <a href=""><i>errata</i></a>.</p>
					<br>
				</article>
			</div><div class="footer-half">
				<article>
					<p>All publications, logos and contents of this website are independent and not affiliated with, nor have been authorized, sponsored, or otherwise approved by Microsoft Corporation</p>
				</article>
			</div>

			<div class="site-info">
				<img src="<?php echo get_template_directory_uri() . '/img/logo_small.png' ?>"/>
				<p>2017 &copy; Varhola Productions.<br> Web Design &amp; Code by <a href="https://pivotandpilot.com" target="_blank">Pivot &amp; Pilot</a>. Original photography by <a href="http://www.fotoarkitekt.com">Gonzalo Villota</a></p>
				
			</div><!-- .site-info -->
		</path>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
