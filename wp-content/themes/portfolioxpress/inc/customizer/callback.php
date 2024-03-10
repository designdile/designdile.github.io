<?php

if (!function_exists('portfolioxpress_is_top_bar_enabled')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_top_bar_enabled($control)
    {

        if ($control->manager->get_setting('portfolioxpress_options[enable_top_bar]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('portfolioxpress_is_todays_date_enabled')) :
    /**
     * Check if Todays Date is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_todays_date_enabled($control)
    {

        if ($control->manager->get_setting('portfolioxpress_options[enable_topbar_date]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('portfolioxpress_is_show_preloader')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_show_preloader($control)
    {

        if ($control->manager->get_setting('portfolioxpress_options[show_preloader]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;


if (!function_exists('portfolioxpress_is_progressbar_enabled')) :
    /**
     * Check if progressbar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_progressbar_enabled($control)
    {

        if ($control->manager->get_setting('portfolioxpress_options[show_progressbar]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('portfolioxpress_is_related_posts_enabled')) :
    /**
     * Check if related Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_related_posts_enabled($control)
    {
        if ($control->manager->get_setting('portfolioxpress_options[show_related_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('portfolioxpress_is_banner_pagination_enabled')) :
    /**
     * Check if related Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_banner_pagination_enabled($control)
    {
        if ($control->manager->get_setting('portfolioxpress_options[enable_banner_pagination]')->value() === false) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('portfolioxpress_is_author_posts_enabled')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function portfolioxpress_is_author_posts_enabled($control)
    {
        if ($control->manager->get_setting('portfolioxpress_options[show_author_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;