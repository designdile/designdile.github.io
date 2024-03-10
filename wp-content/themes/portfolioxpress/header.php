<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PortfolioXpress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'portfolioxpress_before_site' ); ?>

<div id="page" class="site">
    <div class="site-content-area">

    <?php get_template_part( 'template-parts/header/loader' ); ?>

    <?php $ed_header_ad = portfolioxpress_get_option( 'ed_header_ad' );
    if ($ed_header_ad) {
        get_template_part( 'template-parts/header/welcome-screen-banner' );
    } ?>

    <?php get_template_part( 'template-parts/header/progressbar' ); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'portfolioxpress'); ?></a>

    <?php do_action( 'portfolioxpress_before_header' ); ?>

    <?php get_template_part('template-parts/header/theme-header'); ?>
    <?php 
    $portfolioxpress_home_class = "";
    if (is_page_template( 'template-parts/front-page-template.php' )) {
        $portfolioxpress_home_class = "theme-fullpage";
    } ?>
    <div class="main-content-container scroll-container <?php echo esc_attr($portfolioxpress_home_class); ?>">
        <?php do_action( 'portfolioxpress_before_content' ); ?>