<?php
wp_enqueue_style('subpage-listing-styles', get_template_directory_uri() . '/static/css/modules/subpage-listing/subpage-listing.css', '', '', 'all');

$heading = get_field('heading');
$content = get_field('content');
$subpages = get_field('subpages');
$button_1 = get_field('button_1');
$button_2 = get_field('button_2');

// If no rows have been added, then bail.
if (empty($subpages)) {
    return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'subpage-listing-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'subpage-listing';

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
        <div class="breadcrumbs">
            <span><?php the_title(); ?></span>
        </div>
        <?php if ($heading) { ?>
            <h2 class="<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $heading; ?></h2>
        <?php }
        if ($content) { ?>
            <div class="content-block <?php echo esc_attr($blockSettings['text_color']); ?>">
                <?php echo $content; ?>
            </div>
        <?php }
        if (!empty($subpages)) { ?>
        <div class="card-main">
            <div class="cards">
                <?php foreach ($subpages as $page_id) : ?>
                    <a href="<?php echo get_the_permalink($page_id); ?>" class="card">
                        <?php
                        $image = get_the_post_thumbnail($page_id);
                        if ($image) { ?>
                            <div class="image">
                                <?php echo $image; ?>
                            </div>
                        <?php } ?>

                        <div class="heading">
                            <?php echo get_the_title($page_id); ?> >
                        </div><?php 
                        $content = get_field("short_description", $page_id);
                        if ($content) { ?>
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        <?php } ?>

                        <div class="btn-holder">
                            <span class="custom-btn btn-theme-yellow">
                                <?php _e('Learn more', 'tps'); ?>
                            </span>
                        </div> 
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php } ?>
            <div class="buttons product-btns"><?php
            if ($button_1) 
            {
                $button_1_style = get_field('button_1_style');
                $button_1_color = get_field('button_1_color');

                if ($button_1 == '') {
                    return '';
                }                   
                $buttonClass = ('fill' === $button_1_style) ? 'has-background btn-' . $button_1_color : 'is-outlined btn-outline-' . $button_1_color;

                // Print our block container with options.
                printf('<div class="wp-block-button"><a href="%s" class="custom-btn %s">%s</a></div>', esc_url($button_1['url']), esc_attr($buttonClass), esc_attr($button_1['title']));
            }
            if ($button_2) 
            {
                $button_2_style = get_field('button_2_style');
                $button_2_color = get_field('button_2_color');

                if ($button_2 == '') {
                    return '';
                }                   
                $buttonClass = ('fill' === $button_2_style) ? 'has-background btn-' . $button_2_color : 'is-outlined btn-outline-' . $button_2_color;

                // Print our block container with options.
                printf('<div class="wp-block-button"><a href="%s" class="custom-btn %s">%s</a></div>', esc_url($button_2['url']), esc_attr($buttonClass), esc_attr($button_2['title']));
            }  ?>
               
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
