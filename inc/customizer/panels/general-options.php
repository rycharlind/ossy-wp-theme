<?php
// Set Panel ID
$panel_id = 'ossy_panel_general';

// Set prefix
$prefix = 'ossy';


// Change panel for Colors
$site_colors        = $wp_customize->get_section( 'colors' );
$site_colors->panel = $panel_id;
$site_colors->title = __( 'Background Color', 'ossy' );

// Change panel for Background Image
$site_title        = $wp_customize->get_section( 'background_image' );
$site_title->panel = $panel_id;

// Change panel for Static Front Page
$site_title        = $wp_customize->get_section( 'static_front_page' );
$site_title->panel = $panel_id;

// Change Logo section
$site_logo              = $wp_customize->get_control( 'custom_logo' );
$site_logo->description = __( 'The site logo is used as a graphical representation of your company name. Recommended size: 105 (width) x 75 (height) pixels(px).', 'ossy' );
$site_logo->label       = __( 'Site logo', 'ossy' );
$site_logo->section     = $prefix . '_general_logo_section';
$site_logo->priority    = 1;

// Change site icon section
$site_icon           = $wp_customize->get_control( 'site_icon' );
$site_icon->section  = $prefix . '_general_logo_section';
$site_icon->priority = 2;




/***********************************************/
/************** GENERAL OPTIONS  ***************/
/***********************************************/


$wp_customize->add_panel( $panel_id, array(
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'General Options', 'ossy' ),
	'description'    => __( 'You can change the site layout in this area as well as your contact details (the ones displayed in the header & footer) ', 'ossy' ),
) );

/***********************************************/
/****************** Preloader  *****************/
/***********************************************/

$wp_customize->add_section( $prefix . '_preloader_section', array(
	'title'    => __( 'Preloader', 'ossy' ),
	'priority' => 1,
	'panel'    => $panel_id,
) );

// Enable the preloader?
$wp_customize->add_setting( $prefix . '_preloader_enable', array(
	'sanitize_callback' => $prefix . '_value_checkbox_helper',
	'default'           => 1,
) );
$wp_customize->add_control( $prefix . '_preloader_enable', array(
	'type'     => 'checkbox',
	'label'    => __( 'Enable the site preloader?', 'ossy' ),
	'section'  => $prefix . '_preloader_section',
	'priority' => 1,
) );

// Background Color
$wp_customize->add_setting( $prefix . '_preloader_background_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#ffffff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_preloader_background_color', array(
	'label'       => __( 'Preloader background color', 'ossy' ),
	'description' => __( 'Controls the background color for the container where the preloader is diplayed on', 'ossy' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_background_color',
	'priority'    => 2,
) ) );

// Primary Color
$wp_customize->add_setting( $prefix . '_preloader_primary_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_preloader_primary_color', array(
	'label'       => __( 'Preloader primary color', 'ossy' ),
	'description' => __( 'Controls the color of the loading bar & of the percentage.', 'ossy' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_primary_color',
	'priority'    => 3,
) ) );

// Secondly Color
$wp_customize->add_setting( $prefix . '_preloader_secondly_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#ffffff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_preloader_secondly_color', array(
	'label'       => __( 'Preloader secondary color', 'ossy' ),
	'description' => __( 'Controls the color outline of the preloader (the border)', 'ossy' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_secondly_color',
	'priority'    => 4,
) ) );

/***********************************************/
/*********** Logo section  ************/
/***********************************************/

$wp_customize->add_section( $prefix . '_general_logo_section', array(
	'title'    => __( 'Logo', 'ossy' ),
	'priority' => 2,
	'panel'    => $panel_id,
) );

/***********************************************/
/*********** General Site Settings  ************/
/***********************************************/


/* Company text logo */
$wp_customize->add_setting( $prefix . '_text_logo', array(
	'sanitize_callback' => 'ossy_sanitize_html',
	'default'           => __( 'ossy', 'ossy' ),
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_text_logo', array(
	'label'       => __( 'Text logo (company name)', 'ossy' ),
	'description' => __( 'This field is best used when you don\'t have an image logo or simply prefer using a text as your logo / company name.', 'ossy' ),
	'section'     => $prefix . '_general_logo_section',
	'priority'    => 2,
) );


/***********************************************/
/************** Footer Details  ***************/
/***********************************************/
$wp_customize->add_section( $prefix . '_general_footer_section', array(
	'title'       => __( 'Copyright', 'ossy' ),
	'description' => __( 'Change the footer copyright message from here.', 'ossy' ),
	'priority'    => 4,
	'panel'       => $panel_id,
) );

/* Footer Copyright */
$wp_customize->add_setting( $prefix . '_footer_copyright', array(
	'sanitize_callback' => 'ossy_sanitize_html',
	'default'           => __( '&copy; Copyright 2016. All Rights Reserved.', 'ossy' ),
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_footer_copyright', array(
	'label'       => __( 'Footer Copyright', 'ossy' ),
	'description' => __( 'Use this to display your company copyright message.', 'ossy' ),
	'section'     => $prefix . '_general_footer_section',
	'priority'    => 2,
) );

/* Footer Image Logo */
$wp_customize->add_setting( $prefix . '_img_footer_logo', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url_raw( get_template_directory_uri() . '/layout/images/footer-logo.png' ),
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_img_footer_logo', array(
	'label'       => __( 'Footer Logo', 'ossy' ),
	'description' => __( 'Image logo used in the footer, above the copyright message.', 'ossy' ),
	'section'     => $prefix . '_general_footer_section',
	'settings'    => $prefix . '_img_footer_logo',
	'priority'    => 3,
) ) );