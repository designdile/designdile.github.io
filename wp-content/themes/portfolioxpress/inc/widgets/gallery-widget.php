<?php

if (!defined('ABSPATH')) {
    exit;
}

class PortfolioXpress_Gallery_Widget extends PortfolioXpress_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_portfolioxpress_gallery_widget';
        $this->widget_description = __("Gallery action section", 'portfolioxpress');
        $this->widget_id = 'portfolioxpress_gallery_widget';
        $this->widget_name = __('PortfolioXpress: Gallery Widget', 'portfolioxpress');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Gallery Title', 'portfolioxpress'),
            ),
            'gallery_attachment_image_id' => array(
                'type' => 'text',
                'label' => __('Gallery Attachment Image Id', 'portfolioxpress'),
                'desc' => __( 'Enter a proper image id with , as selerator eg: id1 id2 id3 at max 9 image id only', 'portfolioxpress' ),
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
        <div class="portfolioxpress-gallery header-title-center mb-lg-40">
            <?php if( $instance['title'] && 0!= $instance['title']) {?>
                <div class="portfolioxpress-header px-40 mb-32">
                    <h2 class="font-size-big ">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                </div>
            <?php } ?>

            <div class="portfolioxpress-body">
                <div class="gallery-image-container">
                <?php 
                $image_id_arrya = $instance['gallery_attachment_image_id']; 
                 $image_id = strtok($image_id_arrya, " ");
                    while ($image_id !== false){ ?>
                        <div class="portfolioxpress-gallery-image">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id,'medium_large'));?>">
                        </div>
                    <?php     
                        $image_id = strtok(" ");
                    }
                   ?>


                </div>
            </div>
        </div>

        <?php
        do_action( 'portfolioxpress_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }

}