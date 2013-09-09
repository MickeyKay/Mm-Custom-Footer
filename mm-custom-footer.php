<?php
/**
 * Plugin Name: MIGHTYminnow Custom Footer
 * Plugin URI:  http://mightyminnow.com
 * Description: Inserts a MIGHTYminnow link in the footer
 * Version:     1.0
 * Author:      MIGHTYminnow
 * Author URI:  http://mightyminnow.com
 * License:     GPLv2+
 */

// Definitions
define( 'PLUGIN_NAME', 'MIGHTYminnow Custom Footer' );

// Includes
require_once dirname( __FILE__ ) . '/admin.php';

// Enqueue custom CSS
function mmcf_scripts() {

	// Load custom CSS
	wp_enqueue_style( 'mm-custom-footer', plugin_dir_url( __FILE__ ) . 'mm-custom-footer.css' );

}
add_action( 'wp_enqueue_scripts', 'mmcf_scripts');


function mmcf_do_custom_footer() {
	if ( 'text' == get_option('mmcf-output-method') )
		echo '<div class="mm-footer">Powered by <a href="http://mightyminnow.com" title="MIGHTYminnow Website Weekend">MIGHTYminnow Website Weekend</a></div>';
	elseif ( 'image' == get_option('mmcf-output-method') )
		echo '<div class="mm-footer">Powered by<br /><a href="http://mightyminnow.com" title="MIGHTYminnow Website Weekend"><img src="http://www.mightyminnow.com/wp-content/uploads/2013/07/website_weekend_icon.jpg" alt="MIGHTYminnow Website Weekend"</a></div>';
}
add_action( 'wp_footer', 'mmcf_do_custom_footer' );



