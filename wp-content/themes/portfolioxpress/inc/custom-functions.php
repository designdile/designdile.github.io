<?php
/**
 * Custom Functions.
 *
 * @package PortfolioXpress
 */

if (!function_exists('portfolioxpress_fonts_url')) :

    //Google Fonts URL
    function portfolioxpress_fonts_url()
    {

        $font_families = array(
            'Poppins:wght@100;200;300;400;500;600;700;800',
            'Open+Sans:wght@300;400;500;600',
        );

        $fonts_url = add_query_arg(array(
            'family' => implode('&family=', $font_families),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2');

        return esc_url_raw($fonts_url);
    }

endif;

if (!function_exists('portfolioxpress_get_option')) :
    /**
     * Get customizer value by key.
     *
     * @param string $key Option key.
     * @return mixed Option value.
     * @since 1.0.0
     *
     */
    function portfolioxpress_get_option($key)
    {
        $key_value = '';
        if (!$key) {
            return $key_value;
        }
        $default_values = portfolioxpress_get_default_customizer_values();
        $customizer_values = get_theme_mod('portfolioxpress_options');
        $customizer_values = wp_parse_args($customizer_values, $default_values);

        $key_value = (isset($customizer_values[$key])) ? $customizer_values[$key] : '';
        return $key_value;
    }
endif;


/**
 * PortfolioXpress SVG Icon helper functions
 *
 * @package PortfolioXpress
 * @since 1.0.0
 */
if (!function_exists('portfolioxpress_theme_svg')):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the PortfolioXpress_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function portfolioxpress_theme_svg($svg_name, $return = false)
    {

        if ($return) {

            return portfolioxpress_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in portfolioxpress_get_theme_svg();.

        } else {

            echo portfolioxpress_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in portfolioxpress_get_theme_svg();.

        }
    }

endif;

if (!function_exists('portfolioxpress_get_theme_svg')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function portfolioxpress_get_theme_svg($svg_name)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            PortfolioXpress_SVG_Icons::get_svg($svg_name),
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),

                'line' => array(
                    'stroke' => true,
                    'x1' => true,
                    'x2' => true,
                    'y1' => true,
                    'y2' => true,
                ),
            )
        );
        if (!$svg) {
            return false;
        }
        return $svg;

    }

endif;

if (!function_exists('portfolioxpress_svg_escape')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function portfolioxpress_svg_escape($input)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if (!$svg) {
            return false;
        }

        return $svg;

    }

endif;

if (!function_exists('portfolioxpress_social_menu_icon')) :

    function portfolioxpress_social_menu_icon($item_output, $item, $depth, $args)
    {

        // Add Icon
        if (isset($args->theme_location) && 'social-menu' === $args->theme_location) {

            $svg = PortfolioXpress_SVG_Icons::get_theme_svg_name($item->url);

            if (empty($svg)) {
                $svg = portfolioxpress_theme_svg('link', $return = true);
            }

            $item_output = str_replace($args->link_after, '</span>' . $svg, $item_output);
        }

        return $item_output;
    }

endif;

add_filter('walker_nav_menu_start_el', 'portfolioxpress_social_menu_icon', 10, 4);


if (!function_exists('portfolioxpress_comment_form_custom_fields')) :
    /**
     * Custom comment form fields.
     *
     * @param array $fields
     *
     * @return array
     */
    function portfolioxpress_comment_form_custom_fields($fields)
    {

        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? ' aria-required="true"' : '');

        if (is_user_logged_in()) {
            $fields = array_merge($fields, array(
                'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">' . __('Name', 'portfolioxpress') . '</label><input id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" type="text" placeholder="' . __('Name', 'portfolioxpress') . '..." size="30" ' . $aria_req . ' /></p>',
                'email' => '<p class="comment-form-email"><label for="email" class="show-on-ie8">' . __('Email', 'portfolioxpress') . '</label><input id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" type="text" placeholder="' . __('your@email.com', 'portfolioxpress') . '..." ' . $aria_req . ' /></p>',
            ));
        } else {
            $fields = array_merge($fields, array(
                'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">' . __('Name', 'portfolioxpress') . '</label><input id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" type="text" placeholder="' . __('Name', 'portfolioxpress') . '..." size="30" ' . $aria_req . ' /></p><!--',
                'email' => '--><p class="comment-form-email"><label for="name" class="show-on-ie8">' . __('Email', 'portfolioxpress') . '</label><input id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" type="text" placeholder="' . __('your@email.com', 'portfolioxpress') . '..." ' . $aria_req . ' /></p><!--',
                'url' => '--><p class="comment-form-url"><label for="url" class="show-on-ie8">' . __('Url', 'portfolioxpress') . '</label><input id="url" name="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . __('Website', 'portfolioxpress') . '..." type="text"></p>',
            ));
        }

        return $fields;
    }
