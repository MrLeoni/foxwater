<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Foxwater
 */

get_header(); ?>
	
	<article id="primary" class="content-area home">
		<section class="error-404 not-found">
			<div class="container">
				<div class="row">
					
					<div class="col-md-8">
						<main id="main" class="site-main" role="main">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( '404', 'foxwater' ); ?></h1>
								<p>Não encontramos a página que você solicitou</p>
							</header><!-- .page-header -->
							
							<div class="page-content">
								<p><?php esc_html_e( 'Gostaria de fazer uma pesquisa?', 'foxwater' ); ?></p>
								<div class="search-404">
									<?php get_search_form(); ?>
								</div>
							</div><!-- .page-content -->
							
						</main>
					</div>
					
					<div class="col-md-4">
						<?php get_sidebar('home'); ?>
					</div>
					
				</div>
			</div>
		</section><!-- .error-404 -->
	</article><!-- #primary -->

<?php
get_footer();
