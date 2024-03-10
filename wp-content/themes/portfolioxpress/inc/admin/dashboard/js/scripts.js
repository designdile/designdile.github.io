( function( $ ) {
	"use strict";

	/*
	 * Change Tabs.
	 */
	$( document ).on( 'click', '.dashboard-panel-tabs .dashboard-panel-tab a', function( e ) {

		let $index = $( this ).closest( '.dashboard-panel-tab' ).index();

		// Nav Tabs.
		$( this ).closest( '.dashboard-panel-tab' ).addClass( 'dashboard-panel-tab-active' ).siblings().removeClass( 'dashboard-panel-tab-active' );

		// Content Tabs.
		$( '.dashboard-panel-content-tabs .dashboard-panel-tab' ).eq( $index ).addClass( 'dashboard-panel-tab-active' ).siblings().removeClass( 'dashboard-panel-tab-active' );

		e.preventDefault();
	} );

	/*
	 * Help toggle
	 */
	$( document ).on( 'click', '.feature-help-icon', function( e ) {
		$( this ).toggleClass( 'is-active' );
		$( this ).next( '.feature-help-info' ).fadeToggle( 'fast' );
	} );

	$(document).on('click', '.portfolioxpress-primary-notice .notice-dismiss', function (event) {
		event.preventDefault();
		jQuery.post(portfolioxpress_localize.ajax_url, {
			action: 'portfolioxpress_dismissed_handler',
			security : portfolioxpress_localize.dismiss_notice_nonce,
			notice: $(this).closest('.portfolioxpress-primary-notice').data('notice'),
		});
		$('.theme-admin-dashboard-notice').hide();
	});

} )( jQuery );
