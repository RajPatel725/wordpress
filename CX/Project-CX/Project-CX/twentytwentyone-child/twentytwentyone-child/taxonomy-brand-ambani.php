<?php
get_header();


$queried_object = get_queried_object();
echo '<pre>';
print_r($queried_object);
$term_id = $queried_object->name;


$terms = get_terms( array(
    'taxonomy'   => 'brand',
    'hide_empty' => false,
));

foreach($terms as $term){
    
    echo '<span>'.$term->name.'</span></br>';
}

get_footer();