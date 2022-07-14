<?php
add_action('acf/init', 'template_acf_init_block_types');

function template_acf_init_block_types()
{
	if (function_exists('acf_register_block_type')) {
		$homeURL = home_url();

		// Hero Banner - Home
		acf_register_block(array(
			'name'            => 'hero-banner-home',
			'title'           => __('Hero Banner - Home'),
			'description'     => __('A custom home page hero banner block.'),
			'category'        => 'acf-blocks',
			'icon'            => array(
				// Specifying a background color to appear with the icon e.g.: in the inserter.
				'background' => '#004ea8',
				// Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
				'foreground' => '#fff',
				// Specifying a dashicon for the block
				'src'        => 'admin-home',
			),
			'keywords'        => array('hero', 'banner', 'home'),
			'post_types'      => array('page'),
			'mode'            => 'auto',
			'supports'        => array(
				'anchor'        => true,
				'align'         => false,
				'align_text'    => true,
				'align_content' => 'matrix',
				'full_height'   => true,
				'multiple'      => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/hero_banner.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Hero Banner - Common
		acf_register_block(array(
			'name'            => 'hero-banner-common',
			'title'           => __('Hero Banner - Common'),
			'description'     => __('A custom Hero Banner block.'),
			'category'        => 'acf-blocks',
			'icon'            => array(
				// Specifying a background color to appear with the icon e.g.: in the inserter.
				'background' => '#004ea8',
				// Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
				'foreground' => '#fff',
				// Specifying a dashicon for the block
				'src'        => 'cover-image',
			),
			'keywords'        => array('hero', 'banner', 'common'),
			'mode'            => 'auto',
			'supports'        => array(
				'align'    => false,
				'multiple' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/herocommon.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Carousel - Logos Block
		acf_register_block(array(
			'name'            => 'carousel-logos',
			'title'           => __('Carousel - Logos'),
			'description'     => __('Logo Carousel.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('carousel logos'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/carousel_logos.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Carousel - Cards Block
		acf_register_block(array(
			'name'            => 'carousel-cards',
			'title'           => __('Carousel - Cards'),
			'description'     => __('Cards Carousel.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('carousel', 'card'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/carouselcards.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Carousel - Testimonials
		acf_register_block(array(
			'name'            => 'carousel-testimonials',
			'title'           => __('Carousel - Testimonials'),
			'description'     => __('Testimonials Carousel.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('carousel', 'testimonial'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/carouseltestimonials.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Featured Resource Block
		acf_register_block(array(
			'name'            => 'featured-resource',
			'title'           => __('Featured Resource'),
			'description'     => __('A custom Content Block.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('Featured Resource'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/featuredresource.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Simple Icons Block
		acf_register_block(array(
			'name'            => 'simple-icons',
			'title'           => __('Simple Icons'),
			'description'     => __('Simple Icons.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('simple', 'icon'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/simpleicons.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// CTA - Side Form Block
		acf_register_block(array(
			'name'            => 'cta-side-form',
			'title'           => __('CTA - Side Form'),
			'description'     => __('CTA with Side Form.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('cta', 'side', 'form'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/ctasideform.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Media Object Block
		acf_register_block(array(
			'name'            => 'media-object',
			'title'           => __('Media Object'),
			'description'     => __('Media with Side Content.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('media', 'object'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/mediaobject.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Media Content Rows Block
		acf_register_block(array(
			'name'            => 'media-content-rows',
			'title'           => __('Media Content Rows'),
			'description'     => __('Rows of Media with Content.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('media', 'content', 'rows'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/mediacontentrows.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));

		// Related Case Studies Block
		acf_register_block(array(
			'name'            => 'related-case-studies',
			'title'           => __('Related Case Studies'),
			'description'     => __('Related Case Studies.'),
			'category'        => 'acf-blocks',
			'icon'            => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"></path></svg>',
			'keywords'        => array('related', 'case', 'studies'),
			'mode'            => 'auto',
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('content' => __('<img src="' . $homeURL . '/wp-content/uploads/2022/01/relatedcasestudy.png">')),
				),
			),
			'render_callback' => 'template_acf_block_render_callback',
		));
	}
}

/**
 * A callback function to output the block's HTML.
 *
 * @param $block
 */
function template_acf_block_render_callback($block, $content = '', $is_preview = false, $post_id = 0)
{
	// Convert name ("acf/hero-block") into path friendly slug ("hero-block")
	$slug = str_replace('acf/', '', $block['name']);

	// Include a template part from within the "template-parts/block" folder
	if (file_exists(get_theme_file_path("/template-parts/blocks/$slug.php"))) {
		include(get_theme_file_path("/template-parts/blocks/$slug.php"));
	}
}

/**
 * Heritage Gutenberg Admin Style.
 */
function heritage_gutenberg_admin_styles()
{
	echo '
<style>
	/* Main column width */
	.wp-block {
		max-width: 1920px;
	}

	/* Width of "wide" blocks */
	.wp-block[data-align="wide"] {
		max-width: 1280px;
	}

	/* Width of "full-wide" blocks */
	.wp-block[data-align="full"] {
		max-width: none;
	}
</style>';
}

add_action('admin_head', 'heritage_gutenberg_admin_styles');

/**
 * Modify the path to the icons' directory.
 */
add_filter('acf_icon_path_suffix', function ($path_suffix) {
	return 'dist/images/acf-icons/'; // After dist/ folder you can define folder structure
});

/**
 * Modify the URL to the icons' directory to display on the page.
 */
add_filter('acf_icon_url', function ($path_suffix) {
	return get_stylesheet_directory_uri();
});
