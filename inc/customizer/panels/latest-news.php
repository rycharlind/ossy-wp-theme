<?php
// Set Panel ID
$panel_id = 'ossy_latest_news_general';

// Set prefix
$prefix = 'ossy';

/***********************************************/
/*************** LATEST NEWS  ******************/
/***********************************************/
/*
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 101,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Latest News', 'ossy' ),
        'description'       => __( 'Control various options for latest news section from front page.', 'ossy' ),
    )
);
*/

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_latest_news_general' ,
    array(
        'title'         => __( 'Latest News Section', 'ossy' ),
        'description'   => __( 'Control various options for latest news section from front page.', 'ossy' ),
        'priority'      => 106
        // 'title'       => __( 'General', 'ossy' ),
        // 'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_latest_news_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_latest_news_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'ossy' ),
        'section'   => $prefix . '_latest_news_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_latest_news_general_title',
    array(
        'sanitize_callback' => 'ossy_sanitize_html',
        'default'           => __( 'Latest News', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_general_title',
    array(
        'label'         => __( 'Title', 'ossy' ),
        'description'   => __( 'Add the title for this section.', 'ossy'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 2
    )
);

// Entry
if ( get_theme_mod( $prefix .'_latest_news_general_entry' ) ) {
    $wp_customize->add_setting( $prefix .'_latest_news_general_entry',
        array(
            'sanitize_callback' => 'ossy_sanitize_html',
            'default'           => __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You have nothing to loose!', 'ossy' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix .'_latest_news_general_entry',
        array(
            'label'         => __( 'Entry', 'ossy' ),
            'description'   => __( 'Add the content for this section.', 'ossy'),
            'section'       => $prefix . '_latest_news_general',
            'priority'      => 3,
            'type'          => 'textarea'
        )
    );
}elseif ( !defined( "ossy_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_latest_news_general_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new ossy_Text_Custom_Control(
            $wp_customize, $prefix . '_latest_news_general_text',
            array(
                'label'             => __( 'Install ossy Companion', 'ossy' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">ossy Companion</a>', 'ossy' ), ossy_get_tgmpa_url()),
                'section'           => $panel_id,
                'settings'          => $prefix . '_latest_news_general_text',
                'priority'          => 3,
            )
        )
    );
    
}


// Button Text
$wp_customize->add_setting( $prefix .'_latest_news_button_text',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => __( 'See blog', 'ossy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_button_text',
    array(
        'label'         => __( 'Button Text', 'ossy' ),
        'description'   => __( 'Add the button text for this section.', 'ossy'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 4
    )
);


// Number of posts
$wp_customize->add_setting( $prefix .'_latest_news_number_of_posts',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 3,
    )
);
$wp_customize->add_control(
    $prefix .'_latest_news_number_of_posts',
    array(
        'label'         => __( 'Number of posts', 'ossy' ),
        'description'   => __( 'Add the number of posts to show in this section.', 'ossy'),
        'section'       => $prefix . '_latest_news_general',
        'priority'      => 5
    )
);