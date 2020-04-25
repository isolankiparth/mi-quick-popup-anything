<?php
/**
 * @since             1.0.0
 * @package           Quick_Popup_Anything/includes
 *
 * All Quick Popup Anything settings are here
 */ 

/**
	* @since 1.0.0
	* Generate setting page HTML
	*/ 
if ( !function_exists( 'miqpa_settings_page_html' ) ) {

	function miqpa_settings_page_html() {
    ?>
    <div class="wrap">
    	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<?php settings_errors(); ?>

			<form action="options.php" method="post" name="miqpa_form" class="miqpa_form">
	    	<div id="poststuff" class="miqpa-settings">
	    		<div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">
	    			<div id="post-body-content">
				      
				      <?php
				        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'popup-content';
				      ?>
				       
				      <h2 class="nav-tab-wrapper">
				        <a href="?page=miqpa-settings&tab=popup-content" class="nav-tab <?php echo $active_tab == 'popup-content' ? 'nav-tab-active' : ''; ?>">Popup Content</a>
				        <a href="?page=miqpa-settings&tab=button-settings" class="nav-tab <?php echo $active_tab == 'button-settings' ? 'nav-tab-active' : ''; ?>">Button Settings</a>
				        <a href="?page=miqpa-settings&tab=popup-settings" class="nav-tab <?php echo $active_tab == 'popup-settings' ? 'nav-tab-active' : ''; ?>">Popup Settings</a>
				      </h2>

				        <?php
				        	if( $active_tab == 'popup-content' ) {
				        		echo "<div class='popup_content'>";
				            settings_fields( 'miqpa-content-settings' );
				            $content = get_option('miqpa_editor_content');
					  				wp_editor( $content, 'miqpa_editor_content', array( 'textarea_rows' => 15 ) );
				        		echo "</div>";
					        } else if( $active_tab == 'button-settings' ){
					        	echo "<div class='miqpa_white_box'>";
				            settings_fields( 'miqpa-button-settings' );
					          do_settings_sections( 'miqpa-button-settings' );
					          echo "</div>";
					        } else {
							    	echo "<div class='miqpa_white_box'>";
							      settings_fields( 'miqpa-popup-settings' );
							      do_settings_sections( 'miqpa-popup-settings' );
							      echo "</div>";
					        }
				        ?>

				        <?php submit_button( __( 'Save Settings', 'mi-quick-popup-anything' ), 'primary button-large' ); ?>
				   	</div>
				   	<div id="postbox-container-1" class="postbox-container">
              <?php do_meta_boxes('','side',null); ?>
						</div>
						<div id="postbox-container-2" class="postbox-container">
              <?php do_meta_boxes('','normal',null); ?>
              <?php do_meta_boxes('','advanced',null); ?>
            </div>
	  			</div>
	  		</div>
  		</form>
    </div>
    <?php
	}

}

/**
	* @since 1.0.0
	* Content popup tab
	*/
if ( !function_exists( 'miqpa_content_settings_init' ) ) {

	function miqpa_content_settings_init() {
		// register setting
	  register_setting('miqpa-content-settings', 'miqpa_editor_content');

	  // add settings section
	  add_settings_section( 'miqpa_editor_section', '', '', 'miqpa-content-settings' );
	}
	add_action('admin_init', 'miqpa_content_settings_init');

}

/**
	* @since 1.0.0
	* Button settings tab
	*/ 
