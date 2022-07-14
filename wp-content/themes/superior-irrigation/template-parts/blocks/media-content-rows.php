<?php
/**
 * Media Content Rows Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$content_rows = get_field('content_rows');

// If no rows have been added, then bail.
if (empty($content_rows)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block media-content-rows m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

/**
 * Block Content
 */
// Load values and assign defaults.
$heading  = get_field('heading');
$content  = get_field('content');
$position = get_field('media_initial_position');

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
?>
	<div class="container">
		<?php if (!empty($heading) || !empty($content)): ?>
			<div class="row">
				<div class="col-12">
					<?php
					echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
					echo $content;
					?>
				</div>
			</div>
		<?php endif; ?>

		<?php if (have_rows('content_rows')): ?>
			<div class="media-with-content-wrap">
				<?php
				while (have_rows('content_rows')): the_row();
					$media   = get_sub_field('media');
					$pattern = $media['add_pattern'];
					if (!empty($media['image']['url'])):
						$card_image = $media['image']['url'];
					endif;

					$content = get_sub_field('content');
					$head    = $content['heading'];
					$cont    = $content['content'];
					$button  = $content['button'];

					if (!empty($media) || !empty($content)):
						?>
						<div class="media-with-content-main">
							<?php
							echo ($pattern) ? '<div class="pattern"></div>' : '';
							echo !empty($card_image) ? '<div class="media-img" style="background-image:url(' . $card_image . ');"></div>' : '';

							if (!empty($head) || !empty($cont)):
								?>
								<div class="media-content">
									<?php
									echo !empty($head) ? '<h2>' . $head . '</h2>' : '';
									echo $cont;
									?>
									<?php if (!empty($button['button'])): ?>
										<div class="wp-block-buttons<?php echo esc_attr(!empty($blockSettings['align_text'] && 'text-center' == $blockSettings['align_text']) ? ' justify-center' : ''); ?>">
											<?php heritage_display_block_button($button); ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php
					endif;
				endwhile;
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
