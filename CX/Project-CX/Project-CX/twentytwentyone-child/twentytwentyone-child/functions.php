<?php

function my_theme_enqueue_styles() {

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css', array(), '1.0.0', false);

    // localize scriot for ajax requests
    wp_enqueue_script( 'custom_js',  get_stylesheet_directory_uri().'/assets/js/custom-ajax.js', array('jquery'), '1.0.0', false );
    wp_localize_script( 'custom_js', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}
add_action( 'admin_enqueue_scripts', 'logo_include_js' );
function logo_include_js() {

	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// our custom JS
 	wp_enqueue_script('mishaupload',get_stylesheet_directory_uri() . '/assets/js/logo-uploader.js',array( 'jquery' )	);
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Register Custom Post Type
function products_post_type(){

    $labels = array(
        'name'                  => _x('Products', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Product', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Products', 'text_domain'),
        'name_admin_bar'        => __('Product', 'text_domain'),
        'archives'              => __('Item Archives', 'text_domain'),
        'attributes'            => __('Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Product:', 'text_domain'),
        'all_items'             => __('All Products', 'text_domain'),
        'add_new_item'          => __('Add New Product', 'text_domain'),
        'add_new'               => __('New Product', 'text_domain'),
        'new_item'              => __('New Item', 'text_domain'),
        'edit_item'             => __('Edit Product', 'text_domain'),
        'update_item'           => __('Update Product', 'text_domain'),
        'view_item'             => __('View Product', 'text_domain'),
        'view_items'            => __('View Items', 'text_domain'),
        'search_items'          => __('Search products', 'text_domain'),
        'not_found'             => __('No products found', 'text_domain'),
        'not_found_in_trash'    => __('No products found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Product', 'text_domain'),
        'description'           => __('Product information pages.', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('product', $args);
}
add_action('init', 'products_post_type', 0);

// Register Custom Product Taxonomy
function product_custom_taxonomy(){

    $labels = array(
        'name'                       => _x('Product Categorys', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Product Category', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Category', 'text_domain'),
        'all_items'                  => __('All Items', 'text_domain'),
        'parent_item'                => __('Parent Item', 'text_domain'),
        'parent_item_colon'          => __('Parent Item:', 'text_domain'),
        'new_item_name'              => __('New Item Name', 'text_domain'),
        'add_new_item'               => __('Add New Item', 'text_domain'),
        'edit_item'                  => __('Edit Item', 'text_domain'),
        'update_item'                => __('Update Item', 'text_domain'),
        'view_item'                  => __('View Item', 'text_domain'),
        'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
        'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
        'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
        'popular_items'              => __('Popular Items', 'text_domain'),
        'search_items'               => __('Search Items', 'text_domain'),
        'not_found'                  => __('Not Found', 'text_domain'),
        'no_terms'                   => __('No items', 'text_domain'),
        'items_list'                 => __('Items list', 'text_domain'),
        'items_list_navigation'      => __('Items list navigation', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('product-cat', array('product'), $args);

}
add_action('init', 'product_custom_taxonomy', 0);

// Register Custom Taxonomy
function brand_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Brands', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Brand', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Brand', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'brand', array( 'product' ), $args );

}
add_action( 'init', 'brand_taxonomy', 0 );

// Ajax function for product filter
function ajax_filter_fun(){

    $catSlug = $_POST['checked_cat'];
    // echo $catSlug;
    
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => array(
            'relation' => 'OR'
        )
    );

    // product-cat checkboxes
    if($productCat = get_terms( array( 'taxonomy' => 'product-cat' ) )){

        foreach($catSlug as $singleCat ){
            foreach( $productCat as $proCat ) {
                if($singleCat == $proCat->slug){
                    $args['tax_query'][] = array(
                        'taxonomy' => 'product-cat',
                        'field' => 'slug',
                        'terms' =>  $proCat->slug
                    );
                }
            }
        }
    }
    //brand checkboxes
    if($brands = get_terms( array( 'taxonomy' => 'brand' ) )){

        foreach($catSlug as $single ){
            foreach( $brands as $brand ) {
                if($single == $brand->slug){
                    $args['tax_query'][] = array(
                        'taxonomy' => 'brand',
                        'field' => 'slug',
                        'terms' =>  $brand->slug
                    );
                }
            }
        }
    }
    // print_r($all_terms);
    
    $query = new WP_Query( $args );

    if ($query->have_posts()) {
        echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            global $post;
            $price = get_post_meta( $post->ID, 'product_price', true ); ?>
            <div class="col-md-4 pb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php if($price){ ?>
                            <div class="product_price">
                                <span>Price:- <?php echo $price; ?></span>
                            </div>
                        <?php } ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        <?php }
        echo '</div>';
    }else {
        echo '<div class="row">';
            while ($args->have_posts()) {
                $args->the_post();
                global $post;
                $price = get_post_meta( $post->ID, 'product_price', true ); ?>
                <div class="col-md-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <?php if($price){ ?>
                                <div class="product_price">
                                    <span>Price:- <?php echo $price; ?></span>
                                </div>
                            <?php } ?>
                            <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php }
        echo '</div>';
    }

    wp_reset_postdata();
    exit;
}

add_action('wp_ajax_myfilter', 'ajax_filter_fun');
add_action('wp_ajax_nopriv_myfilter', 'ajax_filter_fun');

// Search Query Parameters

function filter_product(){

    $keyword = $_POST['keyword'];
    $ajaxposts = new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        // 's' => $keyword,
        'title' => $keyword,
    ]);
    
    if ($ajaxposts->have_posts()) {
        echo '<div class="row">';
            while ($ajaxposts->have_posts()) {
                $ajaxposts->the_post(); 
                global $post;
                $price = get_post_meta( $post->ID, 'product_price', true );
                ?>
                    <div class="col-md-4 pb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <?php if(!empty($price)){ ?>
                                    <div class="product_price">
                                        <span>Price:- <?php echo $price; ?></span>
                                    </div>
                                <?php } ?>
                                <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php }
            echo '</div>';
            echo do_shortcode('[ajax_load_more id="test" post_type="post" posts_per_page="5"]');
        }
        wp_reset_postdata();
        exit;
}

