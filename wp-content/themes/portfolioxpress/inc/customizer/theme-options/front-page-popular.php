<?php
/**/
$wp_customize->add_section(
    'home_page_popular_option',
    array(
        'title'      => __( 'Front Page Popular Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_popular_section]',
    array(
        'default'           => $default_options['enable_popular_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_popular_section]',
    array(
        'label'   => __( 'Enable Popular Section', 'portfolioxpress' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[popular_section_post_title]',
    array(
        'default'           => $default_options['popular_section_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[popular_section_post_title]',
    array(
        'label'    => __( 'Popular section Title', 'portfolioxpress' ),
        'section'  => 'home_page_popular_option',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[number_of_popular_post]',
    array(
        'default'           => $default_options['number_of_popular_post'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[number_of_popular_post]',
    array(
        'label'       => __( 'Post In Popular section', 'portfolioxpress' ),
        'section'     => 'home_page_popular_option',
        'type'        => 'select',
        'choices'     => array(
            '4' => __( '4', 'portfolioxpress' ),
            '5' => __( '5', 'portfolioxpress' ),
            '6' => __( '6', 'portfolioxpress' ),
            '7' => __( '7', 'portfolioxpress' ),
        ),
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[popular_section_cat]',
    array(
        'default'           => $default_options['popular_section_cat'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[popular_section_cat]',
    array(
        'label'   => __( 'Choose Popular Category', 'portfolioxpress' ),
        'section' => 'home_page_popular_option',
            'type'        => 'select',
        'choices'     => portfolioxpress_post_category_list(),
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_popular_cat_meta]',
    array(
        'default'           => $default_options['enable_popular_cat_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_popular_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'portfolioxpress' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_popular_author_meta]',
    array(
        'default'           => $default_options['enable_popular_author_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_popular_author_meta]',
    array(
        'label'   => __( 'Enable author Meta', 'portfolioxpress' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_popular_date_meta]',
    array(
        'default'           => $default_options['enable_popular_date_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_popular_date_meta]',
    array(
        'label'   => __( 'Enable Date On Popular', 'portfolioxpress' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[upload_popular_section_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'portfolioxpress_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'portfolioxpress_options[upload_popular_section_bg_image]',
        array(
            'label'           => __( 'Upload Popular Section Background Image', 'portfolioxpress' ),
            'section'         => 'home_page_popular_option',
        )
    )
);