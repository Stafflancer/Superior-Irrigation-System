<?php
/**
 * Simple Icons Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$icon_columns = get_field('columns');

// If no rows have been added, then bail.
if (empty($icon_columns)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block simple-icons m-0 p-0 relative w-100';

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
$button  = get_field('button');

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
				<?php
				if (!empty($heading) || !empty($content)):
					echo '<div class="heading">';
					echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
					echo $content;
					echo '</div>';
				endif;
				?>
				<?php if (!empty($icon_columns) || !empty($button)): ?>
					<div class="icons-block">
						<?php if (have_rows('columns')): ?>
							<ul>
								<?php
								while (have_rows('columns')): the_row();
									$icon = get_the_svg(get_sub_field('icon'));
									$head = get_sub_field('heading');
									$cont = get_sub_field('content');
									?>
									<li>
										<?php if (!empty($icon)): ?>
											<div class="simple-icons equalize-icon">
												<img src="<?php echo $icon; ?>" alt="<?php echo $head; ?>"/>
											</div>
										<?php endif; ?>

										<?php if (!empty($head) || !empty($cont)): ?>
											<div class="icons-text">
												<?php
												echo !empty($head) ? '<h3>' . $head . '</h3>' : '';
												echo !empty($cont) ? '<p>' . $cont . '</p>' : '';
												?>
											</div>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>

						<?php if (!empty($button['button'])): ?>
							<div class="wp-block-buttons<?php echo esc_attr(!empty($blockSettings['align_text'] && 'text-center' == $blockSettings['align_text']) ? ' justify-center' : ''); ?>">
								<?php heritage_display_block_button($button); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
