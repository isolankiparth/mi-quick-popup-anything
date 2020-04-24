/**
 * All of the JS code 
 */

(function( $ ) {
  // call after document loaded
  $(function($){
    // get popup display only once value
    let popup_display_only_once = $('#miqpa_popup_content').hasClass('popup_display_only_once');
    // get hide on mobile class
    let popup_hide_on_mobile = $('#miqpa_popup_content').hasClass('popup_hide_on_mobile');
  	// set quick popup anything button position - left or right
  	let miqpa_btn_class = $('.miqpa_popup_wrap .miqpa_popup_open_button');
  	miqpa_btn_class.removeClass('right_center left_center');
  	let button_position = miqpa_btn_class.attr('data-btn-position');
  	let button_width = miqpa_btn_class.width();
  	let button_outer_width = miqpa_btn_class.outerWidth();
  	let half_button_width = button_outer_width / 2;
  	if (button_position == 'right') {
  		miqpa_btn_class.css('top', 'calc(50% - '+button_width+'px)');
  		miqpa_btn_class.addClass('right_center');
  	} else if (button_position == 'bottom_left') {
      miqpa_btn_class.addClass('bottom_left');
    } else if (button_position == 'bottom_right') {
      miqpa_btn_class.addClass('bottom_right');
    } else if (button_position == 'left') {
      miqpa_btn_class.css('top', 'calc(50% + '+half_button_width+'px)');
      miqpa_btn_class.addClass('left_center');
    }

    // call popup script
    if (popup_display_only_once == true) {
      if (popup_hide_on_mobile == true && $(window).width() <= 600) {
        // hide on mobile
        return false;
      } else {
        if(localStorage.getItem('popState') != 'shown'){
          $.magnificPopup.open({
            removalDelay: 300,
            mainClass: 'miqpa-mfp-fade',
            closeOnBgClick: true,
            enableEscapeKey: true,
            items: {
              src: '#miqpa_popup_content',
              type: 'inline',
            }
          }, 0); 
          localStorage.setItem('popState','shown')
        }
      }
    } else {
      localStorage.setItem('popState','')
      miqpa_btn_class.magnificPopup({
        removalDelay: 300,
        mainClass: 'miqpa-mfp-fade',
        closeOnBgClick: true,
        enableEscapeKey: true,
        items: {
          src: '#miqpa_popup_content',
          type: 'inline',
        }
      });
    }
   	
  });
    
})( jQuery );

