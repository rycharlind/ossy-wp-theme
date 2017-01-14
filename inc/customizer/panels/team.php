<?php
// Set Panel ID
$panel_id = 'ossy_panel_team';

// Set prefix
$prefix = 'ossy';

/***********************************************/
/********************** TEAM  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id,
    array(
        'priority'          => 108,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Team Section', 'ossy' ),
        'description'       => __( 'Control various options for team section from front page.', 'ossy' ),
    )
);


// Show this section
$wp_customize->add_setting( $prefix . '_team_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_team_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'ossy' ),
        'section'   => $panel_id,
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_team_general_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Team', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_team_general_title',
    array(
        'label'         => __( 'Title', 'ossy' ),
        'description'   => __( 'Add the title for this section.', 'ossy'),
        'section'       => $panel_id,
        'priority'      => 2
    )
);

// Entry
if ( get_theme_mod( $prefix .'_team_general_entry' ) ) {

    $wp_customize->add_setting( $prefix .'_team_general_entry',
        array(
            'sanitize_callback' => 'ossy_sanitize_html',
            'default'           => __( 'Meet the people that are going to take your business to the next level.', 'ossy' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix .'_team_general_entry',
        array(
            'label'         => __( 'Entry', 'ossy' ),
            'description'   => __( 'Add the content for this section.', 'ossy'),
            'section'       => $panel_id,
            'priority'      => 3,
            'type'          => 'textarea'
        )
    );
}elseif ( !defined( "ossy_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_team_entry_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new ossy_Text_Custom_Control(
            $wp_customize, $prefix . '_team_entry_text',
            array(
                'label'             => __( 'Install ossy Companion', 'ossy' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">ossy Companion</a>', 'ossy' ), ossy_get_tgmpa_url()),
                'section'           => $panel_id,
                'settings'          => $prefix . '_team_entry_text',
                'priority'          => 3,
            )
        )
    );
}
