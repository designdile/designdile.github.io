<?php
/**/
$wp_customize->add_section(
    'footer_recommended_post_sectioon',
    array(
        'title'      => __( 'Related Post', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_footer_recommended_post_section]',
    array(
        'default'           => $default_options['enable_footer_recommended_post_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_footer_recommended_post_section]',
    array(
        'label'   => __( 'Enable Related Post Section', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[select_cat_for_footer_recommended_post]',
    array(
        'default'           => $default_options['select_cat_for_footer_recommended_post'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[select_cat_for_footer_recommended_post]',
    array(
        'label'   => __( 'Choose Related Post Category', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
            'type'        => 'select',
        'choices'     => portfolioxpress_post_category_list(),
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_category_meta]',
    array(
        'default'           => $default_options['enable_category_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_category_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_post_excerpt]',
    array(
        'default'           => $default_options['enable_post_excerpt'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_post_excerpt]',
    array(
        'label'   => __( 'Enable Post Excerpt Meta', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_date_meta]',
    array(
        'default'           => $default_options['enable_date_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[enable_author_meta]',
    array(
        'default'           => $default_options['enable_author_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'portfolioxpress' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);
