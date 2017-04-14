<?php
/**
 * Plugin Name: VDD Debugger
 * Description: WordPress console debugging with the WP PHP Console plugin and Google Chrome extension.
 * Plugin URI:  https://github.com/rveitch/vdd-wp-debugger
 * Author:      Ryan Veitch
 * Author URI:  ryanveitch.blog
 * License:     GPL v2 or later
 * Version:     0.YY.MM.DD
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// NOTE: WP PHP Console plugin and PHP Console Chrome plugin are required for this to work.
// TODO: Add requirement checks.

if ( is_admin() ) {
	add_action('current_screen', function ( $currentScreen ) {
	    PC::debug( $currentScreen, '$currentScreen' ); // NOTE: same as get_current_screen();
			PC::debug( is_multisite(), 'is_multisite()' ); // True if multisite install, false for single site
			PC::debug( is_admin(), 'is_admin()' ); // True if current page is an admin screen
			PC::debug( is_network_admin(), 'is_network_admin()' ); // True if current page is a network admin screen (multisite)
			PC::debug( is_blog_admin(), 'is_blog_admin()' ); // True if current page is a blog admin screen (single site)
	});
}
