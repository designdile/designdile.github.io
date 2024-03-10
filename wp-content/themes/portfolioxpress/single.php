<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PortfolioXpress
 */

get_header();
// Add a main container in case if sidebar is present
$class = '';
$page_layout = portfolioxpress_get_page_layout();
?>
<?php
global $post;
$portfolioxpress_post_layout = esc_html( get_post_meta( $post->ID, 'portfolioxpress_post_layout', true ) ); 
$featured_image = "";
if (has_post_thumbnail($post->ID)) {
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
    $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; 
} 
if ($portfolioxpress_post_layout == "layout-2") { ?>
    <div class="single-featured-banner">
        <div class="featured-banner-media">
            <div class="data-bg image-size-large data-bg-fixed" data-background="<?php echo esc_url($featured_image); ?>"></div>
        </div>
        <div class="featured-banner-content">
            <div class="wrapper">
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title font-size-large">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="portfolioxpress-entry-meta">
                            <?php
                            portfolioxpress_posted_on();
                            $byline = sprintf(
                            /* translators: %s: post author. */
                                esc_html_x('by %s', 'post author', 'portfolioxpress'),
                                '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url( $post->post_author )) . '">' . esc_html(get_the_author_meta( 'nicename', $post->post_author )) . '</a></span>'
                            );

                            echo '<span class="byline"> ' . $byline . '</span>';
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
<?php } ?>

    <main id="site-content" role="main" class = "section">
        <div id="primary" class="content-area">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'portfolioxpress') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'portfolioxpress') . '</span> <span class="nav-title">%title</span>',
                    )
                );

                if ('post' === get_post_type()) :

                    // Get Author Info & related/Author posts
                    $show_author_info = portfolioxpress_get_option('show_author_info');
                    $show_related_posts = portfolioxpress_get_option('show_related_posts');
                    $show_author_posts = portfolioxpress_get_option('show_author_posts');

                    if ($show_author_info):
                        get_template_part('template-parts/single/author-info');
                    endif;

                    if ($show_related_posts):
                        get_template_part('template-parts/single/related-posts');
                    endif;

                    if ($show_author_posts):
                        get_template_part('template-parts/single/author-posts');
                    endif;

                endif;

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </div><!-- #primary -->
        <?php
        if ('no-sidebar' != $page_layout) {
            get_sidebar();
        }
        ?>
    </main>
<?php
get_footer();
