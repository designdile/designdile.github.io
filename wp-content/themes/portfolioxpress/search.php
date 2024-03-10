<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package PortfolioXpress
 */
get_header();
$page_layout = portfolioxpress_get_page_layout();
global $wp_query;
$archive_title = sprintf(
    '%1$s %2$s',
    '<span class="color-accent">' . __('Search:', 'portfolioxpress') . '</span>',
    '&ldquo;' . get_search_query() . '&rdquo;'
);

if ($wp_query->found_posts) {
    $archive_subtitle = sprintf(
    /* translators: %s: Number of search results. */
        _n(
            '%s result for your search.',
            '%s results for your search.',
            $wp_query->found_posts,
            'portfolioxpress'
        ),
        number_format_i18n($wp_query->found_posts)
    );
} else {
    $archive_subtitle = __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'portfolioxpress');
}
?>

    <main id="site-content" role="main">
        <div id="primary" class="content-area">

            <?php if (have_posts()) : ?>

                <div class="portfolioxpress-article-wrapper theme-fullpage ">

                <div class="page-header section">
                    <div class="wrapper">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'portfolioxpress'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </div>
                </div><!-- .page-header -->
                
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part('template-parts/content', 'search');

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

            else : ?>
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <div class="portfolioxpress-article-wrapper">
                            <div class="page-header section">
                                <div class="archive-header-content-wrap">
                                    <h1 class="archive-title">
                                        <?php echo wp_kses_post($archive_title); ?>
                                    </h1>
                                    <div class="archive-subtitle"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
                                </div>
                            </div><!-- .page-header -->
        
                            <div class="no-search-results-form section">
                                <?php
                                get_search_form(
                                    array(
                                        'aria_label' => __('search again', 'portfolioxpress'),
                                    )
                                );
                                ?>
                            </div><!-- .no-search-results -->
                        </div><!-- .portfolioxpress-article-wrapper -->
                    </div>
                </div>
            </div>


            <?php $footer_image_class = '';
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

            <?php endif;
            ?>

        </div> <!-- #primary -->
    </main> <!-- #site-content-->

<?php
get_footer();
