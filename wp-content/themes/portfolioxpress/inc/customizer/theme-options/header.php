<?php
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);

/*Enable Search*/
$wp_customize->add_setting(
    'portfolioxpress_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'portfolioxpress' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'portfolioxpress_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'portfolioxpress_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'portfolioxpress' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'portfolioxpress_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'portfolioxpress_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'portfolioxpress_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'portfolioxpress' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}