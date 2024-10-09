jQuery(document).ready(function ($) {

	/*** Upload Image **/
	jQuery(document).on("click", ".upload_image_button", function (e) {
		e.preventDefault();
		var $button = $(this);

		// Create the media frame.
		var file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Select or upload image',
			library: { // remove these to show all
				type: 'image' // specific mime
			},
			button: {
				text: 'Select'
			},
			multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected, run a callback.
		file_frame.on('select', function () {
			// We set multiple to false so only get one image from the uploader
			var attachment = file_frame.state().get('selection').first().toJSON();
			
			$button.siblings('input').val(attachment.url);

			if (attachment.hasOwnProperty('sizes') && attachment.sizes.hasOwnProperty('thumbnail')) {
				$button.closest('.vikwp-image-params').find('.vikwp-preview-img').html('<img style="max-height: 150px;" src="'+attachment.sizes.thumbnail.url+'" class="vikwp-preview-img-img" />');
			}
		});
		// Finally, open the modal
		file_frame.open();
	});
});