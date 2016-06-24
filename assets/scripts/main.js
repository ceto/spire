/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

$(document).foundation();


$.each($('.membersquare, .projectsquare, .clientlogo'), function(i, el){
  $(el).addClass('fadeInUp wow').attr('data-wow-delay', i%5*125 + 'ms');
});

var people_wp = $('#people').waypoint({
  handler: function(direction) {

  }
});

var wow = new WOW();
wow.init();

$(function() {
  var wow = new WOW({
    boxClass: 'wow',
    offset: 120,
  }).init();
});

// $('.menu--main a').on('click', function(e){
//  if ($(document).width() < 540 ) {
//    $('#responsive-menu').toggle();
//  }
// });

$('.aboutcarousel').owlCarousel({
    // autoplay:true,
    // autoplayHoverPause:true,
    // animateOut: 'fadeOut',
    // animateIn: 'fadeIn',
    smartSpeed:500,
    margin:30,
    loop:false,
    autoHeight:true,
    items:1,
    nav:true,
    navText: ['<i class="icon icon--chevron-left">', '<i class="icon icon--chevron-right">'],
    itemElement: 'section'

});

$('.processcarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    //loop:true,
    //autoWidth:true,
    autoHeight:true,
    items:1,
    nav:true,
    navText: ['<i class="icon icon--chevron-left">', '<i class="icon icon--chevron-right">'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            margin:0
        },
        540:{
            items:2,
            margin:24
        },
        1024:{
            items:3,
            margin:32
        },
        1600:{
            items:4,
            margin:32
        }
    }
});


$('.projectcarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    loop:true,
    autoWidth:true,
    autoHeight:true,
    items:1,
    nav:true,
    navText: ['<i class="icon icon--chevron-left">', '<i class="icon icon--chevron-right">'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            margin:0
        },
        1024:{
            items:2,
            margin:24
        },
        1200:{
            items:3,
            margin:32
        }
    }
});


