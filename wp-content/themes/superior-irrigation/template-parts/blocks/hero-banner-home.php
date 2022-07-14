<?php
/**
 * Hero Banner - Common Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$heading = get_field('heading');
$content = get_field('content');

// If no rows have been added, then bail.
if (empty($heading) && $content) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block hero-banner hero-home m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

// Create class attribute allowing for custom "block_width", "full_height", "align_text" and "align_content" values.
$layoutClassName = 'position-relative py-5 d-flex flex-column';

// Parse settings.
$blockSettings = get_template_acf_block_settings($block);

// Join layout classes for the block, this differs per block.
$layoutClassName = join(' ', [
	$layoutClassName,
	$blockSettings['block_width'],
	$blockSettings['full_height'],
	$blockSettings['align_text'],
	$blockSettings['align_content']
]);

/**
 * Block Content
 */
// Load values and assign defaults.
$button     = get_field('button');
$video_mp4  = get_field('video_mp4');
$video_webm = get_field('video_webm');

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
?>
	<div class="hero-banner__container <?php echo esc_attr($layoutClassName); ?>">
		<div class="hero-banner__text-block <?php echo $blockSettings['content_width']; ?><?php echo esc_attr( $blockSettings['animation'] ); ?>">
			<h1 class="heading hero-heading hero-title<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo esc_html( $heading ); ?></h1>
			<div class="hero-content mb-4<?php echo esc_attr($blockSettings['text_color']); ?>">
				<?php echo $content; ?>
			</div>
			<?php if (!empty($button['button'])): ?>
				<div class="wp-block-buttons<?php echo esc_attr(!empty($blockSettings['align_text'] && 'text-center' == $blockSettings['align_text']) ? ' justify-content-center' : ''); ?>">
					<?php heritage_display_block_button($button); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($video_mp4 || $video_webm): ?>
			<video id="hero-video" class="video" playsinline webkit-playsinline loop muted autoplay>
				<?php
				if (!empty($video_webm)):
					echo '<source src="' . $video_webm['url'] . '" type="video/mp4">';
				endif;

				if (!empty($video_mp4)):
					echo '<source src="' . $video_mp4['url'] . '" type="video/mp4">';
				endif;
				?>
			</video>
		<?php endif; ?>
	</div>
</section>
