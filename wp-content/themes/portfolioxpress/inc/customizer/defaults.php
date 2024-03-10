<?php

/**
 * Default customizer values.
 *
 * @package PortfolioXpress
 */
if (!function_exists('portfolioxpress_get_default_customizer_values')) :
    /**
     * Get default customizer values.
     *
     * @since 1.0.0
     *
     * @return array Default customizer values.
     */
    function portfolioxpress_get_default_customizer_values()
    {

        $defaults = array();
        // header image section
        $defaults['site_text_color']    = '#000';
        
        //Site title options
        $defaults['enable_cursor_dot_outline'] = true;
        $defaults['hide_title'] = false;
        $defaults['hide_tagline'] = false;
        $defaults['site_title_text_size'] = 52;
        $defaults['site_tagline_text_size'] = 20;

        // General options
        $defaults['show_preloader'] = false;
        $defaults['preloader_style'] = 'theme-preloader-spinner-1';
        $defaults['show_progressbar']           = false;
        $defaults['progressbar_position']       = 'top';
        $defaults['progressbar_color']          = '#e4b33f';

        // header full page add
        $defaults['ed_header_ad'] = false;
        $defaults['ed_header_type'] = 'welcome-banner-default';
        $defaults['advertisement_section_title'] = esc_html__('Welcome Advertisement Message', 'portfolioxpress');
        
        // Header
        $defaults['header_bg_color'] = '#ffffff';
        $defaults['header_style'] = 'header_style_1';
        $defaults['enable_top_nav'] = true;

        $defaults['random_post_category'] = '';

        $defaults['enable_search_on_header'] = true;
        $defaults['header_search_btn_style'] = 'style_1';
        $defaults['enable_mini_cart_header'] = true;
        $defaults['enable_woo_my_account'] = true;


        // front page banner section
        $defaults['enable_banner_section'] = true;
        $defaults['number_of_slider_post'] = '4';
        $defaults['slider_post_content_alignment'] = 'text-left';
        $defaults['banner_section_cat'] = '';
        $defaults['enable_banner_cat_meta'] = true;
        $defaults['enable_banner_pagination'] = true;
        $defaults['enable_banner_post_description'] = false;
        $defaults['enable_banner_author_meta'] = true;
        $defaults['enable_banner_date_meta'] = true;

        // front page contact section
        $defaults['enable_contact_section'] = false;
        $defaults['contact_select_page'] = '';
        $defaults['contact_section_shortcode'] = '';
        $defaults['upload_contact_section_bg_image'] = '';
        $defaults['enable_social_menu_contact_section'] = true;

        // front page about section
        $defaults['enable_about_section'] = false;
        $defaults['about_section_post_title'] = esc_html__("It's All About Me", 'portfolioxpress');
        $defaults['about_select_page'] = '';
        $defaults['about_section_button_text'] = esc_html__(' Schedule A Call ', 'portfolioxpress');
        $defaults['about_section_button_text_2'] = esc_html__(' Download CV', 'portfolioxpress');
        $defaults['about_section_featured_on_title'] = esc_html__(' Featured On', 'portfolioxpress');


        // front page popular section
        $defaults['enable_popular_section'] = true;
        $defaults['popular_section_post_title'] = esc_html__('Popular Post', 'portfolioxpress');
        $defaults['number_of_popular_post'] = '8';
        $defaults['popular_section_cat'] = '';
        $defaults['enable_popular_cat_meta'] = true;
        $defaults['enable_popular_author_meta'] = true;
        $defaults['enable_popular_date_meta'] = true;


        $defaults['enable_service_section'] = false;
        $defaults['service_section_title'] = esc_html__('Services That I Offer', 'portfolioxpress');

        $defaults['enable_testimonial_section'] = false;
        $defaults['testimonial_section_title'] = esc_html__('From My Clients', 'portfolioxpress');

        // archive options
        $defaults['archive_post_alignmnet'] = 'center';
        $defaults['excerpt_length'] = 25;

        // Single options
        $defaults['single_sidebar_layout'] = 'right-sidebar';
        $defaults['hide_single_sidebar_mobile'] = false;
        $defaults['single_post_meta'] = array('author', 'date', 'comment', 'category', 'tags');

        $defaults['show_author_info'] = true;

        $defaults['show_related_posts'] = true;
        $defaults['related_posts_text'] = esc_html__('You May Also Like', 'portfolioxpress');
        $defaults['no_of_related_posts'] = 3;
        $defaults['related_posts_orderby'] = 'date';
        $defaults['related_posts_order'] = 'desc';
        $defaults['author_posts_orderby'] = 'date';
        $defaults['author_posts_order'] = 'desc';

        $defaults['show_author_posts'] = true;
        $defaults['author_posts_text'] = esc_html__('More From Author', 'portfolioxpress');
        $defaults['no_of_author_posts'] = 3;

        // Archive
        $defaults['archive_post_meta_1'] = array('author', 'date', 'comment', 'category', 'tags');

        // pagination
        $defaults['pagination_type'] = 'default';

        // footer related post
        $defaults['enable_footer_recommended_post_section'] = true;
        $defaults['enable_category_meta'] = true;
        $defaults['enable_post_excerpt'] = false;
        $defaults['enable_date_meta'] = true;
        $defaults['enable_author_meta'] = true;
        $defaults['select_cat_for_footer_recommended_post'] = '';

        /*Footer*/
        $defaults['enable_copyright'] = true;
        $defaults['enable_footer_image_overlay'] = false;
        $defaults['footer_bg_color'] = '#0e0e0e';
        $defaults['footer_text_color'] = '#fff';
        $defaults['footer_column_layout'] = 'footer_layout_1';
        $defaults['copyright_text'] = esc_html__('Copyright &copy;', 'portfolioxpress');
        $defaults['copyright_date_format'] = 'Y';
        $defaults['enable_footer_credit'] = true;
        $defaults['enable_footer_nav'] = false;
        $defaults['enable_footer_social_nav'] = false;
        $defaults['enable_scroll_to_top'] = true;


        $defaults = apply_filters('portfolioxpress_default_customizer_values', $defaults);
        return $defaults;
    }
endif;
