<?php
wp_enqueue_style('side-form-styles', get_template_directory_uri() . '/static/css/modules/side-form/side-form.css', '', '', 'all');
wp_enqueue_script('side-form-js', get_template_directory_uri() . '/static/js/modules/side-form/side-form.js', '', '', true);

$title = get_field('title');
$text = get_field('text');
$form_code = get_field('form_code');

// Create id attribute allowing for custom "anchor" value.
$id = 'side-form' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'side-form';

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
    <div class="container section-holder <?php echo esc_attr($blockSettings['text_color']); ?> <?php echo esc_attr($blockSettings['animation']); ?>">
        <?php if ($title || $text) { ?>
            <div class="content-holder wow fadeIn">
                <?php if ($title) { ?>
                    <h3 class="<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $title; ?></h3>
                <?php } ?>
                <?php if ($text) { ?>
                    <div class="text <?php echo esc_attr($blockSettings['text_color']); ?>"><?php echo $text; ?></div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="form-holder wow fadeIn">
            <?php echo do_shortcode($form_code); ?>
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
