<?php
/*
 * Template Name: Gated Content
 */
get_header();
$pid        = get_the_ID();
$feat       = wp_get_attachment_url(get_post_thumbnail_id($pid));
$form_title = get_field('form_title');
$form       = get_field('add_form');
?>
	<section class="gated-content-page light_text">
		<div class="block_bg_color astral"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="gated-content-wrap">
						<div class="gated-content-content">
							<?php
							if (function_exists('bcn_display')):
								echo bcn_display();
							endif;
							while (have_posts()) : the_post();
								the_content();
							endwhile;
							?>
						</div>
						<div class="gated-content-form">
							<?php
							echo !empty($feat) ? '<img src="' . $feat . '" alt="">' : '';

							echo !empty($form_title) ? '<h3>' . $form_title . '</h3>' : '';
							echo do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true" tabindex="49"]');
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
