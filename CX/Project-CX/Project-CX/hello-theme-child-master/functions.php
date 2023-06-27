<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);

	wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/css/custom.css', '', time());
	wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/css/fontawesome.css', '', time());
	
	wp_enqueue_script('countdown-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.js', array(), time(), true);
	wp_enqueue_script('countdown-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js', array(), time(), true);
	
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), time(), true);
	wp_localize_script( 'custom-js', 'frontend_ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}

/**
 * Register Navigation menu.
 */
register_nav_menus(
	array(
		'footer-about'  => esc_html__( 'Footer About', 'hello-elementor' ),
		'footer-catalog'  => esc_html__( 'Footer Catalog', 'hello-elementor' ),
		'footer-policy'  => esc_html__( 'Footer Policy Links', 'hello-elementor' ),
	)
);

add_action('init', 'directory_post_register');
function directory_post_register() {
	$labels = array(
		'name' => _x('Vendor', 'post type general name'),
		'singular_name' => _x('Vendor Post Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Vendor Post item'),
		'add_new_item' => __('Add New Vendor Post Item'),
		'edit_item' => __('Edit Vendor Post Item'),
		'new_item' => __('New Vendor Post Item'),
		'view_item' => __('View Vendor Post Item'),
		'search_items' => __('Search Vendor Post'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-list-view', //
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		//'supports' => array( 'title', 'author', 'thumbnail' ),
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', )
	);
register_post_type( 'vendor' , $args );
register_taxonomy("vendor_category", array("vendor"), array("hierarchical" => true, "label" => "Vendor Category", "singular_label" => "Vendor Category", "rewrite" => true));
flush_rewrite_rules();
}

add_action('init', 'gallery_post_register');
function gallery_post_register() {
	$labels = array(
		'name' => _x('Gallery', 'post type general name'),
		'singular_name' => _x('Gallery Post Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Gallery Post item'),
		'add_new_item' => __('Add New Gallery Post Item'),
		'edit_item' => __('Edit Gallery Post Item'),
		'new_item' => __('New Gallery Post Item'),
		'view_item' => __('View Gallery Post Item'),
		'search_items' => __('Search Gallery Post'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-list-view', //
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		//'supports' => array( 'title', 'author', 'thumbnail' ),
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', )
	);
register_post_type( 'gallery' , $args );
register_taxonomy("gallery_category", array("gallery"), array("hierarchical" => true, "label" => "Gallery Category", "singular_label" => "Gallery Category", "rewrite" => true));
flush_rewrite_rules();
}

// Load More Vendor

function vendor_load_more() {

	$postID = !empty( $_POST['postID'] ) ? $_POST['postID'] : 'all-post';
	$paged = !empty( $_POST['paged'] ) ? $_POST['paged'] : 2;
	$load_category = !empty( $_POST['load_category'] ) ? $_POST['load_category'] : 'false';
	$post_per_page  = !empty($load_category) && $load_category == 'true' ? 8 : 4;
	$paged = !empty($load_category) && $load_category == 'true' ? 1 : $paged;

	$vendorAjax = array(
		'post_type' => 'vendor',
		'post_status' => 'publish',
		'posts_per_page' => $post_per_page,
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'ignore_custom_sort' => TRUE,
		'paged' => intval($paged),
	);

	if($postID != 'all-post') {
		$vendorAjax['tax_query'][] = array(
			'taxonomy' => 'vendor_category',
			'field' => 'slug',
			'terms' => $postID,
		);
	}

    $ajaxposts = new WP_Query($vendorAjax);

	if($ajaxposts->have_posts()) {

		while($ajaxposts->have_posts()) : $ajaxposts->the_post(); ?>

				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="rka-leadership-item">
						<div class="leader-profile">
							<a class="team-details-link" href="javascript:void(0);"
								data-popup-id="team-popup-<?php the_ID(); ?>">
								<?php the_post_thumbnail('rka_img_288_x_333'); ?>
							</a>
						</div>
						<div class="leader-data">
							<div class="leader-name rka-green"><?php the_title(); ?></div>
							<button type="button"
								class="arrow-btn-text team-details-link team-popup-<?php the_ID(); ?>"
								data-popup-id="team-popup-<?php the_ID(); ?>">
								<span><?php
											$taxonomy = "vendor_category";
											$terms = get_the_terms(get_the_ID(), $taxonomy);
											$categories = [];

											if( $terms ) {          
												foreach ($terms as $category) {
													$categories[] = $category->name;
												}       
											}

											$categories = implode(', ', $categories);

											echo $categories;
												?></span>
								<div style="width: 45px;">
									<div class="black-arrow-btn arrow-btn"></div>
								</div>
							</button>
						</div>
					</div>
				</div>
				<div class="team-pop-up" style="display: none;" id="team-popup-<?php the_ID(); ?>">
					<div class="pop-up-box">
						<div class="pop-up-close">
							<button class="about-pop-up-close close" type="button"><i
									class="far fa-times-circle"></i></button>
						</div>
						<div class="contain-box">
							<div class="item-1">
								<div class="team-profile">
									<?php the_post_thumbnail('rka_img_318_x_367'); ?>
								</div>
								<div class="team-conect-link">
									<?php if(get_field('website')){ ?>
									<a href="<?php the_field('website'); ?>" target="_blank" class="email-box">
										<span class="email-box">Website</span>
									</a>
									<?php } ?>
								</div>
							</div>
							<div class="item-2">
								<?php $edu = get_field('education');
											$pos = '';
											if ($edu) {
												$pos = ', ' . $edu;
											} ?>
								<div class="leader-name"><?php the_title(); ?><?php echo $pos; ?></div>
								<div class="sub-heading"><?php
											$taxonomy = "vendor_category";
											$terms = get_the_terms(get_the_ID(), $taxonomy);
											$categories = [];

											if( $terms ) {          
												foreach ($terms as $category) {
													$categories[] = $category->name;
												}       
											}

											$categories = implode(', ', $categories);

											echo $categories;
												?></div>
								<div class="small-text"><?php the_content(); ?></div>
							</div>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					jQuery(".team-popup-<?php the_ID(); ?>").click(function() {
						jQuery("#team-popup-<?php the_ID(); ?>").fadeIn(500);
					});
					jQuery(".close").click(function() {
						jQuery("#team-popup-<?php the_ID(); ?>").fadeOut(500);
					});
				</script>

		<?php endwhile;
	}
  
	exit;
  }
  add_action('wp_ajax_vendor_load_more', 'vendor_load_more');
  add_action('wp_ajax_nopriv_vendor_load_more', 'vendor_load_more');


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
	$end = $start+$show;
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
			}
			?>
			<div class="single_images">
				<?php echo wp_get_attachment_image( $image, $size ); ?>
			</div>
			<?php 
			$count++;
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
