( function ( $, Atozsites ) {
	'use strict';

	function toggleTree() {
		var $this = $( this ),
			$children = $this.closest( 'li' ).children( 'ul' );

		if ( $this.is( ':checked' ) ) {
			$children.removeClass( 'hidden' );
		} else {
			$children.addClass( 'hidden' ).find( 'input' ).prop( 'checked', false );
		}
	}

	function toggleAll( e ) {
		e.preventDefault();

		var $this = $( this ),
			checked = $this.data( 'checked' );

		if ( undefined === checked ) {
			checked = true;
		}

		$this.parent().siblings( '.Atozsites-input-list' ).find( 'input' ).prop( 'checked', checked ).trigger( 'change' );

		checked = ! checked;
		$this.data( 'checked', checked );
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-input-list.Atozsites-collapse input[type="checkbox"]' ).each( toggleTree );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'change', '.Atozsites-input-list.Atozsites-collapse input[type="checkbox"]', toggleTree )
		.on( 'clone', '.Atozsites-input-list.Atozsites-collapse input[type="checkbox"]', toggleTree )
		.on( 'click', '.Atozsites-input-list-select-all-none', toggleAll );
} )( jQuery, Atozsites );
