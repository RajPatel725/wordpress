<?php

function ajax_form() {
    
	wp_enqueue_script( 'validate', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js' , array('jquery'),'1.1', true);

    wp_enqueue_script('cpm_object', get_template_directory_uri() . '/a-custome-code/ajax-form/ajax_form.js', array('jquery'),'1.1', true);
    wp_localize_script( 'cpm_object', 'url_ajax_admin', array('ajaxurl' => admin_url('admin-ajax.php')));
}  
add_action( 'wp_enqueue_scripts', 'ajax_form' );  

function mail_form_submit(){

	$name = $_POST['name'];
	if (isset($name)) {
		echo $name.'<br>';
	}

	$email = $_POST['email'];
	if (isset($email)) {
		echo $email.'<br>';	}

	$cars = $_POST['cars'];
	if (isset($cars)) {
		 echo $cars.'<br>'; }
	
	$vehicle = $_POST['vehicle'];
	if (isset($vehicle)){
		foreach ($vehicle as $val )
		{
			echo 'Vehical:'.$val.'<br>';
		}
	}

	$radio = $_POST['fav_language'];
	if (isset($radio)){
		echo $radio.'<br>'; 
	}

	$birthday = $_POST['birthday'];
	if (isset($birthday)){
		echo $birthday.'<br>';
	}
	
	$message = $_POST['message'];
	if(isset($message))	{
		echo $message.'<br>'; }
	
	$file_handler = 'image';
    $attach_id = media_handle_upload($file_handler,0 );
    
	if(isset($attach_id)){
		echo wp_get_attachment_image($attach_id);
	}

	$featuredImage = 'featuredImage';
    $attach_id_featuredImage = media_handle_upload($featuredImage,0 );

	if(isset($attach_id_featuredImage)){
		echo wp_get_attachment_image($attach_id_featuredImage);
	}

	$title = $_POST['name'];
    $content =  $_POST['message'];
 
    $post_id = wp_insert_post( array(
		'post_type' => 'post',
        'post_title' => $title,
        'post_content' => $content,
        'post_status' => 'publish',
    ) );

	set_post_thumbnail( $post_id, $attach_id );

	update_post_meta( $post_id, 'email', $_POST['email']);

	$feature_url = wp_get_attachment_image_url( $attach_id_featuredImage );
	update_post_meta( $post_id, 'featuredImage', $feature_url );

	update_post_meta( $post_id, '_listing_image_id', $attach_id_featuredImage );

    if (isset($post_id))
    {
        echo '*Post Added';
    }
    else {
        echo '*Error occurred while adding the post';
    }

	die();
}
add_action('wp_ajax_send_form','mail_form_submit');
add_action('wp_ajax_nopriv_send_form','mail_form_submit');

