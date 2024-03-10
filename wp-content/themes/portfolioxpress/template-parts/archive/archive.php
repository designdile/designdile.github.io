<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioXpress
 * @since PortfolioXpress 1.0.0
 */
if ( absint(portfolioxpress_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}