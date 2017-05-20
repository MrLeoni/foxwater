<?php

if( !function_exists( 'register_custom_posts' ) ) {
 
  function register_custom_posts() {
  
    // Register 'Home Banners' post type with 'Categoria'
    $labels_post = array( 
      'name' => 'Home Banners',
      'singular_name' => 'Banner',
    );
    $args_post = array(
      'labels' => $labels_post,
      'supports' => array('title', 'editor', 'thumbnail'),
      'menu_position' => 25,
      'menu_icon' => 'dashicons-format-gallery',
      'public'	=> true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'show_in_menu'	=> true,
    );
    register_post_type('home-banner', $args_post);
    
    $labels_taxonomy_default = array(
      'name' => 'Categorias',
      'singular_name' => 'Categoria',
    );
    $args_taxonomy = array(
      'labels'	=> $labels_taxonomy,
      'show_ui'	=> true,
      'show_in_menu'	=> true,
      'show_tagcloud'	=> false,
      'show_admin_column' => true,
      'hierarchical'	=> true,
      'capabilities'	=> array('manage_terms', 'edit_terms', 'delete_terms', 'assign_terms'),
    );
    register_taxonomy('home-banner-categoria', 'home-banner', $args_taxonomy);
  
  }
  
  add_action('init', 'register_custom_posts');
  
}