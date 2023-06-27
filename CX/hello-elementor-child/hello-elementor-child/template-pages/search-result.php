<?php
// Template Name: Filte search
get_header();
?>
<style>
#myTable2 thead tr {
    display: table-row !important;
}

.speice-lists-main {
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    background-color: #fff;
    position: relative;
    padding: 0.2em;
}

.speice-lists-main .tabs {
    border: 1px solid #aaaaaa;
    background: #ACBEAE url(../wp-content/uploads/2023/06/ui-bg_highlight-soft_75_ACBEAE_1x100.png) 50% 50% repeat-x;
    color: #222222;
    font-weight: bold;
    border-radius: 6px;
    margin: 0;
    padding: 0.2em 0.2em 0;
    line-height: 1.3;
    display: flex;
}

.speice-lists-main .tabs .tab {
    padding: 0.5em 1em;
    text-decoration: none;
    display: inline-block;
    border: 1px solid #aaaaaa;
    background: #ffffff;
    font-weight: normal;
    color: #212121;
    position: relative;
    margin-bottom: -1px;
    border-bottom: 0;
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    border-radius: 6px 6px 0px 0px;
}

.search-text {
    padding: 1em 0.4em 0;
}

.search-text p {
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    text-align: right;
    margin: 0;
}

.search-box {
    display: flex;
    justify-content: flex-end;
    align-content: center;
    align-items: center;
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    padding: 0 0 1em;
}

.main-table-list {
    padding: 0 0.4em;
}

.search-box input#search {
    width: 221px;
    padding: 4px 5px;
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
}

.main-table-list #myTable2 th {
    background: url(../wp-content/uploads/2023/06/sort_both.png) no-repeat center right;
    cursor: pointer;
    padding: 10px 18px;
    border: none;
    border-bottom: 1px solid #111111;
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    font-weight: 700;
    text-align: left;
}

.main-table-list #myTable2 tr td {
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    padding: 16px 10px;
    color: #222222;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid #dddddd;
}

.main-table-list #myTable2 tr:nth-child(odd) td {
    background-color: #f9f9f9;
}

.main-table-list #myTable2 tr:hover td {
    background-color: whitesmoke;
}

.main-table-list #myTable2 tr td a {
    color: inherit;
    text-decoration: underline;
}

.speice-lists-note p {
    font-family: "Verdana";
    font-size: 16px;
    line-height: 21px;
    margin: 0;
}

.speice-lists-note {
    margin-bottom: 20px;
}

.main-table-list .table-responsive {
    border-bottom: 1px solid #111111;
    height: 580px;
    overflow: auto;
    width: 100%;
    margin-bottom: 20px;
}

.main-table-list .table-responsive table {
    margin-bottom: 0;
}

.container-search-result {
    max-width: 960px;
    margin: 0 auto;
}
</style>

<?php
    $meta_query = array();

    if ( isset( $_GET['color_box'] ) && ! empty( $_GET['color_box'] ) ) {
        $meta_query[] = array(
            'key'     => 'sponge_images_$_color',
            'value'   => array($_GET['color_box']),
            'compare' => 'IN',
        );
    }

    if ( isset( $_GET['consist_box'] ) && ! empty( $_GET['consist_box'] ) ) {
        $meta_query[] = array(
            'key'     => 'sponge_images_$_consistency',
            'value'   => array($_GET['consist_box']),
            'compare' => 'IN',
        );
    }

    if ( isset( $_GET['morph_box'] ) && ! empty( $_GET['morph_box'] ) ) {
        $meta_query[] = array(
            'key'     => 'sponge_images_$_morphology',
            'value'   => array($_GET['morph_box']),
            'compare' => 'IN',
        );
    }

    if ( isset( $_GET['hab_box'] ) && ! empty( $_GET['hab_box'] ) ) {
        $meta_query[] = array(
            'key'     => 'sponge_images_$_habitat',
            'value'   => array($_GET['hab_box']),
            'compare' => 'IN',
        );
    }

    $params = array();
    if(isset($_GET['color_box'])){
      $params[] = $_GET['color_box'];
    }

    if(isset($_GET['consist_box'])){
      $params[] = $_GET['consist_box'];
    }

    if(isset($_GET['morph_box'])){
      $params[] = $_GET['morph_box'];
    }

    if(isset($_GET['hab_box'])){
      $params[] = $_GET['hab_box'];
    }

    $link = implode(',', $params);

    echo "<h3 class='container-search-result'>Search Results for: $link </h3>";
  ?>

