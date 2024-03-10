<?php
/**/
$wp_customize->add_section(
    'home_page_testimonial_option',
    array(
        'title'      => __( 'Front Page Testimonial Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_testimonial_section]',
    array(
        'default'           => $default_options['enable_testimonial_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_testimonial_section]',
    array(
        'label'   => __( 'Enable Testimonial Section', 'portfolioxpress' ),
        'section' => 'home_page_testimonial_option',
        'type'    => 'checkbox',
    )
);



$wp_customize->add_setting(
    'charity_house_options[testimonial_section_title]',
    array(
        'default'           => $default_options['testimonial_section_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'charity_house_options[testimonial_section_title]',
    array(
        'label'    => __( 'Testimonial Section Title', 'portfolioxpress' ),
        'section'  => 'home_page_testimonial_option',
        'type'     => 'text',
    )
);


for ( $i=1; $i <= 5 ; $i++ ) {
        $wp_customize->add_setting( 'testimonial_select_page_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'portfolioxpress_sanitize_dropdown_pages',
            
        ) );

        $wp_customize->add_control( 'testimonial_select_page_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Testimonial Page', 'portfolioxpress' ) . ' - ' . $i ,
            'section'  => 'home_page_testimonial_option',
            'type'              => 'dropdown-pages',
            )
        );
    }

$wp_customize->add_setting(
    'portfolioxpress_options[upload_testimonial_section_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'portfolioxpress_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'portfolioxpress_options[upload_testimonial_section_bg_image]',
        array(
            'label'           => __( 'Upload Testimonial Section Background Image', 'portfolioxpress' ),
            'section'         => 'home_page_testimonial_option',
        )
    )
);