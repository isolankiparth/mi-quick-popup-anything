<?php
/**
 *
 * @since             1.0.0
 * @package           MI_Quick_Popup_Anything/includes
 */ 

/**
	* @since 1.0.0
	* Register menu in admin
	* miqpa_settings_page_html function add in admin-settings.php file
	*/ 
if ( !function_exists( 'miqpa_admin_menu' ) ) {	

	function miqpa_admin_menu() {
	  add_menu_page( 'Quick Popup Settings', 'Quick Popup', 'manage_options', 'miqpa-settings', 'miqpa_settings_page_html', 'dashicons-marker', 30 );
	}
	add_action( 'admin_menu', 'miqpa_admin_menu' );

}