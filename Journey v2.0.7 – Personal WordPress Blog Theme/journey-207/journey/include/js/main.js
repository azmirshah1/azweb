(function(jQuery){
	"use strict";



/* ==================================================
	Animation Menu
================================================== */


	jQuery('.cd-primary-nav-trigger, .menu-button').on('click', function(){
		jQuery('.cd-menu-icon').toggleClass('is-clicked');
			jQuery('.menu-button').toggleClass('fixed_button_rsp');

		if( jQuery('.cd-primary-nav').hasClass('is-visible') ) {
			jQuery('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('body').removeClass('overflow-open');
				jQuery('html').addClass('overflow-open');
			});
		} else {
			jQuery('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('html').addClass('overflow-open');
				jQuery('body').addClass('overflow-open');


			});
		}
	});


	jQuery('.menu-button').on('click', function() {
	  jQuery('.ig-icon-menu').toggleClass("fa-bars fa-times");
	});



/* ==================================================
	Animation Search
================================================== */
	jQuery('.click_search, .search-button').on('click', function(){
		jQuery('.click_search, .open_search').toggleClass('is-clicked');
		jQuery('.search-button').toggleClass('fixed_button_rsp');



		if( jQuery('.container_search').hasClass('is-visible') ) {
			jQuery('.container_search').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('body').removeClass('overflow-open');
				jQuery('html').addClass('overflow-open');
			});
		} else {
			jQuery('.container_search').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('html').addClass('overflow-open');
				jQuery('body').addClass('overflow-open');
			});
		}
	});

	jQuery('.search-button').on('click', function() {
	  jQuery('.ig-icon-search').toggleClass("fa-search fa-times");
	});





  /* ==================================================
	Mini Menu
================================================== */

	                       
        jQuery(window).scroll(function(){                          
            if (jQuery(this).scrollTop() > 200) {
                jQuery('#mini-header, #mini-mobile-scroll').fadeIn(500);
            } else {
                jQuery('#mini-header, #mini-mobile-scroll').fadeOut(500);
            }
        });





/* ==================================================
	Menu Mobile
================================================== */


      jQuery('.nav-mobile').navgoco({
              caretHtml: '<i class="some-random-icon-class"></i>',
              accordion: true,
              openClass: 'open',
              save: true,
              cookie: {
                  name: 'navgoco',
                  expires: false,
                  path: '/'
              },
              slide: {
                  duration: 400,
                  easing: 'swing'
              }
          });





/* ==================================================
    Slide post 1
================================================== */

jQuery(".slide_post").owlCarousel({

	pagination : false,
	navigationText:	["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	navigation : true,


	autoPlay: 4000, //Set AutoPlay to 3 seconds
	slideSpeed : 1000,
	paginationSpeed : 400,
	singleItem:true,
	lazyLoad : true,
	items : 1



});




/* ==================================================
    Slide post infinite
================================================== */

jQuery(".slide_post_infinite").owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	slideSpeed : 300,
	paginationSpeed : 400,
	singleItem:true,
	lazyLoad : true,
	pagination : false,
	navigation : false

});






/* ==================================================
   Blog masonry
================================================== */

jQuery(window).load(function(){

var $boxes = jQuery('.isotopeItem_masonry');
var $container_masonry = jQuery('.isotopeWrapper');
var $resize = jQuery('.isotopeWrapper');

$boxes.css('opacity', '1');


  var $container_masonry = jQuery('.masonryContainer');
    $boxes.fadeIn();
    $container_masonry.isotope({
        itemSelector: '.isotopeItem_masonry'
                })


  });

/* ==================================================
   WOW Animation
================================================== */


 var wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       false,       // default
      live:         true        // default
    }
  )
  wow.init();






/* ==================================================
	Scroll To Top
================================================== */

jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});





/* ==================================================
   FitVids
================================================== */

    jQuery("#vid-container").fitVids();




/* ==================================================
   end
================================================== */
})(jQuery);
/* END Document ready */