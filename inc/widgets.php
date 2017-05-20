<?php

if ( !class_exists('Contact_Widget') ) {

  class Contact_Widget extends WP_Widget {
  
  	public function __construct () {
      $widget_ops = array ( 'classname' => 'widget-newsletter', 'description' => __ ( 'Exibe um formulário de captura de e-mail. Essa informação será enviada a uma tabela no banco de dados.', 'foxwater' ) );
      parent::__construct ( 'Contact_Widget', __ ( 'Newsletter', 'foxwater' ), $widget_ops );
    }
  
  	/**
  	 * Outputs the content of the widget
  	 *
  	 * @param array $args
  	 * @param array $instance
  	 */
  	public function widget( $args, $instance ) {
  		
    echo $args['before_widget'];
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']; ?>
      <div class="news-form-box clearfix">
        <label for="news-email"></label>
        <input type="email" placeholder="Seu endereço de e-mail" id="news-email">
        <button type="button" id="news-send"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
      </div>
      <span id="news-feedback" class="feedback"></span>
      <span id="ajax-url" style="display: none"><?php echo admin_url('admin-ajax.php'); ?></span>
    <?php echo $args['after_widget'];
  		
  	}
  
  	/**
  	 * Outputs the options form on admin
  	 *
  	 * @param array $instance The widget options
  	 */
  	public function form( $instance ) {
  	  
      $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
      
      ?>
      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Título:', 'foxwater' ); ?></label> 
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
      </p>
      
      <p>
        Exibe um formulário padrão para a captação de e-mails. Eles são salvos em uma tabela com o nome 'base_emails' no seu banco de dados
      </p>
  	  
  	<?php }
  
  	/**
  	 * Processing widget options on save
  	 *
  	 * @param array $new_instance The new options
  	 * @param array $old_instance The previous options
  	 */
  	public function update( $new_instance, $old_instance ) {
  	  
  		$instance = array();
  		
  		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  
  		return $instance;
  		
  	}
  }

}// contact_widget

if ( !class_exists( 'Popular_Posts' ) ) {
  
  class Popular_Posts extends WP_Widget {
    
    public function __construct () {
      $widget_ops = array ( 'classname' => 'widget-popular-posts', 'description' => __ ( 'Exibe os posts mais vizualizados do blog', 'foxwater' ) );
      parent::__construct ( 'Popular_Posts', __ ( 'Posts Populares', 'foxwater' ), $widget_ops );
    }
    
    public function widget( $args, $instance ) {
      
      echo $args['before_widget'];
      
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        get_template_part( '/inc/popular-posts/widget-front-end');
      
      echo $args['after_widget'];
      
    }
    
    public function form( $instance ) {
      
      $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
      
      ?>
      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Título:', 'foxwater' ); ?></label> 
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
      </p>
      
      <?php  
      
    }
    
    public function update( $new_instance, $old_instance ) {
      
      $instance = array();
  		
  		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  
  		return $instance;
  		
    }
    
  }
  
}// popular_posts

if ( !class_exists('External_Link') ) {

  class External_Link extends WP_Widget {
  
  	public function __construct () {
      $widget_ops = array ( 'classname' => 'widget-external-link', 'description' => __ ( 'Insira um breve texto e uma imagem sobre uma página externa.', 'foxwater' ) );
      parent::__construct ( 'External_Link', __ ( 'Link Externo', 'foxwater' ), $widget_ops );
    }
  
  	/**
  	 * Outputs the content of the widget
  	 *
  	 * @param array $args
  	 * @param array $instance
  	 */
  	public function widget( $args, $instance ) {
  	  
  	  $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
      $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
      
      echo $args['before_widget'];
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']; ?>
        <div class="widget-external-content">
          <?php echo $text; ?>
        </div>
      <?php echo $args['after_widget'];
  	  
  	}
  
  	/**
  	 * Outputs the options form on admin
  	 *
  	 * @param array $instance The widget options
  	 */
  	public function form( $instance ) {
  	  
      $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
      $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
      ?>
      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Título:', 'foxwater' ); ?></label> 
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
      </p>
      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Texto:', 'foxwater' ); ?></label> 
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" rows="4"><?php echo esc_attr( $text ); ?></textarea>
      </p>
      
      <p>
        Caso queira adicionar uma imagem nesse texto, utilize imagens quadradas no tamanho 170x170px para melhores resultados
      </p>
  	  
  	<?php }
  
  	/**
  	 * Processing widget options on save
  	 *
  	 * @param array $new_instance The new options
  	 * @param array $old_instance The previous options
  	 */
  	public function update( $new_instance, $old_instance ) {
  	  
  		$instance = array();
  		
  		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
  
  		return $instance;
  		
  	}
  }

}// external_link

if( !function_exists( 'register_custom_widget' ) ) :
    /**
     * Register property search widget
     */
    function register_custom_widget() {
        register_widget( 'contact_widget' );
        register_widget( 'popular_posts' );
        register_widget( 'external_link' );
    }
    add_action( 'widgets_init', 'register_custom_widget' );
endif;