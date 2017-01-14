<?php
// Set Panel ID
$panel_id = 'ossy_panel_projects';

// Set prefix
$prefix = 'ossy';

/***********************************************/
/****************** PROJECTS  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id,
    array(
        'priority'          => 103,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Projects Section', 'ossy' ),
        'description'       => __( 'Control various options for projects section from front page.', 'ossy' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/


// Show this section
$wp_customize->add_setting( $prefix . '_projects_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_projects_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'ossy' ),
        'section'   => $panel_id,
        'priority'  => 1,
        'active_callback'   => 'ossy_is_active_jetpack_projects'
    )
);

// Title
$wp_customize->add_setting( $prefix .'_projects_general_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Projects', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_projects_general_title',
    array(
        'label'         => __( 'Title', 'ossy' ),
        'description'   => __( 'Add the title for this section.', 'ossy'),
        'section'       => $panel_id,
        'priority'      => 2,
        'active_callback'   => 'ossy_is_active_jetpack_projects'
    )
);

// Entry
if ( get_theme_mod( $prefix .'_projects_general_entry' ) ) {
    
    $wp_customize->add_setting( $prefix .'_projects_general_entry',
        array(
            'sanitize_callback' => 'ossy_sanitize_html',
            'default'           => __( 'You\'ll love our work. Check it out!', 'ossy' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix .'_projects_general_entry',
        array(
            'label'         => __( 'Entry', 'ossy' ),
            'description'   => __( 'Add the content for this section.', 'ossy'),
            'section'       => $panel_id,
            'priority'      => 3,
            'active_callback'   => 'ossy_is_active_jetpack_projects',
            'type'          => 'textarea'
        )
    );
    
}elseif ( !defined( "ossy_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_projects_entry_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new ossy_Text_Custom_Control(
            $wp_customize, $prefix . '_projects_entry_text',
            array(
                'label'             => __( 'Install ossy Companion', 'ossy' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">ossy Companion</a>', 'ossy' ), ossy_get_tgmpa_url()),
                'section'           => $panel_id,
                'settings'          => $prefix . '_projects_entry_text',
                'priority'          => 3,
            )
        )
    );
}

// Install JetPack
$wp_customize->add_setting(
    $prefix . '_projects_general_text',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => '',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new ossy_Text_Custom_Control(
        $wp_customize, $prefix . '_projects_general_text',
        array(
            'label'             => __( 'Install JetPack', 'ossy' ),
            'description'       => __( 'In order to get the Projects module working, you will have to install JetPack and enable Custom Post Type: Projects.', 'ossy' ),
            'section'           => $panel_id,
            'settings'          => $prefix . '_projects_general_text',
            'priority'          => 5,
            'active_callback'   => 'ossy_is_not_active_jetpack_projects'
        )
    )
);