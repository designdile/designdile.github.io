<?php
/**
 * Displays Service Section
 *
 * @package PortfolioXpress
 */
$service_section_title = portfolioxpress_get_option('service_section_title');
$upload_service_section_bg_image = portfolioxpress_get_option('upload_service_section_bg_image');
$service_select_page = array();
$service_select_icon = array();
for ($i=1; $i < 6; $i++) { 
    $service_select_page[] = get_theme_mod('service_select_page_' . $i);
    $service_select_icon[] = get_theme_mod('service_icon_' . $i);

}
if (!empty($service_select_page)) {
    $service_select_page_args = array(
        'post_type' => 'page',
        'orderby' => 'post__in',
        'posts_per_page' => 5,
        'post__in' => $service_select_page,
    );
}
?>
    <div class="portfolioxpress-service-block section">
        <?php if (!empty($upload_service_section_bg_image)) { ?>
            <div class="theme-section-image">
                <img src="<?php echo esc_url($upload_service_section_bg_image); ?>" alt="">
            </div>
        <?php } ?>
        <div class="wrapper">
            <div class="column-row">
                <div class="column column-4 column-md-6 column-sm-6 column-xs-12 mb-32">
                    <div class="our-service-item">
                        <h2 class="font-size-big m-0">
                            <?php echo esc_html($service_section_title); ?>
                        </h2>
                    </div>
                </div>
                <?php
                if (!empty($service_select_page_args)) {
                    $count = 0;
                    $service_select_page_query = new WP_Query($service_select_page_args);
                    while ($service_select_page_query->have_posts()): $service_select_page_query->the_post(); ?>

                        <div class="column column-4 column-md-6 column-sm-6 column-xs-12 mb-32">
                            <div class="our-service-item">
                                <?php 
                                if (!empty($service_select_icon[$count])) {
                                    portfolioxpress_theme_svg($service_select_icon[$count]);
                                } ?>

                                <div class="our-service-detail">
                                    <h2 class="font-size-medium m-0 mb-8">
                                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                                    </h2>

                                   <div class="theme-article-excerpt">
                                        <?php the_excerpt('10'); ?>
                                   </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $count++;
                    endwhile;
                    wp_reset_postdata();
                } ?>
            </div>
        </div>
    </div>
