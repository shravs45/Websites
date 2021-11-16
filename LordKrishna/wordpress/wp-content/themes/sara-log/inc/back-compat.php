<?php
/**
 * sara-log back compat functionality
 *
 * Prevents sara-log from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package sara-log
 */

/**
 * Prevent switching to sara-log on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 */
function sara_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'sara_upgrade_notice' );
}
add_action( 'after_switch_theme', 'sara_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * sara-log on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function sara_upgrade_notice() {
	$message = sprintf( __( 'sara-log requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'sara-log' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function Sara_Customize() {
	wp_die( sprintf( __( 'sara-log requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'sara-log' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'Sara_Customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function web_wave_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'sara-log requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'sara-log' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'web_wave_preview' );
