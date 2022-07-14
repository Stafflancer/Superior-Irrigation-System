<?php
wp_enqueue_style('simple-cards-block-styles', get_template_directory_uri() . '/static/css/modules/simple-cards-block/simple-cards-block.css', '', '', 'all');

$title = get_field('title');
$subtitle = get_field('subtitle');

// If no rows have been added, then bail.
if (empty($title) && empty($subtitle)) {
    return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'simple-cards-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'simple-cards-block';

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
        <h3 class="heading <?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $title; ?></h3>
        <div class="content <?php echo esc_attr($blockSettings['text_color']); ?>">
            <?php echo $subtitle; ?>
        </div>
        <?php if (have_rows('cards')) : ?>
            <div class="cards-holder">
                <?php
                while (have_rows('cards')): the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                    $description = get_sub_field('description'); ?>

                    <a class="card <?php echo esc_attr($blockSettings['text_color']); ?>">
                        <?php if (!empty($image)) : ?>
                            <div class="image-holder">
                                <?php echo wp_get_attachment_image($image, 'full'); ?>
                            </div>
                        <?php endif; ?>
                        <h5><?php echo $link['title']; ?></h5>
                        <?php if (!empty($description)) : ?>
                            <div class="description">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
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
