<?php
/**
 * Carousel Logos Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$logos = get_field('logos');

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
$sectionClassName = 'content-block logos-block m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

/**
 * Block Content
 */
// Load values and assign defaults.
$heading = get_field('heading');
$content = get_field('content');

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
?>
	<?php if (!empty($heading) || !empty($content)): ?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
					echo get_field('content');
					?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($logos): ?>
		<div class="logos-slider">
			<?php foreach ($logos as $logo): ?>
				<div class="logo-slide">
					<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
