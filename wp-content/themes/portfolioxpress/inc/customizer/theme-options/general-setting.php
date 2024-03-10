<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);

$wp_customize->add_setting(
    'portfolioxpress_options[enable_cursor_dot_outline]',
    array(
        'default' => $default_options['enable_cursor_dot_outline'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_cursor_dot_outline]',
    array(
        'label' => esc_html__('Enable Cursor Dot Outline', 'portfolioxpress'),
        'section' => 'general_settings',
        'type' => 'checkbox',
    )
);


/* Footer Background Color*/
$wp_customize->add_setting(
    'portfolioxpress_options[site_text_color]',
    array(
        'default' => $default_options['site_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'portfolioxpress_options[site_text_color]',
        array(
            'label' => __('Site Title Text Color', 'portfolioxpress'),
            'section' => 'title_tagline',
            'type' => 'color',
        )
    )
);