<?php
/**
 * Plugin Name: jQuery Responsive Select Menu
 * Plugin URI:  http://mightyminnow.com
 * Description: The jQuery Responisve Select Menu plugin replaces the default WordPress navigation menu(s) with a dropdown &lt;select&gt; on mobile devices.
 * Version:     1.0
 * Author:      MIGHTYminnow
 * Author URI:  http://mightyminnow.com
 * License:     GPLv2+
 */

// Definitions
define( 'PLUGIN_NAME', 'jQuery Responsive Select Menu' );


// Includes
require_once dirname( __FILE__ ) . '/admin.php';

// Enqueue custom CSS
function jrsm_scripts() {

	// Load custom CSS
	wp_enqueue_style( 'jrsm-css', plugin_dir_url( __FILE__ ) . 'jrsm-css.php' );

	// Make sure jQuery is included
	wp_enqueue_script("jquery");
    
	// Include the plugin jQuery
    wp_enqueue_script( 'jrsm-jquery', plugins_url( '/jquery-responsive-select-menu.js', __FILE__ ), array( 'jquery' ), '1.0', false );

    // Add field id and value to the $params[] array to pass to jQuery
	$params = array (
		'containers' => get_option( 'jrsm-containers' ),
		'width' => get_option( 'jrsm-width' ),
		'firstItem' => get_option( 'jrsm-first-term-name' ),
		'indent' => get_option( 'jrsm-sub-item-spacer' )
	);

	// Pass PHP values to jQuery script
	wp_localize_script( 'jrsm-jquery', 'php_params', $params );

}
add_action( 'wp_enqueue_scripts', 'jrsm_scripts', 0);




