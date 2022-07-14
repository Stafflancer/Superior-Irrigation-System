<?php
/**
 * Related Case Studies Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package Heritage
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'content-block related-reads related-case-studies m-0 p-0 relative w-100';

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
$display = get_field('display');

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
					<div class="heading">
						<?php
						echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
						echo get_field('content');
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php
		if ($display == 'Manual'):
			$case_studies = get_field('case_studies');
			if ($case_studies):
				?>
				<div class="related-case-studies-wrap">
					<div class="related-case-studies-slider">
						<?php
						foreach ($case_studies as $post):
							setup_postdata($post);
							$terms = get_the_terms($post->ID, 'topic');
							if ($terms && !is_wp_error($terms)) :
								$term_names = array();

								foreach ($terms as $term) {
									$term_names[] = $term->name;
								}
								$terms = join(", ", $term_names);
							endif;
							?>
							<div class="related-studies-slider">
								<a href="<?php echo get_the_permalink($post->ID); ?>"
								   title="<?php echo get_the_title($post->ID); ?>">
									<div class="cards-block-content equalize-card">
										<span><?php echo $terms; ?></span>
										<div class="equalize-card-heading">
											<h3><?php echo get_the_title($post->ID); ?></h3></div>
										<div class="btn-wrap"><span class="btn btn-elephant">View</span></div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php
				wp_reset_postdata();
			endif;
		else:
			$args = array(
				'post_type'      => 'case_study',
				'posts_per_page' => 6,
			);
			$loop = new WP_Query($args);
			if ($loop->have_posts()):
				?>
				<div class="related-case-studies-wrap">
					<div class="related-case-studies-slider">
						<?php
						while ($loop->have_posts()) : $loop->the_post();
							$terms = get_the_terms($loop->ID, 'topic');
							if ($terms && !is_wp_error($terms)) :
								$term_names = array();
								foreach ($terms as $term) {
									$term_names[] = $term->name;
								}
								$terms = join(", ", $term_names);
							endif;
							?>
							<div class="related-studies-slider">
								<a href="<?php echo get_the_permalink($loop->ID); ?>"
								   title="<?php echo get_the_title($loop->ID); ?>">
									<div class="cards-block-content equalize-card">
										<span><?php echo $terms; ?></span>
										<div class="equalize-card-heading">
											<h3><?php echo get_the_title($loop->ID); ?></h3></div>
										<div class="btn-wrap"><span class="btn btn-elephant">View</span></div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php
				wp_reset_postdata();
			endif;
		endif;
		?>
	</div>
</section>
