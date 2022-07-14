<?php
/**
 * Carousel Cards Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

$carousel_cards = get_field('carousel-cards');

// If no rows have been added, then bail.
if (empty($carousel_cards)) {
	return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block cards-block m-0 p-0 position-relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ?  ' align' . $block['align'] : '';

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
	<div class="container">
		<?php if ($heading || $content): ?>
			<div class="row">
				<div class="col-12">
					<?php if (!empty($heading)): ?>
						<h2 class="content-block-title"><?php echo esc_html($heading); ?></h2>
					<?php endif; ?>
					<div class="content-block-description">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if (have_rows('cards')): ?>
			<div class="cards-block-wrap">
				<div class="cards-block-slider">
					<?php
					while (have_rows('cards')): the_row();
						$card_image   = get_sub_field('image');
						$card_heading = get_sub_field('heading');
						$card_content = get_sub_field('content');
						$button       = get_sub_field('button');

						if (!empty($card_image) || !empty($card_heading) || !empty($card_content)) :
							?>
							<div class="card-slide">
								<a href="<?php echo $button['button']['url']; ?>">
									<?php if (!empty($card_image)): ?>
										<div class="card-block-img-wrap position-relative overflow-hidden">
											<div class="card-block-img" style="background-image: url('<?php echo $card_image; ?>');"></div>
										</div>
									<?php endif; ?>

									<?php if (!empty($card_heading) || !empty($card_content)): ?>
										<div class="cards-block-content text-start equalize-card">
											<?php
											echo !empty($card_heading) ? '<div class="equalize-card-heading mb-3"><h3>' . $card_heading . '</h3></div>' : '';
											echo !empty($card_content) ? '<p>' . $card_content . '</p>' : '';
											?>

										</div>
									<?php endif; ?>
								</a>
							</div>
						<?php
						endif;
					endwhile;
					?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
