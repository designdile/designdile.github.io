<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function portfolioxpress_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    $classes[] = ' portfolioxpress-header_style_1';

    $classes[] = 'portfolioxpress-light-mode';
    $enable_search = portfolioxpress_get_option( 'enable_search_on_header' );
    $archive_post_alignmnet = portfolioxpress_get_option( 'archive_post_alignmnet' );
    $classes[] = 'entry-header-'.esc_attr($archive_post_alignmnet);
    if ($enable_search) {
         $classes[] = 'search-enable';
    }
	// Get appropriate class for the sidebar layout to work
    if ( is_single() || is_page() ) {
    	$page_layout = portfolioxpress_get_page_layout();
        if('no-sidebar' != $page_layout && is_active_sidebar( 'sidebar-1' )  ){
            $classes[] = 'has-sidebar '.esc_attr($page_layout);
        }else{
            $classes[] = esc_attr($page_layout);
        }
    }

	return $classes;
}
add_filter( 'body_class', 'portfolioxpress_body_classes' );
