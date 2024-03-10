<?php
$wp_customize->add_section(
    'archive_options' ,
    array(
        'title' => __( 'Archive Options', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[archive_post_alignmnet]',
    array(
        'default'           => $default_options['archive_post_alignmnet'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[archive_post_alignmnet]',
    array(
        'label'       => __( 'Article Post Alignment', 'portfolioxpress' ),
        'section'     => 'archive_options',
        'type'        => 'select',
        'choices'     => array(
            'left' => __( 'Left', 'portfolioxpress' ),
            'center' => __( 'Center', 'portfolioxpress' ),
            'right' => __( 'Right', 'portfolioxpress' ),
        ),
    )
);


$wp_customize->add_setting(
    'portfolioxpress_section_seperator_archive_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control(
        $wp_customize,
        'portfolioxpress_section_seperator_archive_1',
        array(
            'settings' => 'portfolioxpress_section_seperator_archive_1',
            'section' => 'archive_options',
        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'portfolioxpress_options[archive_post_meta_1]',
    array(
        'default'           => $default_options['archive_post_meta_1'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new PortfolioXpress_Checkbox_Multiple(
        $wp_customize,
        'portfolioxpress_options[archive_post_meta_1]',
        array(
            'label'	=> __( 'Archive Post Meta', 'portfolioxpress' ),
            'description'	=> __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'portfolioxpress' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'portfolioxpress' ),
                'date' => __( 'Date', 'portfolioxpress' ),
                'comment' => __( 'Comment', 'portfolioxpress' ),
                'category' => __( 'Category', 'portfolioxpress' ),
                'tags' => __( 'Tags', 'portfolioxpress' ),
            ),
        )

    )
);


$wp_customize->add_setting(
    'portfolioxpress_section_seperator_archive_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new PortfolioXpress_Seperator_Control(
        $wp_customize,
        'portfolioxpress_section_seperator_archive_2',
        array(
            'settings' => 'portfolioxpress_section_seperator_archive_2',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting('portfolioxpress_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfolioxpress_sanitize_number_range',
    )
);
$wp_customize->add_control('portfolioxpress_options[excerpt_length]',
    array(
        'label'       => esc_html__('Excerpt Length', 'portfolioxpress'),
        'description'       => esc_html__( 'Max number of words. Set it to 0 to disable. (step-1)', 'portfolioxpress' ),
        'section'     => 'archive_options',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 0,
                       'max'   => 100,
                       'step'   => 1,
                    ),
    )
);
