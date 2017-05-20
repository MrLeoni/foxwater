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
 * @package Foxwater
 */

get_header(); ?>
	
	<article id="primary" class="content-area home">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<main id="main" class="site-main" role="main">
						
						<?php	if ( have_posts() ) :
				
							/* Start the Loop */
							while ( have_posts() ) : the_post();
							
								the_content();
				
							endwhile; ?>
						
					</main>
				</div>
				
				<div class="col-md-4">
					<?php get_sidebar('home'); ?>
				</div>
				
			</div>
		</div>
		
	</article><!-- #primary -->

<?php
get_footer();