endif;
add_filter('comment_form_default_fields', 'portfolioxpress_comment_form_custom_fields');


if (!function_exists('portfolioxpress_get_general_layouts')) :
    /**
     * Returns general layout options.
     *
     * @return array Options array.
     * @since 1.0.0
     *
     */
    function portfolioxpress_get_general_layouts()
    {
        $options = apply_filters('portfolioxpress_general_layouts', array(
            'left-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/left_sidebar.png',
                'label' => esc_html__('Left Sidebar', 'portfolioxpress'),
            ),
            'right-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/right_sidebar.png',
                'label' => esc_html__('Right Sidebar', 'portfolioxpress'),
            ),
            'no-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/no_sidebar.png',
                'label' => esc_html__('No Sidebar', 'portfolioxpress'),
            ),
        ));
        return $options;
    }

endif;



if( !function_exists( 'portfolioxpress_post_category_list' ) ) :

    // Post Category List.
    function portfolioxpress_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','portfolioxpress' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if (!function_exists('portfolioxpress_get_page_layout')) :
    /**
     * Get Page Layout based on the post meta or customizer value
     *
     * @return string Page Layout.
     * @since 1.0.0
     *
     */
    function portfolioxpress_get_page_layout()
    {

        global $post;

        $page_layout = '';
        if( is_single() || is_page() ){
            $portfolioxpress_post_sidebar = esc_attr( get_post_meta( $post->ID, 'portfolioxpress_post_sidebar_option', true ) );
            if ($page_layout = 'global-sidebar' ) {
                $page_layout = portfolioxpress_get_option( 'single_sidebar_layout');
            } else{
                $page_layout = $portfolioxpress_post_sidebar;
            }

        }

        return $page_layout;
    }
endif;

if ( ! function_exists( 'portfolioxpress_get_footer_layouts' ) ) :
    /**
     * Returns footer layout options.
     *
     * @since 1.0.0
     *
     * @return array Options array.
     */
    function portfolioxpress_get_footer_layouts() {
        $options = apply_filters( 'portfolioxpress_footer_layouts', array(
            'footer_layout_1'  => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-4.png',
                'label' => esc_html__( 'Four Columns', 'portfolioxpress' ),
            ),
            'footer_layout_2' => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-3.png',
                'label' => esc_html__( 'Three Columns', 'portfolioxpress' ),
            ),
            'footer_layout_3' => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-2.png',
                'label' => esc_html__( 'Two Columns', 'portfolioxpress' ),
            )
        ) );
        return $options;
    }
endif;