if ( !function_exists( 'miqpa_button_settings_init' ) ) {
	
	function miqpa_button_settings_init() {
		// register settings
	  register_setting('miqpa-button-settings', 'miqpa_button_label');
	  register_setting('miqpa-button-settings', 'miqpa_button_position');
	  register_setting('miqpa-button-settings', 'miqpa_button_id');
	  register_setting('miqpa-button-settings', 'miqpa_button_class');
	  register_setting('miqpa-button-settings', 'miqpa_button_zindex');
	  register_setting('miqpa-button-settings', 'miqpa_button_bg');
	  register_setting('miqpa-button-settings', 'miqpa_button_color');
	  register_setting('miqpa-button-settings', 'miqpa_button_hover_bg');
	  register_setting('miqpa-button-settings', 'miqpa_button_hover_color');

	  // add settings section
	  add_settings_section( 'miqpa_button_section', '', '', 'miqpa-button-settings' );

	  // add settings field
	  add_settings_field( 'miqpa_button_section_btn_label', 'Label', 'miqpa_button_section_btn_label_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_position', 'Position', 'miqpa_button_section_btn_position_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_id', 'ID', 'miqpa_button_section_btn_id_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_class', 'Class', 'miqpa_button_section_btn_class_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_zindex', 'Button Z-index', 'miqpa_button_section_btn_zindex_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_bg', 'Background Color', 'miqpa_button_section_btn_bg_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_color', 'Label Color', 'miqpa_button_section_btn_color_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_hover_bg', 'Background Hover Color', 'miqpa_button_section_btn_hover_bg_cb', 'miqpa-button-settings', 'miqpa_button_section' );
	  add_settings_field( 'miqpa_button_section_btn_hover_color', 'Label Hover Color', 'miqpa_button_section_btn_hover_color_cb', 'miqpa-button-settings', 'miqpa_button_section' );

	}
	add_action('admin_init', 'miqpa_button_settings_init');

	/* All callback functions */
	// Button label callback
	function miqpa_button_section_btn_label_cb() {
	  $miqpa_button_label = get_option('miqpa_button_label');
	  ?>
	  <input type="text" name="miqpa_button_label" value="<?php echo isset( $miqpa_button_label ) ? esc_attr( $miqpa_button_label ) : ''; ?>">
	  <?php
	}

	// Button position callback
	function miqpa_button_section_btn_position_cb() {
	  $miqpa_button_position = get_option('miqpa_button_position');
	  ?>
	  <select name="miqpa_button_position">
		  <option value="left" <?php selected(get_option('miqpa_button_position'), "left"); ?>>Center Left</option>
		  <option value="right" <?php selected(get_option('miqpa_button_position'), "right"); ?>>Center Right</option>
		  <option value="bottom_left" <?php selected(get_option('miqpa_button_position'), "bottom_left"); ?>>Bottom Left</option>
		  <option value="bottom_right" <?php selected(get_option('miqpa_button_position'), "bottom_right"); ?>>Bottom Right</option>
		</select>
	  <?php
	}

	// Button id callback
	function miqpa_button_section_btn_id_cb() {
	  $miqpa_button_id = get_option('miqpa_button_id');
	  ?>
	  <input type="text" name="miqpa_button_id" value="<?php echo isset( $miqpa_button_id ) ? esc_attr( $miqpa_button_id ) : ''; ?>">
	  <?php
	}

	// Button class callback
	function miqpa_button_section_btn_class_cb() {
	  $miqpa_button_class = get_option('miqpa_button_class');
	  ?>
	  <input type="text" name="miqpa_button_class" value="<?php echo isset( $miqpa_button_class ) ? esc_attr( $miqpa_button_class ) : ''; ?>">
	  <?php
	}

	// Button zindex callback
	function miqpa_button_section_btn_zindex_cb() {
	  $miqpa_button_zindex = get_option('miqpa_button_zindex');
	  ?>
	  <input type="text" name="miqpa_button_zindex" value="<?php echo isset( $miqpa_button_zindex ) ? esc_attr( $miqpa_button_zindex ) : ''; ?>">
	  <?php
	}

	// Button background color callback
	function miqpa_button_section_btn_bg_cb() {
	  $miqpa_button_bg = get_option('miqpa_button_bg');
	  ?>
	  <input type="text" name="miqpa_button_bg" value="<?php echo isset( $miqpa_button_bg ) ? esc_attr( $miqpa_button_bg ) : ''; ?>" data-default-color="#00ad5f" class="miqpa-color-field">
	  <?php
	}

	// Button color callback
	function miqpa_button_section_btn_color_cb() {
	  $miqpa_button_color = get_option('miqpa_button_color');
	  ?>
	  <input type="text" name="miqpa_button_color" value="<?php echo isset( $miqpa_button_color ) ? esc_attr( $miqpa_button_color ) : ''; ?>" data-default-color="#ffffff" class="miqpa-color-field">
	  <?php
	}

	// Button background hover color callback
	function miqpa_button_section_btn_hover_bg_cb() {
	  $miqpa_button_hover_bg = get_option('miqpa_button_hover_bg');
	  ?>
	  <input type="text" name="miqpa_button_hover_bg" value="<?php echo isset( $miqpa_button_hover_bg ) ? esc_attr( $miqpa_button_hover_bg ) : ''; ?>" data-default-color="#333333" class="miqpa-color-field">
	  <?php
	}

	// Button hover color callback
	function miqpa_button_section_btn_hover_color_cb() {
	  $miqpa_button_hover_color = get_option('miqpa_button_hover_color');
	  ?>
	  <input type="text" name="miqpa_button_hover_color" value="<?php echo isset( $miqpa_button_hover_color ) ? esc_attr( $miqpa_button_hover_color ) : ''; ?>" data-default-color="#ffffff" class="miqpa-color-field">
	  <?php
	}

}

/**
	* @since 1.0.0
	* Popup settings tab
	*/ 
