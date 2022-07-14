<?php

if (have_rows('testimonials_slider')) {
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/static/css/slick.min.css', '', '', 'all');
}

wp_enqueue_style('carousel-testimonials-styles', get_template_directory_uri() . '/static/css/modules/carousel-testimonials/carousel-testimonials.css', '', '', 'all');

if (have_rows('testimonials_slider')) {
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/static/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('carousel-testimonials-js', get_template_directory_uri() . '/static/js/modules/carousel-testimonials/carousel-testimonials.js', '', '', true);
}

// If no rows have been added, then bail.
if (!have_rows('testimonials_slider')) {
    return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'carousel-testimonials-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'carousel-testimonials';

if (!empty($block['className'])) {
    $sectionClassName .= ' ' . $block['className'];
}

$sectionClassName .= $block['align'] ? ' align' . $block['align'] : '';

// Create class attribute allowing for custom "block_width", "full_height", "align_text" and "align_content" values.
$layoutClassName = '';

// Parse settings.
$blockSettings = get_template_acf_block_settings($block);

// Join layout classes for the block, this differs per block.
$layoutClassName = join(' ', [
    $layoutClassName,
    $blockSettings['align_text'],
    $blockSettings['align_content']
]);

/**
 * Block Content
 */
// Load values and assign defaults.
$video_mp4 = get_field('video_mp4');
$video_webm = get_field('video_webm');

// Start a <container> with possible block options.
heritage_display_block_background_options([
    'container' => 'section', // Any HTML5 container: section, div, etc...
    'id' => $id, // Container id.
    'class' => $sectionClassName, // Container class.
]);
?>
<div class="<?php echo esc_attr($layoutClassName); ?>">
    <div class="container <?php echo esc_attr($blockSettings['animation']); ?>">
        <div class="section-holder">
            <h3 class="has-heading-color text-heritage-blue"><?php the_field('testimonial_heading'); ?></h3>
            <div class="testimonials_slider">
                <?php while (have_rows('testimonials_slider')) {
                    the_row();
                    $logo = get_sub_field('logo');
                    $info = get_sub_field('info'); ?>

                    <div class="testimonials-item">
                        <div class="holder">
                            <?php if (!empty($logo)) { ?>
                                <div class="logo">
                                    <?php echo wp_get_attachment_image($logo, 's_91'); ?>
                                </div>
                            <?php } ?>

                            <div class="text-holder">
                                <div class="text">
                                    <?php the_sub_field('text');; ?>
                                </div>

                                <?php if (!empty($info)) { ?>
                                    <div class="info">
                                        <?php echo $info; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if ($video_mp4 || $video_webm): ?>
        <video id="hero-video" class="video" playsinline webkit-playsinline loop muted autoplay>
            <?php
            if (!empty($video_webm)):
                echo '<source src="' . $video_webm['url'] . '" type="video/mp4">';
            endif;

            if (!empty($video_mp4)):
                echo '<source src="' . $video_mp4['url'] . '" type="video/mp4">';
            endif;
            ?>
        </video>
    <?php endif; ?>
</div>
</section>
