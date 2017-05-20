<?php

// Creating argmuents to query only the most viewd posts
$posts_args = array(
  'posts_per_page' => 4,
  'meta_key' => 'wpb_post_views_count',
  'orderby' => 'meta_value_num',
  'order' => 'DESC' 
);

// Creating the Query
$posts_query = new WP_Query( $posts_args ); ?>

<section class="popular-posts-widget-wrapper">
  
  <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

    <div class="popular-post clearfix">
      <div class="thumb-box">
        <?php the_post_thumbnail('thumbnail'); ?>
      </div>
      <div class="content-box">
        <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" title="_self">
          <?php the_title(); ?>
        </a>
        <p><?php echo get_the_date(); ?></p>
      </div>
    </div>

  <?php endwhile; ?>
    
</section>

