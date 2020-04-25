<?php
/**
 * @since             1.0.0
 * @package           Quick_Popup_Anything/includes
 *
 * Set plugin default options
 */ 

/**
	* @since 1.0.0
	* Plugin activation
	*/ 
function miqpa_activation_plugin() {
	// Set default settings
	if ( ! get_option( 'miqpa_editor_content' ) ) {
		update_option('miqpa_editor_content', 'Thank you for using Quick Popup Anything.');
	}
	if ( ! get_option( 'miqpa_button_label' ) ) {
		update_option('miqpa_button_label', 'Quick Popup');
	}
	if ( ! get_option( 'miqpa_button_bg' ) ) {
		update_option('miqpa_button_bg', '#3498db');
	}
	if ( ! get_option( 'miqpa_button_color' ) ) {
		update_option('miqpa_button_color', '#ffffff');
	}
	if ( ! get_option( 'miqpa_button_hover_bg' ) ) {
		update_option('miqpa_button_hover_bg', '#333333');
	}
	if ( ! get_option( 'miqpa_button_hover_color' ) ) {
		update_option('miqpa_button_hover_color', '#ffffff');
	}
	if ( ! get_option( 'miqpa_popup_width' ) ) {
		update_option('miqpa_popup_width', '600px');
	}
	if ( ! get_option( 'miqpa_button_bg' ) ) {
		update_option('miqpa_button_bg', '#ffffff');
	}
	if ( ! get_option( 'miqpa_button_color' ) ) {
		update_option('miqpa_button_color', '#000000');
	}
}
register_activation_hook( MIQPA_PLUGIN_FILE_URL, 'miqpa_activation_plugin' );