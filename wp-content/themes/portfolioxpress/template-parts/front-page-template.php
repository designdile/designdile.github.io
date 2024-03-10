<?php
/*
*Template Name: Homepage Template
*/
get_header();

?>

        <?php $is_banner_section = portfolioxpress_get_option('enable_banner_section');
        if ($is_banner_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/banner-section');
        }

        $enable_about_section = portfolioxpress_get_option('enable_about_section');
        if ($enable_about_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/about-section');
        }
        
        $enable_service_section = portfolioxpress_get_option('enable_service_section');
        if ($enable_service_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/service-section');
        }

        $enable_contact_section = portfolioxpress_get_option('enable_contact_section');
        if ($enable_contact_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/contact-section');
        }

        $enable_testimonial_section = portfolioxpress_get_option('enable_testimonial_section');
        if ($enable_testimonial_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/testimonial-section');
        }

        $enable_popular_section = portfolioxpress_get_option('enable_popular_section');
        if ($enable_popular_section && (is_home() || is_front_page()) && !is_paged()) {
            get_template_part('template-parts/front-page/popular-section');
        }


?>

    <?php
    $enable_footer_recommended_post_section = portfolioxpress_get_option('enable_footer_recommended_post_section');
    if ($enable_footer_recommended_post_section) {
        get_template_part('template-parts/footer/footer-recommended-post');
    }

    ?>
    
    <?php get_template_part('template-parts/footer/footer-widgets-full'); ?>


<?php get_footer();