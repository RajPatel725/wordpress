<?php
    // Template Name: Printable View
    
    wp_head();    
    
    $postID = $_GET['post_id'];
    echo "<h3 class='print_table_page_title'>the Sponge Guide - www.spongeguide.org</h3>";
    $args = new WP_Query(array(
        'post_type' => 'species-list',
        'post_status' => 'published',
        'p' => $postID,
    ));
    if($args->have_posts()){
        while($args->have_posts()){
            $args->the_post();
           ?>
            <div class="print_table_main">
                <div class="container_view">
                        <div class="breadcum">
                            <div class="breadcum_list">
                                <a href="#"><?php 
                                    $terms = get_the_terms( $post->ID, 'classes' ); 
                                    foreach($terms as $term) {
                                        echo $term->name;
                                    }
                                ?></a>
                                <span>></span>
                                <a href="#"><?php 
                                    $terms = get_the_terms( $post->ID, 'orders' ); 
                                    foreach($terms as $term) {
                                    echo $term->name;
                                    }
                                ?></a>
                                <span>></span>
                                <a href="#"><?php 
                                    $terms = get_the_terms( $post->ID, 'families' ); 
                                    foreach($terms as $term) {
                                    echo $term->name;
                                    }
                                ?></a>
                                <span>></span>
                                <a href="#"><em><?php 
                                    echo get_the_title();
                                ?></em></a>
                            </div>
                        </div>

                        <div class="view-observed-characteristics">
                            <h3 class="print_table_page_title">Observed Characteristics:</h3>
                            <div class="print_table_observed row">

                                <?php if( have_rows('sponge_color') ): ?>  
                                        <div class="col-4">
                                            <p><b>Color:</b></p>
                                            <ul>
                                                <?php while( have_rows('sponge_color') ): the_row(); ?>
                                                    <li>
                                                        <?php the_sub_field('color'); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                <?php endif; ?>

                                <?php if( have_rows('sponge_morphology') ): ?>  
                                        <div class="col-4">
                                            <p><b>Morphology:</b></p>
                                            <ul>
                                                <?php while( have_rows('sponge_morphology') ): the_row(); ?>
                                                    <li>
                                                        <?php the_sub_field('morphology'); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                <?php endif; ?>
                                <?php if( have_rows('sponge_consistency') ): ?>  
                                        <div class="col-4">
                                            <p><b>Consistency:</b></p>
                                            <ul>
                                                <?php while( have_rows('sponge_consistency') ): the_row(); ?>
                                                    <li>
                                                        <?php the_sub_field('consistency'); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                <?php endif; ?>
                                <?php if( have_rows('sample_locations') ): ?>  
                                        <div class="col-4">
                                            <p><b>Locations:</b></p>
                                            <ul>
                                                <?php while( have_rows('sample_locations') ): the_row(); ?>
                                                    <li>
                                                        <?php the_sub_field('sample_locations'); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="view_speice-lists-main">
                            <div id="Species Description" class="view_tab">
                                <h3 class="print_table_page_title">Species Description and Notes</h3>
                                <div class="print_table_species_description">
                                    <?php the_content(); ?> 
                                </div>
                            </div>
                                   
                            <div id="Tissue and Spicules" class="view_tab">
                                <h3 class="print_table_page_title">Tissue and Spicule Images</h3>
                                <div class="view_tissue_spicules">
                                    <?php if( have_rows('sponge_tissue_and_spicules') ): ?>  
                                        <?php while( have_rows('sponge_tissue_and_spicules') ): the_row(); ?>

                                            <div class="tissue_and_spicules">
                                                <img src="<?php the_sub_field('tissue_and_spicules'); ?>" />
                                                <div class="view_description"><?php the_sub_field('tissue_images_description'); ?></div>
                                            </div>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="view_tab">
                                <div class="view_images_div">
                                    <h3 class="print_table_page_title">Images</h3>
                                    <h3 class="print_table_page_title"><?php the_title(); ?></h3>
                                    <?php if( have_rows('sponge_images') ): ?>  
                                        <?php while( have_rows('sponge_images') ): the_row(); ?>                                        
                                            <div class="view_images_gallery">
                                                <img src="<?php the_sub_field('images'); ?>"  class="print_view_img" />
                                                    <ul>
                                                        <li>Location: <?php the_sub_field('location'); ?></li>
                                                        <li>Photographer: <?php the_sub_field('photographer'); ?></li>
                                                    </ul>
                                                </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <!-- End image tab section -->
                    </div>
                </div>
           <?php
        }
    }
wp_footer();
?>