if ( !function_exists( 'miqpa_popup_settings_init' ) ) {
	
	function miqpa_popup_settings_init() {
		// register settings
	  register_setting('miqpa-popup-settings', 'miqpa_popup_disable');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_hide_on_mobile');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_width');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_id');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_class');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_bg');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_text_color');
	  register_setting('miqpa-popup-settings', 'miqpa_popup_display_only_once');

	  // add settings section
	  add_settings_section( 'miqpa_popup_section', '', '', 'miqpa-popup-settings' );

	  // add settings field
	  add_settings_field( 'miqpa_popup_section_popup_disable', 'Disable Popup', 'miqpa_popup_section_popup_disable_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_hide_on_mobile', 'Hide on Mobile', 'miqpa_popup_section_popup_hide_on_mobile_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_width', 'Width', 'miqpa_popup_section_popup_width_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_id', 'ID', 'miqpa_popup_section_popup_id_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_class', 'Class', 'miqpa_popup_section_popup_class_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_bg', 'Background Color', 'miqpa_popup_section_popup_bg_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_text_color', 'Text Color', 'miqpa_popup_section_popup_text_color_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	  add_settings_field( 'miqpa_popup_section_popup_display_only_once', 'Display Popup Only Once', 'miqpa_popup_section_popup_display_only_once_cb', 'miqpa-popup-settings', 'miqpa_popup_section' );
	}
	add_action('admin_init', 'miqpa_popup_settings_init');

	/* All callback functions */
	// Popup disable callback
	function miqpa_popup_section_popup_disable_cb() {
	  $miqpa_popup_disable = get_option('miqpa_popup_disable');
	  ?>
	  <input type="checkbox" name="miqpa_popup_disable" value="1" <?php echo checked( 1, $miqpa_popup_disable, false ); ?>/>
	  <?php
	}

	// Popup hide on mobile callback
	function miqpa_popup_section_popup_hide_on_mobile_cb() {
	  $miqpa_popup_hide_on_mobile = get_option('miqpa_popup_hide_on_mobile');
	  ?>
	  <input type="checkbox" name="miqpa_popup_hide_on_mobile" value="1" <?php echo checked( 1, $miqpa_popup_hide_on_mobile, false ); ?>/>
	  <?php
	}

	// Popup Max Width callback
	function miqpa_popup_section_popup_width_cb() {
	  $miqpa_popup_width = get_option('miqpa_popup_width');
	  ?>
	  <input type="text" name="miqpa_popup_width" value="<?php echo isset( $miqpa_popup_width ) ? esc_attr( $miqpa_popup_width ) : ''; ?>"> &nbsp;<span class="description">e.g. 50% or 800px</span>
	  <?php
	}

	// Popup id callback
	function miqpa_popup_section_popup_id_cb() {
	  $miqpa_popup_id = get_option('miqpa_popup_id');
	  ?>
	  <input type="text" name="miqpa_popup_id" value="<?php echo isset( $miqpa_popup_id ) ? esc_attr( $miqpa_popup_id ) : ''; ?>">
	  <?php
	}

	// Popup class callback
	function miqpa_popup_section_popup_class_cb() {
	  $miqpa_popup_class = get_option('miqpa_popup_class');
	  ?>
	  <input type="text" name="miqpa_popup_class" value="<?php echo isset( $miqpa_popup_class ) ? esc_attr( $miqpa_popup_class ) : ''; ?>">
	  <?php
	}

	// Popup background color callback
	function miqpa_popup_section_popup_bg_cb() {
	  $miqpa_popup_bg = get_option('miqpa_popup_bg');
	  ?>
	  <input type="text" name="miqpa_popup_bg" value="<?php echo isset( $miqpa_popup_bg ) ? esc_attr( $miqpa_popup_bg ) : ''; ?>" data-default-color="#ffffff" class="miqpa-color-field">
	  <?php
	}

	// Popup text color callback
	function miqpa_popup_section_popup_text_color_cb() {
	  $miqpa_popup_text_color = get_option('miqpa_popup_text_color');
	  ?>
	  <input type="text" name="miqpa_popup_text_color" value="<?php echo isset( $miqpa_popup_text_color ) ? esc_attr( $miqpa_popup_text_color ) : ''; ?>" data-default-color="#000000" class="miqpa-color-field">
	  <?php
	}

	// Popup display only once callback
	function miqpa_popup_section_popup_display_only_once_cb() {
	  $miqpa_popup_display_only_once = get_option('miqpa_popup_display_only_once');
	  ?>
	  <input type="checkbox" name="miqpa_popup_display_only_once" value="1" <?php echo checked( 1, $miqpa_popup_display_only_once, false ); ?>/>
	  <?php
	}
}