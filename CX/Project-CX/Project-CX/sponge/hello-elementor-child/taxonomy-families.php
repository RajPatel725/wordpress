<?php 

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
.main-table-list{
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
.main-table-list #myTable2 tr:hover td{
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
.main-table-list .table-responsive table{
  margin-bottom: 0;
}

.speice-lists-category {
    padding: 40px 0 0;
}
.speice-lists-category .container {
    padding: 0 10px;
}
.category-title p {
    text-align: left;
    color: #000000;
    font-family: var(--e-global-typography-231db85-font-family), Sans-serif;
    font-size: 18px;
    font-weight: var(--e-global-typography-231db85-font-weight);
    line-height: var(--e-global-typography-231db85-line-height);
    margin: 0;
}
.category-title p a{
    color: #005CB8;
    padding: 1px;
    text-decoration: underline;
}
.category-title {
    padding-bottom: 30px;
}

</style>

<?php

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

$category_title = $term->name;

?>

<div class="speice-lists-category">
	<div class="container">

		<div class="category-title">

           <p>
            <?php
                      $query_cat = new WP_Query(array(
                          'post_type' => 'species-list',
                          'posts_per_page' => 1,
                          'post_status' => 'publish',
                          'orderby' => 'taxonomy',
                          'order' => 'ASC',
                          'tax_query' => array(
                                array(
                                    'taxonomy' => 'families',
                                    'field'    => 'slug',
                                    'terms'    => $category_title
                                )
                            )
                      ));


                      while ($query_cat->have_posts()) {
                          $query_cat->the_post(); ?>

			                 <?php 
                                  $terms = get_the_terms( $post->ID, 'classes' ); 
                                  foreach($terms as $term) {
                                    // $cat_url = get_term_link();
                                    echo '<a href="'.get_term_link( $term->slug, 'classes' ).'">'.$term->name.'</a>';
                                  }
                              ?>


                             <?php 
                      }

                      wp_reset_query();
                    ?>
                    <span>></span>

                    <?php
                      $query_cat = new WP_Query(array(
                          'post_type' => 'species-list',
                          'posts_per_page' => 1,
                          'post_status' => 'publish',
                          'orderby' => 'taxonomy',
                          'order' => 'ASC',
                          'tax_query' => array(
                                array(
                                    'taxonomy' => 'families',
                                    'field'    => 'slug',
                                    'terms'    => $category_title
                                )
                            )
                      ));


                      while ($query_cat->have_posts()) {
                          $query_cat->the_post(); ?>

                             <?php 
                                  $terms = get_the_terms( $post->ID, 'orders' ); 
                                  foreach($terms as $term) {
                                    // $cat_url = get_term_link();
                                    echo '<a href="'.get_term_link( $term->slug, 'orders' ).'">'.$term->name.'</a>';
                                  }
                              ?>


                             <?php 
                      }

                      wp_reset_query();
                    ?>
                    <span>></span>

                    <?php echo $category_title; ?>
                        
                    </p>
		</div>

		<div class="speice-lists-main">
		  <div class="tabs">
		    <div class="tab">Species List</div>
		  </div>

		  <div class="search-text">
		    <p>Use the search box to query names and notes on all specimens.</p>
		  </div>

		  <div class="main-table-list">
		    <div class="search-box">Search: <input type="text" id="search"></div>

		      <div class="table-responsive">
		        <table id="myTable2">
		          <thead>
		            <tr>
		              <!--When a header is clicked, run the sortTable function, with a parameter,
		              0 for sorting by names, 1 for sorting by country: -->
		              <th onclick="sortTable(0)">Class</th>
		              <th onclick="sortTable(1)">Order</th>
		              <th onclick="sortTable(2)">Family</th>
		              <th onclick="sortTable(3)">Genus species</th>
		              <th onclick="sortTable(4)">Images</th>
		            </tr>
		          </thead>

		          <tbody>

		            <?php
		              $query = new WP_Query(array(
		                  'post_type' => 'species-list',
		                  'posts_per_page' => -1,
		                  'post_status' => 'publish',
		                  'orderby' => 'taxonomy',
		                  'order' => 'ASC',
		                  'tax_query' => array(
								array(
									'taxonomy' => 'families',
									'field'    => 'slug',
									'terms'    => $category_title
								)
							)
		              ));


		              while ($query->have_posts()) {
		                  $query->the_post(); ?>
		                  
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
		                    <td><a href="<?php echo get_permalink(); ?>"><em><?php echo get_the_title(); ?></em></a></td>
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

		              <?php 
		              }

		              wp_reset_query();
		            ?>

		          </tbody>
		        </table>
		      </div>

		    <div class="speice-lists-note">
		      <?php
                      $query_count = new WP_Query(array(
                          'post_type' => 'species-list',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'orderby' => 'taxonomy',
                          'order' => 'ASC',
                          'tax_query' => array(
                                array(
                                    'taxonomy' => 'families',
                                    'field'    => 'slug',
                                    'terms'    => $category_title
                                )
                            )
                      ));

                      $total = 0;$total = 0;

                      while ($query_count->have_posts()) {
                          $query_count->the_post(); 

                          $total++;

                      }

                      $final_total = $total;
?>
                      

                <p>Showing 1 to <?php echo $final_total; ?> of <?php echo $final_total; ?> entries</p>
                <p>Species with an * have skeletal images (spicules and/or tissue mounts) available to view.</p>
                <p>Enter an * to the search box to filter species with skeletal images.</p>
<?php
                wp_reset_query();
                    ?>
		    </div>

		  </div>

		</div>

	</div>
</div>

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
      switchcount ++;
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

?>