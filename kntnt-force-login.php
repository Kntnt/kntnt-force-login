<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Force Login
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Forces visitors to login before accessing the site.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined( 'ABSPATH' ) || die;

add_action( 'wp', function () {
	if ( ! is_user_logged_in() ) {
		global $wp;
		$current_url = home_url( add_query_arg( $wp->query_vars, trailingslashit( $wp->request ) ) );
		$login_url   = wp_login_url( $current_url );
		wp_redirect( $login_url );
		die;
	}
}, -9999 );
