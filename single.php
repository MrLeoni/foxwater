<?php
/**
 * The template for displaying all single posts
 *
 * @package Foxwater
 */

get_header(); ?>
	
	<article id="primary" class="content-area single">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<main id="main" class="site-main" role="main">
				
							<?php
							while ( have_posts() ) : the_post();
								
								// count and add post view
								wpb_set_post_views( get_the_ID() );
					
								get_template_part( 'template-parts/content', get_post_format() );
					
							endwhile; // End of the loop.
							?>
						
					</main>
				</div>
				
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
				
			</div>
		</div>
		
	</article><!-- #primary -->

<?php
get_footer();
