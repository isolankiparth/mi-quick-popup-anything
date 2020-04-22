/**
 * All of the JS code 
 */

(function( $ ) {
  // call after document loaded
  $(function($){
  	// set quick popup anything button position - left or right
  	var miqpa_btn_class = $('.miqpa_popup_wrap .miqpa_popup_open_button');
  	miqpa_btn_class.removeClass('right_center left_center');
  	var button_position = miqpa_btn_class.attr('data-btn-position');
  	var button_width = miqpa_btn_class.width();
  	var button_outer_width = miqpa_btn_class.outerWidth();
  	var half_button_width = button_outer_width / 2;
  	if (button_position == 'right') {
  		miqpa_btn_class.css('top', 'calc(50% - '+button_width+'px)');
  		miqpa_btn_class.addClass('right_center');
  	} else {
  		miqpa_btn_class.css('top', 'calc(50% + '+half_button_width+'px)');
  		miqpa_btn_class.addClass('left_center');
  	}

   	// call popup script
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
  });
    
})( jQuery );

