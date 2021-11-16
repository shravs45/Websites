<?php
//=============================================================
// Breadcrumb Options
//=============================================================
if ( ! function_exists( 'sara_breadcrumb_action' ) ) :
    function sara_breadcrumb_action() { 

    $breadcrumb_type = sara_get_option( 'breadcrumb_type' );

    if($breadcrumb_type == 'normal'): ?>

            <!-- Breadcrumb Header -->
      
          <?php Breadcrumb_trail(); ?>
         
        <!-- /Breadcrumb Header -->
	<?php
    endif; 
    }
endif;

add_action( 'sara_breadcrumb_options', 'sara_breadcrumb_action' );


//=============================================================
// Social Icon hook of the theme
//=============================================================
if ( ! function_exists( 'top_sara_header_social_icon_action' ) ) :
	
	function top_sara_header_social_icon_action() { ?>
		<div class="col-md-6 col-sm-12 social-links">
    		<?php if ( has_nav_menu( 'social' ) ) : ?>
                   <?php wp_nav_menu( array(
                        'theme_location'  => 'social',
                        'menu_id'         => '',
                        'menu_class'      => '',
                        'container_class' => 'social-icons',
                        
                    ) ); 
                    ?>
                 
               
            <?php endif; ?>
		</div>
	<?php }

endif;

add_action('top_sara_header_social_icon', 'top_sara_header_social_icon_action');

//=============================================================
// Header  Menu hook of the theme
//=============================================================
if ( ! function_exists( 'header_sara_menu_action' ) ) :
    
    function header_sara_menu_action() { ?>

           <?php if ( has_nav_menu( 'header' ) ) : ?>
                   <?php wp_nav_menu( array(
                        'theme_location'  => 'header',
                        'menu_id'         => '',
                        'menu_class'      => 'header-menu',
            ) ); 
             endif; 
         }

endif;

add_action('sara_header_menu', 'header_sara_menu_action');


//=============================================================
// Footer Menu hook of the theme
//=============================================================
if ( ! function_exists( 'footer_sara_menu_action' ) ) :
    
    function footer_sara_menu_action() { ?>

           <?php if ( has_nav_menu( 'social' ) ) : ?>
                   <?php wp_nav_menu( array(
                        'theme_location'  => 'footer-menu',
                        'menu_id'         => '',
                        'menu_class'      => '',
            ) ); 
             endif; 
         }

endif;

add_action('sara_footer_menu', 'footer_sara_menu_action');



/**
 * enqueue Script for admin dashboard.
 */

if (!function_exists('sara_widgets_backend_enqueue')) :
    function sara_widgets_backend_enqueue($hook)
    {
        if ('widgets.php' != $hook)
        {
            return;
        }

        wp_register_script('sara-log-custom-widgets', get_template_directory_uri() . '/themesara/assets/js/widget.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('sara-log-custom-widgets');
    }

    add_action('admin_enqueue_scripts', 'sara_widgets_backend_enqueue');
endif;