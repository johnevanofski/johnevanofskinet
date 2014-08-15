/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}





// as the page loads, call these scripts
jQuery(document).ready(function($) {

	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
    

/*PARALLAX*/
    
    $.stellar({
        horizontalScrolling: false,
        verticalScrolling: true,
        verticalOffset: 200
    });

    
/*MAG POP*/
    $('.popup-button').magnificPopup({
        type: 'inline',
        overflowY: 'auto',
        mainClass: 'mfp-zoom-in',
        removalDelay: 300,
    });
    
    $('.ajax-popup').magnificPopup({
        type: 'ajax',
        items: { src:'../../site/snippets/contact.php' }
    });


/*Init Masonry*/


    
/*SMOOTH SCROLLING*/
    
    $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 500);
            return false;
          }
        }
      });
    });
    
//Animation triggers
//homepage fadeOuts
var divs = $('.navdown, .nexus');
    $(window).scroll(function(){
       if($(window).scrollTop() < 150 ){
             divs.fadeIn();
       } else {
             divs.removeClass('fadeInEach fadeIn').fadeOut();
       }
});
//sending 
    
    $('#send-button').hover(function(){
        $('.ufo').toggleClass('sending');
    });
/* design banners */
    
    $('.bannerinfo').click(function(e){

        $(this).find('.bannertext').toggleClass('active');
        
        $(this).find('.toggle').toggleClass('off');
        
        e.preventDefault();
        
    });
    
/* menu button functions */
    $('.menu-button').click(function(e){
        $(this).toggleClass('active');
        $('nav').toggleClass('off on');
        e.preventDefault();                
    });

    $('nav li').click(function(e){
        $('nav').addClass('off'); 
    }); //end menu button fucntions
	
	
    
    /* getting viewport width */
    
    var waitForFinalEvent = (function () {
          var timers = {};
          return function (callback, ms, uniqueId) {
            if (!uniqueId) {
              uniqueId = "n";
            }
            if (timers[uniqueId]) {
              clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
          };
    })();
    
        
    function checkWidth(){
        var responsive_viewport = $(window).width();
	
        /* if is below 481px */
        if (responsive_viewport < 760) {
            
            /*iscroll*/    
            (function(){
                var ua = navigator.userAgent,
            isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);

          if (isMobileWebkit) {
            $('html').addClass('mobile');
          }

          $(function(){
            var iScrollInstance;

            if (isMobileWebkit) {
              iScrollInstance = new iScroll('wrapper');

              $('#scroller').stellar({
                scrollProperty: 'transform',
                positionProperty: 'transform',
                horizontalScrolling: false,
                verticalOffset: 150
              });
            } else {
              $.stellar({
                horizontalScrolling: false,
                verticalOffset: 150
              });
            }
          });
    })(); //end iscroll

        } /* end smallest screen */

        /* if is larger than 760px */
        if (responsive_viewport >= 760) {

            $('nav').addClass('off').removeClass('on');
            $('.menu-button').removeClass('active');
            
            
            /*MASONRY*/
            $('.masonry').masonry({
                itemSelector: '.col',
                columnWidth: '.col'
            });

        } /* end larger than 481px */

        /* off the bat large screen actions */
        if (responsive_viewport > 1030) {

        }
        
        console.log('width: ' + $(window).width());
        
    } /*end checkWidth */
    
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(function() {
        waitForFinalEvent(function(){
        
            checkWidth();
        
        }, 500, "z");
    });
	
	
	// add all your scripts here
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );