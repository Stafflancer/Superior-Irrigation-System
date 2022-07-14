<?php
/**
 * Media Object Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$media        = get_field('media');
$content_data = get_field('content');

// If no rows have been added, then bail.
if (empty($media) && empty($content_data)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block media-object-block m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

/**
 * Block Content
 */
// Load values and assign defaults.
$media_position = get_field('media_position');
$image          = $media['image'];

$heading = $content_data['heading'];
$content = $content_data['content'];
$button  = $content_data['button'];

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
?>
	<div class="media-object-block-main <?php echo $media_position; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="media-object-block-wrap">
						<?php if (!empty($heading) || !empty($content)): ?>
							<div class="media-object-block-content">
								<?php
								echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
								echo $content;
								?>

								<?php if (!empty($button['button'])): ?>
									<div class="wp-block-buttons<?php echo esc_attr(!empty($blockSettings['align_text'] && 'text-center' == $blockSettings['align_text']) ? ' justify-center' : ''); ?>">
										<?php heritage_display_block_button($button); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php echo !empty($image) ? '<div class="media-object-block-img" style="background-image:url(' . $image . ');"></div>' : ''; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
