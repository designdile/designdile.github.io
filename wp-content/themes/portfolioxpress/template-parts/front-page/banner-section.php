<?php
/**
 * Displays Banner Section
 *
 * @package PortfolioXpress
 */
$banner_section_cat = portfolioxpress_get_option('banner_section_cat');
$banner_section_slider_layout = 'site-banner-layout-1';
$number_of_slider_post = portfolioxpress_get_option('number_of_slider_post');
$enable_banner_cat_meta = portfolioxpress_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = portfolioxpress_get_option('enable_banner_author_meta');
$enable_banner_date_meta = portfolioxpress_get_option('enable_banner_date_meta');
$enable_banner_pagination = portfolioxpress_get_option('enable_banner_pagination');
$enable_banner_post_description = portfolioxpress_get_option('enable_banner_post_description');
$slider_post_content_alignment = portfolioxpress_get_option('slider_post_content_alignment');
$slider_pagination = "";
if (empty($enable_banner_pagination)) {
    $slider_post_content_alignment = "align-left";
} else {
$slider_pagination = "pagination-banner-on";
}
$slider_pagenav = '';
?>

<div class="site-section site-banner section <?php echo esc_attr($slider_pagination) ?>">
    <div class="theme-banner-slider swiper-container ">
        <div class="swiper-wrapper">
            <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
            if ($banner_post_query->have_posts()) :
                while ($banner_post_query->have_posts()) : $banner_post_query->the_post();
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $featured_image_1 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                $featured_image_1 = isset($featured_image_1[0]) ? $featured_image_1[0] : '';
            ?>
                <div class="swiper-slide">

                    <div class="slide-inner">
                        <div class="data-bg-overlay"></div>
                        <div class="data-bg slide-featured-background" data-background="<?php echo esc_url($featured_image); ?>"></div>

                        <div class="slider-content <?php echo $slider_post_content_alignment; ?>">
                            <div class="wrapper">
                                <div class = "banner-slide-content">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-categories">
                                            <span class="screen-reader-text"><?php _e('Categories', 'portfolioxpress'); ?></span>
                                            <div class="portfolioxpress-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                    <h2 class="entry-title font-size-large line-clamp line-clamp-3 mb-24">
                                        <?php the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                    </h2>
        
                                    <?php if ($enable_banner_post_description) { ?>
                                        <div class="entry-summary">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php } ?>
        
                                    <div class="">
                                        <?php
                                        portfolioxpress_posted_on();
        
                                        portfolioxpress_posted_by();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
                $slider_pagenav .= '<div class="swiper-slide">';
                $slider_pagenav .= '<img src="'.esc_url($featured_image_1).'"/>';
                $slider_pagenav .= '</div>';
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
    <div class="banner-slider-pagination">
        <div class="swiper banner-slider-pagnav">
            <div class="swiper-wrapper">
                <?php echo $slider_pagenav; ?>
            </div>
        </div>
    </div>
</div>