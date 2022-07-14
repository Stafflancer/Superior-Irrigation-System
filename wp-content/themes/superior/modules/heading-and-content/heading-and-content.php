<?php
wp_enqueue_style('heading-and-content-styles', get_template_directory_uri() . '/static/css/modules/heading-and-content/heading-and-content.css', '', '', 'all');

$title = get_field('heading');
$text = get_field('description');
 
// Create id attribute allowing for custom "anchor" value.
$id = 'heading-and-content' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
 
// Create class attribute allowing for custom "className".
$sectionClassName = 'heading-and-content';

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
    <div class="container <?php echo esc_attr($blockSettings['text_color']); ?>"><div class="section-holder"><?php 
        if ($title || $text) { ?>
            <div class="content-holder wow fadeIn">
                <?php if ($title) { ?>
                    <h3 class="<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $title; ?></h3>
                <?php } ?>
                <?php if ($text) { ?>
                    <div class="text <?php echo esc_attr($blockSettings['text_color']); ?>"><?php echo $text; ?></div>
                <?php } ?>
            </div></div><?php 
        } ?>
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
