<?php
/**
 * Template part for displaying posts
 * @package sara-log
 * @version 1.0.1
 */

if(get_theme_mod('home_style')=='Simple') : 

  if(get_theme_mod('home_style_column') == 'full'):
     $column = 'col-lg-12 masonry post';

  elseif(get_theme_mod('home_style_column') == 'two'):
     $column = 'col-lg-12 masonry post';
 
  elseif(get_theme_mod('home_style_column') == 'three'):
     $column = 'col-lg-12 masonry post';
  
  elseif(get_theme_mod('home_style_column') == 'four'):
     $column = 'col-lg-3 masonry post';

  else:
     $column = 'col-lg-12 masonry post';

  endif;
 
 elseif(get_theme_mod('home_style')=='Grid'):
  

  if(get_theme_mod('home_style_column') == 'full'):
     $column = 'col-lg-12 masonry post';

  elseif(get_theme_mod('home_style_column') == 'two'):
     $column = 'col-lg-12 masonry post';
 
  elseif(get_theme_mod('home_style_column') == 'three'):
     $column = 'col-lg-12 masonry post';
  
  elseif(get_theme_mod('home_style_column') == 'four'):
     $column = 'col-lg-3 masonry post';

  else:
    $column     = 'col-lg-12 masonry';

  endif;
   
   $image_size = "sara-log-thumbnail-1";
  
   
   

 else :
 
 $column = 'col-lg-12 masonry post';
 
 endif;

$readmore      = sara_get_option( 'readmore_text' );
$hide_category = sara_get_option( 'post_categories' );
 ?>
  
<article id="post-<?php the_ID(); ?>" <?php post_class( $column ); ?>>

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
                 echo esc_html(" ".$category_name);?> 
        </div>
       <?php }} ?> 
       <div class="blog-post-meta">
                <ul>
                  
                    <?php if ( 'post' === get_post_type() ): sara_posted_on(); endif; 
                    
                    $the_cat = get_the_category();
                    if(!empty($the_cat))
                    {
                        $category_name = $the_cat[0]->cat_name;
                        $category_description = $the_cat[0]->category_description;
                        $category_link = get_category_link( $the_cat[0]->cat_ID );
                    }
                    if( $hide_category != 1)
                    {
                    ?>

                    <li <i class="ion-android-folder" aria-hidden="true" ></i><a href="<?php echo esc_url( $category_link); ?> "><?php
                 echo esc_html(" ".$category_name);?></a></li>

                 <?php } 

                    if(!get_theme_mod('article_comment_link')) :?>
                
                        <li class="meta-comment list-inline-item">
                            <?php $cmt_link = get_comments_link(); 
                                  $num_comments = get_comments_number();
                                    if ( $num_comments == 0 ) {
                                        $cm = __( 'No Comments', 'sara-log' );
                                    } elseif ( $num_comments > 1 ) {
                                        $cm = $num_comments . __( ' Comments', 'sara-log' );
                                    } else {
                                        $cm = __('1 Comment', 'sara-log' );
                                    }
                                  
                            ?>  
                            <i class="ion-android-forums" aria-hidden="true"></i>
                            <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $cm );?></a>
                        </li>
                    <?php endif; ?>
                   
                </ul>
            </div>
        <div class="post-content">
            <h3 class="post-title <?php if( !has_post_thumbnail() ) { echo "no-image"; }?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span class="line"></span>
            </h3>

            <p class="post-description">
              <?php  echo wp_kses_post( wp_trim_words(get_the_content(), 30) ); ?>
            </p>

            <?php if(!empty($readmore)){ ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-colored"><i class="ion-ios7-paper"></i><?php echo esc_html($readmore); ?></a>
        <?php } ?>
        </div>
    </div>
   
</article><!-- #post-## -->
