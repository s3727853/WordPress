<?php
/**
 * Plugin Name: Custom Homepage
 * Plugin URI: 
 * Description: Allows user to upload a custom image to use as the advertising banner on the homepage and edit featured products
 * Version: 1.0
 * Author: Jack Edwards
 * Author URI: 
 */
$plugin_root = plugin_dir_path(__FILE__);
$plugin_root_url = plugin_dir_url( __FILE__ );
 
 if(!function_exists('homepage_menu')){
     function homepage_menu(){
         
    // Page Title, Menu Title, Capabilities, Menu Slug, Function, Icon
    add_menu_page('Homepage Options', 'Homepage Options', 'manage_options', 'homepageoptions', 'homepage_options', 'dashicons-format-image');
     }
    
    //  Add options page to WP backend
    add_action('admin_menu', 'homepage_menu');
}
     
// Settings Page
 if(!function_exists('homepage_options')){
    function homepage_options() {
        if ( !current_user_can( 'manage_options' ) )  {
	    	wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    	}
    	
    // Settings page content.
    global $plugin_root;
    
    require_once($plugin_root . 'inc/options-page.php');
    }
}

// Save the form data

if(!function_exists('homepage_update_settings')){
    function homepage_update_settings() {
        // register each field from options-page
        register_setting( 'banner_fields', 'banner_image');
        register_setting( 'banner_fields', 'banner_text');
        register_setting( 'banner_fields', 'feature_text');
    }
    add_action('admin_init', 'homepage_update_settings');
}



?>