<?php
/**
 * Impressive Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Impressive Portfolio
 */

if ( ! function_exists( 'impressive_portfolio_setup' ) ) :
	function impressive_portfolio_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'impressive-portfolio', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'impressive_portfolio_setup' );

if ( ! function_exists( 'impressive_portfolio_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function impressive_portfolio_enqueue_styles() {
		$parenthandle = 'pure-portfolio-style';
		$theme        = wp_get_theme();

		// Append .min if SCRIPT_DEBUG is false.
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'pure-portfolio-slick-style',
				'pure-portfolio-animate-style',
				'pure-portfolio-fontawesome-style',
				'pure-portfolio-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'impressive-portfolio-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

		wp_enqueue_script( 'impressive-portfolio-script', get_stylesheet_directory_uri() . '/assets/js/custom' . $min . '.js', array( 'jquery', 'pure-portfolio-custom-script' ), $theme->get( 'Version' ), true );

	}

endif;

add_action( 'wp_enqueue_scripts', 'impressive_portfolio_enqueue_styles' );

// Modify the body class.
function impressive_portfolio_body_class( $classes ) {
	$classes   = array_diff( $classes, array( 'dark-theme' ) );
	$classes[] = 'light-theme';
	return $classes;
}
add_filter( 'body_class', 'impressive_portfolio_body_class', 99 );

// Custom Controls.
require get_theme_file_path() . '/inc/custom-controls.php';

// Customizer Section.
require get_theme_file_path() . '/inc/customizer.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}

function admin_style() {
	?>
	<style type="text/css">
		.notice.notice-info.pure-portfolio-demo-data {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'admin_style' );

function impressive_portfolio_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'pure_portfolio_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'ff6762',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'pure_portfolio_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'impressive_portfolio_custom_header_setup' );
