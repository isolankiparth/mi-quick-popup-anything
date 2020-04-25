<?php
/**
 * @since             1.0.0
 * @package           Quick_Popup_Anything/includes
 */ 

/**
	* @since 1.0.0
	* Register menu in admin
	* miqpa_settings_page_html function add in admin-settings.php file
	*/ 
if ( !function_exists( 'miqpa_admin_menu' ) ) {	

	function miqpa_admin_menu() {
	  add_menu_page( 'Quick Popup Settings', 'Quick Popup', 'manage_options', 'miqpa-settings', 'miqpa_settings_page_html', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNy41IiBoZWlnaHQ9IjI3LjUiIHZpZXdCb3g9IjAgMCAyNy41IDI3LjUiPjxkZWZzPjxzdHlsZT4uYXtmaWxsOiM5ZmE0YWE7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5Bc3NldCA3PC90aXRsZT48cmVjdCBjbGFzcz0iYSIgeT0iOC41IiB3aWR0aD0iMTkiIGhlaWdodD0iMTkiIHJ4PSIyIi8+PHBhdGggY2xhc3M9ImEiIGQ9Ik04LjUsN2gtMVYyYTIsMiwwLDAsMSwyLTJoMTZhMiwyLDAsMCwxLDIsMlYxOGEyLDIsMCwwLDEtMiwyaC01VjE5aDRhMiwyLDAsMCwwLDItMlYzYTIsMiwwLDAsMC0yLTJoLTE0YTIsMiwwLDAsMC0yLDJaIi8+PC9zdmc+', 30 );
	}
	add_action( 'admin_menu', 'miqpa_admin_menu' );

}