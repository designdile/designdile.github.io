<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioXpress
 */
get_header();
global $twp_archive_number;

// Add a main container in case if sidebar is present
$class = '';
$page_layout = portfolioxpress_get_page_layout();
 ?>
    <div id="site-content" role="main" class = "section">
    
            <?php
            if (have_posts()) :
                if (is_home() && !is_front_page()) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php
                endif;
                ?>
                <div class="portfolioxpress-article-wrapper theme-fullpage">
                
                <?php 
                    $twp_archive_number = 1;
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                    get_template_part('template-parts/content', 'archive');

                endwhile;
                
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
                 <footer id="colophon" class="section site-footer <?php echo $footer_image_class; ?>" <?php if ($upload_footer_bg_image) { ?> data-background="<?php echo esc_url($upload_footer_bg_image); ?>" <?php } ?> >
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
                <?php echo '</div><!-- .portfolioxpress-article-wrapper -->';

                get_template_part('template-parts/pagination');

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

            </div>
        
<?php

get_footer();
