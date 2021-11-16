<?php
/**
 * Displays footer site info
 *
 * @package sara-log
 * @version 1.0.1
 */

?>

<!-- Bottom Bar -->
<div class="sara-log-bottom-bar">
	<div class="container">
		
		<div class="bottom-nav">
			<?php echo do_action('sara_footer_menu'); ?>
		</div>
		<div class="copyright">

			<?php $text_copyright = sara_get_option( 'text_copyright' ); 
						    
	        if ( ! empty( $text_copyright ) ) : ?>
	    
	           <?php echo wp_kses_data( $text_copyright ); ?>
	    
	        <?php endif; ?>

	            <a href="<?php echo esc_url( __( 'https://www.wordpress.org/', 'sara-log' ) ); ?>">  <?php printf( esc_html__( ' Proudly powered by %s ', 'sara-log' ), 'WordPress ' ); ?>
							    </a>
								<span class="sep"> <?php esc_html_e('|','sara-log') ?>  </span>

				<?php printf( esc_html__( ' Theme: %1$s by %2$s.', 'sara-log' ), 'Sara Log', '<a href="https://www.themesara.com/" target="_blank">ThemeSara</a>' ); ?>

		</div>
	</div>
</div><!-- /Bottom Bar -->