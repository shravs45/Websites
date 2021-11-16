<?php
/**
 * The header for sara-log Theme
 *
 * @package sara-log
 * @version 1.0.1
 */
// For top header
$header_status    = sara_get_option( 'show_top_header' );
$back_to_top_type = sara_get_option( 'back_to_top_type' );
$unique_id        = esc_attr( uniqid( 'search-form-' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
  if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
else { do_action( 'wp_body_open' ); }

if($back_to_top_type == 'enable'): ?>
  <div id="backTop"><i class="ion-ios7-arrow-thin-up" aria-hidden="true"></i></div>
<?php endif; ?>

 <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'sara-log'); ?></a>
	
<?php if( $header_status == '1' ): ?>
<!-- Topbar -->
    <div class="sara-log-topbar">
        <div class="container">
            <!-- Social Links -->
            <div class="row">
                <div class="col-md-4">
            <div class="social-icons">
                 
                <?php   do_action('top_sara_header_social_icon'); ?>
                
            </div>
         </div>
            <!-- /Social Links -->
           
            <!-- Language and search -->
            <div class="col-md-5">
                <?php echo do_action('sara_header_menu'); ?>
            </div>
            </div>
            <!-- /Language and search -->
        </div>
    </div>
    <!-- /Topbar -->
 <?php endif; ?>
    <!-- Menu Bar -->
    <div class="menu-bar default">
        <div class="container">
             
             <div class="col-md-12">
            <div class="logo-top">
               <?php get_template_part( 'template-parts/header/site', 'branding' ); ?></a>
            </div>
         </div>
       </div>
       <div class="menu-wrapper">
       <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav id="site-navigation" class="main-navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="">
             <button class="manu-toggler" aria-controls="primary-menu"  aria-expanded="false"><span></span></button>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <div class="menu-links">
                 <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'main-menu',
                        ) ); 
                        ?>
            </div>
            </nav>
          </div>
        </div>
            <?php endif; ?>
             
          </div>
          </div>
        </div>
    </div>
    <!-- /Menu Bar -->


  
     <?php 

    // Custom image.
    global $header_image, $header_style;
    $header_image = get_header_image();
 
    if( $header_image ){
        $header_style = 'style="background-image: url('.esc_url( $header_image ).');"';                 

    } else{

        $header_style = '';
    }

    ?>
	