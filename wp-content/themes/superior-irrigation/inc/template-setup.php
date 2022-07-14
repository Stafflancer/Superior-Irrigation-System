<?php
/**
 * Theme setup.
 *
 * @package Heritage
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @author Bop Design
 */
function heritage_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Heritage, use a find and replace
	 * to change 'heritage' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('heritage', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_image_size('full-width', 1920, 1080);

	// Register navigation menus in one location.
	register_nav_menus([
		'primary' => esc_html__('Primary Menu', 'heritage'),
		'footer'  => esc_html__('Footer Menu', 'heritage'),
		'mobile'  => esc_html__('Mobile Menu', 'heritage'),
	]);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	]);

	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('heritage_custom_background_args', [
		'default-color' => 'fefefe',
		'default-image' => '',
	]));

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo', [
		'height'      => 250,
		'width'       => 500,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => ['site-title', 'site-description'],
	]);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Gutenberg Block Color Palettes.
	add_theme_support('editor-color-palette', array(
		array(
			'name'  => esc_attr__('Heritage Blue', 'heritage'),
			'slug'  => 'heritage-blue',
			'color' => '#236192',
		),
		array(
			'name'  => esc_attr__('Dark Blue', 'heritage'),
			'slug'  => 'dark-blue',
			'color' => '#002e5d',
		),
		array(
			'name'  => esc_attr__('Blue', 'heritage'),
			'slug'  => 'blue',
			'color' => '#5e8ab4',
		),
		array(
			'name'  => esc_attr__('Baby Blue', 'heritage'),
			'slug'  => 'baby-blue',
			'color' => '#9bb8d3',
		),
		array(
			'name'  => esc_attr__('Heritage Gold', 'heritage'),
			'slug'  => 'heritage-gold',
			'color' => '#eaaa00',
		),
		array(
			'name'  => esc_attr__('Yellow', 'heritage'),
			'slug'  => 'yellow',
			'color' => '#fed141',
		),
		array(
			'name'  => esc_attr__('Black', 'heritage'),
			'slug'  => 'black',
			'color' => '#000',
		),
		array(
			'name'  => esc_attr__('Dark Metal', 'heritage'),
			'slug'  => 'dark-metal',
			'color' => '#1d252d',
		),
		array(
			'name'  => esc_attr__('Gray', 'heritage'),
			'slug'  => 'gray',
			'color' => '#888b8d',
		),
		array(
			'name'  => esc_attr__('Light Gray', 'heritage'),
			'slug'  => 'light-gray',
			'color' => '#f2f2f2',
		),
		array(
			'name'  => esc_attr__('White', 'heritage'),
			'slug'  => 'white',
			'color' => '#fff',
		),
	));

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support('align-wide');

	// Gutenberg defaults for font sizes.
	add_theme_support('editor-font-sizes', [
		[
			'name' => __('Small', 'heritage'),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __('Normal', 'heritage'),
			'size' => 16,
			'slug' => 'normal',
		],
		[
			'name' => __('Large', 'heritage'),
			'size' => 36,
			'slug' => 'large',
		],
		[
			'name' => __('Huge', 'heritage'),
			'size' => 50,
			'slug' => 'huge',
		],
	]);

	// Gutenberg editor styles support.
	add_theme_support('editor-styles');
	add_editor_style('dist/css/editor.css');

	// Gutenberg responsive embed support.
	add_theme_support('responsive-embeds');
}

add_action('after_setup_theme', 'heritage_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @author Bop Design
 */
function heritage_content_width()
{
	$GLOBALS['content_width'] = apply_filters('heritage_content_width', 640);
}

add_action('after_setup_theme', 'heritage_content_width', 0);

/**
 * Register widget area.
 *
 * @link   https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @author Bop Design
 */
function heritage_widgets_init()
{
	// Define sidebars.
	$sidebars = [
		'sidebar-1' => esc_html__('Sidebar 1', 'heritage'),
	];

	// Loop through each sidebar and register.
	foreach ($sidebars as $sidebar_id => $sidebar_name) {
		register_sidebar([
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => /* translators: the sidebar name */ sprintf(esc_html__('Widget area for %s', 'heritage'), $sidebar_name),
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]);
	}

}

add_action('widgets_init', 'heritage_widgets_init');
