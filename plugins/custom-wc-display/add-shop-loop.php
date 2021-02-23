<?php
/**
 * Plugin Name: Custom Woocommerce display
 * Plugin URI: 
 * Description: Allows custom fields to display on shop page and overides the default woocommerce css file with a custom one.
 * Author: Jack Edwards
 * Author URI: 
 * Version: 1.0
 *
 */

defined( 'ABSPATH' ) or exit;


/** Display custom fields on store page view to each product by adding action to
 * the woocommerce_after_shop_loop_item action in content-product.php
 * 
**/
function display_shortdescription () {
    global $product;
     if ( $product->get_short_description() ) {
       	echo '<div class="product-meta">' . $product->get_short_description() . '</div>';
   }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'display_shortdescription', 8 );


// Over ride the the default Woocommerce stylesheets with my custom copy

add_action('wp_enqueue_scripts', 'override_woo_frontend_styles', PHP_INT_MAX);

function override_woo_frontend_styles(){ 
	
	wp_enqueue_style('woocommerce-general-custom', plugin_dir_url( __DIR__ ) . 'custom-wc-display/woocommerce.css', array(), '0.1.0', 'all');
	wp_enqueue_style('woocommerce-layout-custom', plugin_dir_url( __DIR__ ) . 'custom-wc-display/woocommerce-layout.css', array(), '0.1.0', 'all');
}


?>