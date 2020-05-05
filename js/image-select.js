( function ( $, Atozsites ) {
	'use strict';

	function setActiveClass() {
		var $this = $( this ),
			type = $this.attr( 'type' ),
			selected = $this.is( ':checked' ),
			$parent = $this.parent(),
			$others = $parent.siblings();
		if ( selected ) {
			$parent.addClass( 'Atozsites-active' );
			if ( type === 'radio' ) {
				$others.removeClass( 'Atozsites-active' );
			}
		} else {
			$parent.removeClass( 'Atozsites-active' );
		}
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-image-select input' ).trigger( 'change' );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'change', '.Atozsites-image-select input', setActiveClass );
} )( jQuery, Atozsites );
