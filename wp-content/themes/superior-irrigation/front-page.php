<?php
/**
 * The template for displaying static home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package    WordPress
 * @subpackage Heritage
 * @since      Heritage 1.0
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<?php
		while (have_posts()) : the_post();
			the_content();
		endwhile;
		?>
	</main><!-- #main -->

<?php get_footer();
