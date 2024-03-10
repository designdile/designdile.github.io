<?php

/**
 * Displays recommended post on footer.
 *
 * @package PortfolioXpress
 */
$enable_category_meta = portfolioxpress_get_option('enable_category_meta');
$enable_date_meta = portfolioxpress_get_option('enable_date_meta');
$enable_post_excerpt = portfolioxpress_get_option('enable_post_excerpt');
$enable_author_meta = portfolioxpress_get_option('enable_author_meta');
$select_cat_for_footer_recommended_post = portfolioxpress_get_option('select_cat_for_footer_recommended_post');
?>
<div class="site-section site-recommendation section">
    <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
        if ($footer_recommended_post_query->have_posts()) :
            while ($footer_recommended_post_query->have_posts()) : $footer_recommended_post_query->the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-recommended-post'); ?>>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-image image-size-medium mb-12">
                            <figure class="featured-media featured-media-medium">
                                <a href="<?php the_permalink() ?>">
                                    <?php
                                    the_post_thumbnail('medium_large', array(
                                        'alt' => the_title_attribute(array(
                                            'echo' => false,
                                        )),
                                    ));
                                    ?>
                                </a>
                            </figure>
                        </div>
                    <?php endif; ?>

                    <div class="theme-article-detail">
                        <?php if ($enable_category_meta) { ?>
                            <div class="entry-categories mb-4">
                                <span class="screen-reader-text"><?php _e('Categories', 'portfolioxpress'); ?></span>
                                <div class="portfolioxpress-entry-categories">
                                    <?php the_category(' '); ?>
                                </div>
                            </div><!-- .entry-categories -->
                        <?php } ?>

                        <header class="entry-header">
                            <?php the_title('<h3 class="entry-title font-size-big line-clamp line-clamp-2 mb-12"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                        </header>
                        <?php if ($enable_post_excerpt) { ?>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php } ?>
                        <?php if ($enable_date_meta) {
                            portfolioxpress_posted_on();
                        } ?>
                        <?php if ($enable_author_meta) {
                            portfolioxpress_posted_by();
                        } ?>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
</div>
<?php endif; ?>