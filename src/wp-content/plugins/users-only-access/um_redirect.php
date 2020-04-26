<?php

require_once('../../../wp-load.php');

// Copied from wp-includes/pluggable.php
// only change is the login page redirected to.
function auth_redirect_um() {
	$secure = ( is_ssl() || force_ssl_admin() );

	/**
	 * Filters whether to use a secure authentication redirect.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $secure Whether to use a secure authentication redirect. Default false.
	 */
	$secure = apply_filters( 'secure_auth_redirect', $secure );

	// If https is required and request is http, redirect.
	if ( $secure && ! is_ssl() && false !== strpos( $_SERVER['REQUEST_URI'], 'wp-admin' ) ) {
		if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
			wp_redirect( set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ) );
			exit();
		} else {
			wp_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
			exit();
		}
	}

	/**
	 * Filters the authentication redirect scheme.
	 *
	 * @since 2.9.0
	 *
	 * @param string $scheme Authentication redirect scheme. Default empty.
	 */
	$scheme = apply_filters( 'auth_redirect_scheme', '' );

	$user_id = wp_validate_auth_cookie( '', $scheme );
	if ( $user_id ) {
		/**
		 * Fires before the authentication redirect.
		 *
		 * @since 2.8.0
		 *
		 * @param int $user_id User ID.
		 */
		do_action( 'auth_redirect', $user_id );

		// If the user wants ssl but the session is not ssl, redirect.
		if ( ! $secure && get_user_option( 'use_ssl', $user_id ) && false !== strpos( $_SERVER['REQUEST_URI'], 'wp-admin' ) ) {
			if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
				wp_redirect( set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ) );
				exit();
			} else {
				wp_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
				exit();
			}
		}

		return; // The cookie is good, so we're done.
	}

	// The cookie is no good, so force login.
	nocache_headers();

	$redirect = ( strpos( $_SERVER['REQUEST_URI'], '/options.php' ) && wp_get_referer() ) ? wp_get_referer() : set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );

	// Calling the local login url function
	$login_url = wp_login_url_um( $redirect, true );

	wp_redirect( $login_url );
	exit();
}


// Copied from wp-includes/pluggable.php
function wp_login_url_um( $redirect = '', $force_reauth = false ) {
	$login_url = site_url( 'login', 'login' );

	if ( ! empty( $redirect ) ) {
		$login_url = add_query_arg( 'redirect_to', urlencode( $redirect ), $login_url );
	}

	if ( $force_reauth ) {
		$login_url = add_query_arg( 'reauth', '1', $login_url );
	}

	/**
	 * Filters the login URL.
	 *
	 * @since 2.8.0
	 * @since 4.2.0 The `$force_reauth` parameter was added.
	 *
	 * @param string $login_url    The login URL. Not HTML-encoded.
	 * @param string $redirect     The path to redirect to on login, if supplied.
	 * @param bool   $force_reauth Whether to force reauthorization, even if a cookie is present.
	 */
	return apply_filters( 'login_url', $login_url, $redirect, $force_reauth );
}
