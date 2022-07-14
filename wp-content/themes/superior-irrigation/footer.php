<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heritage
 */
?>
<footer id="colophon" class="site-footer position-relative pt-5 pb-4">
	<div class="container">
		<section class="row mb-5">
			<?php
			$footer_logo = get_field('footer_logo', 'option');
			if (!empty($footer_logo)):
				?>
				<div class="footer-logo col-12">
					<a href="<?php echo get_site_url(); ?>" class="logo" title="<?php bloginfo('name'); ?>">
						<?php echo wp_get_attachment_image($footer_logo, 'full'); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="footer-menu col-12 col-lg-8">
				<?php wp_nav_menu(array(
					'menu'           => 'Footer Menu',
					'menu_class'     => '',
					'container'      => false,
					'theme_location' => 'footer',
				)); ?>
			</div>
			<?php if (have_rows('footer_buttons', 'options')): ?>
			<div class="footer-buttons col-12 col-lg-4">
				<div class="buttons-row wp-block-buttons d-flex justify-content-center justify-content-lg-end align-items-start">
					<?php
					while (have_rows('footer_buttons', 'options')): the_row();
						$button = get_sub_field('button');

						if (!empty($button)):
							heritage_display_block_button($button);
						endif;
					endwhile;
					?>
				</div>
			</div>
			<?php endif; ?>
		</section>

		<?php
		if (have_rows('address', 'options')):
			$phone = get_field('phone', 'options');
			?>
			<section class="footer-address row mb-4">
				<div class="address col-12 col-lg-10">
					<p>
						<?php
						while (have_rows('address', 'options')): the_row();
							echo !empty(get_sub_field('title')) ? '<span class="me-1">' . get_sub_field('title') . '</span>' : '';
							echo !empty(get_sub_field('address_line_1')) ? '<span class="me-1">' . get_sub_field('address_line_1') . '</span>' : '';
							echo !empty(get_sub_field('address_line_2')) ? '<span class="me-0">' . get_sub_field('address_line_2') . '</span>' : '';
						endwhile;
						?>
					</p>
					<p><?php echo !empty($phone) ? '<a href="' . $phone['url'] . '" class="text-dark-blue" title="Call Us">' . $phone['title'] . '</a>' : ''; ?></p>
				</div>
				<?php
				$social_media_platforms = get_field('social_media', 'options');

				if ($social_media_platforms):?>
					<div class="social-media col-12 col-lg-2 d-flex justify-content-center justify-content-lg-end align-items-top">
						<?php
						foreach ($social_media_platforms as $social_media_name => $social_media_url):
							if (!empty($social_media_url)):
								printf('<a href="%s" class="align-items-center mx-1" title="%s">' . svg_icon($social_media_name) . '</a>', esc_url($social_media_url), esc_attr($social_media_name));
								?>
							<?php
							endif;
						endforeach;
						?>
					</div>
				<?php endif; ?>
			</section>
		<?php
		endif;
		?>

		<?php if (have_rows('copyright', 'option')): ?>
			<section class="row">
				<div class="copyright col-12">
				<?php
				while (have_rows('copyright', 'option')): the_row();
					$copyright = get_sub_field('copyright_text');

					printf('&copy; %d %s', esc_html(gmdate('Y')), esc_html($copyright));

					if (have_rows('copyright_links')):
						while (have_rows('copyright_links')): the_row();
							$link = get_sub_field('link');
							if (!empty($link)):
								printf('<span class="divider"> | </span><a href="%s" class="d-inline" title="%s">%s</a>', esc_url($link['url']), esc_attr($link['title']), esc_html($link['title']));
							endif;
						endwhile;
					endif;
				endwhile;
				?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php
if (function_exists('heritage_load_inline_svg')) {
	echo heritage_load_inline_svg('svg-icons-defs.svg');
}
?>
</body>
</html>
