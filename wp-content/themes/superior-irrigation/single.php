<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Heritage
 */

get_header();
?>
	<section class="blog-single">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="blog-single-wrap">
						<span>Blog Post</span>
						<?php while (have_posts()) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<div class="date-name">
								<ul>
									<li><?php the_date(); ?></li>
									<li><?php the_author_meta('display_name'); ?></li>
								</ul>
						        <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?>
							</div>
                            <?php
							echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'large');

							the_content();

							the_post_navigation(array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous', 'heritage') . '</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('Next', 'heritage') . '</span>',
								));
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
$related = get_posts(array(
	'category__in' => wp_get_post_categories($post->ID),
	'numberposts'  => 9,
	'post__not_in' => array($post->ID),
));
if ($related):
	?>
	<section class="related-reads light_text">
		<div class="block_bg_color astral"></div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading"><h2>Related Reads</h2></div>
				</div>
			</div>
			<div class="cards-block-wrap">
				<div class="cards-block-slider">
					<?php
					global $post;
					foreach ($related as $post): setup_postdata($post);
						?>
						<div class="card-slide d-flex">
							<?php get_template_part('template-parts/card', 'insight'); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php
    wp_reset_postdata();
endif;
get_footer();
