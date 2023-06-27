<?php

// WooCommerce: Check if Product ID is in the Order

    
add_action( 'woocommerce_thankyou', 'check_order_product_id' );
   
function check_order_product_id( $order_id ){
$order = wc_get_order( $order_id );
$items = $order->get_items(); 
foreach ( $items as $item_id => $item ) {
   $product_id = $item->get_variation_id() ? $item->get_variation_id() : $item->get_product_id();
   if ( $product_id === 10 ) {
       // do something
	  
	   
		$to = 'rajv@droptechnolab.com';
		$subject = 'The subject';
		$body = 'The email body content';
		$headers = array('Content-Type: text/html; charset=UTF-8');

		wp_mail( $to, $subject, $body, $headers );
	   
   }
}
}

