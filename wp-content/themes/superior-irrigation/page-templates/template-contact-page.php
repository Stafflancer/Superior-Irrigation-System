<?php
/*
 * Template Name: Contact
 */
get_header();
?>
<section class="contact-form">
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
</section>
<?php
get_footer();