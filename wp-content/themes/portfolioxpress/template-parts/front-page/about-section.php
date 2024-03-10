<?php
/**
 * Displays About Section
 *
 * @package PortfolioXpress
 */
$about_section_post_title = portfolioxpress_get_option('about_section_post_title');
$about_select_page = portfolioxpress_get_option('about_select_page');
$about_section_button_text = portfolioxpress_get_option('about_section_button_text');
$about_section_button_link = portfolioxpress_get_option('about_section_button_link');
$about_section_button_text_2 = portfolioxpress_get_option('about_section_button_text_2');
$about_section_button_link_2 = portfolioxpress_get_option('about_section_button_link_2');
$upload_about_section_bg_image = portfolioxpress_get_option('upload_about_section_bg_image');
$about_section_featured_on_title = portfolioxpress_get_option('about_section_featured_on_title');

?>
<section class="portfolioxpress-about-us section">
    <?php if (!empty($upload_about_section_bg_image)) { ?>
        <div class="theme-section-image">
            <img src="<?php echo esc_url($upload_about_section_bg_image); ?>" alt="">
        </div>
    <?php } ?>
    <div class="wrapper">
        <?php if (!empty($about_select_page)) { 
            $featured_image = '';
            $about_post_query = new WP_Query(array(
            'post_type' => 'page',
            'page_id' => $about_select_page,));
            if ($about_post_query->have_posts()) :
                while ($about_post_query->have_posts()) : $about_post_query->the_post();
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
            ?>
                <div class="column-row column-row-center">
                    <div class="column column-6 column-sm-12">
                        <div class="portfolioxpress-header mb-16">
                            <?php if ($about_section_post_title) { ?>
                                <span class="font-size-medium m-0">
                                    <?php echo esc_html($about_section_post_title); ?>
                                </span>
                            <?php } ?>

                                <h2 class="font-size-large m-0">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                        </div>

                        <div class="portfolioxpress-body">
                            <div class="theme-article-excerpt mb-80">
                                <?php
                                echo esc_html(wp_trim_words( get_the_content(), 60, '...' ));
                                    ?>
                            </div>

                            <a href = "<?php echo esc_url($about_section_button_link); ?>" class = "theme-primary-btn"> <?php echo esc_html($about_section_button_text); ?> </a>
                            <a href = "<?php echo esc_url($about_section_button_link_2); ?>" class = "theme-secondary-btn"> <?php echo esc_html($about_section_button_text_2); ?> </a>
                        </div>

                        <div class="portfolioxpress-footer">
                            <h2 class="font-size-small mb-16">
                                <?php echo esc_html($about_section_featured_on_title); ?>
                            </h2>

                            <div class="swiper companies-worked-with">
                                <div class="swiper-wrapper">
                                    <?php for ($i=1; $i < 5; $i++) {  ?>
                                        <?php if (!empty(portfolioxpress_get_option('upload_about_section_bg_image_'.$i))) { ?>
                                            <div class="swiper-slide">
                                                <img src="<?php echo esc_attr(portfolioxpress_get_option('upload_about_section_bg_image_'.$i)); ?>" >
                                            </div>  
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column column-6 column-sm-12">
                        <div class="about-us-image image-size-large">
                            <img src="<?php echo esc_url($featured_image); ?>">
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif; 
        } ?>

    </div>
</section>
