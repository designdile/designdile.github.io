<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'portfolioxpress' ),
        'panel' => 'portfolioxpress_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'portfolioxpress_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'portfolioxpress_sanitize_select',
    )
);
$wp_customize->add_control(
    'portfolioxpress_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'portfolioxpress' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'portfolioxpress' ),
            'numeric' => __( 'Numeric', 'portfolioxpress' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'portfolioxpress' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'portfolioxpress' ),
        ),
    )
);
