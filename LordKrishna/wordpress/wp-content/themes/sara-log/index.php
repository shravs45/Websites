<?php
/**
 * The main template file
 * @package sara-log
 * @version 1.0.1
 */

get_header();
if(get_theme_mod('home_style')=='Simple') : 

	$column = '';
	$class  = "sara-log-blog-grid";
	$row    = " masonry-wrap row";
 
 else :
 
	$column = 'col-sm-12';
	$class  = "sara-log-blog-list";
	$row    = "";
 
 endif;
 ?>
    
<!-- /Breadcrumb Header -->
<section  class="latest-post-wrap">
	<div class="container">
		<div class="row">
			 
             <div class="latest-post-inner">
             	<?php
             	$args = array(
				    'post_type' => 'post',
				    'posts_per_page'      => 3,
				    'order'            => 'DESC',
				);
             	$the_query = new WP_Query( $args );
		                        if ($the_query-> have_posts() ) :
		                            
		                            /* Start the Loop */
		                            while ( $the_query->have_posts() ) : $the_query->the_post();
									
									get_template_part( 'template-parts/post/content','latest');
									          
		                        endwhile;
		            
		                        else :
		            
		                            get_template_part( 'template-parts/post/content', 'none' );
		            
		                        endif;
		                    ?>

             </div>
          </div>
        </div>
	</section>
<div class="container">
	<!-- Main Content Area -->
	
	<section class="section-wrap">
		<div class="row">
			<div class="col-sm-12">
				<!-- Blog Grid Posts -->
				<div class="sara-log-blog-grid" id="content">
					<div class="row">
						 <div id="primary" <?php if(get_theme_mod('home_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8 classic left-block" <?php endif; ?> >
						      <div class="<?php echo esc_attr($class); ?>">
						 		 <div class="row <?php  echo esc_attr( $row );?>">
						
							 <?php
		                        if ( have_posts() ) :
		                            
		                            /* Start the Loop */
		                            while ( have_posts() ) : the_post();
									
									get_template_part( 'template-parts/post/content');
									          
		                        endwhile;
		            
		                        else :
		            
		                            get_template_part( 'template-parts/post/content', 'none' );
		            
		                        endif;
		                    ?>
		                 </div>
		             </div>

		                    <div class="sara-log-pagination">
                               <?php the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( '<<', 'sara-log' ),
                                'next_text' => __( '>>', 'sara-log' ),
                            ) ); ?>
                            </div>
			    		</div>
                    <?php if(get_theme_mod('home_sidebar')==false) : ?> 
	                       <!-- Sidebar -->
							<div class="col-md-4" id="secondary">
								<div class="sara-log-sidebar">
	                            
	                             <?php get_sidebar(); ?>

	                            </div> 
								
							</div>
							<!-- /Sidebar -->
                    <?php endif; ?> 
			    	</div>	
			    </div>
				<!-- Blog Grid Posts -->	
            </div>
		</div>
	</section>
</div>
<?php get_footer();