add_action('wp_ajax_filter_product', 'filter_product');
add_action('wp_ajax_nopriv_filter_product', 'filter_product');

// -------------------------------------------------------- //

function add_theme_menu_item(){

    add_menu_page( 'Theme option', 'Theme option', 'manage_options', 'theme-option', 'custom_theme_option' );
}

add_action("admin_menu", "add_theme_menu_item");

function custom_theme_option(){
    ?>
    <div class="wrap">
    <h1>Theme Option</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields("section");
                do_settings_sections("theme-options");
            submit_button(); 
        ?>          
    </form>
    </div>
<?php
}

// -------------------------------------------------------- //

function display_twitter_element(){
	
    echo '<input type="text" name="twitter_url" id="twitter_url" value="'. get_option("twitter_url").'" />';
}

function display_facebook_element(){

    echo '<input type="text" name="facebook_url" id="facebook_url" value="'. get_option('facebook_url') .'" />';
}

function display_layout_element(){
	?>
		<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout'), true); ?> /> 
	<?php
}

function display_header_logo(){
    $image_id = get_option( 'header_logo' );

    if( $image = wp_get_attachment_image_url( $image_id, 'medium' ) ) : ?>
        <a href="#" class="logo-upload">
            <img name="header_logo" height="250" width="250" src="<?php echo esc_url( $image ) ?>" />
        </a>
        <a href="#" class="logo-remove">Remove image</a>
        <input type="hidden" name="header_logo" value="<?php echo absint( $image_id ) ?>">
    <?php else : ?>    
        <a href="#" class="button logo-upload">Upload image</a>
        <a href="#" class="logo-remove" style="display:none">Remove image</a>
        <input type="hidden" name="header_logo" value="">
    <?php endif;
}

function display_theme_panel_fields(){

	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("theme_layout", "Do you want the layout to be responsive?", "display_layout_element", "theme-options", "section");
	add_settings_field("header_logo", "Header Logo", "display_header_logo", "theme-options", "section");

    // Register the settings field
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "theme_layout");
    register_setting("section", "header_logo");

}

add_action("admin_init", "display_theme_panel_fields");

// -------------------------------------------------------- //
function member_add_meta_box() {

    add_meta_box(
        'product_details',
        __( 'Product Details', 'product_details' ),
        'product_meta_box_callback',
        'product',
        'normal',
    );    
}

add_action( 'add_meta_boxes', 'member_add_meta_box' );
    
function product_meta_box_callback( $post ) {
    
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'product_save_meta_box_data', 'product_meta_box_nonce' );

    $value = get_post_meta( $post->ID, 'product_price', true );
    ?>
    <div class="price">
        <label for="product_price">
            <?php _e( 'Product Price', 'product_details' ); ?>
        </label>
        <input type="text" id="product_price" name="product_price" value="<?php echo esc_attr( $value ); ?>" />
    </div>
    <?php
    // Image Upload With media
    $image = get_post_meta($post->ID, 'product_custom_image', true);
?>
    <div class="product_img" style="display:flex; align-items:center;">
        <label href="#" class="aw_upload_image_button button button-secondary"><?php _e('Upload Image'); ?></label>
        <?php if(!empty($image)) { ?>
            <img src="<?php echo $image; ?>" width="250" height="250" alt="image" />
        <?php }else {?>
            <input type="text" name="product_custom_image" id="product_custom_image" value="<?php echo $image; ?>" />
        <?php } ?>
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
                        $('#product_custom_image').val(attachment.url);
                    })
                    .open();
                });
            });
        </script>
    </div>
    <?php
}
    
function product_save_meta_box_data( $post_id ) {

    if ( ! isset( $_POST['product_meta_box_nonce'] ) ) {
        return;
    }
    
    if ( ! wp_verify_nonce( $_POST['product_meta_box_nonce'], 'product_save_meta_box_data' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    $my_data = sanitize_text_field( $_POST['product_price'] );
    update_post_meta( $post_id, 'product_price', $my_data );

    $product_img = sanitize_text_field( $_POST['product_custom_image'] );
    update_post_meta( $post_id, 'product_custom_image', $product_img );
}

add_action( 'save_post', 'product_save_meta_box_data' );


function species_list_section($atts, $content, $tag) {

    $content .= 'test';
    return $content;

}
// register shortcode
add_shortcode('SpeciesList', 'species_list_section');
