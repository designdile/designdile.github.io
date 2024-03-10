<?php
/**
 * Displays About Section
 *
 * @package PortfolioXpress
 */
$contact_select_page = portfolioxpress_get_option('contact_select_page');
$contact_section_shortcode = portfolioxpress_get_option('contact_section_shortcode');
$upload_contact_section_bg_image = portfolioxpress_get_option('upload_contact_section_bg_image');
$enable_social_menu_contact_section = portfolioxpress_get_option('enable_social_menu_contact_section');
$upload_contact_section_bg_image = portfolioxpress_get_option('upload_contact_section_bg_image');
?>
<div class="portfolioxpress-contact section py-sm-24">
    <?php if (!empty($upload_contact_section_bg_image)) { ?>
        <div class="theme-section-image">
            <img src="<?php echo esc_url($upload_contact_section_bg_image); ?>" alt="">
        </div>
    <?php } ?>
    <div class="wrapper">
        <div class="column-row column-row-center">
            <?php if (!empty($contact_select_page)) { 
                $featured_image = '';
                $contact_post_query = new WP_Query(array( 'post_type' => 'page',
                'page_id' => $contact_select_page,));
                if ($contact_post_query->have_posts()) :
                    while ($contact_post_query->have_posts()) : $contact_post_query->the_post();
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                ?>
                    <div class="column column-5 column-sm-12">
                        <div class="portfolioxpress-contact-image image-size-large">
                            <?php if (!empty($featured_image)) { ?>
                                <img src="<?php echo esc_url($featured_image); ?>" alt="">
                            <?php } ?>
                            <?php if (!empty($enable_social_menu_contact_section)) { ?>
                                <div class="contact-social-links">
                                    <?php
                                    if ( has_nav_menu( 'social-menu' ) ) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'social-menu',
                                            'container_class' => 'contact-navigation',
                                            'fallback_cb' => false,
                                            'depth' => 1,
                                            'menu_class' => 'portfolioxpress-social-icons reset-list-style',
                                            'link_before' => '<span class="social-media-title">',
                                            'link_after' => '</span>',
                                        ) );
                                    }else{
                                        esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'portfolioxpress' );
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="column column-7 column-sm-12">
                        <div class="portfolioxpress-contact-form">
                            <h2 class="font-size-big m-0 mb-8">
                                <?php the_title(); ?>
                            </h2>
                            <div class="theme-article-excerpt mb-32">
                            <?php the_excerpt(); ?>
                            </div>
    
                            <?php echo do_shortcode($contact_section_shortcode); ?>
                        </div>
    
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; 
                        } ?>
                    </div>
                </div>

    </div>
</div>
