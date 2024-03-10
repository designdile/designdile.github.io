<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */
/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if (!function_exists('portfolioxpress_hex2rgb')) {
    function portfolioxpress_hex2rgb($hex, $array = false)
    {
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        if (!$array) {
            $rgb = implode(",", $rgb);
        }
        return $rgb;
    }
}
if (!function_exists('portfolioxpress_get_inline_css')) :
    /**
     * Outputs theme custom CSS.
     *
     * @since 1.0.0
     */
    function portfolioxpress_get_inline_css()
    {
        $defaults = portfolioxpress_get_default_customizer_values();
        $site_title_text_size = portfolioxpress_get_option('site_title_text_size');
        $site_tagline_text_size = portfolioxpress_get_option('site_tagline_text_size');
        $header_bg_color = portfolioxpress_get_option('header_bg_color');
        $progressbar_color = portfolioxpress_get_option('progressbar_color');
        $footer_bg_color = portfolioxpress_get_option('footer_bg_color');

        $footer_text_color = portfolioxpress_get_option('footer_text_color');
        
        $site_text_color = portfolioxpress_get_option('site_text_color');
        ob_start();
        ?>
        <?php if ($site_title_text_size != $defaults['site_title_text_size']) : ?>
        @media (min-width: 1000px){
        .site-title {
        font-size: <?php echo esc_attr($site_title_text_size) . 'px'; ?>;
        }
        }
    <?php endif; ?>
        <?php if ($site_tagline_text_size != $defaults['site_tagline_text_size']) : ?>
        @media (min-width: 1000px){
        .site-description {
        font-size: <?php echo esc_attr($site_tagline_text_size) . 'px'; ?>;
        }
        }
    <?php endif; ?>
        <?php if ($site_text_color != $defaults['site_text_color']) : ?>
        .site-branding, .site-branding a{
        color: <?php echo esc_attr($site_text_color); ?>;
        }
    <?php endif; ?>
        <?php if ($header_bg_color != $defaults['header_bg_color']) : ?>
          .home.page-template-default .site-header,
          .home.page-template:not(.page-template-front-page-template) .site-header, .single .site-header, .page .site-header, .search-no-results .site-header, .content-null .site-header, .error404 .site-header {
        background-color: <?php echo esc_attr($header_bg_color); ?>;
        }
    <?php endif; ?>
        <?php if ($progressbar_color != $defaults['progressbar_color']) : ?>
        #portfolioxpress-progress-bar{
        background-color: <?php echo esc_attr($progressbar_color); ?>;
        }
    <?php endif; ?>
        <?php if ($footer_bg_color != $defaults['footer_bg_color']) : ?>
        .site #colophon.site-footer {
        background-color:  <?php echo esc_attr($footer_bg_color); ?>;
        }
    <?php endif; ?>
        <?php if ($footer_text_color != $defaults['footer_text_color']) : ?>
        .site #colophon.site-footer,
        .site #colophon.site-footer:not(:hover):not(:focus){
        color:  <?php echo esc_attr($footer_text_color); ?>;
        }
    <?php endif; ?>
        <?php
        return ob_get_clean();
    }
endif;