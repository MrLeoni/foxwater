<?php

  // Creating arguments to query 'home-banner'
  $post_args = array(
    'post_type' => 'home-banner',
    'Posts_per_page' => 10,
  );
  
  // Creating the query
  $post_query = new WP_Query( $post_args );
  
?>

<section id="home-banner">
  <div class="home-silder-wrapper">
    <ul class="home-slider">
    
      <?php while ( $post_query->have_posts() ) : $post_query->the_post() ?>
        <li>
          <?php the_post_thumbnail('full'); ?>
          <div class="slider-content">
            <?php the_content(); ?>
            <p><?php echo get_the_date(); ?> | Por <?php the_author(); ?></p>
          </div>
        </li>
      <?php endwhile; ?>
    
    </ul>
  </div>
</section>