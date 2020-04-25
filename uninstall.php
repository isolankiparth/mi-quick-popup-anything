<?php
/**
 * @since             1.0.0
 * @package           Quick_Popup_Anything
 */ 

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

// Remove plugin options 
foreach ( wp_load_alloptions() as $option => $value ) {
  if ( strpos( $option, 'miqpa_' ) === 0 ) {
    delete_option( $option );
  }
}