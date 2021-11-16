<?php
/**
 * Template part for displaying posts
 * @package web-wave
 * @version 1.0.1
 */

if(get_theme_mod('home_style')=='Simple') : 

   
     $column = 'col-lg-4 ';


 else :
 
 $column = 'col-lg-4 masonry post';
 
 endif;

$readmore      = sara_get_option( 'readmore_text' );
$hide_category = sara_get_option( 'post_categories' );
 ?>
  
<article id="post-<?php the_ID(); ?>" <?php post_class( $column ); ?>>
    <div class="masonry post-box">
    <div class="blog-post">
      <?php if( has_post_thumbnail() ) { ?>
    
        <div class="post-thumbnail">
           <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('full'); ?></a>
        </div>
        <?php $the_cat = get_the_category();
          if(!empty($the_cat))
          {
              $category_name = $the_cat[0]->cat_name;
              $category_description = $the_cat[0]->category_description;
              $category_link = get_category_link( $the_cat[0]->cat_ID );
          }
          if( $hide_category != 1)
          {
          ?>

                   
        <div class="ribbon ribbon-date">
          <?php
                 echo esc_html("Latest ");?> 
        </div>
       <?php }} ?> 
       
        <div class="post-content">
            <h3 class="post-title <?php if( !has_post_thumbnail() ) { echo "no-image"; }?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span class="line"></span>
            </h3>

            <p class="post-description">
              <?php  echo wp_kses_post( wp_trim_words(get_the_content(), 30) ); ?>
            </p>

             
        </div>
    </div>
  </div>
   
</article><!-- #post-## -->
