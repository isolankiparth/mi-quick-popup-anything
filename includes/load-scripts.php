<?php
/**
 *
 * @since             1.0.0
 * @package           MI_Quick_Popup_Anything/includes
 * Load Style and JS file in client side and admin side
 */ 

/**
	* @since 1.0.0
	* Load style and script in client side
	*/ 
if ( !function_exists( 'miqpa_plugin_admin_scripts' ) ) {

	function miqpa_plugin_admin_scripts() {
		if( is_admin() ) { 
      // Add the color picker css file       
      wp_enqueue_style( 'wp-color-picker' ); 
      wp_enqueue_style( 'miqpa-css', MIQPA_PLUGIN_DIR. 'admin/css/style.css', '', '1.0.0' );
      // Include our custom jQuery file with WordPress Color Picker dependency
      wp_enqueue_script( 'miqpa-admin-js', MIQPA_PLUGIN_DIR. 'admin/js/script.js', array( 'wp-color-picker' ), '1.0.0', true ); 
    }
	}
	add_action('admin_enqueue_scripts', 'miqpa_plugin_admin_scripts');

}

/**
	* @since 1.0.0
	* Load style and script in client side
	*/ 
if ( !function_exists( 'miqpa_plugin_public_scripts' ) ) {

	function miqpa_plugin_public_scripts() {
		wp_enqueue_style( 'miqpa-css', MIQPA_PLUGIN_DIR. 'public/css/style.css', '', '1.0.0' );
		wp_enqueue_style( 'miqpa-magnific-popup-css', MIQPA_PLUGIN_DIR. 'public/css/magnific-popup.css' );
		wp_enqueue_script( 'miqpa-magnific-popup-js', MIQPA_PLUGIN_DIR. 'public/js/jquery.magnific-popup.min.js', 'jQuery', '', true );
		wp_enqueue_script( 'miqpa-js', MIQPA_PLUGIN_DIR. 'public/js/script.js', 'jQuery', '1.0.0', true );
	}
	add_action('wp_enqueue_scripts', 'miqpa_plugin_public_scripts');

}