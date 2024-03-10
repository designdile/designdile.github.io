<?php

if (!defined('ABSPATH')) {
    exit;
}

class PortfolioXpress_Social_Menu extends PortfolioXpress_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_portfolioxpress_social_menu';
        $this->widget_description = __("Displays social menu if you have set it.", 'portfolioxpress');
        $this->widget_id = 'portfolioxpress_social_menu';
        $this->widget_name = __('PortfolioXpress: Social Menu', 'portfolioxpress');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'portfolioxpress'),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'portfolioxpress'),
                'options' => array(
                    'style_1' => __('Style 1', 'portfolioxpress'),
                    'style_2' => __('Style 2', 'portfolioxpress'),
                    'style_3' => __('Style 3', 'portfolioxpress'),
                ),
                'std' => 'style_1',
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

        $this->widget_start($args, $instance);

        do_action( 'portfolioxpress_before_social_menu');

        $style = $instance['style'];

        ?>
        <div class="portfolioxpress-social-menu-widget <?php echo esc_attr($style);?>">
            <?php

            if ( has_nav_menu( 'social-menu' ) ) {
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'container_class' => 'footer-navigation',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'menu_class' => 'portfolioxpress-social-icons reset-list-style',
                    'link_before' => '<span class="social-media-title">',
                    'link_after' => '</span>',
                ) );
            }else{
                esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'portfolioxpress' );
            }
            ?>
        </div>
        <?php

        do_action( 'portfolioxpress_after_social_menu');

        $this->widget_end($args);

        echo ob_get_clean();
    }
}