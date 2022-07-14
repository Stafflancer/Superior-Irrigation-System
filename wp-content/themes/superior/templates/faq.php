<?php /* Template Name: FAQ Template */
get_header(); ?>
<main>
    <?php
    while (have_posts()) : the_post();
        the_content();
    endwhile;
    get_template_part('modules/faq-grid/faq-grid');

    if(have_rows('side_form', 'option'))
    {
    	wp_enqueue_style('side-form-styles', get_template_directory_uri() . '/static/css/modules/side-form/side-form.css', '', '', 'all');
		wp_enqueue_script('side-form-js', get_template_directory_uri() . '/static/js/modules/side-form/side-form.js', '', '', true);
    	while(have_rows('side_form', 'option'))
    	{
    		the_row(); 
    		$side_form_title = get_sub_field('side_form_title');
    		$side_form_description = get_sub_field('side_form_description');
    		$side_form_code = get_sub_field('side_form_code'); ?>
    		<section class="side-form has-background color-as-background bg-heritage-blue has-heritage-blue-background-color">
			<div class=" text-start justify-content-start align-items-start">
			    <div class="container section-holder has-text-color text-white  wow fadeIn">
			        <?php if ($side_form_title || $side_form_description) { ?>
			            <div class="content-holder wow fadeIn">
			                <?php if ($side_form_title) { ?>
			                    <h3 class="<?php echo esc_attr($blockSettings['heading_color']); ?>"><?php echo $side_form_title; ?></h3>
			                <?php } ?>
			                <?php if ($side_form_description) { ?>
			                    <div class="text <?php echo esc_attr($blockSettings['text_color']); ?>"><?php echo $side_form_description; ?></div>
			                <?php } ?>
			            </div>
			        <?php } ?>
			        <div class="form-holder wow fadeIn">
			            <?php echo do_shortcode($side_form_code); ?>
			        </div>
			    </div>
			</div>
		</section><?php
		
		}
	} ?>
</main>

<?php
get_footer(); ?>