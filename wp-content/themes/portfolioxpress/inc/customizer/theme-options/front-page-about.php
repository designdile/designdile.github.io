<?php
/**/
$wp_customize->add_section(
    'home_page_about_option',
    array(
        'title'      => __( 'Front Page About Options', 'portfolioxpress' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'portfolioxpress_options[enable_about_section]',
    array(
        'default'           => $default_options['enable_about_section'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_about_section]',
    array(
        'label'   => __( 'Enable About Section', 'portfolioxpress' ),
        'section' => 'home_page_about_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'portfolioxpress_options[about_section_post_title]',
    array(
        'default'           => $default_options['about_section_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_post_title]',
    array(
        'label'    => __( 'About section Title', 'portfolioxpress' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[about_select_page]',
    array(
        'default'           => $default_options['about_select_page'],
        'sanitize_callback' => 'portfolioxpress_sanitize_dropdown_pages',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_select_page]',
    array(
        'label'             => __( 'About Page', 'portfolioxpress' ) ,
        'section'  => 'home_page_about_option',
        'type'              => 'dropdown-pages',
    )
);



$wp_customize->add_setting(
    'portfolioxpress_options[about_section_button_text]',
    array(
        'default'           => $default_options['about_section_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_button_text]',
    array(
        'label'    => __( 'About Section Button Text', 'portfolioxpress' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[about_section_button_link]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_button_link]',
    array(
        'label'           => __( 'About Section Button Link', 'portfolioxpress' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'portfolioxpress' ),
    )
);



$wp_customize->add_setting(
    'portfolioxpress_options[about_section_button_text_2]',
    array(
        'default'           => $default_options['about_section_button_text_2'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_button_text_2]',
    array(
        'label'    => __( 'About Section Button Text - 2', 'portfolioxpress' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[about_section_button_link_2]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_button_link_2]',
    array(
        'label'           => __( 'About Section Button Link - 2', 'portfolioxpress' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'portfolioxpress' ),
    )
);



$wp_customize->add_setting(
    'portfolioxpress_options[upload_about_section_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'portfolioxpress_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'portfolioxpress_options[upload_about_section_bg_image]',
        array(
            'label'           => __( 'Upload About Section Background Image', 'portfolioxpress' ),
            'section'         => 'home_page_about_option',
        )
    )
);



$wp_customize->add_setting(
    'portfolioxpress_options[about_section_featured_on_title]',
    array(
        'default'           => $default_options['about_section_featured_on_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[about_section_featured_on_title]',
    array(
        'label'    => __( 'About Section Featured Title', 'portfolioxpress' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);
for ($i= 1; $i < 5; $i++) { 
    $wp_customize->add_setting(
    'portfolioxpress_options[upload_about_section_bg_image_'.$i.']',
        array(
            'default'           => '',
            'sanitize_callback' => 'portfolioxpress_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'portfolioxpress_options[upload_about_section_bg_image_'.$i.']',
            array(
                'label'           => __( 'Featured Site Logo -', 'portfolioxpress' ).$i,
                'section'         => 'home_page_about_option',
            )
        )
    );
}