<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioXpress
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = portfolioxpress_get_page_layout();
?>
    <main id="site-content" role="main" class = "section">
        <div id="primary" class="content-area">

            <?php if (have_posts()) : ?>


                <div class="portfolioxpress-article-wrapper theme-fullpage">

                <div class="page-header section">
                    <?php
                    the_archive_title('<div class = "wrapper"> <h1 class="page-title font-size-big">', '</h1> </div>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </div><!-- .page-header -->
                
                <?php
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

                <?php 
                echo '</div><!-- .portfolioxpress-article-wrapper -->';

                get_template_part('template-parts/pagination');

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div> <!-- #primary -->

    </main> <!-- #site-content-->
<?php
get_footer();