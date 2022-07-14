<?php
/**
 * Featured Resource Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$resource = get_field('resource');

// If no rows have been added, then bail.
if (empty($resource)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block featured-resource m-0 p-0 relative w-100';

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
				<div class="featured-resource-content">
					<?php
					if (!empty($resource)):
						$resource_id    = $resource->ID;
						$resource_title = $resource->post_title;
						$resource_type  = $resource->post_type;

						if ('case_study' == $resource_type):
							echo '<span>CASE STUDY: ' . $resource_title . '</span>';
						elseif ('white_paper' == $resource_type):
							echo '<span>WHITE PAPER: ' . $resource_title . '</span>';
						else:
							echo '<span>DATASHEET: ' . $resource_title . '</span>';
						endif;
					endif;

					echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
					echo $content;
					?>

					<a href="<?php echo get_the_permalink($resource_id); ?>" class="btn-white-transparent">Find Out How</a>
				</div>

				<?php
				$feat_image = wp_get_attachment_url(get_post_thumbnail_id($resource_id));
				if (!empty($feat_image)):
					echo '<div class="featured-resource-img" style="background-image:url(' . $feat_image . ');"></div>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>
