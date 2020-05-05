( function ( $, _, Atozsites ) {
	'use strict';

	/**
	 * Show preview of oembeded media.
	 */
	function showPreview( e ) {
		e.preventDefault();

		var $this = $( this ),
			$spinner = $this.siblings( '.spinner' ),
			data = {
				action: 'Atozsites_get_embed',
				url: this.value,
				not_available: $this.data( 'not-available' ),
			};

		$spinner.css( 'visibility', 'visible' );
		$.post( ajaxurl, data, function ( response ) {
			$spinner.css( 'visibility', 'hidden' );
			$this.siblings( '.Atozsites-embed-media' ).html( response.data );
		}, 'json' );
	}

	/**
	 * Remove oembed preview when cloning.
	 */
	function removePreview() {
		$( this ).siblings( '.Atozsites-embed-media' ).html( '' );
	}

	Atozsites.$document
		.on( 'change', '.Atozsites-oembed', _.debounce( showPreview, 250 ) )
	    .on( 'clone', '.Atozsites-oembed', removePreview );
} )( jQuery, _, Atozsites );
