<?php
/**
 * @since             1.0.0
 * @package           Quick_Popup_Anything/includes
 *
 * All Quick Popup Anything client side popup
 */ 

/**
	* @since 1.0.0
	* All popup code in client side footer area
	*/ 
if ( !function_exists( 'miqpa_add_code_in_footer' ) ) {
	// Add code in client side (for display popup)
	function miqpa_add_code_in_footer() {
		// Get popup content
		if ( !empty( get_option( 'miqpa_editor_content' ) ) ) {
			$content = apply_filters( 'the_content', get_option('miqpa_editor_content') );
		} else {
			$content = 'Thank you for using Quick Popup Anything.';
		}
		// Get button label
		if (!empty(get_option('miqpa_button_label'))) {
			$btn_label = get_option('miqpa_button_label');
		} else {
			$btn_label = 'Quick Popup';
		}
		// Get button position
		if (!empty(get_option('miqpa_button_position'))) {
			$btn_position = get_option('miqpa_button_position');
		} else {
			$btn_position = 'right';
		}
		// Get button id
		if (!empty(get_option('miqpa_button_id'))) {
			$btn_id = get_option('miqpa_button_id');
		} else {
			$btn_id = '';
		}
		// Get button class
		if (!empty(get_option('miqpa_button_class'))) {
			$btn_class = get_option('miqpa_button_class');
		} else {
			$btn_class = '';
		}
		// Get button background color
		if (!empty(get_option('miqpa_button_bg'))) {
			$btn_bg = get_option('miqpa_button_bg');
		} else {
			$btn_bg = '#3498db';
		}
		// Get button color
		if (!empty(get_option('miqpa_button_color'))) {
			$btn_color = get_option('miqpa_button_color');
		} else {
			$btn_color = '#fff';
		}
		// Get button background hover color
		if (!empty(get_option('miqpa_button_hover_bg'))) {
			$btn_hover_bg = get_option('miqpa_button_hover_bg');
		} else {
			$btn_hover_bg = '#333';
		}
		// Get button hover color
		if (!empty(get_option('miqpa_button_hover_color'))) {
			$btn_hover_color = get_option('miqpa_button_hover_color');
		} else {
			$btn_hover_color = '#fff';
		}
		// Get button zindex
		if (!empty(get_option('miqpa_button_zindex'))) {
			$btn_zindex = get_option('miqpa_button_zindex');
		} else {
			$btn_zindex = '99';
		}

		// Get popup width
		if (!empty(get_option('miqpa_popup_width'))) {
			$popup_width = get_option('miqpa_popup_width');
			$popup_width = "max-width: ".$popup_width.";";
		} else {
			$popup_width = "";
		}
		// Get popup id
		if (!empty(get_option('miqpa_popup_id'))) {
			$popup_id = get_option('miqpa_popup_id');
		} else {
			$popup_id = '';
		}
		// Get popup class
		if (!empty(get_option('miqpa_popup_class'))) {
			$popup_class = get_option('miqpa_popup_class');
		} else {
			$popup_class = '';
		}
		// Get popup display only once value
		if (!empty(get_option('miqpa_popup_display_only_once'))) {
			$popup_display_only_once = get_option('miqpa_popup_display_only_once');
		} else {
			$popup_display_only_once = '';
		}
		// Get popup hdie on mobile
		if (!empty(get_option('miqpa_popup_hide_on_mobile'))) {
			$popup_hide_on_mobile = get_option('miqpa_popup_hide_on_mobile');
		} else {
			$popup_hide_on_mobile = '';
		}
		// Get popup disable value
		if (!empty(get_option('miqpa_popup_disable'))) {
			$popup_disable = get_option('miqpa_popup_disable');
		} else {
			$popup_disable = '';
		}
		// Get popup bg
		if (!empty(get_option('miqpa_popup_bg'))) {
			$popup_bg = get_option('miqpa_popup_bg');
			$popup_bg = "background-color: ".$popup_bg.";";
		} else {
			$popup_bg = "";
		}
		if (!empty(get_option('miqpa_popup_text_color'))) {
			$popup_text_color = get_option('miqpa_popup_text_color');
			$popup_text_color = "color: ".$popup_text_color.";";
		} else {
			$popup_text_color = "";
		}
		$popup_style = "style='".$popup_width."".$popup_bg."".$popup_text_color."'";
		if (!empty($popup_hide_on_mobile) && $popup_hide_on_mobile == "1") {
			$popup_hide_on_mobile = "popup_hide_on_mobile";
		} else {
			$popup_hide_on_mobile = "";
		}
		// Generate popup HTML
		$add_code = "<div class='miqpa_popup_wrap'>";
		if (!empty($popup_display_only_once) || $popup_display_only_once == "1") {
			$popup_display_only_once = "popup_display_only_once";
		} else {
			$add_code .= "<button id='$btn_id' data-btn-position='$btn_position' class=' miqpa_popup_open_button $btn_class'><span>$btn_label</span></button>";
		}
		$add_code .= "
			<div id='miqpa_popup_content' class='miqpa-white-popup mfp-hide $popup_display_only_once $popup_hide_on_mobile' $popup_style>
			  <div id='$popup_id' class='wrap-miqpa $popup_class' >
			  	$content
			  </div>
			</div>
		";
		$add_code .= "</div>";
		$add_code .= "
		<style>
			button.miqpa_popup_open_button {
				background-color: $btn_bg;
				color: $btn_color;
				z-index: $btn_zindex;
			}
			button.miqpa_popup_open_button:hover {
				background-color: $btn_hover_bg;
				color: $btn_hover_color;
			}
			.miqpa-mfp-fade.mfp-close-btn-in .mfp-close {
				background-color: $btn_bg;
				color: $btn_color;
			}
			.miqpa-mfp-fade.mfp-close-btn-in .mfp-close:hover {
				background-color: $btn_hover_bg;
				color: $btn_hover_color;
			}
		</style>
		";
		if ($popup_hide_on_mobile == "popup_hide_on_mobile") {
			$add_code .= "
			<style>
				@media screen and (max-width: 600px) {
					button.miqpa_popup_open_button {
						display: none !important;
					}
				}
			</style>
			";
		}
		if ($popup_disable == "" || $popup_disable != '1') {
			echo $add_code;
		}
	}
	add_action('wp_footer', 'miqpa_add_code_in_footer');
	
}