<?php
/**
 * The template for displaying search results pages
 * @package sara-log
 * @version 1.0.1
 */
get_header(); 

$breadcrumb_type = sara_get_option( 'breadcrumb_type' );
if($breadcrumb_type == 'normal'): 
?>
<!-- Breadcrumb Header -->
<div class="sara-log-breadcrumb" <?php echo $header_style; ?>>
    <div class="container">
         <h1><?php printf(esc_html__('Search Results for: %s', 'sara-log'), '<span>' . get_search_query() . '</span>'); ?></h1>
    </div>
</div>
<!-- /Breadcrumb Header -->
<?php endif; ?>

<div class="container">
    <!-- Main Content Area -->
    <section class="section-wrap">
        <div class="row">
            <div class="col-sm-12">
                <!-- Blog Grid Posts -->
                <div class="sara-log-blog-grid">
                    <div class="row">
                        <div class="col-sm-8 left-block">

                            <?php if($breadcrumb_type == 'disable'): ?>     

                             <h1 class="title blog-post col-lg-12 "><?php printf(esc_html__('Search Results for: %s', 'sara-log'), '<span>' . get_search_query() . '</span>'); ?></h1>
                          
                            <?php endif; ?>   

                            <?php if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post(); 
                                            
                                            get_template_part( 'template-parts/post/content');
                            
                                        endwhile; // End of the loop.
                            
                                else : ?>
                                    <div class="blog-post search-not-found">
                                        <article class="wrong-search-wrapper text-center post">
                                            <h4><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sara-log' ); ?></h4>
                                            <?php get_search_form(); ?>
                                        </article>
                                    </div>    
                            <?php endif; ?>
                         
                            <div class="sara-log-pagination">
                               <?php the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( '<<', 'sara-log' ),
                                'next_text' => __( '>>', 'sara-log' ),
                            ) ); ?>
                            </div>
                        </div>
                        

                        <div class="col-md-4">
                           <div class="sara-log-sidebar">
                            
                             <?php get_sidebar(); ?>

                            </div> 
                        </div>
					  
                    </div>
                       
                </div>
            </div>
          
        </div><!-- .row -->
	</section>
</div>
<?php get_footer();
