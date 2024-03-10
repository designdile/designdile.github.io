<?php

/**
 * Displays the site header.
 *
 * @package PortfolioXpress
 */

$wrapper_classes  = 'site-header theme-site-header';
?>
<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?> " role="banner">
<div class="wrapper">
    <div class="column-row">
        <div class="column column-12">
            <div class = "header-content-container">
                <?php
                get_template_part('template-parts/header/styles/style-1');
                ?>
            </div>
        </div>
    </div>
</div>
</header><!-- #masthead -->

<?php get_template_part('template-parts/header/components/header-offcanvas-widget'); ?>
<?php get_template_part('template-parts/header/components/header-offcanvas'); ?>
<?php get_template_part('template-parts/header/components/header-search'); ?>