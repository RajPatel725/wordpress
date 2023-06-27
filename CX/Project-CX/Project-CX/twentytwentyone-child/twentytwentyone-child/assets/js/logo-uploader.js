
jQuery( function($){
	// on upload button click
	$( 'body' ).on( 'click', '.logo-upload', function( event ){
		event.preventDefault(); // prevent default link click and page refresh
		
		const button = $(this);
		const imageId = button.next().next().val();
		
		const customUploader = wp.media({
			title: 'Select or Upload Media',
			library : {
				type : 'image'
			},
			button: {
				text: 'Use this image'
			},
			multiple: false
		}).on( 'select', function() {
			const attachment = customUploader.state().get( 'selection' ).first().toJSON();
			button.removeClass( 'button' ).html( '<img height="250" width="250" src="' + attachment.url + '">');
			button.next().show();
			button.next().next().val( attachment.id );
		})
		
		// already selected images
		customUploader.on( 'open', function() {

			if( imageId ) {
			  const selection = customUploader.state().get( 'selection' )
			  attachment = wp.media.attachment( imageId );
			  attachment.fetch();
			  selection.add( attachment ? [attachment] : [] );
			}
		})

		customUploader.open()
	
	});
	// on remove button click
	$( 'body' ).on( 'click', '.logo-remove', function( event ){
		event.preventDefault();
		const button = $(this);
		button.next().val( '' ); // emptying the hidden field
		button.hide().prev().addClass( 'button' ).html( 'Upload image' ); // replace the image with text
	});
});