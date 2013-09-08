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

function mmcf_do_settings_page() {
	add_options_page( 'MIGHTYminnow Custom Footer', 'Mm Custom Footer', 'manage_options', 'mm-custom-footer', 'mmcf_output_settings');
}
add_action('admin_menu', 'mmcf_do_settings_page');

function mmcf_output_settings() { ?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Your Plugin Page Title</h2>
<?php }

// Enqueue custom jQuery file - that's it!
function mmcf_do_custom_footer_jquery() {

	// Load jQuery if it isn't already
    wp_enqueue_script('jquery');
 
    // Load custom jQuery
	wp_enqueue_script( 'mm-custom-footer', plugin_dir_url( __FILE__ ) . 'mm-custom-footer.js' );

	// Load custom CSS
	wp_enqueue_style( 'mm-custom-footer', plugin_dir_url( __FILE__ ) . 'mm-custom-footer.css' );

}
add_action( 'wp_enqueue_scripts', 'mmcf_do_custom_footer_jquery');


function mmcf_do_custom_footer() {
	echo '<div class="mm-footer">Website made at a <a href="http://mightyminnow.com">MIGHTYminnow</a> Website Weekend course</div>';
}
add_action( 'wp_footer', 'mmcf_do_custom_footer' );



