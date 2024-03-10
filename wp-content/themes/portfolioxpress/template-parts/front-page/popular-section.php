<?php

/**
 * Displays Popular Section
 *
 * @package PortfolioXpress
 */
$popular_section_post_title = portfolioxpress_get_option('popular_section_post_title');
$popular_section_cat = portfolioxpress_get_option('popular_section_cat');
$number_of_popular_post = portfolioxpress_get_option('number_of_popular_post');
$enable_popular_cat_meta = portfolioxpress_get_option('enable_popular_cat_meta');
$enable_popular_author_meta = portfolioxpress_get_option('enable_popular_author_meta');
$enable_popular_date_meta = portfolioxpress_get_option('enable_popular_date_meta');
$upload_popular_section_bg_image = portfolioxpress_get_option('upload_popular_section_bg_image');
?>
<div class="site-section portfolioxpress-popular section">
    <?php if (!empty($upload_popular_section_bg_image)) { ?>
        <div class="theme-section-image">
            <img src="<?php echo esc_url($upload_popular_section_bg_image); ?>" alt="">
        </div>
    <?php } ?>
    <div class="wrapper-fluid">

                <?php if ($popular_section_post_title) { ?>
                    <header class="portfolioxpress-header header-title-center mb-32">
                        <h2 class="font-size-big m-0">
                            <?php echo esc_html($popular_section_post_title); ?>
                        </h2>
                    </header>
                <?php } ?>
                <div class="portfolioxpress-popular-container swiper">
                    <div class="swiper-wrapper">
                        <?php $popular_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_popular_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($popular_section_cat)));
                        if ($popular_post_query->have_posts()) :
                            while ($popular_post_query->have_posts()) : $popular_post_query->the_post();
                        ?>
                                <div class="swiper-slide">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
                                            <div class="entry-image image-size-large">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <figure class="featured-media">
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
                                                <?php endif; ?>
                                            </div>
            
                                        <div class="portfolio-block-content">
                                            <div class="entry-categories mb-4">
                                                <?php if ($enable_popular_cat_meta) { ?>
                                                    <div class="entry-categories">
                                                        <span class="screen-reader-text"><?php _e('Categories', 'portfolioxpress'); ?></span>
                                                        <div class="portfolioxpress-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                                <?php } ?>
                                            </div><!-- .entry-categories -->
            
                                            <h3 class="entry-title font-size-medium line-clamp line-clamp-2 m-0 mb-8">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

    </div>
</div>