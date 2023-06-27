<?php
get_header();

// Start the Loop
global $post;

$args = array(
    'post_type' => 'gallery',
    'post_status' => 'publish',
);
$wp_query = new WP_Query($args); 

while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>

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

<?php  endwhile;  ?>

<script type="text/javascript">
	var my_repeater_field_post_id = <?php echo $post->ID; ?>;
	var my_repeater_field_offset = <?php echo $number + 1; ?>;
	var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
	var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
	var my_repeater_more = true;
	
	function my_repeater_show_more() {
		
		// make ajax request
		jQuery.post(
			my_repeater_ajax_url, {
				// this is the AJAX action we set up in PHP
				'action': 'my_repeater_show_more',
				'post_id': my_repeater_field_post_id,
				'offset': my_repeater_field_offset,
				'nonce': my_repeater_field_nonce
			},
			function (json) {
				// add content to container
				// this ID must match the containter 
				// you want to append content to
				jQuery('#photo-gallery').append(json['content']);
				// update offset
				my_repeater_field_offset = json['offset'];
				// see if there is more, if not then hide the more link
				if (!json['more']) {
					// this ID must match the id of the show more link
					jQuery('#gallery-load-more').css('display', 'none');
				}
			},
			'json'
		);
	}
	
</script>


<?php
get_footer();
?>