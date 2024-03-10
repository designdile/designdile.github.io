<?php
/**
* Sidebar Metabox.
*
* @package PortfolioXpress
*/
if( !function_exists( 'portfolioxpress_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function portfolioxpress_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('portfolioxpress_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function portfolioxpress_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'portfolioxpress_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function portfolioxpress_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'portfolioxpress_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function portfolioxpress_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'portfolioxpress_metabox' );

if( ! function_exists( 'portfolioxpress_metabox' ) ):


    function  portfolioxpress_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'portfolioxpress' ),
            'portfolioxpress_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'portfolioxpress' ),
            'portfolioxpress_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$portfolioxpress_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'portfolioxpress' ),
    'layout-2' => esc_html__( 'Banner Layout', 'portfolioxpress' ),
);

$portfolioxpress_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'portfolioxpress' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'portfolioxpress' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'portfolioxpress' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'portfolioxpress' ),
                ),
);

$portfolioxpress_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'portfolioxpress' ),
    'layout-2' => esc_html__( 'Banner Layout', 'portfolioxpress' ),
);

$portfolioxpress_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'portfolioxpress' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'portfolioxpress' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'portfolioxpress_post_metafield_callback' ) ):
    
    function portfolioxpress_post_metafield_callback() {
        global $post, $portfolioxpress_post_sidebar_fields, $portfolioxpress_post_layout_options,  $portfolioxpress_page_layout_options, $portfolioxpress_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'portfolioxpress_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'portfolioxpress'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'portfolioxpress'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'portfolioxpress'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','portfolioxpress'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $portfolioxpress_post_sidebar = esc_html( get_post_meta( $post->ID, 'portfolioxpress_post_sidebar_option', true ) ); 
                            if( $portfolioxpress_post_sidebar == '' ){ $portfolioxpress_post_sidebar = 'global-sidebar'; }

                            foreach ( $portfolioxpress_post_sidebar_fields as $portfolioxpress_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="portfolioxpress_post_sidebar_option" value="<?php echo esc_attr( $portfolioxpress_post_sidebar_field['value'] ); ?>" <?php if( $portfolioxpress_post_sidebar_field['value'] == $portfolioxpress_post_sidebar ){ echo "checked='checked'";} if( empty( $portfolioxpress_post_sidebar ) && $portfolioxpress_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $portfolioxpress_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','portfolioxpress'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $portfolioxpress_page_layout = esc_html( get_post_meta( $post->ID, 'portfolioxpress_page_layout', true ) ); 
                                if( $portfolioxpress_page_layout == '' ){ $portfolioxpress_page_layout = 'layout-1'; }

                                foreach ( $portfolioxpress_page_layout_options as $key => $portfolioxpress_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="portfolioxpress_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $portfolioxpress_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $portfolioxpress_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','portfolioxpress'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $portfolioxpress_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'portfolioxpress_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="portfolioxpress-header-overlay" name="portfolioxpress_ed_header_overlay" value="1" <?php if( $portfolioxpress_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="portfolioxpress-header-overlay"><?php esc_html_e( 'Enable Header Overlay','portfolioxpress' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','portfolioxpress'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $portfolioxpress_post_layout = esc_html( get_post_meta( $post->ID, 'portfolioxpress_post_layout', true ) );
                                if( $portfolioxpress_post_layout == '' ){ $portfolioxpress_post_layout = 'layout-1'; }
                                foreach ( $portfolioxpress_post_layout_options as $key => $portfolioxpress_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="portfolioxpress_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $portfolioxpress_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $portfolioxpress_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','portfolioxpress'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $portfolioxpress_header_overlay = esc_html( get_post_meta( $post->ID, 'portfolioxpress_header_overlay', true ) ); 
                                if( $portfolioxpress_header_overlay == '' ){ $portfolioxpress_header_overlay = 'global-layout'; }

                                foreach ( $portfolioxpress_header_overlay_options as $key => $portfolioxpress_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="portfolioxpress_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $portfolioxpress_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $portfolioxpress_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>
<!-- 
                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php //esc_html_e('Navigation Setting','portfolioxpress'); ?></h3>

                        <?php //$twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php //esc_html_e( 'Navigation Type','portfolioxpress' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php //if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php //esc_html_e('Global Layout','portfolioxpress'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php //esc_html_e('Disable Navigation','portfolioxpress'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php //esc_html_e('Next Previous Navigation','portfolioxpress'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php //esc_html_e('Ajax Load Next 3 Posts Contents','portfolioxpress'); ?></option>

                            </select>

                        </div>
                    </div> -->

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $portfolioxpress_ed_post_views = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_views', true ) );
                    $portfolioxpress_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_read_time', true ) );
                    $portfolioxpress_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_like_dislike', true ) );
                    $portfolioxpress_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_author_box', true ) );
                    $portfolioxpress_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_social_share', true ) );
                    $portfolioxpress_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_reaction', true ) );
                    $portfolioxpress_ed_post_rating = esc_html( get_post_meta( $post->ID, 'portfolioxpress_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','portfolioxpress'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-views" name="portfolioxpress_ed_post_views" value="1" <?php if( $portfolioxpress_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-views"><?php esc_html_e( 'Disable Post Views','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-read-time" name="portfolioxpress_ed_post_read_time" value="1" <?php if( $portfolioxpress_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-like-dislike" name="portfolioxpress_ed_post_like_dislike" value="1" <?php if( $portfolioxpress_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-author-box" name="portfolioxpress_ed_post_author_box" value="1" <?php if( $portfolioxpress_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-social-share" name="portfolioxpress_ed_post_social_share" value="1" <?php if( $portfolioxpress_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-reaction" name="portfolioxpress_ed_post_reaction" value="1" <?php if( $portfolioxpress_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','portfolioxpress' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="portfolioxpress-ed-post-rating" name="portfolioxpress_ed_post_rating" value="1" <?php if( $portfolioxpress_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="portfolioxpress-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','portfolioxpress' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'portfolioxpress_save_post_meta' );

if( ! function_exists( 'portfolioxpress_save_post_meta' ) ):

    function portfolioxpress_save_post_meta( $post_id ) {

        global $post, $portfolioxpress_post_sidebar_fields, $portfolioxpress_post_layout_options, $portfolioxpress_header_overlay_options,  $portfolioxpress_page_layout_options;

        if ( !isset( $_POST[ 'portfolioxpress_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['portfolioxpress_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $portfolioxpress_post_sidebar_fields as $portfolioxpress_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'portfolioxpress_post_sidebar_option', true ) ); 
                $new = isset( $_POST['portfolioxpress_post_sidebar_option'] ) ? portfolioxpress_sanitize_sidebar_option_meta( wp_unslash( $_POST['portfolioxpress_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'portfolioxpress_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'portfolioxpress_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? portfolioxpress_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $portfolioxpress_post_layout_options as $portfolioxpress_post_layout_option ) {  
            
            $portfolioxpress_post_layout_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_post_layout', true ) ); 
            $portfolioxpress_post_layout_new = isset( $_POST['portfolioxpress_post_layout'] ) ? portfolioxpress_sanitize_post_layout_option_meta( wp_unslash( $_POST['portfolioxpress_post_layout'] ) ) : '';

            if ( $portfolioxpress_post_layout_new && $portfolioxpress_post_layout_new != $portfolioxpress_post_layout_old ){

                update_post_meta ( $post_id, 'portfolioxpress_post_layout', $portfolioxpress_post_layout_new );

            }elseif( '' == $portfolioxpress_post_layout_new && $portfolioxpress_post_layout_old ) {

                delete_post_meta( $post_id,'portfolioxpress_post_layout', $portfolioxpress_post_layout_old );

            }
            
        }



        foreach ( $portfolioxpress_header_overlay_options as $portfolioxpress_header_overlay_option ) {  
            
            $portfolioxpress_header_overlay_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_header_overlay', true ) ); 
            $portfolioxpress_header_overlay_new = isset( $_POST['portfolioxpress_header_overlay'] ) ? portfolioxpress_sanitize_header_overlay_option_meta( wp_unslash( $_POST['portfolioxpress_header_overlay'] ) ) : '';

            if ( $portfolioxpress_header_overlay_new && $portfolioxpress_header_overlay_new != $portfolioxpress_header_overlay_old ){

                update_post_meta ( $post_id, 'portfolioxpress_header_overlay', $portfolioxpress_header_overlay_new );

            }elseif( '' == $portfolioxpress_header_overlay_new && $portfolioxpress_header_overlay_old ) {

                delete_post_meta( $post_id,'portfolioxpress_header_overlay', $portfolioxpress_header_overlay_old );

            }
            
        }


        $portfolioxpress_ed_post_views_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_views', true ) ); 
        $portfolioxpress_ed_post_views_new = isset( $_POST['portfolioxpress_ed_post_views'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_views'] ) ) : '';

        if ( $portfolioxpress_ed_post_views_new && $portfolioxpress_ed_post_views_new != $portfolioxpress_ed_post_views_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_views', $portfolioxpress_ed_post_views_new );

        }elseif( '' == $portfolioxpress_ed_post_views_new && $portfolioxpress_ed_post_views_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_views', $portfolioxpress_ed_post_views_old );

        }



        $portfolioxpress_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_read_time', true ) ); 
        $portfolioxpress_ed_post_read_time_new = isset( $_POST['portfolioxpress_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_read_time'] ) ) : '';

        if ( $portfolioxpress_ed_post_read_time_new && $portfolioxpress_ed_post_read_time_new != $portfolioxpress_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_read_time', $portfolioxpress_ed_post_read_time_new );

        }elseif( '' == $portfolioxpress_ed_post_read_time_new && $portfolioxpress_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_read_time', $portfolioxpress_ed_post_read_time_old );

        }



        $portfolioxpress_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_like_dislike', true ) ); 
        $portfolioxpress_ed_post_like_dislike_new = isset( $_POST['portfolioxpress_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_like_dislike'] ) ) : '';

        if ( $portfolioxpress_ed_post_like_dislike_new && $portfolioxpress_ed_post_like_dislike_new != $portfolioxpress_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_like_dislike', $portfolioxpress_ed_post_like_dislike_new );

        }elseif( '' == $portfolioxpress_ed_post_like_dislike_new && $portfolioxpress_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_like_dislike', $portfolioxpress_ed_post_like_dislike_old );

        }



        $portfolioxpress_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_author_box', true ) ); 
        $portfolioxpress_ed_post_author_box_new = isset( $_POST['portfolioxpress_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_author_box'] ) ) : '';

        if ( $portfolioxpress_ed_post_author_box_new && $portfolioxpress_ed_post_author_box_new != $portfolioxpress_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_author_box', $portfolioxpress_ed_post_author_box_new );

        }elseif( '' == $portfolioxpress_ed_post_author_box_new && $portfolioxpress_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_author_box', $portfolioxpress_ed_post_author_box_old );

        }



        $portfolioxpress_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_social_share', true ) ); 
        $portfolioxpress_ed_post_social_share_new = isset( $_POST['portfolioxpress_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_social_share'] ) ) : '';

        if ( $portfolioxpress_ed_post_social_share_new && $portfolioxpress_ed_post_social_share_new != $portfolioxpress_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_social_share', $portfolioxpress_ed_post_social_share_new );

        }elseif( '' == $portfolioxpress_ed_post_social_share_new && $portfolioxpress_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_social_share', $portfolioxpress_ed_post_social_share_old );

        }



        $portfolioxpress_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_reaction', true ) ); 
        $portfolioxpress_ed_post_reaction_new = isset( $_POST['portfolioxpress_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_reaction'] ) ) : '';

        if ( $portfolioxpress_ed_post_reaction_new && $portfolioxpress_ed_post_reaction_new != $portfolioxpress_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_reaction', $portfolioxpress_ed_post_reaction_new );

        }elseif( '' == $portfolioxpress_ed_post_reaction_new && $portfolioxpress_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_reaction', $portfolioxpress_ed_post_reaction_old );

        }



        $portfolioxpress_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'portfolioxpress_ed_post_rating', true ) ); 
        $portfolioxpress_ed_post_rating_new = isset( $_POST['portfolioxpress_ed_post_rating'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_post_rating'] ) ) : '';

        if ( $portfolioxpress_ed_post_rating_new && $portfolioxpress_ed_post_rating_new != $portfolioxpress_ed_post_rating_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_post_rating', $portfolioxpress_ed_post_rating_new );

        }elseif( '' == $portfolioxpress_ed_post_rating_new && $portfolioxpress_ed_post_rating_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_post_rating', $portfolioxpress_ed_post_rating_old );

        }

        foreach ( $portfolioxpress_page_layout_options as $portfolioxpress_post_layout_option ) {  
        
            $portfolioxpress_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'portfolioxpress_page_layout', true ) ); 
            $portfolioxpress_page_layout_new = isset( $_POST['portfolioxpress_page_layout'] ) ? portfolioxpress_sanitize_post_layout_option_meta( wp_unslash( $_POST['portfolioxpress_page_layout'] ) ) : '';

            if ( $portfolioxpress_page_layout_new && $portfolioxpress_page_layout_new != $portfolioxpress_page_layout_old ){

                update_post_meta ( $post_id, 'portfolioxpress_page_layout', $portfolioxpress_page_layout_new );

            }elseif( '' == $portfolioxpress_page_layout_new && $portfolioxpress_page_layout_old ) {

                delete_post_meta( $post_id,'portfolioxpress_page_layout', $portfolioxpress_page_layout_old );

            }
            
        }

        $portfolioxpress_ed_header_overlay_old = absint( get_post_meta( $post_id, 'portfolioxpress_ed_header_overlay', true ) ); 
        $portfolioxpress_ed_header_overlay_new = isset( $_POST['portfolioxpress_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['portfolioxpress_ed_header_overlay'] ) ) : '';

        if ( $portfolioxpress_ed_header_overlay_new && $portfolioxpress_ed_header_overlay_new != $portfolioxpress_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'portfolioxpress_ed_header_overlay', $portfolioxpress_ed_header_overlay_new );

        }elseif( '' == $portfolioxpress_ed_header_overlay_new && $portfolioxpress_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'portfolioxpress_ed_header_overlay', $portfolioxpress_ed_header_overlay_old );

        }

    }

endif;   