<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @package Foxwater
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/img/favicon-16.png" rel="icon" size="16x16">
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/img/favicon-32.png" rel="icon" size="32x32">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="site-header" class="header">
		<div class="menu-wrapper" id="main-menu-wrapper">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-8">
						<?php
							$menu_args = array(
								'theme_location' => 'header',
								'container' => 'nav',
								'container_class' => 'header-nav',
								'menu_class' => 'header-nav-links clearfix'
							);
							wp_nav_menu( $menu_args );
						?>
					</div>
					
					<div class="col-lg-2">
						<nav class="social-nav">
							<ul class="social-nav-links clearfix">
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
					
					<div class="col-lg-2">
						<div class="search-home">
							<?php get_search_form(); ?>
						</div>
					</div>
					
				</div><!-- /.row -->
			</div>
		</div>
		<div class="mobile-btn-box">
			<button id="js-mobile-btn" class="nav-btn">
				MENU
			</button>
		</div>
		<div class="logo-wrapper">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/foxwater-logo-header.png" alt="Foxwater">
		</div>
	</header>
