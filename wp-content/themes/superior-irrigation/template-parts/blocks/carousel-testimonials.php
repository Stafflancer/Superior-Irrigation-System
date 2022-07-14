<?php
/**
 * Testimonials Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$testimonials = get_field('testimonials');

// If no rows have been added, then bail.
if (empty($logos)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block testimonials-block m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

/**
 * Block Content
 */
// Load values and assign defaults.
//$heading = get_field('heading');
//$content = get_field('content');

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
	?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="testimonials-slider">
					<?php
					foreach ($testimonials as $post): setup_postdata($post);
						$p = $post->ID;
						?>
						<div class="testimonials-slide">
							<h3><?php echo get_the_content($p); ?></h3>
							<span>&minus; <?php echo get_the_title($post); ?></span>
						</div>
					<?php
					endforeach;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
