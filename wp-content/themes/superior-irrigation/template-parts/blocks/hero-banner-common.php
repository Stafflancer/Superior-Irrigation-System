<?php
/**
 * Hero Banner Block Template.
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
$sectionClassName = 'content-block featured-resource m-0 p-0 relative w-100';

if (!empty($block['className'])) {
	$sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

/**
 * Block Content
 */
// Load values and assign defaults.
$heading   = get_field('heading');
$content   = get_field('content');
$has_image = get_field('has_side_image');

if ($has_image):
	$hasClass             = '';
	$side_image           = get_field('side_image');
	$banner_content_class = 'col-12 col-lg-6 banner-content order-2 order-lg-1';
	$card_image_content_class  = 'col-12 col-lg-6 mb-5 mb-lg-0 order-1 order-lg-2';
else:
	$hasClass = ' center';
	$banner_content_class = 'col-12 banner-content text-center';
	$card_image_content_class  = 'd-none';
endif;

// Start a <container> with possible block options.
heritage_display_block_background_options([
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'id'        => $id, // Container id.
	'class'     => $sectionClassName, // Container class.
]);
if (!empty($heading) || !empty($content)):
    ?>
    <div class="container">
        <div class="row justify-content-between align-items-center flex-wrap">
            <div class="<?php echo $banner_content_class; ?>">
                <div class="inner-banner-content position-relative">
                    <?php
                    if (function_exists('bcn_display')):
                        bcn_display();
                    endif;

                    echo !empty($heading) ? '<h2>' . $heading . '</h2>' : '';
                    echo $content;
                    ?>
                </div>
            </div>

            <?php if ($has_image && !empty($side_image)): ?>
                <div class="<?php echo $card_image_content_class; ?>">
                    <img src="<?php echo $side_image['url']; ?>" class="w-100" alt="<?php echo $side_image['alt']; ?>"/>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
