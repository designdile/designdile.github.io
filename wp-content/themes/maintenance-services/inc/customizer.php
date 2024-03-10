<?php
/**
 * Maintenance Services Theme Customizer
 *
 * @package Maintenance Services
 */
 
function maintenance_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'maintenance_services_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'maintenance_services_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'maintenance_services_custom_header_setup' );
if ( ! function_exists( 'maintenance_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see maintenance_services_custom_header_setup().
 */
function maintenance_services_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // maintenance_services_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function maintenance_services_customize_register( $wp_customize ) {
	//Add a class for titles
    class maintenance_services_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ffb400',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','maintenance-services'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Header Background Color','maintenance-services'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
	))
	);

	$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#bcbbbb',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Copyright Text Color','maintenance-services'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);	
	
	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Information','maintenance-services'),				
			'description'	=> esc_html__('Add Information For Header Area','maintenance-services'),		
			'priority'		=> null
	));
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Contact Number','maintenance-services'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_no'
	));
	
	$wp_customize->add_setting('email_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('email_add',array(
			'label'	=> esc_html__('Email Address','maintenance-services'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'email_add'
	));	
	
	$wp_customize->add_setting('contact_top_address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address',array(
			'label'	=> esc_html__('Address Line 1','maintenance-services'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address'
	));	
	
	$wp_customize->add_setting('contact_top_address_two',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address_two',array(
			'label'	=> esc_html__('Address Line 2','maintenance-services'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address_two'
	));	
	
	//Hide Header Info Box
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'maintenance_services_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','maintenance-services'),
    	   'type'      => 'checkbox'
     ));
	 //Hide Header Info Box		
	
	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','maintenance-services'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','maintenance-services'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'maintenance_services_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 310) For Better Resolution.','maintenance-services'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Category / Archive And Single Post Banner Settings','maintenance-services'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,

			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','maintenance-services'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'maintenance_services_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Category / Archive And Single Post. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 310) For Better Resolution.','maintenance-services'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	
	 
	// Footer Info Area
	$wp_customize->add_section('footer_info_area',array(
			'title'	=> __('Footer Info Box','maintenance-services'),
			'priority'	=> null,
	));
	
	$wp_customize->add_setting('address_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('address_title',array(
			'label'	=> __('Address Title','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'address_title'
	));	
    
	$wp_customize->add_setting('address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('address',array(
			'label'	=> __('Address','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'address'
	));	  
    
	$wp_customize->add_setting('email_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('email_title',array(
			'label'	=> __('Email Title','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'email_title'
	));	
    
	$wp_customize->add_setting('email_address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('email_address',array(
			'label'	=> __('Email Address','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'email_address'
	));
    
	$wp_customize->add_setting('phone_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone_title',array(
			'label'	=> __('Phone Title','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'phone_title'
	));	
    
	$wp_customize->add_setting('phone_number',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone_number',array(
			'label'	=> __('Phone Number','maintenance-services'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'phone_number'
	));          
	
	$wp_customize->add_setting('hide_footer_info',array(
			'sanitize_callback' => 'maintenance_services_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_footer_info', array(
    	   'section'   => 'footer_info_area',    	 
		   'label'	=> __('Uncheck To Show This Section','maintenance-services'),
    	   'type'      => 'checkbox'
     ));	
	 // Footer Info Area	 
	 
	$wp_customize->add_section('footer_text_copyright',array(
			'title'	=> esc_html__('Footer Copyright Text','maintenance-services'),				
			'priority'		=> null
	));
	
	$wp_customize->add_setting('footer_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','maintenance-services'),
			'section'	=> 'footer_text_copyright',
			'setting'	=> 'footer_text'
	));		 
}
add_action( 'customize_register', 'maintenance_services_customize_register' );
//Integer
function maintenance_services_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function maintenance_services_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function maintenance_services_custom_css() {
    wp_enqueue_style(
        'maintenance-services-custom-style',
        get_template_directory_uri() . '/css/maintenance-services-custom-style.css' 
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 
		
        $custom_css = "
					#sidebar ul li a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.tagcloud a,
					.blocksbox:hover h3,
					.rdmore a,
					.copyright-txt a:hover, #footermenu li.current-menu-item a, #footermenu li.current_page_item a,
					.header-phone-number,
					#sidebar li a:hover,
					.main-navigation ul li ul li a,
					.logo h2,
					.footer-row .cols-3 ul li a:hover, .footer-row .cols-3 ul li.current_page_item a
					{ 
						 color: {$color} !important;
					}

					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.head-info-area,
					.designs-thumb,
					.hometwo-block-button,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.social-icons a:hover,
					.skt-header-quote-btn a,
					.custom-cart-count
					{ 
					   background-color: {$color} !important;
					}

					.titleborder span:after, .sticky{border-bottom-color: {$color} !important;}
					.header{background-color:{$headerbgcolor};}
					.copyright-txt{color: {$footertextcolor} !important;}	
					.main-navigation ul li:hover a, .main-navigation ul li a:focus, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_item a{background-color: {$color} !important;}			
				";
        wp_add_inline_style( 'maintenance-services-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'maintenance_services_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maintenance_services_customize_preview_js() {
	wp_enqueue_script( 'maintenance_services_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'maintenance_services_customize_preview_js' );