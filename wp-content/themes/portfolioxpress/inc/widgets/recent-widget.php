<?php
if (!defined('ABSPATH')) {
    exit;
}

class PortfolioXpress_Recent_Posts extends PortfolioXpress_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_portfolioxpress_recent_posts';
        $this->widget_description = __("Displays recent posts with an image", 'portfolioxpress');
        $this->widget_id = 'portfolioxpress_recent_posts';
        $this->widget_name = __('PortfolioXpress: Recent Posts', 'portfolioxpress');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'portfolioxpress'),
            ),
            'category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Select Category', 'portfolioxpress'),
                'desc' => __('Leave empty if you don\'t want the posts to be category specific', 'portfolioxpress'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'portfolioxpress'),
                ),
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 1,
                'max' => '',
                'std' => 3,
                'label' => __('Number of posts to show', 'portfolioxpress'),
            ),
            'orderby' => array(
                'type' => 'select',
                'std' => 'date',
                'label' => __('Order by', 'portfolioxpress'),
                'options' => array(
                    'date' => __('Date', 'portfolioxpress'),
                    'ID' => __('ID', 'portfolioxpress'),
                    'title' => __('Title', 'portfolioxpress'),
                    'rand' => __('Random', 'portfolioxpress'),
                ),
            ),
            'order' => array(
                'type' => 'select',
                'std' => 'desc',
                'label' => __('Order', 'portfolioxpress'),
                'options' => array(
                    'asc' => __('ASC', 'portfolioxpress'),
                    'desc' => __('DESC', 'portfolioxpress'),
                ),
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'portfolioxpress'),
                'std' => true,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'portfolioxpress'),
                'options' => array(
                    'format_1' => __('Format 1', 'portfolioxpress'),
                    'format_2' => __('Format 2', 'portfolioxpress'),
                ),
                'std' => 'format_1',
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'portfolioxpress'),
                'options' => array(
                    'style_1' => __('Style 1', 'portfolioxpress'),
                    'style_2' => __('Style 2', 'portfolioxpress'),
                    'style_3' => __('Style 3', 'portfolioxpress'),
                ),
                'std' => 'style_1',
            ),
        );
        parent::__construct();
    }

    /**
     * Query the posts and return them.
     * @param array $args
     * @param array $instance
     * @return WP_Query
     */
    public function get_posts($args, $instance)
    {
        $number = !empty($instance['number']) ? absint($instance['number']) : $this->settings['number']['std'];
        $orderby = !empty($instance['orderby']) ? sanitize_text_field($instance['orderby']) : $this->settings['orderby']['std'];
        $order = !empty($instance['order']) ? sanitize_text_field($instance['order']) : $this->settings['order']['std'];
        $query_args = array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'orderby' => $orderby,
            'order' => $order,
            'ignore_sticky_posts' => 1
        );
        if (!empty($instance['category']) && -1 != $instance['category'] && 0 != $instance['category']) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['category'],
            );
        }
        return new WP_Query(apply_filters('portfolioxpress_recent_posts_query_args', $query_args));
    }

    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        if (($posts = $this->get_posts($args, $instance)) && $posts->have_posts()) {
            $this->widget_start($args, $instance);
            do_action('portfolioxpress_before_recent_posts_with_image');
            $style = $instance['style'];
            ?>
            <div class="theme-recent-widget theme-widget-list <?php echo esc_attr($style); ?>">
                <?php
                while ($posts->have_posts()): $posts->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article theme-widget-article'); ?>>
                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <div class="entry-image">
                                <figure class="featured-media">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('thumbnail', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?>
                                    </a>
                                </figure>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="entry-details">
                            <?php the_title( '<h3 class="entry-title font-size-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                            <?php
                            if ($instance['show_date']) {
                                ?>
                                <div class="portfolioxpress-meta post-date">
                                    <span class="meta-icon">
                                        <span class="screen-reader-text"><?php _e('Post Date', 'portfolioxpress'); ?></span>
                                        <?php portfolioxpress_theme_svg('calendar'); ?>
                                    </span>
                                    <span class="meta-text">
                                        <?php
                                        $date_format = $instance['date_format'];
                                        if ('format_1' == $date_format) {
                                            echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'portfolioxpress'));
                                        } else {
                                            echo esc_html(get_the_date());
                                        }
                                        ?>
                                    </span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            <?php
            do_action('portfolioxpress_after_recent_posts_with_image');
            $this->widget_end($args);
        }
        echo ob_get_clean();
    }
}