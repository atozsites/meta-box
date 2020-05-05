<script id="tmpl-Atozsites-media-item" type="text/html">
	<input type="hidden" name="{{{ data.controller.fieldName }}}" value="{{{ data.id }}}" class="Atozsites-media-input">
	<div class="Atozsites-media-preview attachment-preview">
		<div class="Atozsites-media-content thumbnail">
			<div class="centered">
				<# if ( 'image' === data.type && data.sizes ) { #>
					<# if ( data.sizes.thumbnail ) { #>
						<img src="{{{ data.sizes.thumbnail.url }}}">
					<# } else { #>
						<img src="{{{ data.sizes.full.url }}}">
					<# } #>
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

<script id="tmpl-Atozsites-media-status" type="text/html">
	<# if ( data.maxFiles > 0 ) { #>
		{{{ data.length }}}/{{{ data.maxFiles }}}
		<# if ( 1 < data.maxFiles ) { #>{{{ i18nAtozsitesMedia.multiple }}}<# } else {#>{{{ i18nAtozsitesMedia.single }}}<# } #>
	<# } #>
</script>

<script id="tmpl-Atozsites-media-button" type="text/html">
	<a class="button">{{{ data.text }}}</a>
</script>
