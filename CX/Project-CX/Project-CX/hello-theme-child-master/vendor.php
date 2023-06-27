<?php

/*

Template Name: Vendor

*/


get_header();

?>
<?php $_term=(isset($_GET['term']) && trim($_GET['term']) != "" ? trim($_GET['term']) : '');
        $terms = get_terms( array(
            'taxonomy' => 'vendor_category',
            'hide_empty' => true,
            'orderby' => 'term_order',
            'order' => 'ASC'
        ) );
        ?>
<section class="section-py" id="leadershipList">
    <div class="container">
        <div class="executive-leadership">
            <?php if( !empty( $heading ) ): ?>
            <div
                class="main-heading rka-black text-center bottom-border-center heading-bottom-border pb-md-4 mb-3 mb-md-5">
                <?php echo $heading; ?></div>
            <?php endif; ?>
            <div class="post-navbar">
                <ul>
                    <li><a class="active" id="all-post" href="#all-post">all</a></li>
                    <?php foreach( $terms as $term ){ ?>
                    <li class="<?php echo $term->slug; ?>">
                        <a class="" id="<?php echo $term->slug; ?>" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <!-- All post -->
            <div class="leadership-list-wrap show-leadership" id="all-post">
                <div class="leadership-list postcatid-0">

                    <?php
                        global $wp_query;
                        $args = array(
                            'post_type' => 'vendor',
                            'post_status' => 'publish',
                            'posts_per_page' => 8,
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'ignore_custom_sort' => TRUE
                        );
                        $wp_query = new WP_Query($args);
                    ?>
                    <div class="row gx-0 gy-5 g-md-5 response-post-data all-post">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            
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
                                            <div class="sub-heading">
                                                <?php $taxonomy = "vendor_category";
                                                    $terms = get_the_terms(get_the_ID(), $taxonomy);

                                                        $categories = [];

                                                        if( $terms ) {          
                                                            foreach ($terms as $category) {
                                                                $categories[] = $category->name;
                                                            }       
                                                        }
                                                    $categories = implode(', ', $categories);

                                                echo $categories; ?>
                                            </div>
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

                        <?php endwhile;?>
                    </div> <?php 

                    ?>  found_posts
                    <?php   if (  $wp_query->max_num_pages > 1 ) { ?>
                        <div class="btn__wrapper">
                                <a href="#!" total-post = "<?php echo $wp_query->found_posts; ?>" data-max-page="<?php echo $wp_query->max_num_pages; ?>" 
                                data-id="all-post" class="btn btn__primary all-load-more">Load more</a>
                        </div>
                  
                    <?php  } ?>

                </div>
            </div>
            <?php wp_reset_postdata();
            wp_reset_query();	 // Restore global post data stomped by the_post().
                    ?>

            <?php $termnews = get_terms( array(
                'taxonomy' => 'vendor_category',
                'hide_empty' => true,
                'orderby' => 'term_order',
                'order' => 'ASC'
            ));
            foreach($termnews as $termnew){  ?>
            <div class="leadership-list-wrap hidden-leadership" id="<?php echo $termnew->slug; ?>">
                <div class="leadership-list postcatid-<?php echo $termnew->term_id; ?>">

                    <?php global $wp_query;

                    $args = array(
                        'post_type' => 'vendor',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                        'ignore_custom_sort' => TRUE
                    );                                
                    $args['tax_query'][] = array(
                        'taxonomy' => 'vendor_category',
                        'field' => 'slug',
                        'terms' => $termnew->slug
                    );

                    $wp_query = new WP_Query($args); ?>

                    <div class="row gx-0 gy-5 g-md-5 response-cat-data <?php echo $termnew->slug; ?>">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rka-leadership-item">
                                    <div class="leader-profile">
                                        <a class="team-details-link" href="javascript:void(0);"
                                            data-popup-id="bycat-team-popup-<?php the_ID(); ?>">
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
                            <div class="team-pop-up" style="display: none;" id="bycat-team-popup-<?php the_ID(); ?>">
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

                                                <?php if(get_field('link_see_projects')){ ?>
                                                <a href="<?php the_field('link_see_projects'); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                                    </svg>
                                                    <span>See Projects</span>
                                                </a>
                                                <?php } ?>

                                                <?php if(get_field('link_option')){ ?>
                                                <a href="<?php the_field('link_option'); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    <span>Link option</span>
                                                </a>
                                                <?php } ?>

                                                <?php if(get_field('linkedin_url')){ ?>
                                                <a href="<?php the_field('linkedin_url'); ?>">
                                                    <i class="fab fa-linkedin-in"></i>
                                                    <span>Connect</span>
                                                </a>
                                                <?php } ?>

                                                <?php if(get_field('website')){ ?>
                                                <a href="<?php the_field('website'); ?>" target="_blank" class="email-box">
                                                    <span class="email-box">Website</span>
                                                </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="item-2">
                                            <div class="leader-name"><?php the_title(); ?>, <?php the_field('education'); ?>
                                            </div>
                                            <div class="sub-heading"><?php the_field('sub_title'); ?></div>
                                            <div class="small-text"><?php the_content(); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                jQuery(".team-popup-<?php the_ID(); ?>").click(function() {
                                    jQuery("#bycat-team-popup-<?php the_ID(); ?>").fadeIn(500);
                                });
                                jQuery(".close").click(function() {
                                    jQuery("#bycat-team-popup-<?php the_ID(); ?>").fadeOut(500);
                                });
                            </script>

                        <?php endwhile;?>
                    </div>
                    <?php   if (  $wp_query->max_num_pages > 1 ) { ?>                        
                            <div class="btn__wrapper">
                                <a href="#!" total-post = "<?php echo $wp_query->found_posts; ?>" data-max-page="<?php echo $wp_query->max_num_pages; ?>" 
                                data-cat-id="<?php echo $term->term_id; ?>" data-id="<?php echo $termnew->slug; ?>" class="btn btn__primary all-load-more">Load more</a>
                            </div>
                    <?php } ?>
                </div>
            </div>
            
            <?php }
            // Restore global post data stomped by the_post().
            wp_reset_postdata();
            wp_reset_query(); ?>
        </div>

        <script>
            jQuery(function($) {
                var tabContainers = jQuery('.leadership-list-wrap');
                if (document.location.hash == "#leadershipList") {
                    setTimeout(function() {
                        tabContainers.hide();
                        jQuery('.post-navbar > ul > li > a').removeClass('active');
                        jQuery('.executive-leadership li.executive a').addClass('active');
                        jQuery('#executive').show();
                    }, 1000);
                } else {
                    tabContainers.hide().filter(':first').show();
                }

                jQuery('.post-navbar > ul > li > a').click(function() {
                    tabContainers.hide();
                    tabContainers.filter(this.hash).fadeIn(800);
                    jQuery('.post-navbar > ul > li > a').removeClass('active');
                    jQuery(this).addClass('active');
                    return false;
                }).filter(':first').click();

                //Load more
                // $('.leadership_loadmore_wrap > a').click(function(){
                //     var button = $(this);
                //     var catId = $(this).attr('data-cat-id');
                //     var paged = $(this).attr('data-current-page');
                //     var maxPaged = $(this).attr('data-max-page');
                //     maxPaged = (parseInt(maxPaged) * 2);

                //     var data = {
                //         'action': 'loadmore_rka_leadership',
                //         'cat': catId,
                //         'page' : paged
                //     };

                //     $.ajax({
                //         url : "/wp-admin/admin-ajax.php",
                //         data:data,
                //         type:'GET',
                //         beforeSend: function( xhr ){
                //             button.text('Loading...');
                //         },
                //         success:function(data){
                //             if( data ) {
                //                 button.text( 'Load More' );

                //                 $('.postcatid-'+catId).find('.row').append( data );

                //                 var passPage = (parseInt(paged) + 1);
                //                 if( parseInt(maxPaged) >= parseInt(paged) ) {
                //                     button.attr('data-current-page', passPage);
                //                 }

                //                 if( parseInt(maxPaged) == passPage ) {
                //                     button.remove();
                //                 }
                //             }else {
                //                 button.remove();
                //             }
                //         }
                //     });
                // });

            });
        </script>
    </div>
</section>

<style>
    .btn__wrapper {
        text-align: center;
        margin-top: 45px;
    }
    .btn__wrapper .all-load-more {
        background: #d8d8d8;
        padding: 15px 45px;
        color: #8e9a01;
        font-size: 23px;
        font-weight: 500;
        box-shadow: rgb(204, 204, 204) 5px 5px 30px;
        /* border: 1px solid #000; */
    }
</style>

<?php
get_footer();

?>