( function ( $, Atozsites ) {
	'use strict';

	/**
	 * Update text value.
	 */
	function update() {
		var $this = $( this ),
			$output = $this.siblings( '.Atozsites-output' );

		$this.on( 'input propertychange change', function () {
			$output.html( $this.val() );
		} );
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-range' ).each( update );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'clone', '.Atozsites-range', update );
} )( jQuery, Atozsites );
