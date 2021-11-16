<?php
/**
 * Recommended plugins
 *
 * @package sara-log
 * @version 1.0.1
 */
if ( ! function_exists( 'sara_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.1
	 */
	function sara_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'Themesara Tools', 'sara-log' ),
				'slug'     => 'themesara-toolset',
				'required' => false,
			),
	
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'sara_recommended_plugins' );
