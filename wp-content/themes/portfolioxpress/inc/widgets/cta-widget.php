<?php

if (!defined('ABSPATH')) {
    exit;
}

class PortfolioXpress_Call_To_Action extends PortfolioXpress_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_portfolioxpress_call_to_action';
        $this->widget_description = __("Adds Call to action section", 'portfolioxpress');
        $this->widget_id = 'portfolioxpress_call_to_action';
        $this->widget_name = __('PortfolioXpress: Call To Action', 'portfolioxpress');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('CTA Title', 'portfolioxpress'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('CTA Subtitle', 'portfolioxpress'),
            ),
            'desc'  => array(
                'type'  => 'textarea',
                'label' => __( 'CTA Description', 'portfolioxpress' ),
                'rows' => 10,
            ),
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'portfolioxpress' ),
            ),
            'btn_text'  => array(
                'type'  => 'text',
                'label' => __( 'Button Text', 'portfolioxpress' ),
            ),
            'btn_link'  => array(
                'type'  => 'url',
                'label' => __( 'Link to url', 'portfolioxpress' ),
                'desc' => __( 'Enter a proper url with http: OR https:', 'portfolioxpress' ),
            ),
            'link_target'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Open Link in new Tab', 'portfolioxpress' ),
                'std' => true,
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'portfolioxpress'),
            ),
            'height'  => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 400,
                'label' => __('Height: Between 300px and 700px (Default 400px)', 'portfolioxpress'),
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Text Color', 'portfolioxpress' ),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'portfolioxpress'),
                'options' => array(
                    'left' => __('Left Align', 'portfolioxpress'),
                    'center' => __('Center Align', 'portfolioxpress'),
                    'right' => __('Right Align', 'portfolioxpress'),
                ),
                'std' => 'left',
            ),
            'enable_fixed_bg'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Fixed Background Image', 'portfolioxpress' ),
                'std' => true,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __( 'Overlay Background Color', 'portfolioxpress' ),
                'std' => '#000000',
            ),
            'overlay_opacity'  => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'portfolioxpress'),
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

        <?php if( $instance['bg_image'] && 0!= $instance['bg_image']) :?>

            <?php
            $style_text = 'color:'.$instance['text_color_option'].';';
            $style_text .= 'min-height:'.$instance['height'].'px;';

            $style_text .= 'text-align:'.$instance['text_align'].';';

            $style = 'background-color:'.$instance['bg_overlay_color'].';';
            $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
            ?>

            <div class="portfolioxpress-cta-widget portfolioxpress-cover-block <?php echo ($instance['enable_fixed_bg']) ? 'portfolioxpress-bg-image portfolioxpress-bg-attachment-fixed' : '';?> mb-lg-40" style="<?php echo esc_attr($style_text);?>">

                <span aria-hidden="true" class="portfolioxpress-block-overlay" style="<?php echo esc_attr($style);?>"></span>

                <?php echo wp_get_attachment_image($instance['bg_image'],'full');?>

                <div class="portfolioxpress-cta-content">
                    <?php if ($instance['title']) : ?>
                        <h2 class="entry-title font-size-large mb-8">
                            <?php echo esc_html($instance['title']); ?>
                        </h2>
                    <?php endif;?>

                    <?php if ($instance['title_text']) : ?>
                        <h3 class="entry-title font-size-big mb-16">
                            <?php echo esc_html($instance['title_text']); ?>
                        </h3>
                    <?php endif;?>

                    <?php if ($instance['desc']) : ?>
                        <div class="entry-summary mb-32">
                            <?php echo wpautop(wp_kses_post($instance['desc'])); ?>
                        </div>
                    <?php endif;?>

                    <?php if ($instance['btn_text']) : ?>
                        <footer class="entry-footer">
                            <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']): '';?>" target="<?php echo ($instance['link_target']) ? "_blank": '_self';?>" class="theme-button">
                                <?php echo esc_html(($instance['btn_text']));?>
                            </a>
                        </footer>
                    <?php endif; ?>

                </div>

            </div>
            
        <?php endif;?>

        <?php

        do_action( 'portfolioxpress_after_cta');

        echo $args['after_widget'];

        echo ob_get_clean();
    }

}