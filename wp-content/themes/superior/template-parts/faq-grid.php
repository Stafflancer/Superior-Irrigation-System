<?php if (!empty($args['post_id'])) {
    $post_id = $args['post_id'];
    $title = get_the_title($post_id);
    $faqcontent = get_the_content($post_id); 
    ?>

    <div class="accordion-item">
         <button id="accordion-button-<?php echo $post_id->ID; ?>" aria-expanded="false"><span class="accordion-title"><?php echo $title; ?></span><span class="icon" aria-hidden="true"></span></button>
         <div class="accordion-content">
            <?php echo $faqcontent; ?>
         </div>
      </div>

<?php } ?>