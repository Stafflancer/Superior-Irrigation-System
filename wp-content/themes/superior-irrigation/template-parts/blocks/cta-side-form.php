<?php
/**
 * CTA with Side Image Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$content = get_field('content');
$form    = get_field('form');

// If no rows have been added, then bail.
if (empty($content) && empty($form)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block side-form-block m-0 p-0 relative w-100';

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
				<div class="cta-content">
					<?php
					$conHeading = $content['heading'];
					$conContent = $content['content'];
					if (!empty($conHeading) || !empty($conContent)):
						echo '<div class="side-form-block-heading">';
						echo !empty($conHeading) ? '<h2>' . $conHeading . '</h2>' : '';
						echo $conContent;
						echo '</div>';
					endif;
					?>
					<div class="cta-form">
						<?php echo do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true" tabindex="49"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
