<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>
<main class="main">
        <?php
        get_template_part('modules/post-content/post-content', '', array('breadcrubms' => 'NEWS & PRESS'));

    if(have_rows('news_details_form', 'option'))
    {
    	$version = rand(); 
    	wp_enqueue_style('sign-me-block-styles', get_template_directory_uri() . '/static/css/modules/sign-me-block/sign-me-block.css', '', '', 'all');
		wp_enqueue_script('single-store-info-js', get_template_directory_uri() . '/static/js/modules/sign-me-block/sign-me-block.js', '', $version, true);
    	while(have_rows('news_details_form', 'option'))
    	{
    		the_row(); 
    		$news_detail_title = get_sub_field('news_detail_title');
    		$news_detail_description = get_sub_field('news_detail_description');
    		$news_detail_form_code = get_sub_field('news_detail_form_code');
    		$news_detail_bg_image = get_sub_field('news_detail_bg_image'); ?>
    		<section class="sign-me-block has-background image-as-background relative overflow-hidden has-overlay has-parallax">
    			<figure class="image-background d-block h-auto w-100 position-absolute" aria-hidden="true" style="background-image:url(<?php if($news_detail_bg_image){ echo $news_detail_bg_image; } ?>);"></figure>
				<div class="text-left justify-content-start align-items-start">
				    <div class="container section-holder wow fadeIn">
				        <?php if ($news_detail_title || $news_detail_description) { ?>
				            <div class="content-holder wow fadeIn">
				                <?php if ($news_detail_title) { ?>
				                    <h3 class="has-heading-color text-white"><?php echo $news_detail_title; ?></h3>
				                <?php } ?>
				                <?php if ($news_detail_description) { ?>
				                    <div class="subtitle  has-text-color text-white"><?php echo $news_detail_description; ?></div>
				                <?php } ?>
				            </div>
				        <?php }
				        if($news_detail_form_code)
				        { ?>
					        <div class="form-holder wow fadeIn">
					            <?php echo do_shortcode($news_detail_form_code); ?>
					        </div><?php
					    } ?>
				    </div>
				</div>
			</section><?php
		
		}
	} ?>

</main>
<?php
get_footer();
