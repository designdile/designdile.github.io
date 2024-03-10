<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'portfolioxpress_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'portfolioxpress' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'portfolioxpress' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'portfolioxpress' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'portfolioxpress' ),
        ),
        'active_callback' => 'portfolioxpress_is_show_preloader',

    )
);
