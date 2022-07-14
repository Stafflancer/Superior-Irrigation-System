<?php
$content         = get_the_content(get_the_ID());
$trimmed_content = wp_trim_words($content, 20, '...');
?>
<a href="<?php the_permalink(); ?>" class="card h-100 bg-white">
    <?php if (has_post_thumbnail()): ?>
        <div class="card-img-top position-relative overflow-hidden">
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'medium_large', false, array('class' => 'position-absolute top-50 start-50 translate-middle w-100 h-100')); ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h3 class="card-title"><?php the_title(); ?></h3>
        <p class="card-text"><?php echo $trimmed_content; ?></p>
    </div>
    <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
        <em class="text-uppercase"><?php echo get_the_date('F j, Y'); ?></em>
        <button class="btn btn-elephant">View</button>
    </div>
</a>