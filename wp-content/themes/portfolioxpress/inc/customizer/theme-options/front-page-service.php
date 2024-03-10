<?php
/**/
$wp_customize->add_section(
    'home_page_service_option',
    array(
        'title'      => __( 'Front Page Service Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_service_section]',
    array(
        'default'           => $default_options['enable_service_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_service_section]',
    array(
        'label'   => __( 'Enable Service Section', 'portfolioxpress' ),
        'section' => 'home_page_service_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[service_section_title]',
    array(
        'default'           => $default_options['service_section_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[service_section_title]',
    array(
        'label'    => __( 'Service section Title', 'portfolioxpress' ),
        'section'  => 'home_page_service_option',
        'type'     => 'text',
    )
);


for ( $i=1; $i <= 5 ; $i++ ) {
        $wp_customize->add_setting( 'service_icon_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            
        ) );

        $wp_customize->add_control( 'service_icon_'. $i, array(
            'label'             => __( 'Service Icon', 'portfolioxpress' ) . ' - ' . $i ,
            'section'  => 'home_page_service_option',
            'type'              => 'text',
            )
        );

        $wp_customize->add_setting( 'service_select_page_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'portfolioxpress_sanitize_dropdown_pages',
            
        ) );

        $wp_customize->add_control( 'service_select_page_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Service Page', 'portfolioxpress' ) . ' - ' . $i ,
            'section'  => 'home_page_service_option',
            'type'              => 'dropdown-pages',
            )
        );
    }

$wp_customize->add_setting(
    'portfolioxpress_options[upload_service_section_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'portfolioxpress_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'portfolioxpress_options[upload_service_section_bg_image]',
        array(
            'label'           => __( 'Upload Service Section Background Image', 'portfolioxpress' ),
            'section'         => 'home_page_service_option',
        )
    )
);


