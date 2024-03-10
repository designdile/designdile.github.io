<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PortfolioXpress
 */

?>
    
    <?php do_action('portfolioxpress_before_footer'); ?>

    <?php
    if (!is_archive() && !is_home() && !is_search())  {
        $footer_image_class = '';
        $upload_footer_bg_image = portfolioxpress_get_option('upload_footer_bg_image');
        $enable_footer_image_overlay = portfolioxpress_get_option('enable_footer_image_overlay');
        if ($upload_footer_bg_image) {
            $footer_image_class .= 'data-bg';
        }
        if ($enable_footer_image_overlay) {
            $footer_image_class .= ' footer-has-overlay';
        }
        ?>
         <footer id="colophon" class="section site-footer <?php echo $footer_image_class; ?>" <?php if ($upload_footer_bg_image) { ?> data-background="<?php echo esc_url($upload_footer_bg_image); ?>" <?php } ?>>
            <?php get_template_part('template-parts/footer/footer-widgets'); ?>
            <?php get_template_part('template-parts/footer/footer-info'); ?>

            <?php
            $enable_scroll_to_top = portfolioxpress_get_option('enable_scroll_to_top');
            if ($enable_scroll_to_top) {
            ?>
                <a id="theme-scroll-to-start" href="javascript:void(0)">
                    <span class="screen-reader-text"><?php _e('Scroll to top', 'portfolioxpress'); ?></span>
                    <?php portfolioxpress_theme_svg('arrow-up'); ?>
                </a>
            <?php
            }
            ?>
        </footer><!-- #colophon -->
    <?php } ?>


    </div> <!-- main content container -->
</div>  <!-- site-content-area -->
<!-- gallery on popup code -->
<div class="portfolioxpress-gallery-popup">
    <img src="" alt="">

    <?php portfolioxpress_theme_svg('close'); ?>

    <button class="portfolioxpress-gallery-prev">
        <?php portfolioxpress_theme_svg('arrow-left'); ?>
    </button>
    
    <button class="portfolioxpress-gallery-next">
        <?php portfolioxpress_theme_svg('arrow-right'); ?>
    </button>
</div>

<?php do_action('portfolioxpress_after_footer'); ?>

</div><!-- #page -->

    <?php
        $enable_cursor_dot_outline = portfolioxpress_get_option('enable_cursor_dot_outline');
        if($enable_cursor_dot_outline){ ?>
            <!-- Custom cursor -->
            <div class="cursor-dot-outline"></div>
            <div class="cursor-dot"></div>
            <!-- .Custom cursor -->
    <?php } ?>

<?php do_action('portfolioxpress_after_site'); ?>

<?php wp_footer(); ?>

</body>

</html>