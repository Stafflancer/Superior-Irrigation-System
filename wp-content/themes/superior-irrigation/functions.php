<?php
/**
 * Heritage functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Heritage
 */

/**
 * Theme set up. Should be included first.
 */
require('inc/template-setup.php');

/**
 * Implement the Custom Header feature.
 */
//require('inc/custom-header.php');

/**
 * Customizer additions.
 */
require('inc/customizer/customizer.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require('inc/template-extras.php');

/**
 * Load custom filters and hooks.
 */
require('inc/template-hooks.php');

/**
 * WordPress hardening.
 */
require('inc/template-security.php');

/**
 * Load styles and scripts.
 */
require('inc/template-scripts.php');

/**
 * Custom template tags for this theme.
 */
require('inc/template-tags.php');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require('inc/jetpack.php');
}

/**
 * Template ACF setup.
 */
require('inc/acf/acf.php');
