<?php
/**
 * Plugin Name:       Quick Popup Anything
 * Plugin URI:        https://monsterinfotech.com/
 * Description:       A lightweight, responsive and easy to use popup plugin. Add html, texts, shortcodes, videos & more.
 * Version:           1.0.0
 * Author:            Monster Infotech
 * Author URI:        https://monsterinfotech.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mi-quick-popup-anything
 * Domain Path:       /languages
 *
 * @since             1.0.0
 * @author      			Parth Solanki
 * @package           MI_Quick_Popup_Anything
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
	* @since 1.0.0
	* Define plugin version
	*/
define( 'MIQPA_VERSION', '1.0.0' );

/**
	* @since 1.0.0
	* Define plugin directory file URL
	*/ 
define( 'MIQPA_PLUGIN_FILE_URL', __FILE__ );

/**
	* @since 1.0.0
	* Define plugin directory path
	*/ 
define( 'MIQPA_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );

/**
	* @since 1.0.0
	* Register enqueue scripts
	*/ 
require_once plugin_dir_path( MIQPA_PLUGIN_FILE_URL ) . 'includes/load-scripts.php';

/**
	* @since 1.0.0
	* Register admin menu
	*/ 
require_once plugin_dir_path( MIQPA_PLUGIN_FILE_URL ) . 'includes/admin-menu.php';

/**
	* @since 1.0.0
	* Include Quick Popup Anything settings
	*/ 
require_once plugin_dir_path( MIQPA_PLUGIN_FILE_URL ) . 'includes/admin-settings.php';

/**
	* @since 1.0.0
	* Include MIQPA client side
	*/ 
require_once plugin_dir_path( MIQPA_PLUGIN_FILE_URL ) . 'includes/front-popup.php';

/**
	* @since 1.0.0
	* Plugin activation
	*/ 
require_once plugin_dir_path( MIQPA_PLUGIN_FILE_URL ) . 'includes/set-options.php';