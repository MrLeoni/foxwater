<?php
/**
 * The template for displaying search results pages
 *
 * @package Foxwater
 */

get_header(); ?>
	
	<article id="primary" class="content-area search">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<main id="main" class="site-main" role="main">
						
						<?php	if ( have_posts() ) : ?>
							
							<header class="page-header">
								<h1 class="page-title"><?php printf( esc_html__( 'Resultados para: %s', 'foxwater' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->
				
							<?php /* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
							
								<section id="post-<?php echo get_the_ID(); ?>" class="post">
								  <?php 
								  the_post_thumbnail('full'); 
								  the_title('<h2>', '</h2>');
								  echo '<p class="post-meta">' . get_the_date() . ' | Por ' . get_the_author() . '</p>'; ?>
								  <div class="post-excerpt clearfix">
								    <?php the_excerpt(); ?>
								  </div>
							    <footer class="post-footer clearfix">
							      <?php echo social_sharing_buttons(); ?>
							      <a class="post-read-more" href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" target="_self">Ler Mais</a>
							    </footer>
								</section>
				
							<?php endwhile;
				
							the_posts_navigation();
				
						else :
				
							get_template_part( 'template-parts/content', 'none' );
				
						endif; ?>
						
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
