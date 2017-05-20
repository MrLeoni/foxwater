<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Foxwater
 */

?>

	<footer id="footer" class="site-footer">
		<div class="logo-wrapper">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/foxwater-logo-footer.png" alt="Foxwater">
		</div>
		
		<div class="footer-menu-wrapper">
			<?php
				$menu_args = array(
					'theme_location' => 'footer',
					'container' => 'nav',
					'container_class' => 'footer-nav',
					'menu_class' => 'footer-nav-links clearfix'
				);
				wp_nav_menu( $menu_args );
			?>
		</div>
		
		<div class="footer-social-wrapper">
			<nav class="footer-social-nav">
				<ul class="footer-social-nav-links clearfix">
					<li>
						<a href="https://www.facebook.com/foxwaterservicos" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#" title="Instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="https://www.linkedin.com/company-beta/1391456/" title="LinkedIn" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="copyright">
			<p><span id="js-date"></span> FOXWATER - Todos os direitos reservados</p>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
