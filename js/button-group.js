( function ( $, Atozsites ) {
	'use strict';

	function setActiveClass() {
		var $this = $( this ),
			$input = $this.find( 'input' ),
			$label = $input.parent();

		if ( $input.prop( 'checked' ) ) {
			$label.addClass( 'selected' );
		} else {
			$label.removeClass( 'selected' );
		}
	}

	function clickHandler() {
		var $this = $( this ),
			$input = $this.find( 'input' ),
			$label = $input.parent(),
			type = $input.attr( 'type' ),
			$allLabels = $this.parent().find( 'label' );
		if ( ! $input.prop( 'checked' ) ) {
			$label.removeClass( 'selected' );
			return;
		}
		$label.addClass( 'selected' );

		if ( 'radio' === type ) {
			$allLabels.removeClass( 'selected' );
			$label.addClass( 'selected' );
		}
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-button-input-list li' ).each( setActiveClass );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'click', '.Atozsites-button-input-list li', clickHandler )
		.on( 'clone', '.Atozsites-button-input-list li', setActiveClass );
} )( jQuery, Atozsites );
