<?php
/*
 * This is the child theme for Hello Elementor theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles' );
function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );

    if(is_single() && 'species-list' == get_post_type() || is_page('filter-search')){
      wp_enqueue_script( 'tab-custom-js',  get_stylesheet_directory_uri().'/assets/js/tab-custom.js', array('jquery'), '1.0.0', true );
    }

    wp_enqueue_script( 'custom-js',  get_stylesheet_directory_uri().'/assets/js/custom-js.js', array('jquery'), '1.0.0', true );
    wp_localize_script( 'custom-js', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}

/*
* ***************** Sponge List **********************
*/
  
function custom_post_type_for_sponge_list() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Species Lists', 'Post Type General Name', 'hello-elementor' ),
        'singular_name'       => _x( 'Species List', 'Post Type Singular Name', 'hello-elementor' ),
        'menu_name'           => __( 'Species Lists', 'hello-elementor' ),
        'parent_item_colon'   => __( 'Parent Species List', 'hello-elementor' ),
        'all_items'           => __( 'All Species Lists', 'hello-elementor' ),
        'view_item'           => __( 'View Species List', 'hello-elementor' ),
        'add_new_item'        => __( 'Add New Species List', 'hello-elementor' ),
        'add_new'             => __( 'Add New', 'hello-elementor' ),
        'edit_item'           => __( 'Edit Species List', 'hello-elementor' ),
        'update_item'         => __( 'Update Species List', 'hello-elementor' ),
        'search_items'        => __( 'Search Species List', 'hello-elementor' ),
        'not_found'           => __( 'Not Found', 'hello-elementor' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'hello-elementor' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'Species Lists', 'hello-elementor' ),
        'description'         => __( 'Species List Description', 'hello-elementor' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'species-list', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type_for_sponge_list', 0 );


/*
* ***************** Sponge List Class **********************
*/
  
add_action( 'init', 'create_class_hierarchical_taxonomy', 0 );
    
function create_class_hierarchical_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Classes', 'taxonomy general name' ),
    'singular_name' => _x( 'Class', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Classes' ),
    'all_items' => __( 'All Classes' ),
    'parent_item' => __( 'Parent Class' ),
    'parent_item_colon' => __( 'Parent Class:' ),
    'edit_item' => __( 'Edit Class' ), 
    'update_item' => __( 'Update Class' ),
    'add_new_item' => __( 'Add New Class' ),
    'new_item_name' => __( 'New Class Name' ),
    'menu_name' => __( 'Classes' ),
  );    
  
  register_taxonomy('classes',array('species-list'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'class' ),
  ));
  
}


/*
* ***************** Sponge List Order **********************
*/
  
add_action( 'init', 'create_order_hierarchical_taxonomy', 0 );
    
function create_order_hierarchical_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Orders', 'taxonomy general name' ),
    'singular_name' => _x( 'order', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Orders' ),
    'all_items' => __( 'All Orders' ),
    'parent_item' => __( 'Parent order' ),
    'parent_item_colon' => __( 'Parent order:' ),
    'edit_item' => __( 'Edit order' ), 
    'update_item' => __( 'Update order' ),
    'add_new_item' => __( 'Add New order' ),
    'new_item_name' => __( 'New order Name' ),
    'menu_name' => __( 'Orders' ),
  );    
  
  register_taxonomy('orders',array('species-list'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'order' ),
  ));
  
}


/*
* ***************** Sponge List Family **********************
*/
  
add_action( 'init', 'create_family_hierarchical_taxonomy', 0 );
    
function create_family_hierarchical_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Families', 'taxonomy general name' ),
    'singular_name' => _x( 'Family', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Families' ),
    'all_items' => __( 'All Families' ),
    'parent_item' => __( 'Parent Family' ),
    'parent_item_colon' => __( 'Parent Family:' ),
    'edit_item' => __( 'Edit Family' ), 
    'update_item' => __( 'Update Family' ),
    'add_new_item' => __( 'Add New Family' ),
    'new_item_name' => __( 'New Family Name' ),
    'menu_name' => __( 'Families' ),
  );    
  
  register_taxonomy('families',array('species-list'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'family' ),
  ));
  
}

function species_list_section() {
  ob_start();
    get_template_part( 'shortcode/species-list' );
  return ob_get_clean();
  }
  // register shortcode
add_shortcode('SpeciesList', 'species_list_section');

/* New Code 09-06-2023 */

