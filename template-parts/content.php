<?php
/**
 * Template part for displaying posts
 *
 * @package Foxwater
 */
 
 $tags = get_the_tags( get_the_ID() );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			the_post_thumbnail('full');
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<p class="post-meta">' . get_the_date() . ' | Por ' . get_the_author() . '</p>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses( __( 'Continue lendo %s <span class="meta-nav">&rarr;</span>', 'foxwater' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="post-footer clearfix">
		<?php
		echo social_sharing_buttons(); ?>
		<div class="footer-tags">
			<span class="post-tag-title">TAGS: </span>
			<?php foreach ( $tags as $tag ) { echo '<span class="post-tag">' . $tag->name . ', </span>'; } ?>
		</div>
	</footer><!-- .entry-footer -->
	<?php
		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foxwater' ),
		// 	'after'  => '</div>',
		// ) );
		the_post_navigation(array(
			"prev_text"	=> "<p>Post Anterior</p><p class='nav-post-title'>%title</p>",
			"next_text"	=> "<p>Próximo Post</p><p class='nav-post-title'>%title</p>"
		));
	?>
</article><!-- #post-## -->
