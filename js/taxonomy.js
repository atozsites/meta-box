( function ( $, Atozsites ) {
	'use strict';

	function toggleAddInput( e ) {
		e.preventDefault();
		this.nextElementSibling.classList.toggle( 'Atozsites-hidden' );
	}

	Atozsites.$document.on( 'click', '.Atozsites-taxonomy-add-button', toggleAddInput );
} )( jQuery, Atozsites );
