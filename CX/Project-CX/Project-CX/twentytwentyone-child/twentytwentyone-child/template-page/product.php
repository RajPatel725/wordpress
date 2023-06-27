<?php
// Template Name: Product

get_header();

$products = new WP_QUERY(array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
));
?>

<div class="container">
    <div class="d-flex justify-content-end pb-5">
        <div class="product-filterd">
            <input type="text" name="search" id="search" value="" placeholder="Search Here..." />
            <!-- <input type="submit" class="product_filter btn btn-primary p-2" value="Submit" /> -->
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div id="filter">
                <?php 
                if( $sizes = get_terms( array( 'taxonomy' => 'product-cat' ) ) ) :
                    echo '<h3><strong>Category List</strong></h3>';
                    echo '<ul>';
                        foreach( $sizes as $size ) :
                            echo '<li><label for="'. $size->slug .'"><input type="checkbox" class="form-check-input" name="product_cat" id="'. $size->slug .'" value="'. $size->slug .'" />' . $size->name.'</label></li>';
                        endforeach;
                    echo '</ul>';
                endif;

                if( $brands = get_terms( array( 'taxonomy' => 'brand' ) ) ) :
                    echo '<h3><strong>Brands List</strong></h3>';
                        echo '<ul>';
                        foreach( $brands as $brand ) :
                            echo '<li><label for="'. $brand->slug . '" ><input type="checkbox" class="form-check-input" name="product_cat" id="'. $brand->slug . '" value="'. $brand->slug . '" />' . $brand->name.'</label></li>';
                        endforeach;
                    echo '</ul>';
                endif;
                ?>
                <button id="apply_filter">Apply Filter</button>
            </div>
        </div>

        <div class="col-9 product-row">
            <div class="row">
                <?php if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post(); 
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
                    }
                wp_reset_postdata();?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();