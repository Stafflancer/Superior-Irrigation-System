<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Heritage
 */

if (!function_exists('heritage_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function heritage_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf($time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()), esc_attr(get_the_modified_date(DATE_W3C)), esc_html(get_the_modified_date()));

		$posted_on = sprintf(/* translators: %s: post date. */ esc_html_x('Posted on %s', 'post date', 'heritage'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>');

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('heritage_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function heritage_posted_by()
	{
		$byline = sprintf(/* translators: %s: post author. */ esc_html_x('by %s', 'post author', 'heritage'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>');

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('heritage_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function heritage_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'heritage'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'heritage') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'heritage'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'heritage') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(sprintf(wp_kses(/* translators: %s: post title */ __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'heritage'), array(
				'span' => array(
					'class' => array(),
				),
			)), wp_kses_post(get_the_title())));
			echo '</span>';
		}

		edit_post_link(sprintf(wp_kses(/* translators: %s: Name of current post. Only visible to screen readers */ __('Edit <span class="screen-reader-text">%s</span>', 'heritage'), array(
			'span' => array(
				'class' => array(),
			),
		)), wp_kses_post(get_the_title())), '<span class="edit-link">', '</span>');
	}
endif;

if (!function_exists('heritage_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function heritage_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail('post-thumbnail', array(
					'alt' => the_title_attribute(array(
						'echo' => false,
					)),
				));
				?>
			</a>

		<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;

if (!function_exists('string_limit_character')) :
	/**
	 * Word / Character / Paragraph limit.
	 *
	 * @param $string
	 * @param $word_limit
	 *
	 * @return string
	 */

	function string_limit_words($string, $word_limit)
	{
		$words = explode(' ', $string, ($word_limit + 1));
		if (count($words) > $word_limit) {
			array_pop($words);
		}

		return implode(' ', $words);
	}
endif;

if (!function_exists('string_limit_character')) :
	function string_limit_character($string, $limit)
	{
		$title_length = strlen($string);
		if ($title_length > $limit && ($title_length + 2) > $limit):
			/* new code for get string with word */ $s = substr($string, 0, $limit);
			$string                                    = substr($s, 0, strrpos($s, ' '));

			//$string = substr($string, 0, $limit - 1);
			$string = rtrim($string) . '...';
		endif;

		return $string;
	}
endif;

if (!function_exists('phone_number_format')) :
	/**
	 * @param $number
	 *
	 * @return array|string|string[]|null
	 */
	function phone_number_format($number)
	{
		// Allow only Digits, remove all other characters.
		$number = preg_replace("/[^\d]/", "", $number);
		// get number length.
		$length = strlen($number);
		// if number = 10
		if ($length == 10) {
			$number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
		}

		return $number;
	}
endif;

if (!function_exists('get_the_svg')) :
	/**
	 * @param $filename
	 *
	 * @return string
	 */
	function get_the_svg($filename)
	{
		if (empty($filename)) {
			return '';
		}

		return get_template_directory_uri() . '/dist/images/acf-icons/' . $filename . '.svg';
	}
endif;

/**
 * Return SVG icon code linked to SVG definitions file.
 *
 * @param $icon
 *
 * @return string
 */
function svg_icon($icon, $class = '')
{
	return sprintf('<svg class="svg-icon %s" aria-hidden="true"><use xlink:href="#icon-%s"></use></svg>', $class, trim($icon, "'"));
}

/**
 * Load an inline SVG.
 *
 * @param string $filename Full SVG filename, including filetype, i.e. icon.svg
 * @param string $svg_path Optional. Add the path to your SVG directory inside your theme.
 */
function heritage_load_inline_svg($filename, $svg_path = '/dist/images/svg-icons/')
{
	// Check the SVG file exists
	if (file_exists(get_stylesheet_directory() . $svg_path . $filename)) {
		// Load and return the contents of the file
		return file_get_contents(get_stylesheet_directory_uri() . $svg_path . $filename);
	}

	// Return a blank string if we can't find the file.
	return '';
}
