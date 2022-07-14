<?php
/**
 * The header for our theme
 *
 * This is the template that displays all the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heritage
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;700&family=Lato:wght@400;700&display=swap">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'heritage'); ?></a>
	<header id="masthead" class="site-header shadow-sm position-fixed bg-white w-100 py-4 position-fixed top-0 start-0 end-0">
		<div class="container d-flex justify-content-between align-items-center">
			<?php
			$logo_id = get_field('header_logo', 'options');
			if ($logo_id):
				?>
				<div class="site-branding header-logo w-100">
					<a href="<?php echo get_site_url(); ?>" class="logo d-block w-100 h-100" title="<?php bloginfo('name'); ?>">
						<?php echo wp_get_attachment_image($logo_id, 'full'); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="d-flex justify-content-end align-items-center">
				<nav id="site-navigation" class="header-menu main-navigation d-block">
					<button class="menu-toggle d-block d-md-none" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'heritage' ); ?></button>
					<?php
					wp_nav_menu(array(
						'menu'           => 'Primary Menu',
						'menu_class'     => 'menu-toggle menu mob',
						'container'      => false,
						'theme_location' => 'primary',
					));
					?>
				</nav>

				<?php if (have_rows('header_buttons', 'options')): ?>
				<div class="buttons-row wp-block-buttons d-flex justify-content-center justify-content-lg-end align-items-start ms-2">
					<?php
					while (have_rows('header_buttons', 'options')): the_row();
						$button = get_sub_field('button');

						if (!empty($button)):
							heritage_display_block_button($button);
						endif;
					endwhile;
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- #masthead -->
