<?php
/*
 * Template Name: Thank You
 */

get_header();

$pid  = get_the_ID();
?>
	<section class="thank-you light_text">
		<div class="block_bg_color astral"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="thank-you-wrap">
						<div class="thank-you-content">
							<?php
							if (function_exists('bcn_display')):
								echo bcn_display();
							endif;
							while (have_posts()) : the_post();
								the_content();
							endwhile;
							?>
						</div>
						<?php if (has_post_thumbnail($pid)): ?>
						<div class="thank-you-img">
							<?php echo wp_get_attachment_image(get_post_thumbnail_id($pid), 'medium_large'); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
