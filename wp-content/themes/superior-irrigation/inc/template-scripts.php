<?php
/**
 * Enqueue scripts and styles.
 */

if (!defined('HERITAGE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('HERITAGE_VERSION', '1.0.0');
}

/**
 * Enqueue scripts and styles.
 */
function heritage_scripts()
{
	// Register theme stylesheets.
	wp_register_style('animate-style', get_template_directory_uri() . '/dist/css/vendor/animate.css', array(), '4.1.1');
	wp_register_style('slick-style', get_template_directory_uri() . '/dist/css/vendor/slick.css', array(), '1.8.1');
	wp_register_style('slick-theme-style', get_template_directory_uri() . '/dist/css/vendor/slick-theme.css', array(), '1.8.1');

	// Enqueue theme stylesheets. Use conditionals if some are used in certain templates only.
	wp_enqueue_style('heritage-style', get_template_directory_uri() . '/dist/css/main.css', array(), HERITAGE_VERSION);
//	wp_enqueue_style('slick-style');
//	wp_enqueue_style('slick-theme-style');

	// Register theme scripts.
	// Third party scripts.
	wp_register_script('bootstrap-script', get_template_directory_uri() . '/dist/js/vendor/bootstrap.min.js', array(), '5.1.3', true);
	wp_register_script('slick-script', get_template_directory_uri() . '/dist/js/vendor/slick.js', array(), '1.8.1', true);
	wp_register_script('wow-script', get_template_directory_uri() . '/dist/js/vendor/wow.min.js', array(), '1.3.0', true);
	wp_register_script('parallax-script', get_template_directory_uri() . '/dist/js/vendor/parallax.min.js', array(), '1.5.0', true);
	// Theme scripts
	wp_register_script('navigation-script', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);
	wp_register_script('heritage-script', get_template_directory_uri() . '/js/main.js', array('jquery'), HERITAGE_VERSION, true);

	// Enqueue theme scripts. Use conditionals if some are used in certain templates only.
//    wp_enqueue_script('heritage-script');
	wp_enqueue_script('navigation-script');
//    wp_enqueue_script('bootstrap-script');
//	wp_enqueue_script('slick-script');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'heritage_scripts');

/**
 * Preload styles and scripts.
 */
function heritage_preload_scripts()
{
	?>
<!--	<link rel="preload" href="--><?php //echo esc_url( get_stylesheet_directory_uri() ); ?><!--/dist/css/main.css?ver=--><?php //echo esc_html( HERITAGE_VERSION ); ?><!--" as="style">-->
<!--	<link rel="preload" href="--><?php //echo esc_url( get_stylesheet_directory_uri() ); ?><!--/js/main.js?ver=--><?php //echo esc_html( HERITAGE_VERSION ); ?><!--" as="script">-->
	<?php
}

add_action('wp_head', 'heritage_preload_scripts', 1);

/**
 * Preload assets.
 */
function heritage_preload_assets()
{
	if (heritage_get_custom_logo_url()) : ?>
		<link rel="preload" href="<?php echo esc_url(heritage_get_custom_logo_url()); ?>" as="image">
	<?php endif;
}

add_action('wp_head', 'heritage_preload_assets', 1);
