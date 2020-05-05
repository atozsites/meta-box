( function ( $, Atozsites ) {
	'use strict';

	var views = Atozsites.views = Atozsites.views || {},
		ImageField = views.ImageField,
		ImageUploadField,
		UploadButton = views.UploadButton;

	ImageUploadField = views.ImageUploadField = ImageField.extend( {
		createAddButton: function () {
			this.addButton = new UploadButton( {controller: this.controller} );
		}
	} );

	function initImageUpload() {
		var $this = $( this ),
			view = $this.data( 'view' );

		if ( view ) {
			return;
		}

		view = new ImageUploadField( { input: this } );

		$this.siblings( '.Atozsites-media-view' ).remove();
		$this.after( view.el );

		// Init uploader after view is inserted to make wp.Uploader works.
		view.addButton.initUploader();

		$this.data( 'view', view );
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-image_upload, .Atozsites-plupload_image' ).each( initImageUpload );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'clone', '.Atozsites-image_upload, .Atozsites-plupload_image', initImageUpload )
} )( jQuery, Atozsites );
