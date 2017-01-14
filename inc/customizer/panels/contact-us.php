<?php
// Set Panel ID
$panel_id = 'ossy_panel_contact_us';

// Set prefix
$prefix = 'ossy';

/***********************************************/
/**************** CONTACT US  ******************/
/***********************************************/

$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 109,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Contact us Section', 'ossy' ),
        'description'       => __( 'Control various options for contact us section from front page.', 'ossy' ),
    )
);


/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_contact_us_general' ,
    array(
        'title'         => __( 'Contact us', 'ossy' ),
        'description'   => __( 'Control various options for contact us section from front page.', 'ossy' ),
        'priority'      => 109,
        'title'       => __( 'General', 'ossy' ),
        'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_contact_us_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_contact_us_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'ossy' ),
        'section'   => $prefix . '_contact_us_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_contact_us_general_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Contact us', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_title',
    array(
        'label'         => __( 'Title', 'ossy' ),
        'description'   => __( 'Add the title for this section.', 'ossy'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 2
    )
);


// Entry
if ( get_theme_mod( $prefix .'_contact_us_general_entry' ) ) {
    $wp_customize->add_setting( $prefix .'_contact_us_general_entry',
        array(
            'sanitize_callback' => 'ossy_sanitize_html',
            'default'           => __( 'And we will get in touch as soon as possible.', 'ossy' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix .'_contact_us_general_entry',
        array(
            'label'         => __( 'Entry', 'ossy' ),
            'description'   => __( 'Add the content for this section.', 'ossy'),
            'section'       => $prefix . '_contact_us_general',
            'priority'      => 3,
            'type'          => 'textarea'
        )
    );
}elseif ( !defined( "ossy_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_contact_us_general_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new ossy_Text_Custom_Control(
            $wp_customize, $prefix . '_contact_us_general_text',
            array(
                'label'             => __( 'Install ossy Companion', 'ossy' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">ossy Companion</a>', 'ossy' ), ossy_get_tgmpa_url()),
                'section'           => $prefix . '_contact_us_general',
                'settings'          => $prefix . '_contact_us_general_text',
                'priority'          => 3,
            )
        )
    );
    
}


// Address Title
$wp_customize->add_setting( $prefix .'_contact_us_general_address_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Address', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_address_title',
    array(
        'label'         => __( 'Address Title', 'ossy' ),
        'description'   => __( 'Add the title for address block from this section.', 'ossy'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 4
    )
);

// Customer Support Title
$wp_customize->add_setting( $prefix .'_contact_us_general_customer_support_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Customer Support', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_us_general_customer_support_title',
    array(
        'label'         => __( 'Customer Support Title', 'ossy' ),
        'description'   => __( 'Add the title for customer support block from this section.', 'ossy'),
        'section'       => $prefix . '_contact_us_general',
        'priority'      => 5
    )
);

// Contact Form 7
$wp_customize->add_setting( 'ossy_contact_us_general_contact_form_7',
    array(
        'sanitize_callback' => 'sanitize_key'
    )
);
$wp_customize->add_control( new ossy_CF7_Custom_Control(
    $wp_customize,
    'ossy_contact_us_general_contact_form_7',
        array(
            'label'             => __( 'Select the contact form you\'d like to display (powered by Contact Form 7)', 'ossy' ),
            'section'           => $prefix . '_contact_us_general',
            'priority'          => 6,
            'type'              => 'ossy_contact_form_7'
        )
    )
);

// Contact Form Creation
$wp_customize->add_setting(
    $prefix . '_contact_us_general_install_contact_form_7',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => '',
        'transport'         => 'refresh'
    )
);
$wp_customize->add_control(
    new ossy_Text_Custom_Control(
        $wp_customize, $prefix . '_contact_us_general_install_contact_form_7',
        array(
            'label'             => __( 'Contact Form Creation', 'ossy' ),
            'description'       => sprintf( '%s %s %s', __( 'Install', 'ossy' ), '<a href="https://wordpress.org/plugins/contact-form-7/" title="Contact Form 7" target="_blank">Contact Form 7</a>', __( 'and select a contact form to work this setting.', 'ossy' ) ),
            'section'           => $prefix .'_contact_us_general',
            'settings'          => $prefix . '_contact_us_general_install_contact_form_7',
            'priority'          => 7,
            'active_callback'   => 'ossy_is_not_active_contact_form_7'
        )
    )
);


/***********************************************/
    /************** Contact Details  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_general_contact_section' ,
        array(
            'title'         => __( 'Contact Details', 'ossy' ),
            'description'   => __( 'These are the contact details displayed in the Contact us section from front page.', 'ossy' ),
            'priority'      => 3,
            'panel'         => $panel_id
        )
    );

    /* Facebook URL */
    $wp_customize->add_setting( 'ossy_contact_bar_facebook_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( 'ossy_contact_bar_facebook_url',
        array(
            'label'          => __( 'Facebook URL', 'ossy' ),
            'description'    => __( 'Will be displayed in the contact section from front page.', 'ossy' ),
            'section'        => $prefix.'_general_contact_section',
            'settings'       => 'ossy_contact_bar_facebook_url',
            'priority'       => 10
        )
    );

    /* Twitter URL */
    $wp_customize->add_setting( $prefix.'_contact_bar_twitter_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_contact_bar_twitter_url',
        array(
            'label'          => __( 'Twitter URL', 'ossy' ),
            'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
            'section'        => $prefix.'_general_contact_section',
            'settings'       => $prefix.'_contact_bar_twitter_url',
            'priority'       => 10
        )
    );

    /* LinkedIN URL */
    $wp_customize->add_setting( $prefix.'_contact_bar_linkedin_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            => esc_url_raw('#'),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_contact_bar_linkedin_url',
        array(
            'label'          => __( 'LinkedIN URL', 'ossy' ),
            'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
            'section'        => $prefix.'_general_contact_section',
            'settings'       => $prefix.'_contact_bar_linkedin_url',
            'priority'       => 10
        )
    );

	/* Google+ URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_googlep_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_googlep_url',
		array(
			'label'          => __( 'Google+ URL', 'ossy' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_googlep_url',
			'priority'       => 10
		)
	);

	/* Pinterest URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_pinterest_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_pinterest_url',
		array(
			'label'          => __( 'Pinterest URL', 'ossy' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_pinterest_url',
			'priority'       => 10
		)
	);

	/* Instagram URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_instagram_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_instagram_url',
		array(
			'label'          => __( 'Instagram URL', 'ossy' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_instagram_url',
			'priority'       => 10
		)
	);

	/* YouTube URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_youtube_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_youtube_url',
		array(
			'label'          => __( 'YouTube URL', 'ossy' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_youtube_url',
			'priority'       => 10
		)
	);

	/* Vimeo URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_vimeo_url',
		array(
			'sanitize_callback'  => 'esc_url_raw',
			'default'            => esc_url_raw('#'),
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_vimeo_url',
		array(
			'label'          => __( 'Vimeo URL', 'ossy' ),
			'description'    => __('Will be displayed in the contact section from front page.', 'ossy'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_vimeo_url',
			'priority'       => 10
		)
	);



    /* email */
    $wp_customize->add_setting( $prefix.'_email',
        array(
            'sanitize_callback'  => 'sanitize_text_field',
            'default'            => __( 'contact@site.com', 'ossy' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_email',
        array(
            'label'         => __( 'Email addr.', 'ossy' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'ossy'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_email',
            'priority'      => 10
        )
    );


    /* phone number */
    $wp_customize->add_setting( $prefix.'_phone',
        array(
            'sanitize_callback'  => 'ossy_sanitize_html',
            'default'            => __( '(555) 555-5555', 'ossy' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_phone',
        array(
            'label'         => __( 'Phone number', 'ossy' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'ossy'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_phone',
            'priority'      => 12
        )
    );

    // Address 1
    $wp_customize->add_setting(
        $prefix . '_address1',
        array(
            'sanitize_callback'  => 'ossy_sanitize_html',
            'default'            => __( 'Street 221B Baker Street, ', 'ossy' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address1',
        array(
            'label'         => __( 'Address 1', 'ossy' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'ossy'),
            'section'       => $prefix . '_general_contact_section',
            'priority'      => 13
        )
    );

    // Address 2
    $wp_customize->add_setting(
        $prefix . '_address2',
        array(
            'sanitize_callback'  => 'ossy_sanitize_html',
            'default'            => __( 'London, UK', 'ossy' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address2',
        array(
            'label'         => __( 'Address 2', 'ossy' ),
            'description'   => __( 'Will be displayed in the contact section from front page.', 'ossy'),
            'section'       => $prefix . '_general_contact_section',
            'priority'      => 13
        )
    );