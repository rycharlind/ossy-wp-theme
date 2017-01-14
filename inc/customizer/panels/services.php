<?php
// Set Panel ID
$panel_id = 'ossy_panel_services';

// Set prefix
$prefix = 'ossy';

/***********************************************/
/****************** SERVICES  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id, array(
		'priority'       => 105,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Services Section', 'ossy' ),
		'description'    => __( 'Control various options for services section from front page.', 'ossy' ),
	) );

/***********************************************/
/******************* General *******************/
/***********************************************/


// Show this section
$wp_customize->add_setting( $prefix . '_services_general_show', array(
		'sanitize_callback' => $prefix . '_sanitize_checkbox',
		'default'           => 1,
		'transport'         => 'postMessage',
	) );
$wp_customize->add_control( $prefix . '_services_general_show', array(
		'type'     => 'checkbox',
		'label'    => __( 'Show this section?', 'ossy' ),
		'section'  => $panel_id,
		'priority' => 1,
	) );

// Title
$wp_customize->add_setting( $prefix . '_services_general_title', array(
		'sanitize_callback' => 'ossy_sanitize_html',
		'default'           => __( 'Services', 'ossy' ),
		'transport'         => 'postMessage',
	) );
$wp_customize->add_control( $prefix . '_services_general_title', array(
		'label'       => __( 'Title', 'ossy' ),
		'description' => __( 'Add the title for this section.', 'ossy' ),
		'section'     => $panel_id,
		'priority'    => 2,
	) );

// Entry
if ( get_theme_mod( $prefix . '_services_general_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_services_general_entry', array(
			'sanitize_callback' => 'ossy_sanitize_html',
			'default'           => __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'ossy' ),
			'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( $prefix . '_services_general_entry', array(
			'label'       => __( 'Entry', 'ossy' ),
			'description' => __( 'Add the content for this section.', 'ossy' ),
			'section'     => $panel_id,
			'priority'    => 3,
			'type'        => 'textarea',
		) );

}elseif ( !defined( "ossy_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_services_entry_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new ossy_Text_Custom_Control(
            $wp_customize, $prefix . '_services_entry_text',
            array(
                'label'             => __( 'Install ossy Companion', 'ossy' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">ossy Companion</a>', 'ossy' ), ossy_get_tgmpa_url()),
                'section'           => $panel_id,
                'settings'          => $prefix . '_services_entry_text',
                'priority'          => 3,
            )
        )
    );
}


// *********************
// Service 1
// *********************

// Service Title 1
$wp_customize->add_setting( $prefix . '_service_title_1', array(
		'sanitize_callback' => 'ossy_sanitize_html',
		'default'           => __( 'Service 1', 'ossy' ),
		'transport'         => 'postMessage',
	) );
$wp_customize->add_control( $prefix . '_service_title_1', array(
		'label'       => __( 'Service Title 1', 'ossy' ),
		'description' => __( 'Add the title for service 1.', 'ossy' ),
		'section'     => $panel_id
	) );

// Service Desc 1
$wp_customize->add_setting( $prefix . '_service_desc_1', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_service_desc_1', array(
		'label'       => __( 'Service description 1', 'ossy' ),
		'description' => __( 'Add the description for this service.', 'ossy' ),
		'section'     => $panel_id,
		'type'        => 'textarea',
	) );

// Service Image 1
$wp_customize->add_setting( $prefix . '_service_image_1', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url_raw( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_service_image_1', array(
	'label'    => __( 'Service Image 1', 'ossy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_service_image_1',
) ) );



// *********************
// Service 2
// *********************

// Service Title 2
$wp_customize->add_setting( $prefix . '_service_title_2', array(
		'sanitize_callback' => 'ossy_sanitize_html',
		'default'           => __( 'Service 2', 'ossy' ),
		'transport'         => 'postMessage',
	) );
$wp_customize->add_control( $prefix . '_service_title_2', array(
		'label'       => __( 'Service Title 2', 'ossy' ),
		'description' => __( 'Add the title for service 2.', 'ossy' ),
		'section'     => $panel_id
	) );

// Service Desc 2
$wp_customize->add_setting( $prefix . '_service_desc_2', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_service_desc_2', array(
		'label'       => __( 'Service description 2', 'ossy' ),
		'description' => __( 'Add the description for this service.', 'ossy' ),
		'section'     => $panel_id,
		'type'        => 'textarea',
	) );

// Service Image 2
$wp_customize->add_setting( $prefix . '_service_image_2', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url_raw( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_service_image_2', array(
	'label'    => __( 'Service Image 2', 'ossy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_service_image_2',
) ) );



// *********************
// Service 3
// *********************

// Service Title 3
$wp_customize->add_setting( $prefix . '_service_title_3', array(
		'sanitize_callback' => 'ossy_sanitize_html',
		'default'           => __( 'Service 3', 'ossy' ),
		'transport'         => 'postMessage',
	) );
$wp_customize->add_control( $prefix . '_service_title_3', array(
		'label'       => __( 'Service Title 3', 'ossy' ),
		'description' => __( 'Add the title for service 3.', 'ossy' ),
		'section'     => $panel_id
	) );

// Service Desc 3
$wp_customize->add_setting( $prefix . '_service_desc_3', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_service_desc_3', array(
		'label'       => __( 'Service description 3', 'ossy' ),
		'description' => __( 'Add the description for this service.', 'ossy' ),
		'section'     => $panel_id,
		'type'        => 'textarea',
	) );

// Service Image 3
$wp_customize->add_setting( $prefix . '_service_image_3', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url_raw( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_service_image_3', array(
	'label'    => __( 'Service Image 3', 'ossy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_service_image_3',
) ) );
