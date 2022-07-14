<?php
wp_enqueue_style('media-content-rows-styles', get_template_directory_uri() . '/static/css/modules/media-content-rows/media-content-rows.css', '', '', 'all');


// If no rows have been added, then bail.
if (!have_rows('content_rows')) {
    return '';
}

// Create id attribute allowing for custom "anchor" value.
$id = 'media-content-rows-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$sectionClassName = 'media-content-rows';

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
if(have_rows('content_rows'))
{ ?>
    <div class="<?php echo esc_attr($layoutClassName); ?>">
        <div class="container <?php echo esc_attr($blockSettings['animation']); ?>">
            <div class="section-holder"><?php 
                while (have_rows('content_rows')) 
                {
                    the_row();
                    $media_initial_position = get_sub_field('media_initial_position');
                    while(have_rows('media'))
                    {
                        the_row();
                        $fill_column = get_sub_field('fill_column');
                        $side_image = get_sub_field('side_image');
                        $background_color = get_sub_field('background_color');
                        $heading = get_sub_field('heading');
                        $media_descriptrion = get_sub_field('media_descriptrion'); ?>
                        <div class="main-media-block has-background bg-<?php echo $background_color; ?> <?php echo "position-".$media_initial_position; ?>"><?php 
                            if (!empty($side_image)) 
                            { ?>
                                <div class="image">
                                    <img src="<?php echo $side_image['url']; ?>">
                                </div><?php 
                            } ?>
                            <div class="content-block-service">
                                <div class="content-col">
                                <?php if (!empty($heading)) { ?>
                                    <h3 class=""><?php echo $heading; ?></h3>
                                <?php }
                                if (!empty($media_descriptrion)) { ?>
                                <div class="content <?php echo esc_attr($blockSettings['text_color']); ?>"><?php echo $media_descriptrion; ?></div>
                                <?php }
                                ?>
                            </div><?php
                            $count = 0;

                             if (have_rows('add_buttons')) { ?>
                                <?php while (have_rows('add_buttons')) {
                                        the_row();
                                        $count ++;          
                                      }
                                    }
                            if($count > 1){
                                $multiplebtn = 'multiplebtns';
                            }else{
                                $multiplebtn = '';
                            }  
                            if (have_rows('add_buttons')) { ?>    
                                <div class="btns <?php echo $multiplebtn; ?>">
                                    <?php while (have_rows('add_buttons')) {
                                        the_row();
                                        $multiple_button = get_sub_field('multiple_button');
                                        $button_style = get_sub_field('button_style');
                                        $all_color_picker = get_sub_field('all_color_picker');
                                        if ($multiple_button == '') {
                                            return '';
                                        }
                                        $buttonClass = ('fill' === $button_style) ? 'has-background btn-' . $all_color_picker : 'is-outlined btn-outline-' . $all_color_picker;

                                            // Print our block container with options.
                                        printf('<div class="wp-block-button"><a href="%s" class="custom-btn %s">%s</a></div>', esc_url($multiple_button['url']), esc_attr($buttonClass), esc_attr($multiple_button['title'])); 
                                    } ?>
                                </div><?php
                             } ?>
                            </div>
                        </div><?php
                    } ?>
            
                <?php } ?>
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
    <?php if (have_rows('bg_images')) : ?>
        <div class="bg-images">
            <?php while (have_rows('bg_images')) : the_row();
                $image = get_sub_field('image');
                if (!empty($image)) :
                    echo wp_get_attachment_image($image, 'full');
                endif;
            endwhile; ?>
        </div>
    <?php endif; ?>
    </section><?php
} ?>
