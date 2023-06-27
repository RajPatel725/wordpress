<?php

/**
 * Plugin Name: Admin Menu
 * Plugin URI: https://tutorial101.blogspot.com/
 * Description: A custom admin menu.
 * Version: 1.0
 * Author: Cairocoders
 * Author URI: http://tutorial101.blogspot.com/
 **/
function theme_options_panel()
{
    add_menu_page('Theme page title', 'Theme menu', 'manage_options', 'theme-options', 'wps_theme_list_table');
}
add_action('admin_menu', 'theme_options_panel');

function wps_theme_list_table()
{ ?>
    <div class="wrap">
        <div id="icon-users" class="icon32"></div>
        <h2>My List Table Test - Pagination</h2>
    </div>
    <?php
    global $wpdb;
    $pagenum = isset($_GET['pagenum']) ? absint($_GET['pagenum']) : 1;
    $limit = 5; // number of rows in page
    $offset = ($pagenum - 1) * $limit;
    $total = $wpdb->get_var("SELECT COUNT('id') FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' ");
    $num_of_pages = ceil($total / $limit);
    $sql_usersorder = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' LIMIT $offset, $limit");
    $totalrec = $wpdb->num_rows;
    $isodd = array('', 'alternate');
    $n = 0;
    ?>
    <form method="get" action="" id="posts-filter">
        <table class="wp-list-table widefat fixed pages">
            <tbody id="the-list">
                <thead>
                    <tr>
                        <th class="manage-column column-name" scope="col">Post ID</th>
                        <th class="manage-column column-name" scope="col">Post Title</th>
                    </tr>
                </thead>
                <?php
                foreach ($sql_usersorder as $rows_usersorder) {
                    $n++;
                    $id = $rows_usersorder->ID;
                    $course_invoice = $rows_usersorder->post_title;
                ?>
                    <tr class="type-page <?php echo $isodd[$n % 2]; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $course_invoice; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <?php $page_links = paginate_links(array(
                    'base' => add_query_arg('pagenum', '%#%'),
                    'format' => '',
                    'prev_text' => __('«', 'text-domain'),
                    'next_text' => __('»', 'text-domain'),
                    'total' => $num_of_pages,
                    'current' => $pagenum
                ));
                if ($page_links) {
                    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
                } ?>
            </div>
            <br class="clear">
        </div>
    </form>
<?php }
