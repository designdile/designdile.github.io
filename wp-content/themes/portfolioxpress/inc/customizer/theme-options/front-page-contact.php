<?php
/**/
$wp_customize->add_section(
    'home_page_contact_option',
    array(
        'title'      => __( 'Front Page Contact Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_contact_section]',
    array(
        'default'           => $default_options['enable_contact_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_contact_section]',
    array(
        'label'   => __( 'Enable Contact Section', 'portfolioxpress' ),
        'section' => 'home_page_contact_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[contact_select_page]',
    array(
        'default'           => $default_options['contact_select_page'],
        'sanitize_callback' => 'portfolioxpress_sanitize_dropdown_pages',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[contact_select_page]',
    array(
        'label'             => __( 'Contact Page', 'portfolioxpress' ) ,
        'section'  => 'home_page_contact_option',
        'type'              => 'dropdown-pages',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[contact_section_shortcode]',
    array(
        'default'           => $default_options['contact_section_shortcode'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[contact_section_shortcode]',
    array(
        'label'    => __( 'Contact section Shortcode', 'portfolioxpress' ),
        'section'  => 'home_page_contact_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_social_menu_contact_section]',
    array(
        'default'           => $default_options['enable_social_menu_contact_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_social_menu_contact_section]',
    array(
        'label'   => __( 'Enable Social Menu', 'portfolioxpress' ),
        'section' => 'home_page_contact_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[upload_contact_section_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'portfolioxpress_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'portfolioxpress_options[upload_contact_section_bg_image]',
        array(
            'label'           => __( 'Upload Contact Section Background Image', 'portfolioxpress' ),
            'section'         => 'home_page_contact_option',
        )
    )
);

