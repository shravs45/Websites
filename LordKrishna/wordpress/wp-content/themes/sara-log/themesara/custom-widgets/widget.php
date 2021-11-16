<?php

class Sara_Log_Author_Widget extends WP_Widget
{
     public function __construct()
     {
          parent::__construct(
               'author-widget',
               __( 'TS: Author Widget', 'sara-log' ),
               array( 'description' => __( 'Best displayed in Sidebar.', 'sara-log' ) )
          );
      }
    
     public function widget( $args, $instance )
     {
          extract( $args );
        if(!empty($instance))
       { 

         $facebook  = $instance['facebook'];
         $twitter   = $instance['twitter'];
         $instagram = $instance['instagram'];
         $linkedin  = $instance['linkedin'];
         $youtube   = $instance['youtube'];
         $image     = $instance['image_uri'];
         $name      = $instance['full_name'];

         if( !empty($image))
         {
          ?>
           <div class="widget about-author">
                 
                 
                  <div class="about-me text-center">
                    <img src="<?php echo esc_url( $instance['image_uri'] );?>" alt="about me">
                    
                    <p class="author-description"><?php echo wp_kses_post( $instance['description'] );?></p>

                    <h5 class="author-name"><?php echo esc_html($name); ?></h5>
                    <div class="social-icons">
                       <ul>

                       <?php 
                          if ( !empty( $facebook ) ) { ?>
                              <li>
                                  <a class="img-circle" href="<?php echo esc_url( $facebook ); ?>" data-title="Facebook" target="_blank"><i class="ion-social-facebook"></i></a>
                              </li>
                          <?php }
                          if ( !empty( $twitter ) ) { ?>
                              <li>
                                  <a class="img-circle" href="<?php echo esc_url( $twitter ); ?>" data-title="Twitter" target="_blank"><i class="ion-social-twitter"></i></a>
                              </li>
                          <?php }
                          if ( !empty( $linkedin ) ) {
                              ?>
                              <li>
                                  <a class="img-circle" href="<?php echo esc_url( $linkedin ); ?>" data-title="Linkedin" target="_blank"><i class="ion-social-linkedin"></i></a>
                              </li>
                              <?php
                          }
                          if ( !empty( $instagram) ) {
                              ?>
                              <li>
                                  <a class="img-circle" href="<?php echo esc_url( $instagram); ?>" data-title="Instagram" target="_blank"><i class="ion-social-instagram"></i></a>
                              </li>
                              <?php
                          }
                          if ( !empty( $youtube ) ) { ?>
                              <li>
                                  <a class="img-circle" href="<?php echo esc_url( $youtube ); ?>" data-title="Youtube" target="_blank"><i class="ion-social-youtube"></i></a>
                              </li>
                              <?php
                          }
                          
                              ?>
                      </ul>
                    </div>  

                  </div><!-- .about-me -->
              </div><!-- .widget -->
          
          <?php
          }
        }   
     }

     public function update( $new_instance, $old_instance ){
        $instance                = $old_instance;
        $instance['title']       = sanitize_text_field( $new_instance['title'] );
        $instance['full_name']   = sanitize_text_field( $new_instance['full_name'] );
        $instance['description'] = wp_kses_post( $new_instance['description'] );
        $instance['image_uri']   = esc_url_raw( $new_instance['image_uri'] );
        $instance['facebook']    = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter']     = esc_url_raw( $new_instance['twitter'] );
        $instance['googleplus']  = esc_url_raw( $new_instance['googleplus'] );
        $instance['instagram']   = esc_url_raw( $new_instance['instagram'] );
        $instance['linkedin']    = esc_url_raw( $new_instance['linkedin'] );
        $instance['youtube']     = esc_url_raw( $new_instance['youtube'] );
        return $instance;
     }

     public function form($instance ){
          ?>
              <p>
                 <label for="<?php echo $this->get_field_id('image_uri'); ?>">
                     <?php _e( 'Image', 'sara-log' ); ?>
                 </label>
                  <br />
                 <?php
                     if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                         echo '<img class="custom_media_image" src="' . esc_url( $instance['image_uri'] ) . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                     endif;
                 ?>

                 <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php 
                   if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                     echo esc_url( $instance['image_uri'] );
                    endif;
                  ?>" style="margin-top:5px;">
                  <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'sara-log' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','sara-log'); ?>" data-button="<?php esc_attr_e( 'Select Image','sara-log'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'sara-log' ); ?>" class="button media-image-remove" />
             </p>
             <p>
                 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'sara-log' ); ?></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php
                  if (isset($instance['title']) && $instance['title'] != '' ) :
                    echo esc_attr($instance['title']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('full_name'); ?>"><?php _e( 'Full Name', 'sara-log' ); ?></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('full_name'); ?>" id="<?php echo $this->get_field_id('full_name'); ?>" value="<?php
                  if (isset($instance['full_name']) && $instance['full_name'] != '' ) :
                    echo esc_attr($instance['full_name']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Description', 'sara-log' ); ?></label><br />
                  <textarea  rows="8" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"  class="widefat" ><?php
                  
                    if (isset($instance['description']) && $instance['description'] != '' ) :
                       echo esc_textarea( $instance['description'] ); 
                     endif;
                   ?></textarea>
              </p>

              <p>
                <label for="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>"><?php _e( 'Facebook', 'sara-log' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>" id="<?php echo esc_attr( $this->get_field_id('facebook')); ?>" value="<?php
                 if (isset($instance['facebook']) && $instance['facebook'] != '' ) :
                   echo esc_attr($instance['facebook']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>"><?php _e( 'Twitter', 'sara-log' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>" id="<?php echo esc_attr( $this->get_field_id('twitter')); ?>" value="<?php
                 if (isset($instance['twitter']) && $instance['twitter'] != '' ) :
                   echo esc_attr($instance['twitter']);
                  endif;

                  ?>" class="widefat" />
            </p>
      

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>"><?php _e( 'Instagram', 'sara-log' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('instagram') ); ?>" id="<?php echo esc_attr( $this->get_field_id('instagram')); ?>" value="<?php
                 if (isset($instance['instagram']) && $instance['instagram'] != '' ) :
                   echo esc_attr($instance['instagram']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>"><?php _e( 'Linkedin', 'sara-log' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>" id="<?php echo esc_attr( $this->get_field_id('linkedin')); ?>" value="<?php
                 if (isset($instance['linkedin']) && $instance['linkedin'] != '' ) :
                   echo esc_attr($instance['linkedin']);
                  endif;

                  ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>"><?php _e( 'Youtube', 'sara-log' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>" id="<?php echo esc_attr( $this->get_field_id('youtube')); ?>" value="<?php
                 if (isset($instance['youtube']) && $instance['youtube'] != '' ) :
                   echo esc_attr($instance['youtube']);
                  endif;

                  ?>" class="widefat" />
            </p>
          <?php
     }
}


add_action( 'widgets_init', 'Sara_Log_Author_Widget' ); 
function Sara_Log_Author_Widget(){     
    register_widget( 'Sara_Log_Author_Widget' );

}






