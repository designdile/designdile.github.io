<?php 
/**
 * Displays before footer widget area.
 *
 * @package PortfolioXpress
 */

if ( is_active_sidebar( 'fullwidth-footer-widgetarea' ) ) : ?>

<div class="theme-widgetarea theme-widgetarea-full section" role="complementary">
    <?php dynamic_sidebar( 'fullwidth-footer-widgetarea' ); ?>
</div>

<?php endif; ?>