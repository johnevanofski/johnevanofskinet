/*
JS Script File

John Evanofski

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
    
/* check JS */
    
    $('body').addClass('jsOK');

    
/*ROYAL SLIDER*/

$('.royalSlider').royalSlider({
    autoScaleSlider: true,
    keyboardNavEnabled: true,
    //arrowsNavAutoHide: false,
    //controlsInside: true,
    arrowsNavHideOnTouch: true,
    imageScalePadding: 0,
    imageScaleMode: 'fill',
    
    fullscreen: {
    		// fullscreen options go gere
    		enabled: true,
            buttonFS: true,
    		nativeFS: true
    	},
    
}); 

    
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
    
/* homepage */
    
    //homepage fadouts
    var divs = $('.navdown, .nexus');
        $(window).scroll(function(){
           if($(window).scrollTop() < 150 ){
                 divs.fadeIn();
           } else {
                 divs.removeClass('fadeInEach fadeInDown bounce').fadeOut();
           }
    });
    
    //adjust height of homepage image
    var viewport_height = $(window).height();
    
    $('section.top').css('height', viewport_height - 80)
    //console.log('viewport height = ' + viewport_height)
    
/* nav */
    //animation end state varible
    var transitionEnd = 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
        nav = $('nav');
    
    $('.menu-button').click(function(e){
        
        $(this).toggleClass('active');
        
        nav.toggleClass('on off visible')

            nav.bind(transitionEnd, function(e){
                if($(this).hasClass('on')){
                    $(this).addClass('visible')
                    .removeClass('hidden')
                }
                else if ($(this).hasClass('off')){
                    $(this).addClass('hidden')
                    .removeClass('visible')
                }
            });
       
        
        e.preventDefault();                
    });
    
/* contact page */    
    $('#send-button').hover(function(){
        $('.ufo').toggleClass('sending');
    });

/* portfolio page */
    
    //banner link color
    
    $('.bannerinfo').each(function(){
    
    var color = $(this).attr('data-color');
        
        $(this).find('a').hover(function(){
            $(this).css('color', color );
            }, function(){
                $(this).css('color', 'white');
            });
    
   });
    
    //banner info animation
	
		function showBanner(el) {
			//turn on
        
        el.toggleClass('active');
        
        el.find('.bannertext').toggleClass('active');
        
        el.find('.bannerimg').toggleClass('off');
        
        el.find('.toggle').toggleClass('off');
        
        //scroll to top of frame
        
        var imagetop = el.offset();
        
        $('html,body').animate({
              scrollTop: imagetop.top
        }, 500);
		}
	
    
    $('.bannerinfo').click(function(){
      $el = $(this);  
			showBanner($el);
    });
	
		$('.banner .title').click(function(){
			$el = $(this).closest('.banner').find('.bannerinfo');
			showBanner($el);
		});
    

	
	
    
/* viewport adjustments */
    
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
	
        /* if is below 760px */
        if (responsive_viewport < 760) {
            
            $('.exp').css('top', '0');

        } /* end smallest screen */

        /* if is larger than 760px */
        if (responsive_viewport >= 760) {
            
            /*resume resize*/
            bio_height = $('.bio').height();
            skills_height = $('.skills').height();
            
            adj_height = skills_height - bio_height;
            
            $('.exp').css('top', adj_height * -1 + 'px');
            
            //end resume resize

            $('nav').addClass('off').removeClass('on');
            $('.menu-button').removeClass('active');
            
            
            /*MASONRY
            $('.masonry').masonry({
                itemSelector: '.col',
                columnWidth: '.col'
            });
            */
            
            //paralax
            $.stellar({
                horizontalScrolling: false,
                verticalScrolling: true,
            });
            
        } /* end larger than 760px */

        /* off the bat large screen actions */
        if (responsive_viewport > 1030) {

        }
        
        //console.log('width checked: ' + $(window).width());
        
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