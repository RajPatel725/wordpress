<?php

/**
 * Plugin Name: Elementor Product Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: product-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function register_new_widgets($widgets_manager)
{

    require_once(__DIR__ . '/widgets/product-grid-view-widget.php');

    $widgets_manager->register(new \Product_Widget());
}
add_action('elementor/widgets/register', 'register_new_widgets');

// custom css
function custom_plugin_enqueue_scripts() {
    
    wp_enqueue_style( 'custom-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );
    
}
add_action( 'wp_enqueue_scripts', 'custom_plugin_enqueue_scripts' );
