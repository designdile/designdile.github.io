<?php
/**
 * Displays Testimonial Section
 *
 * @package PortfolioXpress
 */
$testimonial_section_title = portfolioxpress_get_option('testimonial_section_title');
$upload_testimonial_section_bg_image = portfolioxpress_get_option('upload_testimonial_section_bg_image');
$testimonial_select_page = array();
for ($i=1; $i < 5; $i++) { 
    $testimonial_select_page[] = get_theme_mod('testimonial_select_page_' . $i);
}
if (!empty($testimonial_select_page)) {
    $testimonial_select_page_args = array(
        'post_type' => 'page',
        'orderby' => 'post__in',
        'posts_per_page' => 5,
        'post__in' => $testimonial_select_page,
    );
}
?>
    <section class="portfolioxpress-testimonial section">
        <?php if (!empty($upload_testimonial_section_bg_image)) { ?>
            <div class="theme-section-image">
                <img src="<?php echo esc_url($upload_testimonial_section_bg_image); ?>" alt="">
            </div>
        <?php } ?>
        <div class="wrapper-fluid">
            <div class="column-row">
                <div class="column column-12">
                    <?php if (!empty($testimonial_section_title)) { ?>
                        <div class="portfolioxpress-header header-title-center">
                            <h2 class="font-size-big m-0">
                                <?php echo esc_html($testimonial_section_title); ?>
                            </h2>
                        </div>
                    <?php } ?>
                    
                    <div class="portfolioxpress-body">
                        <div class="swiper testimonial-content-container">
                            <div class="swiper-wrapper">
        
                                <?php
                                if (!empty($testimonial_select_page_args)) {
                                    $count = 1;
                                    $testimonial_select_page_query = new WP_Query($testimonial_select_page_args);
                                    while ($testimonial_select_page_query->have_posts()): $testimonial_select_page_query->the_post();
                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="portfolioxpress-testimonial-content">
                                                        <?php if (!empty($featured_image)) { ?>
                                                            <div class="portfolioxpress-testimonial-image">
                                                                <img src="<?php echo esc_url($featured_image); ?>" alt="">
                                                            </div>
                                                        <?php } ?>
                
                                                        <div class="portfolioxpress-testimonial-detail">
                                                            <?php portfolioxpress_theme_svg('quote-2'); ?>
                
                                                            <div class="portfolioxpress-testimonial-excerpt mb-24 font-size-small">
                                                                <?php the_excerpt(); ?>
                                                            </div>
                
                                                            <h2 class="m-0">
                                                                <?php the_title(); ?>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            endwhile;
                                        wp_reset_postdata();
                                    }
                                        ?>
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>