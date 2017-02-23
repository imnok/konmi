<?php
/**
 * Konmi Theme Customizer
 *
 * @package Konmi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function konmi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'konmi_logo_section' , array(
		'title'       => __( 'Logo', 'konmi' ),
		'priority'    => 30,
		'description' => __('Upload a logo to replace the default site name and description in the header', 'konmi'),
	) );
	$wp_customize->add_setting( 'konmi_logo' , array (
		'default'           =>  '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'konmi_logo', array(
		'label'    => __( 'Logo', 'konmi' ),
		'section'  => 'konmi_logo_section',
		'settings' => 'konmi_logo',
	) ) );


	$wp_customize->add_section('layout' , array(
	    'title' => __('Sidebar','konmi'),
	    'priority'    => 35,
	    'description' => __('Choose to show or hide sidebar for Posts page and Single page. <p>For medium and small screen device, sidebar will display below the content.</p>', 'konmi'),
	));
	$wp_customize->add_setting('sidebar_index', array(
		'default'           => 'none',
		'sanitize_callback' => 'homepage_konmi_layout',
	));
	$wp_customize->add_control('sidebar_index', array(
		'label'    	=> __( 'Posts page', 'konmi' ),
		'section'   => 'layout',
		'settings'  => 'sidebar_index',
		'type'      => 'radio',
		'choices'   => array(
			'none'     	=> 'Off',
			'block'    	=> 'On',
	  	),
	));

	$wp_customize->add_setting('sidebar_single', array(
		'default'           => 'none',
		'sanitize_callback' => 'post_konmi_layout',
	));
	$wp_customize->add_control('sidebar_single', array(
		'label'    	=> __( 'Single page', 'konmi' ),
		'section'   => 'layout',
		'settings'  => 'sidebar_single',
		'type'      => 'radio',
		'choices'   => array(
			'none'     	=> 'Off',
			'block'    	=> 'On',
			
		),
	));

}
add_action( 'customize_register', 'konmi_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function konmi_customize_preview_js() {
	wp_enqueue_script( 'konmi_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'konmi_customize_preview_js' );


/**
 * Sanitize URL
 *
 * http://codex.wordpress.org/Function_Reference/esc_url_raw
 *
 * @param string $url - The URL to be cleaned.
 * @return Valid URL | empty string
 */

function homepage_konmi_layout( $home_layout ) {
	if ( ! in_array( $home_layout, array( 'none', 'block' ) ) ) {
		$home_layout = 'block';
	}

	return $home_layout;
}

function post_konmi_layout( $post_layout ) {
	if ( ! in_array( $post_layout, array( 'none', 'block' ) ) ) {
		$post_layout = 'block';
	}

	return $post_layout;
}
