<script id="tmpl-Atozsites-image-item" type="text/html">
	<input type="hidden" name="{{{ data.controller.fieldName }}}" value="{{{ data.id }}}" class="Atozsites-media-input">
	<div class="attachment-preview">
		<div class="thumbnail">
			<div class="centered">
				<# if ( 'image' === data.type && data.sizes ) { #>
					<# if ( data.sizes[data.controller.imageSize] ) { #>
						<img src="{{{ data.sizes[data.controller.imageSize].url }}}">
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
	<div class="Atozsites-image-overlay"></div>
	<div class="Atozsites-image-actions">
		<a class="Atozsites-image-edit Atozsites-edit-media" title="{{{ i18nAtozsitesMedia.edit }}}" href="{{{ data.editLink }}}" target="_blank">
			<span class="dashicons dashicons-edit"></span>
		</a>
		<a href="#" class="Atozsites-image-delete Atozsites-remove-media" title="{{{ i18nAtozsitesMedia.remove }}}">
			<span class="dashicons dashicons-no-alt"></span>
		</a>
	</div>
</script>
