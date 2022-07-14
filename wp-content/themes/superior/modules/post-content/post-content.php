<?php wp_enqueue_style('post-content-styles', get_template_directory_uri() . '/static/css/modules/post-content/post-content.css', '', '', 'all'); ?>

<?php
$post_id = get_queried_object_id();
$current_post = get_post($post_id);
$post_content = apply_filters('the_content', $current_post->post_content);
$postimage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'full')); 
if (!empty($args['breadcrubms'])) {
    $breadcrubms = $args['breadcrubms'];
} ?>

<section class="post-content wow fadeIn">
    <div class="container">
        <div class="section-holder">
            <div class="breadcrumbs">
                <a href="<?php echo home_url('/education/'); ?>">
                    <?php _e('About', 'tps'); ?>
                </a>
                <span class="divider">/</span>
                <?php if (!empty($breadcrubms)) { ?>
                    <span><?php echo $breadcrubms; ?></span>
                <?php } ?>
            </div>
           
            <div class="content-holder">
                <h1><strong><?php the_title(); ?></strong></h1>
                <div class="featured-image">
                    <img src="<?php echo $postimage?>">
                </div>
                <?php echo $post_content; ?>
            </div>
            <div class="post-navigation">
                <div class="prev">
                    <?php previous_post_link('« %link', 'Previous'); ?>
                </div>
                <div class="next">
                    <?php next_post_link('%link »', 'Next'); ?>
                </div>
            </div>
        </div>
    </div>
</section>