<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'portfolioxpress_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'portfolioxpress_sanitize_radio',
    )
);
$wp_customize->add_control(
    new PortfolioXpress_Radio_Image_Control(
        $wp_customize,
        'portfolioxpress_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'portfolioxpress' ),
            'section' => 'single_options',
            'choices' => portfolioxpress_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'portfolioxpress_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control(
        $wp_customize,
        'portfolioxpress_section_seperator_single_1',
        array(
            'settings' => 'portfolioxpress_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'portfolioxpress_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new PortfolioXpress_Checkbox_Multiple(
        $wp_customize,
        'portfolioxpress_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'portfolioxpress' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'portfolioxpress' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'portfolioxpress' ),
                'date' => __( 'Date', 'portfolioxpress' ),
                'comment' => __( 'Comment', 'portfolioxpress' ),
                'category' => __( 'Category', 'portfolioxpress' ),
                'tags' => __( 'Tags', 'portfolioxpress' ),
            )
        )
    )
);


$wp_customize->add_setting(
    'portfolioxpress_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control( 
        $wp_customize,
        'portfolioxpress_section_seperator_single_2',
        array(
            'settings' => 'portfolioxpress_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

/*Show Author Info Box
*-------------------------------*/
$wp_customize->add_setting(
    'portfolioxpress_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'portfolioxpress' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control(
        $wp_customize,
        'portfolioxpress_section_seperator_single_3',
        array(
            'settings' => 'portfolioxpress_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'portfolioxpress_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'portfolioxpress' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'portfolioxpress_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'portfolioxpress' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'portfolioxpress_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'portfolioxpress_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'portfolioxpress_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'portfolioxpress_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'portfolioxpress'),
            'id' => __('ID', 'portfolioxpress'),
            'title' => __('Title', 'portfolioxpress'),
            'rand' => __('Random', 'portfolioxpress'),
        ),
        'active_callback' => 'portfolioxpress_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'portfolioxpress_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'portfolioxpress'),
            'desc' => __('DESC', 'portfolioxpress'),
        ),
        'active_callback' => 'portfolioxpress_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control(
        $wp_customize,
        'portfolioxpress_section_seperator_single_4',
        array(
            'settings' => 'portfolioxpress_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'portfolioxpress_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'portfolioxpress' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'portfolioxpress_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'portfolioxpress' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'portfolioxpress_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'portfolioxpress_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'portfolioxpress_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'portfolioxpress_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'portfolioxpress'),
            'id' => __('ID', 'portfolioxpress'),
            'title' => __('Title', 'portfolioxpress'),
            'rand' => __('Random', 'portfolioxpress'),
        ),
        'active_callback' => 'portfolioxpress_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'portfolioxpress_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'portfolioxpress' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'portfolioxpress'),
            'desc' => __('DESC', 'portfolioxpress'),
        ),
        'active_callback' => 'portfolioxpress_is_author_posts_enabled',
    )
);