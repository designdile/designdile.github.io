<?php

if (!defined('ABSPATH')) {
    exit;
}

class PortfolioXpress_About_Widget extends PortfolioXpress_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_portfolioxpress_about_widget';
        $this->widget_description = __("About action section", 'portfolioxpress');
        $this->widget_id = 'portfolioxpress_about_widget';
        $this->widget_name = __('PortfolioXpress: About Widget', 'portfolioxpress');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('About Title', 'portfolioxpress'),
            ),
            'desc'  => array(
                'type'  => 'textarea',
                'label' => __( 'About Description', 'portfolioxpress' ),
                'rows' => 10,
            ),
            'image_4'  => array(
                'type'  => 'image',
                'label' => __( 'Upload Featured Image', 'portfolioxpress' ),
                'desc' => __( 'if you want to use video leave this field empty', 'portfolioxpress' ),

            ),
            'video_link'  => array(
                'type'  => 'url',
                'label' => __( 'Video Link url', 'portfolioxpress' ),
                'desc' => __( 'Enter a proper embed url with http: OR https:', 'portfolioxpress' ),
            ),
            'image_1'  => array(
                'type'  => 'image',
                'label' => __( 'Featured Image 1', 'portfolioxpress' ),
            ),
            'image_2'  => array(
                'type'  => 'image',
                'label' => __( 'Featured Image 2', 'portfolioxpress' ),
            ),
            'image_3'  => array(
                'type'  => 'image',
                'label' => __( 'Upload Your Signature', 'portfolioxpress' ),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action( 'portfolioxpress_before_cta');
        ?>

        <?php
        do_action( 'portfolioxpress_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }

}