( function ( $, Atozsites ) {
	'use strict';

	var views = Atozsites.views = Atozsites.views || {},
		MediaField = views.MediaField,
		MediaItem = views.MediaItem,
		MediaList = views.MediaList,
		VideoField;

	VideoField = views.VideoField = MediaField.extend( {
		createList: function ()
		{
			this.list = new MediaList( {
				controller: this.controller,
				itemView: MediaItem.extend( {
					className: 'Atozsites-video-item',
					template : wp.template( 'Atozsites-video-item' ),
					render: function()
					{
						var settings =  ! _.isUndefined( window._wpmejsSettings ) ? _.clone( _wpmejsSettings ) : {};
						MediaItem.prototype.render.apply( this, arguments );
						this.player = new MediaElementPlayer( this.$( 'video' ).get(0), settings );
					}
				} )
			} );
		}
	} );

	function initVideoField() {
		var $this = $( this ),
			view = new VideoField( { input: this } );
		$this.siblings( '.Atozsites-media-view' ).remove();
		$this.after( view.el );
	}

	function init( e ) {
		$( e.target ).find( '.Atozsites-video' ).each( initVideoField );
	}

	Atozsites.$document
		.on( 'mb_ready', init )
		.on( 'clone', '.Atozsites-video', initVideoField );
} )( jQuery, Atozsites );
