<?php 
/**
 * Maintenance Services functions and definitions
 *
 * @package Maintenance Services
 */

 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'maintenance_services_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function maintenance_services_setup() {
	$GLOBALS['content_width'] = apply_filters( 'maintenance_services_content_width', 640 );
	load_theme_textdomain( 'maintenance-services', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 67,
		'width'       => 160,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'maintenance-services' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // maintenance_services_setup
add_action( 'after_setup_theme', 'maintenance_services_setup' );
function maintenance_services_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'maintenance-services' ),
		'description'   => esc_html__( 'Appears on sidebar', 'maintenance-services' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3>',
		'after_widget'  => '</aside>',
	) ); 
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'maintenance-services' ),
		'description'   => esc_html__( 'Appears on page footer', 'maintenance-services' ),
		'id'            => 'fc-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'maintenance-services' ),
		'description'   => esc_html__( 'Appears on page footer', 'maintenance-services' ),
		'id'            => 'fc-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'maintenance-services' ),
		'description'   => esc_html__( 'Appears on page footer', 'maintenance-services' ),
		'id'            => 'fc-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
}
add_action( 'widgets_init', 'maintenance_services_widgets_init' );

/**
* Enqueue theme fonts.
*/
function maintenance_services_fonts() {
	$fonts_url = maintenance_services_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'maintenance-services-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
	}
}
add_action( 'wp_enqueue_scripts', 'maintenance_services_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'maintenance_services_fonts', 1 );

/**
 * Retrieve webfont URL to load fonts locally.
 */
function maintenance_services_get_fonts_url() {
	$font_families = array(
		'Roboto Condensed:300,400,600,700,800,900',
		'Lato:100,100i,300,300i,400,400i,700,700i,900,900i',
		'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i',
		'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
		'Assistant:200,300,400,600,700,800',
		'Lora:400,400i,700,700i',
		'Anton:400'
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'maintenance_services_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}
	
	
function maintenance_services_scripts() {
	if ( !is_rtl() ) {
		wp_enqueue_style( 'maintenance-services-basic-style', get_stylesheet_uri() );
		wp_enqueue_style( 'maintenance-services-main-style', get_template_directory_uri()."/css/responsive.css" );		
	}
	if ( is_rtl() ) {
		wp_enqueue_style( 'maintenance-services-rtl', get_template_directory_uri() . "/rtl.css");
	}	
	wp_enqueue_style( 'maintenance-services-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'maintenance-services-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'maintenance-services-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01062020', true );
	wp_enqueue_script( 'maintenance-services-customscripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	wp_localize_script( 'maintenance-services-navigation', 'maintenanceservicesScreenReaderText', array(
		'expandMain'   => __( 'Open main menu', 'maintenance-services' ),
		'collapseMain' => __( 'Close main menu', 'maintenance-services' ),
		'expandChild'   => __( 'Expand submenu', 'maintenance-services' ),
		'collapseChild' => __( 'Collapse submenu', 'maintenance-services' ),
	) );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'maintenance_services_scripts' );

function maintenance_services_admin_style() {
  wp_enqueue_style('maintenance-services-admin-style', get_template_directory_uri()."/css/maintenance-services-admin-style.css");
}
add_action('admin_enqueue_scripts', 'maintenance_services_admin_style');

define('MAINTENANCE_SERVICES_SKTTHEMES_URL','https://www.sktthemes.org');
define('MAINTENANCE_SERVICES_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/home-maintenance-wordpress-theme/');
define('MAINTENANCE_SERVICES_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-renovation-wordpress-theme/');
define('MAINTENANCE_SERVICES_SKTTHEMES_THEME_DOC','https://sktthemesdemo.net/documentation/maintenance-documentation/');
define('MAINTENANCE_SERVICES_SKTTHEMES_LIVE_DEMO','https://www.sktperfectdemo.com/demos/maintenance/');
define('MAINTENANCE_SERVICES_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('MAINTENANCE_SERVICES_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function maintenance_services_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
if ( ! function_exists( 'maintenance_services_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function maintenance_services_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

/**
 * Filter the except length to 21 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function maintenance_services_custom_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 25;
}
add_filter( 'excerpt_length', 'maintenance_services_custom_excerpt_length', 999 );
 
/**
 *
 * Style For About Theme Page
 *
 */
function maintenance_services_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_maintenance_services_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'maintenance-services-about-page-style', get_template_directory_uri() . '/css/maintenance-services-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'maintenance_services_admin_about_page_css_enqueue' );

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'maintenance_services_activation_notice' );
}
function maintenance_services_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="maintenance-services-notice-container">
        	<div class="maintenance-services-notice-img"><img src="<?php echo esc_url( MAINTENANCE_SERVICES_SKTTHEMES_THEME_URI . 'images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="maintenance-services-notice-content">
            <div class="maintenance-services-notice-heading"><?php echo esc_html__('Thank you for installing Maintenance Services!', 'maintenance-services'); ?></div>
            <p class="largefont"><?php echo esc_html__('Maintenance Services comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'maintenance-services'); ?></p>
            </div>
            <div class="maintenance-services-clear"></div>
        </div>
    </div>
    <?php
}

function maintenance_services_wp_admin_style($hook) {
	 	if ( 'themes.php' != $hook ) {
			return;
		}
		wp_enqueue_style( 'maintenance-services-admin-style', get_template_directory_uri() . '/css/maintenance-services-admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'maintenance_services_wp_admin_style' );

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function maintenance_services_skip_link_focus_fix() {  
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php       
}
add_action( 'wp_print_footer_scripts', 'maintenance_services_skip_link_focus_fix' );

function maintenance_services_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'maintenance_services_load_dashicons', 999);

/**
 * Include the Plugin_Activation class.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'maintenance_services_register_required_plugins' );
 
function maintenance_services_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		)
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins',   // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}