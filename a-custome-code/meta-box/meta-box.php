<?php

function add_custom_meta_box(){
    add_meta_box(
		"demo-meta-box",
		"Custom Meta Box",
		"custom_meta_box",
		"post",
		"side",
		"high",
		null
	);
}

add_action("add_meta_boxes", "add_custom_meta_box");

function custom_meta_box(){ 
	global $post;
	?>
	<div class="row">
		<div class="featured-image">
			<label for="futherImage">Featured Image				
				<?php $image = get_post_meta($post->ID, 'featuredImage', true); ?>
				<a href="#" class="aw_upload_image_button button"><?php _e('Upload Image'); ?></a>
            	<input type="text" name="featuredImage" id="featuredImage" value="<?php echo $image; ?>" />
				<script>
					jQuery(function($){
						$('body').on('click', '.aw_upload_image_button', function(e){
							e.preventDefault();
							aw_uploader = wp.media({
								title: 'Custom image',
								button: {
									text: 'Use this image'
								},
								multiple: false
							}).on('select', function() {
								var attachment = aw_uploader.state().get('selection').first().toJSON();
								$('#featuredImage').val(attachment.url);
							})
							.open();
						});
					});
				</script>
			</label>
		</div>
		<div class="email-name">
			<label for="email">Email
				<?php $email = get_post_meta($post->ID, 'email', true); ?>
				<input type="text" name="email" value="<?php if ($email){echo $email; }  ?>" />
			</label>
		</div>
	</div>

    <?php  
}

function save_custom_meta_box($post_id){ 
	global $post; 
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
  	return $post_id;

	if(isset($_POST["featuredImage"])):
        update_post_meta($post->ID, 'featuredImage', $_POST["featuredImage"]);
    endif;

	if(isset($_POST["email"])):
        update_post_meta($post->ID, 'email', $_POST["email"]);
    endif;

}
add_action( 'save_post', 'save_custom_meta_box' );
