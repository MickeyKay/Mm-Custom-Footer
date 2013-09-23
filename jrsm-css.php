<?php
    // Header & required file for PHP in CSS
    header('Content-type: text/css');
    require_once('../../../wp-load.php');

    // Get menu <ul>'s inside container(s)
    $containers = str_replace(' ', '', get_option( 'jrsm-containers' ) );
    $containers = explode( ',', $containers );
    foreach( $containers as &$container ) {
    	$container = $container . ' ul';
    }
    $containers = implode( ', ', $containers );
?>
/* jQuery Responsive Select Menu CSS */

.jquery-responsive-select-menu {
	display: none;
}

@media (max-width: <?php echo get_option( 'jrsm-width' ); ?>px) {
	
	<?php echo $containers; ?> {
		display: none !important;
	}

	.jquery-responsive-select-menu {
		display: inline-block;
	}

}