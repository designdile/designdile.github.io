<?php
/**
 * Theme Customizer
 *
 * @package Impressive_Portfolio
 */

function impressive_portfolio_customize_register( $wp_customize ) {

	// Upsell Section.
	$wp_customize->add_section(
		new Impressive_Portfolio_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Impressive Portfolio Pro', 'impressive-portfolio' ),
				'button_text'      => __( 'Buy Pro', 'impressive-portfolio' ),
				'url'              => 'https://ascendoor.com/themes/impressive-portfolio-pro/',
				'background_color' => '#ff6762',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

}
add_action( 'customize_register', 'impressive_portfolio_customize_register' );

function impressive_portfolio_custom_control_scripts() {

	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( 'impressive-portfolio-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array( 'pure-portfolio-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'impressive-portfolio-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'pure-portfolio-custom-controls-js', 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'impressive_portfolio_custom_control_scripts' );
