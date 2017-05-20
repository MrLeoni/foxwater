<?php
/**
 * Foxwater functions and definitions
 *
 * @package Foxwater
 */

if ( ! function_exists( 'foxwater_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function foxwater_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Foxwater, use a find and replace
	 * to change 'foxwater' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'foxwater', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Topo', 'foxwater' ),
		'footer' => esc_html__( 'Rodapé', 'foxwater' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'foxwater_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'foxwater_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function foxwater_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foxwater_content_width', 640 );
}
add_action( 'after_setup_theme', 'foxwater_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foxwater_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Home Sidebar', 'foxwater' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets na barra lateral da página Principal', 'foxwater' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Post Sidebar', 'foxwater' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Adicione widgets na barra lateral nas páginas dos Posts', 'foxwater' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'foxwater_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function foxwater_scripts() {
	
	// styles
	
	wp_enqueue_style( 'foxwater-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array() );
	
	wp_enqueue_style( 'foxwater-icons', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array() );
	
	wp_enqueue_style( 'foxwater-slider', get_template_directory_uri() . '/assets/css/jquery.bxslider.css', array() );
	
	wp_enqueue_style( 'foxwater-style', get_stylesheet_uri(), array('foxwater-grid', 'foxwater-icons', 'foxwater-slider') );
	
	// scripts

	wp_enqueue_script( 'foxwater-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'foxwater-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'foxwater-slider-script', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script( 'foxwater-scripts', get_template_directory_uri() . '/js/main.js', array('jquery', 'foxwater-slider-script'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foxwater_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Creating custom posts Type
 */
require get_template_directory() . '/inc/posts.php';

/**
 * Creating custom Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Function to register post views
 */
 
function wpb_set_post_views( $postID ) {

	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	
	if( $count == '' ) {
		
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		
	} else {
		
		$count++;
		update_post_meta($postID, $count_key, $count);
		
	}
	
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Send emails to data base
 */

function base_creator() {
	
	global $wpdb;
	$email = htmlspecialchars( $_POST['email'] );
	
	// Check to see if the email is not in the database already
	$results = $wpdb->get_results("SELECT * FROM `base_email` WHERE email='$email'", OBJECT);
	
	// insert the email into database
	if ( count( $results ) === 0 ) {
		$save = $wpdb->insert( 'base_email', array('email' => $email) );
	}
	
	die();
	
}

add_action('wp_ajax_base', 'base_creator');
add_action('wp_ajax_nopriv_base', 'base_creator');

/**
 *  Remove 'Categoria:' from archive pages
 */
add_filter( 'get_the_archive_title', function ($title) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}

return $title;
});

/**
 * Social Share
 */

function social_sharing_buttons() {
	global $post;
	
		// Get current page URL 
		$url = urlencode(get_permalink());
 
		// Get current page title
		$title = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
 
		// Add sharing button at the end of page/page content
		$content = '<a class="share-button facebook" href="'.$facebookURL.'" title="Compartilhar no Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a><a class="share-button twitter" href="'. $twitterURL .'" title="Compartilhar no Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="share-button linkedin" href="'.$linkedInURL.'" title="Compartilhar no LinkedIn" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
		
		return $content;
};


