<?php
/**
 * Customizer sections.
 *
 * @package Heritage
 */

/**
 * Register the section sections.
 *
 * @author WebDevStudios
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function heritage_customize_sections( $wp_customize ) {
	// Register additional scripts section.
	$wp_customize->add_section(
		'heritage_additional_scripts_section',
		[
			'title'    => esc_html__( 'Additional Scripts', 'heritage' ),
			'priority' => 10,
			'panel'    => 'site-options',
		]
	);

	// Register a social links section.
	$wp_customize->add_section(
		'heritage_social_links_section',
		[
			'title'       => esc_html__( 'Social Media', 'heritage' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'heritage' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		]
	);

	// Register a header section.
	$wp_customize->add_section(
		'heritage_header_section',
		[
			'title'    => esc_html__( 'Header Customizations', 'heritage' ),
			'priority' => 90,
			'panel'    => 'site-options',
		]
	);

	// Register a footer section.
	$wp_customize->add_section(
		'heritage_footer_section',
		[
			'title'    => esc_html__( 'Footer Customizations', 'heritage' ),
			'priority' => 90,
			'panel'    => 'site-options',
		]
	);
}
add_action( 'customize_register', 'heritage_customize_sections' );
