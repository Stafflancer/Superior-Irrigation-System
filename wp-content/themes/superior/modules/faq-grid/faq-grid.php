<?php
global $wp_query;

$args = array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'paged' => get_query_var('paged') ?: 1,
);

$wp_query = new WP_Query($args);
$version = rand();
if (have_posts()) {
    wp_enqueue_style('faq-grid-styles', get_template_directory_uri() . '/static/css/modules/faq-grid/faq-grid.css', '', $version, 'all'); 
    wp_enqueue_script( 'faq-grid-script', get_template_directory_uri() . '/static/js/modules/faq-grid/faq-grid.js', [], null, true );?>

    <section class="faq-grid wow fadeIn">
        <div class="container">
            <div class="section-holder">
                <div class="accordion" id="accordion">
                    <?php while (have_posts()) { the_post();
                        $post_id = get_post();
                        get_template_part('template-parts/faq-grid', '', array('post_id' => $post_id));
                    } ?>
                </div>

                <?php the_posts_pagination([
                    'prev_text' => '&#171;',
                    'next_text' => '&#187;',
                    'mid_size' => 1
                ]);

                wp_reset_query(); ?>
            </div>
        </div>
    </section>
<?php } ?>