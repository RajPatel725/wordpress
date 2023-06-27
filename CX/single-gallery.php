<?php
get_header();

// Start the Loop
global $post;

while (have_posts() ) : the_post(); ?>

<div class="gallery_container">

    <h1>Event Galleries</h1>
    <h2><?php the_title(); ?></h2>
    <div id="photo-gallery">
        <?php
            $images = get_post_meta( $post->ID, 'gallery_images', true );
            $size = 'full';
            if(!empty($images)):
                $total = count($images);
                $count = 0;
                $number = 2;					
                foreach($images as $image ): ?>						
                        <div class="single_images">
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                        </div>
                    <?php
                    if ($count == $number) {
                        // we've shown the number, break out of loop
                        break;
                    } ?>
                    <?php $count++;
                endforeach;
            endif;
        ?>
    </div>
    
    <!-- <div class="load_more_btn">Load more</div> -->
    <a id="gallery-load-more" href="javascript: my_repeater_show_more();" <?php if ($total < $count) { ?> style="display: none;"<?php } ?>><h2 id="title-bg"><div class="load_more_btn">Load more</div></h2></a>
    <div class="back_to_gallery_page">
        <a href="/gallery">back to main gallery</a>
    </div>
</div>

<?php endwhile;  ?>

<script type="text/javascript">

	var my_repeater_field_post_id = <?php global $post; echo $post->ID; ?>;
	var my_repeater_field_offset = <?php echo $number + 1; ?>;
	var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
	var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
	var my_repeater_more = true;
	
	function my_repeater_show_more() {
        
		jQuery.post(
			my_repeater_ajax_url, {
				'action': 'my_repeater_show_more',
				'post_id': my_repeater_field_post_id,
				'offset': my_repeater_field_offset,
				'nonce': my_repeater_field_nonce
			},
			function (json) {
				jQuery('#photo-gallery').append(json['content']);
				my_repeater_field_offset = json['offset'];
				if (!json['more']) {
					jQuery('#gallery-load-more').css('display', 'none');
				}
			},
			'json'
		);
	}
	
</script>


<?php


//  Gallery load more
add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');

function my_repeater_show_more() {
	// validate the nonce
	global $post;

	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
		exit;
	}
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}
	$show = 3; // how many more to show
	$start = $_POST['offset'];
	$end = $start + $show;
	$post_id = $_POST['post_id'];

	ob_start();
	$images = get_post_meta( $post_id, 'gallery_images', true );
	$size = 'full';

	if ($images) {
		$total = count($images);
		$count = 0;
		foreach($images as $image ) {

			if ($count < $start) {
				$count++;
				continue;
			} ?>

				<div class="single_images">
					<?php echo wp_get_attachment_image( $image, $size ); ?>
				</div>

			<?php $count++;

			if ($count == $end) {

				break;
			}
		}
	} 
	$content = ob_get_clean();

	$more = false;
	
	if ($total > $count) {
		$more = true;
	}

	echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));

	exit;
}


get_footer();
?>