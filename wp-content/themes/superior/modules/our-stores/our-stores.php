<?php
wp_enqueue_style('our-stores-styles', get_template_directory_uri() . '/static/css/modules/our-stores/our-stores.css', '', '', 'all');

$title = get_field('title');
$subtitle = get_field('subtitle');
$shortcode = get_field('shortcode');
$store_locations = get_field('store_locations');
$show_breadcrumb = get_field('show_breadcrumb');
// Create id attribute allowing for custom "anchor" value.
$id = 'our-stores-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'our-stores';

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
    <div class="container section-holder <?php echo esc_attr($blockSettings['animation']); ?>"><?php
        if($show_breadcrumb == 1)
        { ?>
            <div class="breadcrumbs"><?php
                $parent_post = get_post()->post_parent;
                if (!empty($parent_post)) 
                { ?>
                    <a href="<?php echo get_permalink($parent_post); ?>">
                        <?php echo get_the_title($parent_post); ?>
                    </a>
                    <span class="divider">/</span><?php 
                } ?>
                <span><?php the_title(); ?></span>
            </div><?php
        } ?>
        <?php if (!empty($title) || !empty($subtitle)) { ?>
            <div class="title-holder">
                <?php if (!empty($title)) { ?>
                    <h3 class="<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $title; ?></h3>
                <?php } ?>
                <?php if (!empty($subtitle)) { ?>
                    <div class="subtitle <?php echo esc_attr($blockSettings['text_color']); ?>"><?php echo $subtitle; ?></div>
                <?php } ?>
            </div>
        <?php }
        if (!empty($shortcode)) {
            echo do_shortcode($shortcode);
        }
        if($store_locations)
        { ?> 
            <div class="locations"><?php 
                foreach ($store_locations as $post) 
                {   ?>
                    <div class="location">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <?php echo get_the_title($post->ID); ?>
                        </a>
                    </div><?php 
                } wp_reset_postdata(); ?>
            </div><?php
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
