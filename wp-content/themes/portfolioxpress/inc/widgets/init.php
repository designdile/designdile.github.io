<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/recent-widget.php';
require get_template_directory() . '/inc/widgets/social-widget.php';
require get_template_directory() . '/inc/widgets/author-widget.php';
require get_template_directory() . '/inc/widgets/newsletter-widget.php';
require get_template_directory() . '/inc/widgets/tab-widget.php';
require get_template_directory() . '/inc/widgets/cta-widget.php';
require get_template_directory() . '/inc/widgets/class-about-widget.php';
require get_template_directory() . '/inc/widgets/gallery-widget.php';

/* Register site widgets */
if ( ! function_exists( 'portfolioxpress_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function portfolioxpress_widgets() {
        register_widget( 'PortfolioXpress_Recent_Posts' );
        register_widget( 'PortfolioXpress_Social_Menu' );
        register_widget( 'PortfolioXpress_Author_Info' );
        register_widget( 'PortfolioXpress_Mailchimp_Form' );
        register_widget( 'PortfolioXpress_Call_To_Action' );
        register_widget( 'PortfolioXpress_Tab_Posts' );
        register_widget( 'PortfolioXpress_About_Widget' );
        register_widget( 'PortfolioXpress_Gallery_Widget' );
    }
endif;
add_action( 'widgets_init', 'portfolioxpress_widgets' );