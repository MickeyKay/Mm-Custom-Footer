<?php 

/**
 * Create admin menu item
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0
 */
function jrsm_do_settings_page() {

	// Create admin menu item
	add_options_page( PLUGIN_NAME, 'jQuery Responsive Select Menu', 'manage_options', 'jquery-responsive-select-menu', 'jrsm_output_settings');

}
add_action('admin_menu', 'jrsm_do_settings_page');

/**
 * Output settings page with form
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0
 */
function jrsm_output_settings() { ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php echo PLUGIN_NAME; ?></h2>
		<form method="post" action="options.php">
		    <?php settings_fields( 'jquery-responsive-select-menu' ); ?>
		    <?php do_settings_sections( 'jquery-responsive-select-menu' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
<?php }

/**
 * Register plugin settings
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0
 */
function jrsm_register_settings() {

	register_setting( 'jrsm-settings-group', 'jrsm-settings-group', 'jrsm-settings-validate' );
	
	// Setting sections
	add_settings_section(
		'jrsm-settings-section',
		'Main Settings',
		'',
		'jquery-responsive-select-menu'
	);

	// Define settings fields
	// Menu Containers
	$fields[] = array (
		'id' => 'jrsm-containers',
		'title' => 'Menu Container(s) Class/ID',
		'callback' => 'jrsm_output_fields',
		'section' => 'jquery-responsive-select-menu',
		'page' => 'jrsm-settings-section',
		'args' => array( 
			'type' => 'text',
			'validation' => 'wp_kses_post',
			'description' => 'Comma separated list of class/id selectors for the div(s) containing the menu(s). E.g. "#nav, .mini-nav"'
		)
	);
	// Maximum width
	$fields[] = array (
		'id' => 'jrsm-width',
		'title' => 'Maximum Menu Width',
		'callback' => 'jrsm_output_fields',
		'section' => 'jquery-responsive-select-menu',
		'page' => 'jrsm-settings-section',
		'args' => array( 
			'type' => 'text',
			'validation' => 'intval',
			'after_text' => 'px',
			'description' => 'The width at which the responsive select menu should appear/disappear.'
		)
	);

	// Maximum width
	$fields[] = array (
		'id' => 'jrsm-first-term-name',
		'title' => 'First Term Name',
		'callback' => 'jrsm_output_fields',
		'section' => 'jquery-responsive-select-menu',
		'page' => 'jrsm-settings-section',
		'args' => array(
			'type' => 'text',
			'validation' => 'wp_kses_post',
			'description' => 'The text for the select menu\'s top-level "dummy" item.'
		)
	);

	// Sub-item spacer
	$fields[] = array (
		'id' => 'jrsm-sub-item-spacer',
		'title' => 'Sub Item Spacer',
		'callback' => 'jrsm_output_fields',
		'section' => 'jquery-responsive-select-menu',
		'page' => 'jrsm-settings-section',
		'args' => array(
			'type' => 'text',
			'validation' => 'wp_kses_post',
			'description' => 'The character(s) used to indent sub items.'
		)
	);

	// Add settings fields
	foreach( $fields as $field ) {
		jrsm_register_settings_field( $field['id'], $field['title'], $field['callback'], $field['section'], $field['page'], $field );	
	}

	// Register settings
	register_setting('jquery-responsive-select-menu','jrsm-output-method');

}
add_action( 'admin_init', 'jrsm_register_settings' );

/**
 * Adds and registers settings field
 *
 * @package jQuery Responsive Select Menu
 * @since   1.0		
 */	
function jrsm_register_settings_field( $id, $title, $callback, $section, $page, $field ) {

	// Add settings field	
	add_settings_field( $id, $title, $callback, $section, $page, $field );

	// Register setting with appropriate validation
	register_setting( $section, $id, $field['args']['validation'] );
}

function jrsm_output_fields( $field ) {
	
	// Default values
	$value = get_option( $field['id'] );
	switch( $field['id'] ) {

		case 'jrsm-width':
			if ( '0' == get_option( $field['id'] ) )
				$value = '768';
			break;

		case 'jrsm-first-term-name':
			if ( '' == get_option( $field['id'] ) )
				$value = '⇒ Navigation';
			break;

		case 'jrsm-sub-item-spacer':
			if ( '' == get_option( $field['id'] ) )
				$value = '-';
			break;

	}	

	
	// Get input type
	$type = $field['args']['type'];

	switch( $type ) {

		// Text fields
		case 'text':
			echo '<input name="' . $field['id'] . '" id="' . $field['id'] . '" type="' . $type . '" value="' . $value . ' " />';
			break;

	}
	
	// After text
	if ( !empty( $field['args']['after_text'] ) )
		echo $field['args']['after_text'];

	// Description
	if ( !empty( $field['args']['description'] ) )
		echo '<br /><em>' . $field['args']['description'] . "</em>\n";
}