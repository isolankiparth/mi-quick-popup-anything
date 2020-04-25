<?php
/**
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
	  add_menu_page( 'Quick Popup Settings', 'Quick Popup', 'manage_options', 'miqpa-settings', 'miqpa_settings_page_html', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMC41IiB2aWV3Qm94PSIwIDAgMjAgMjAuNSI+PGRlZnM+PHN0eWxlPi5hLC5ie2ZpbGw6IzlmYTRhYTt9LmJ7c3Ryb2tlOiMyMzFmMjA7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO308L3N0eWxlPjwvZGVmcz48dGl0bGU+QXNzZXQgMTA8L3RpdGxlPjxyZWN0IGNsYXNzPSJhIiB4PSI2LjUiIHdpZHRoPSIxMy41IiBoZWlnaHQ9IjEzLjUiIHJ4PSIyIi8+PHJlY3QgY2xhc3M9ImIiIHg9IjAuNSIgeT0iNi41IiB3aWR0aD0iMTMuNSIgaGVpZ2h0PSIxMy41IiByeD0iMiIvPjwvc3ZnPg==', 30 );
	}
	add_action( 'admin_menu', 'miqpa_admin_menu' );

}