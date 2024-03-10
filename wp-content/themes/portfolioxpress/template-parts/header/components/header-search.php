<?php
/**
 * Displays Search
 *
 * @package PortfolioXpress
 */

?>

<div class="theme-search-panel">
    <div class="wrapper">
        <div id="theme-header-search" class="search-panel-wrapper">
            <?php
            get_search_form(
                array(
                    'aria_label' => __('Search for:', 'portfolioxpress'),
                )
            );
            ?>
            <button id="portfolioxpress-search-canvas-close" class="theme-button theme-button-transparent search-close">
                <span class="screen-reader-text">
                    <?php _e('Close search', 'portfolioxpress'); ?>
                </span>
                <?php portfolioxpress_theme_svg('close'); ?>
            </button><!-- .search-toggle -->

        </div>
    </div>
</div> <!-- theme-search-panel -->