<div class="speice-lists-main container-search-result">
    <div class="main-table-list">
        <div class="table-responsive">
            <div class="tabs">
                <button class="tablinks" onclick="openCity(event, 'Matching Species')" id="defaultOpen">Matching
                    Species</button>
                <button class="tablinks" onclick="openCity(event, 'Images of Matching Species')">Images of Matching
                    Species</button>
            </div>

            <div id="Matching Species" class="tabcontent">
                <div class="search-text">
                    <p>Use the search box to query names and notes on all specimens.</p>
                </div>

                <div class="search-box">Search: <input type="text" id="search"></div>

                <table id="myTable2">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Class</th>
                            <th onclick="sortTable(1)">Order</th>
                            <th onclick="sortTable(2)">Family</th>
                            <th onclick="sortTable(3)">Genus species</th>
                            <th onclick="sortTable(4)">Images</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                  
                      $query_args = array(
                        'post_type' => 'species-list',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'meta_query'     => array(
                          'relation' => 'AND',
                          $meta_query,
                        ),
                      );                  
                    $query = new WP_Query($query_args);

                    $counter = 0;
                    while ( $query->have_posts() ) : $query->the_post(); ?>

                        <tr>
                            <td>
                                <?php 
                                $terms = get_the_terms( $post->ID, 'classes' ); 
                                foreach($terms as $term) {
                                  // $cat_url = get_term_link();
                                  echo '<a href="'.get_term_link( $term->slug, 'classes' ).'">'.$term->name.'</a>';
                                }
                            ?>
                            </td>
                            <td>
                                <?php 
                                $terms = get_the_terms( $post->ID, 'orders' ); 
                                foreach($terms as $term) {
                                  echo '<a href="'.get_term_link( $term->slug, 'orders' ).'">'.$term->name.'</a>';
                                }
                            ?>
                            </td>
                            <td>
                                <?php 
                                $terms = get_the_terms( $post->ID, 'families' ); 
                                foreach($terms as $term) {
                                  echo '<a href="'.get_term_link( $term->slug, 'families' ).'">'.$term->name.'</a>';
                                }
                            ?>
                            </td>
                            <td><a href="<?php echo get_permalink(); ?>"><em><?php echo get_the_title(); ?></em></a>
                            </td>
                            <td>
                                <?php 
                              if (have_rows('sponge_images')):
                                $total = 0;
                                while (have_rows('sponge_images')): the_row(); 
                                  $position = get_sub_field('images');
                                    $total++;
                                endwhile;

                                if( get_field('have_skeletal_images') == 'Yes' ) {
                                    echo $total.'*';
                                }
                                else{
                                  echo $total;
                                }
                              endif;
                            ?>
                            </td>
                        </tr>

                        <?php $counter++;
                    endwhile;
                    wp_reset_postdata();
                  ?>

                    </tbody>
                </table>
            </div>

            <div id="Images of Matching Species" class="tabcontent">
                <?php while ($query->have_posts()) { $query->the_post(); ?>
                <div class="sponge_images_div">
                    <p><?php the_title(); ?></p>
                    <div class="sponge_images_gallery">
                        <?php if( have_rows('sponge_images') ): ?>
                        <?php $count = 1; $modalCounter = 1;  while( have_rows('sponge_images') ): the_row(); ?>

                        <img src="<?php the_sub_field('images'); ?>"
                            onclick="onClick(this, 'image-<?php echo $count; ?>')"
                            class="modal-hover-opacity modal_img cursor-zoom-in" />

                        <div id="image-<?php echo $modalCounter; ?>" class="modal" onclick="this.style.display='none'">
                            <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <div class="modal-content">
                                <img id="modal-image-<?php echo $modalCounter; ?>" style="max-width:100%">
                                <table class="modal-details">
                                    <tbody>
                                        <tr>
                                            <td>Species:
                                                <a href="speciesinfo.php?species=180">
                                                    <i><i>Clathrina </i> <?php the_title(); ?></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a
                                                    href="<?php echo get_permalink(); ?>?img=<?php the_sub_field('image', 'id'); ?>">View
                                                    Image Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Location: <?php the_sub_field('location'); ?></td>
                                            <td>Photographer: <?php the_sub_field('photographer'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php $count++; $modalCounter++; endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="speice-lists-note">
            <?php $count_posts = wp_count_posts( 'species-list' )->publish; ?>
            <p>Showing 1 to <?php echo $count_posts; ?> of <?php echo $counter; ?> entries</p>
            <p>Species with an * have skeletal images (spicules and/or tissue mounts) available to view.</p>
            <p>Enter an * to the search box to filter species with skeletal images.</p>
        </div>

    </div>

</div>

</div>
<!-- <div class="container navigationbox">
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
</div> -->


<script>
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable2");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}


var $rows = jQuery('#myTable2 tr');
jQuery('#search').keyup(function() {
    var val = jQuery.trim(jQuery(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = jQuery(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>

<?php
get_footer();