<?php
/**
 * Displays progressbar
 *
 * @package PortfolioXpress
 */

$show_progressbar = portfolioxpress_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = portfolioxpress_get_option( 'progressbar_position' );
	echo '<div id="portfolioxpress-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
