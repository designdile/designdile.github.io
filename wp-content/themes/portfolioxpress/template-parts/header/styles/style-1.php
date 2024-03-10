<?php
$enable_search = portfolioxpress_get_option( 'enable_search_on_header' );
?>

<div class="site-branding-left">
    <?php if (is_active_sidebar('portfolioxpress-offcanvas-widget')): ?>
            <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'portfolioxpress'); ?></span>
                <span class="toggle-icon"><?php portfolioxpress_theme_svg('menu-alt'); ?></span>
            </button>
    <?php endif; ?>

    <?php get_template_part('template-parts/header/site-branding'); ?>
</div>

<div class="site-branding-right">
        <button id="theme-toggle-search-button" class="theme-button theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
            <span class="screen-reader-text"><?php _e('Search', 'portfolioxpress'); ?></span>
            <?php portfolioxpress_theme_svg('search'); ?>
        </button>

        <button id="theme-toggle-offcanvas-button" class="theme-button theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
            <span class="screen-reader-text"><?php _e('Menu', 'portfolioxpress'); ?></span>
            <span class="toggle-icon"><?php portfolioxpress_theme_svg('menu'); ?></span>
        </button>
</div>