if (!function_exists('portfolioxpress_print_first_instance_of_block')):

    /** Print the first instance of a block in the content, and then break away.
     * @param string $block_name The full block type name, or a partial match.
     *                                Example: `core/image`, `core-embed/*`.
     * @param string|null $content The content to search in. Use null for get_the_content().
     * @param int $instances How many instances of the block will be printed (max). Default  1.
     * @return bool Returns true if a block was located & printed, otherwise false.
     */
    function portfolioxpress_print_first_instance_of_block($block_name, $content = null, $instances = 1)
    {
        $instances_count = 0;
        $blocks_content = '';

        if (!$content) {
            $content = get_the_content();
        }

        // Parse blocks in the content.
        $blocks = parse_blocks($content);

        // Loop blocks.
        foreach ($blocks as $block) {

            // Sanity check.
            if (!isset($block['blockName'])) {
                continue;
            }

            // Check if this the block matches the $block_name.
            $is_matching_block = false;

            // If the block ends with *, try to match the first portion.
            if ('*' === $block_name[-1]) {
                $is_matching_block = 0 === strpos($block['blockName'], rtrim($block_name, '*'));
            } else {
                $is_matching_block = $block_name === $block['blockName'];
            }

            if ($is_matching_block) {
                // Increment count.
                $instances_count++;

                // Add the block HTML.
                $blocks_content .= render_block($block);

                // Break the loop if the $instances count was reached.
                if ($instances_count >= $instances) {
                    break;
                }
            }
        }

        if ($blocks_content) {
            /** This filter is documented in wp-includes/post-template.php */
            echo apply_filters('the_content', $blocks_content); // phpcs:ignore WordPress.Security.EscapeOutput
            return true;
        }

        return false;
    }
endif;

if ( ! function_exists( 'portfolioxpress_excerpt_length' ) ) {

    function portfolioxpress_excerpt_length( $excerpt_length ) {
        if ( is_admin() && !wp_doing_ajax()) {
            return $excerpt_length;
        }
        $custom_length = absint(portfolioxpress_get_option( 'excerpt_length' ));
        if ( absint( $custom_length ) > 0 ) {
            $excerpt_length = absint( $custom_length );
        }
        return $excerpt_length;
    }
    
}
add_filter( 'excerpt_length', 'portfolioxpress_excerpt_length', 999 );


if ( ! function_exists( 'portfolioxpress_excerpt_more' ) )  :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function portfolioxpress_excerpt_more( $more ) {
        if ( is_admin() && !wp_doing_ajax()) {
            return $more;
        }
        $flag_apply_excerpt_read_more = apply_filters( 'portfolioxpress_filter_excerpt_read_more', true );
        if ( true !== $flag_apply_excerpt_read_more ) {
            return $more;
        }

        $output = $more;
        $read_more_text = esc_html__(' ','portfolioxpress');
        if ( ! empty( $read_more_text ) ) {
            $output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '<i class="ion-ios-arrow-right read-more-right"></i>' . '</a>';
            $output = apply_filters( 'portfolioxpress_filter_read_more_link' , $output );
        }
        return $output;

    }

add_filter('excerpt_more', 'portfolioxpress_excerpt_more');
endif;

if( ! function_exists( 'portfolioxpress_estimated_read_time' ) ) :
    /**
    * Estimated reading time in minutes
    * 
    * @param $content
    * @param $with_gutenberg
    * 
    * @return int estimated time in minutes
    */

    function portfolioxpress_estimated_read_time ( $content = '', $with_gutenberg = false ) {
        // In case if content is build with gutenberg parse blocks
        if ( $with_gutenberg ) {
            $blocks = parse_blocks( $content );
            $contentHtml = '';

            foreach ( $blocks as $block ) {
                $contentHtml .= render_block( $block );
            }

            $content = $contentHtml;
        }
                
        // Remove HTML tags from string
        $content = wp_strip_all_tags( $content );
                
        // When content is empty return 0
        if ( !$content ) {
            return 0;
        }
               
        // Count words containing string
        $words_count = str_word_count( $content );
        $words_per_minute = portfolioxpress_get_option( 'words_per_minute'); 
        // Calculate time for read all words and round
        $minutes = ceil( $words_count / $words_per_minute );
                
        return $minutes;
    }
endif;


function portfolioxpress_gravatar_alt($portfolioxpress_gravatar) {
    if (have_comments()) {
        $alt = get_comment_author();
    }
    else {
        $alt = get_the_author_meta('display_name');
    }
    $portfolioxpress_gravatar = str_replace('alt=\'\'', 'alt=\'Avatar for ' . $alt . '\'', $portfolioxpress_gravatar);
    return $portfolioxpress_gravatar;
}
add_filter('get_avatar', 'portfolioxpress_gravatar_alt');

