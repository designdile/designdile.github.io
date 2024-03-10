<?php
$enable_copyright = portfolioxpress_get_option('enable_copyright');
$enable_footer_nav = portfolioxpress_get_option('enable_footer_nav');
$enable_footer_social_nav = portfolioxpress_get_option('enable_footer_social_nav');
    ?>
    <div class="theme-footer-bottom">
        <?php if ($enable_footer_social_nav && has_nav_menu('social-menu')): ?>
            <div class="site-footer-menu site-footer-social-menu">
                <div class="wrapper">

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'container_class' => 'footer-social-navigation',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'menu_class' => 'theme-social-navigation theme-menu theme-footer-navigation',
                        'link_before' => '<span class="social-profile-label">',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="wrapper">
            <div class="column-row">
                <div class="column column-6 column-md-6 column-sm-12">
                    <div class="theme-author-credit">

                        <?php if($enable_copyright):?>
                            <div class="theme-copyright-info">
                                <?php
                                $copyright_text = portfolioxpress_get_option('copyright_text');
                                if($copyright_text):
                                    echo wp_kses_post($copyright_text);
                                endif;
                                $copyright_date_format = portfolioxpress_get_option( 'copyright_date_format', 'Y' );
                                if($copyright_date_format){
                                    echo ' '.date_i18n( $copyright_date_format, current_time( 'timestamp' ) );
                                }
                                $active_theme = wp_get_theme();
                                $active_theme_textdomain = esc_html($active_theme->get('TextDomain'));
                                printf(esc_html__(' %1$s.', 'portfolioxpress'), $active_theme_textdomain);
                                ?>
                            </div><!-- .theme-copyright-info -->
                        <?php endif; ?>

                            <div class="theme-credit-info">
                                <?php printf(esc_html__('Designed & Developed by %1$s', 'portfolioxpress'), '<a href="https://themeinwp.com/" target = "_blank" rel="designer">ThemeinWP Team</a>'); ?>
                            </div>

                    </div><!-- .theme-author-credit-->
                </div>

                <?php if($enable_footer_nav): ?>
                    <div class="column column-6 column-md-6 column-sm-12">
                    <div class="site-footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'container_class' => 'footer-navigation',
                            'fallback_cb' => false,
                            'depth' => 1,
                            'menu_class' => 'theme-footer-navigation theme-menu theme-footer-navigation'
                        ) );
                        ?>
                    </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- .theme-footer-bottom-->