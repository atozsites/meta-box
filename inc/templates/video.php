<script id="tmpl-Atozsites-video-item" type="text/html">
	<input type="hidden" name="{{{ data.controller.fieldName }}}" value="{{{ data.id }}}" class="Atozsites-media-input">
	<div class="Atozsites-media-preview">
		<div class="Atozsites-media-content">
			<div class="centered">
				<# if( _.indexOf( i18nAtozsitesVideo.extensions, data.url.substr( data.url.lastIndexOf('.') + 1 ) ) > -1 ) { #>
				<div class="Atozsites-video-wrapper">
					<video controls="controls" class="Atozsites-video-element" preload="metadata"
						<# if ( data.width ) { #>width="{{ data.width }}"<# } #>
						<# if ( data.height ) { #>height="{{ data.height }}"<# } #>
						<# if ( data.image && data.image.src !== data.icon ) { #>poster="{{ data.image.src }}"<# } #>>
						<source type="{{ data.mime }}" src="{{ data.url }}"/>
					</video>
				</div>
				<# } else { #>
					<# if ( data.image && data.image.src && data.image.src !== data.icon ) { #>
						<img src="{{ data.image.src }}" />
					<# } else { #>
						<img src="{{ data.icon }}" />
					<# } #>
				<# } #>
			</div>
		</div>
	</div>
	<div class="Atozsites-media-info">
		<a href="{{{ data.url }}}" class="Atozsites-media-title" target="_blank">
			<# if( data.title ) { #>
				{{{ data.title }}}
			<# } else { #>
				{{{ i18nAtozsitesMedia.noTitle }}}
			<# } #>
		</a>
		<p class="Atozsites-media-name">{{{ data.filename }}}</p>
		<p class="Atozsites-media-actions">
			<a class="Atozsites-edit-media" title="{{{ i18nAtozsitesMedia.edit }}}" href="{{{ data.editLink }}}" target="_blank">
				<span class="dashicons dashicons-edit"></span>{{{ i18nAtozsitesMedia.edit }}}
			</a>
			<a href="#" class="Atozsites-remove-media" title="{{{ i18nAtozsitesMedia.remove }}}">
				<span class="dashicons dashicons-no-alt"></span>{{{ i18nAtozsitesMedia.remove }}}
			</a>
		</p>
	</div>
</script>
