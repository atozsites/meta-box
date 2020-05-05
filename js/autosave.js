( function ( $, document ) {
	'use strict';

	$( document ).ajaxSend( function ( event, xhr, settings ) {
		if ( ! Array.isArray( settings.data ) || -1 === settings.data.indexOf( 'wp_autosave' ) ) {
			return;
		}
		var inputSelectors = 'input[class*="Atozsites"], textarea[class*="Atozsites"], select[class*="Atozsites"], button[class*="Atozsites"], input[name^="nonce_"]';
		$( '.Atozsites-meta-box' ).each( function () {
			var $meta_box = $( this );
			if ( true === $meta_box.data( 'autosave' ) ) {
				settings.data += '&' + $meta_box.find( inputSelectors ).serialize();
			}
		} );
	} );
} )( jQuery, document );
