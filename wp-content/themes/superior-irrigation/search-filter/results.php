<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}

if ($query->have_posts()) { ?>
	<div class="posts">
		<?php while ($query->have_posts()) {
			$query->the_post();
			$post_type     = get_post_type();
			$post_type_obj = get_post_type_object($post_type); ?>

			<div class="post-card wow fadeInUp">
				<?php
				$thumb = get_the_post_thumbnail();
				$title = get_the_title(); ?>

				<?php if (!empty($thumb)) { ?>
					<div class="thumb">
						<?php echo $thumb; ?>
					</div>
				<?php } ?>

				<div class="content">
					<?php if (!empty($post_type)) { ?>
						<div class="post-type">
							<?php echo $post_type; ?>
						</div>
					<?php }
					if (!empty($title)) { ?>
						<a href="<?php the_permalink(); ?>" class="title">
							<?php echo $title; ?>
						</a>
					<?php } ?>

					<div class="btn-holder">
						<a href="<?php the_permalink(); ?>" class="button primary-orange">
							<?php _e('VIEW', 'fis'); ?>
						</a>
					</div>
				</div>
			</div>
			<?php
		} ?>
	</div>

	<div class="pagination-holder">
		<?php $total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			echo paginate_links(array(
				'format'    => 'page/%#%',
				'current'   => $current_page,
				'total'     => $total_pages,
				'prev_text' => '&#171;',
				'next_text' => '&#187;',
				'mid_size'  => 1,
			));
		} ?>
	</div>
	<?php
} else {
	echo "No Results Found";
}
?>
