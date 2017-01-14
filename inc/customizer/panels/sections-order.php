<?php
/***********************************************/
/*************** Sections Order  ***************/
/***********************************************/
$wp_customize->add_section( $prefix.'_general_sections_order' ,
    array(
        'title'       => __( 'Sections Order', 'ossy' ),
        'priority'    => 101,
        'panel'       => 'ossy_panel_general'
    )
);

// First section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_first_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 1
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_first_section',
    array(
        'label'         => __( 'First section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the first section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Second section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_second_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 2
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_second_section',
    array(
        'label'         => __( 'Second section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the second section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Third section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_third_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 3
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_third_section',
    array(
        'label'         => __( 'Third section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the third section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Fourth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 4
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'label'         => __( 'Fourth section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the fourth section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Fifth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 5
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'label'         => __( 'Fifth section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the fifth section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Sixth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 6
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'label'         => __( 'Sixth section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the sixth section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Seventh section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 7
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'label'         => __( 'Seventh section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the seventh section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);

// Eighth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'sanitize_callback' => 'ossy_sanitize_select',
        'default'           => 8
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'label'         => __( 'Eighth section', 'ossy' ),
        'description'   => __( 'Please select what you want to display on the eighth section from front page.', 'ossy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'ossy' ),
            2   => __( 'Projects', 'ossy' ),
            3   => __( 'Testimonials', 'ossy' ),
            4   => __( 'Services', 'ossy' ),
            5   => __( 'Latest News', 'ossy' ),
            6   => __( 'Counter', 'ossy' ),
            7   => __( 'Team', 'ossy' ),
            8   => __( 'Contact us', 'ossy' )
        )
    )
);