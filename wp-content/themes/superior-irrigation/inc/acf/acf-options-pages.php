<?php
/**
 * ACF theme options page - Setting up ACF options pages
 * Enables "Options" pages in Advanced Custom Fields
 */

if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'capability' => 'manage_options',
		'redirect'   => true,
		'position'   => 3.1,
	]);

	acf_add_options_sub_page([
		'page_title'  => 'Header Settings',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-settings',
	]);

	acf_add_options_sub_page([
		'page_title'  => 'Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-settings',
	]);

	acf_add_options_sub_page([
		'page_title'  => 'General Settings',
		'menu_title'  => 'General',
		'parent_slug' => 'theme-settings',
	]);

	acf_add_options_sub_page([
		'page_title'  => '404 Settings',
		'menu_title'  => '404 Page',
		'parent_slug' => 'theme-settings',
	]);
}
