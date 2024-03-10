<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'portfolioxpress' ),
        'description' => __( 'Contains all front page settings', 'portfolioxpress'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Front Page Banner Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'portfolioxpress' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'portfolioxpress' ),
            '4' => __( '4', 'portfolioxpress' ),
            '5' => __( '5', 'portfolioxpress' ),
            '6' => __( '6', 'portfolioxpress' ),
        ),
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => portfolioxpress_post_category_list(),
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_pagination]',
    array(
        'default'           => $default_options['enable_banner_pagination'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_pagination]',
    array(
        'label'   => __( 'Enable Banner Pagination', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'portfolioxpress' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'portfolioxpress' ),
            'text-center' => __( 'Align Center', 'portfolioxpress' ),
            'text-left' => __( 'Align Left', 'portfolioxpress' ),
        ),
        'active_callback' => 'portfolioxpress_is_banner_pagination_enabled',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable author Meta', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'portfolioxpress' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);