function find_sponge_section() {
  ob_start();
    ?>
<!-- Start Find Sponge! -->
<div class="sidebar">
    <div class="container navigationbox">
      <div class="searchbox">
        <h3 class="searchByTest">Search by test:</h3>

        <select name="color_box" id="color_box" class="cat_list">
            <option value="">Color</option>
            <option value="black">black</option>
            <option value="blue">blue</option>
            <option value="brown">brown</option>
            <option value="cinnamon-tan">cinnamon-tan</option>
            <option value="cream">cream</option>
            <option value="gray">gray</option>
            <option value="green">green</option>
            <option value="orange">orange</option>
            <option value="orange-yellow">orange-yellow</option>
            <option value="pink-lilac">pink-lilac</option>
            <option value="purple-violet">purple-violet</option>
            <option value="red">red</option>
            <option value="white">white</option>
            <option value="yellow">yellow</option>
        </select>


        <select name="consist_box" id="consist_box" class="cat_list">
            <option value="">Consistency</option>
            <option value="crumbly">crumbly</option>
            <option value="hard">hard</option>
            <option value="soft">soft</option>
            <option value="tough">tough</option>
        </select>


        <select name="morph_box" id="morph_box" class="cat_list">
            <option value="">Morphology</option>
            <option value="branching">branching</option>
            <option value="bushy">bushy</option>
            <option value="encrusting">encrusting</option>
            <option value="fan">fan</option>
            <option value="lobate">lobate</option>
            <option value="massive">massive</option>
            <option value="papillated">papillated</option>
            <option value="spherical">spherical</option>
            <option value="tube">tube</option>
            <option value="vase">vase</option>
        </select>

        <select name="hab_box" id="hab_box" class="cat_list">
            <option value="">Habitat</option>
            <option value="deep reef">deep reef</option>
            <option value="mangrove/coastal lagoon">mangrove/coastal lagoon</option>
            <option value="rocky shore/shallow reef">rocky shore/shallow reef</option>
        </select>

        <a class="link serach_btn">Submit</a>
        <a class="reset serach_btn">Reset</a>

      </div>
        <div class="filter-response"></div>
      </div>
      <!-- <div class="gcse-search"></div> -->
  <button class="sidebar-toggle">Find Sponge!</button>
</div>
<!-- End Find Sponge! -->
<?php
  return ob_get_clean();
  }
  // register shortcode
add_shortcode('find_sponge', 'find_sponge_section');


function filter_sponge_post(){

  $color_box = $_POST['color_box'];
  $consist_box = $_POST['consist_box'];
  $morph_box = $_POST['morph_box'];
  $hab_box = $_POST['hab_box'];

  $meta_query = array();

  if ( isset( $color_box ) && ! empty( $color_box ) ) {
      $meta_query[] = array(
          'key'     => 'sponge_images_$_color',
          'value'   => array($color_box),
          'compare' => 'IN',
      );
  }

  if ( isset( $consist_box ) && ! empty( $consist_box ) ) {
      $meta_query[] = array(
          'key'     => 'sponge_images_$_consistency',
          'value'   => array($consist_box),
          'compare' => 'IN',
      );
  }

  if ( isset( $morph_box ) && ! empty( $morph_box ) ) {
      $meta_query[] = array(
          'key'     => 'sponge_images_$_morphology',
          'value'   => array($morph_box),
          'compare' => 'IN',
      );
  }

  if ( isset( $hab_box ) && ! empty( $hab_box ) ) {
      $meta_query[] = array(
          'key'     => 'sponge_images_$_habitat',
          'value'   => array($hab_box),
          'compare' => 'IN',
      );
  }

  // Create the WP query arguments
  $args = array(
      'post_type'      => 'species-list',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'order'          => 'ASC',
      'meta_query'     => array(
          'relation' => 'AND',
          $meta_query,
      ),
  );

  // Create the WP query
  $query = new WP_Query( $args );
  
  if ($query->have_posts()) {
      $countPost = 0;
      while ($query->have_posts()) {
          $query->the_post();
          $countPost++; 
        }
      }
      
      echo $countPost." Images Found";

      wp_reset_postdata();
      exit;
}

add_action('wp_ajax_filter_sponge_post', 'filter_sponge_post');
add_action('wp_ajax_nopriv_filter_sponge_post', 'filter_sponge_post');

function wpza_replace_repeater_field( $where ) {
  $where = str_replace( "meta_key = 'sponge_images_$", "meta_key LIKE 'sponge_images_%", $where );
  return $where;
}
add_filter( 'posts_where', 'wpza_replace_repeater_field' );