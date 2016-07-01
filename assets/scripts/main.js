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

$('document').ready(function() {
});


$('.top-bar-right').on('update.zf.magellan', function() {
  var section = $( $('.primarynav a.active').attr('href') );
  var prevsection = section.prev('main > section').attr('id');
  var nextsection = section.next('main > section').attr('id');
  prevsection = !prevsection?'topmagellan':prevsection;
  $('.keyboard .button.up').attr('href','#' + prevsection);
  $('.keyboard .button.down').attr('href','#' + nextsection);
  $('.keyboard').removeClass('active');
  if (section.attr('id')==='about') {
    //$('.button.left, .button.right').attr('data-owltarget','about');
    $('.keyboard').addClass('active');
  };
  // if (section.attr('id')==='process') {
  //   $('.button.left, .button.right').attr('data-owltarget','process');
  //   $('.keyboard').addClass('active');
  // };
});


$(document.documentElement).keyup(function(event) {

    switch (event.keyCode) {
      case 38:
        $('.primarynav').foundation('scrollToLoc', $('.keyboard .button.up').attr('href'));
        // $('.keyboard .button.up').click();
      break;
      case 40:
        $('.primarynav').foundation('scrollToLoc', $('.keyboard .button.down').attr('href'));
        // $('.keyboard .button.down').click();
      break;
      case 37:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.keyboard .button.left').click();
        }
      break;
      case 39:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.keyboard .button.right').click();
        }
      break;

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



function processarrowsupdate(event) {
  //$('.primarynav').foundation('reflow');
  // alert('Page Count:' + event.page.count + 'Page Index:' + event.page.index + 'Page Size:' + event.page.size);
  if (event.item.index === 0) { //first item of carousel
    //alert('eleje');
    $('.button.left').attr('data-owltarget','about');
  } else if (event.page.count === (event.page.index + 1) ) { //last pago of carousel
    //alert('vége');
    $('.button.right').attr('data-owltarget','about');
  }
}


function whatarrowsupdate(event) {
  //$('.primarynav').foundation('reflow');
  // alert('Page Count:' + event.page.count + 'Page Index:' + event.page.index + 'Page Size:' + event.page.size);
  if (event.item.index === 0) { //first item of carousel
    //alert('eleje');
    $('.button.left').attr('data-owltarget','about');
  } else if (event.page.count === (event.page.index + 1) ) { //last pago of carousel
    //alert('vége');
    $('.button.right').attr('data-owltarget','about');
  }
}


$('.whatwedocarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    //autoWidth:true,
    // mouseDrag:false,
    // touchDrag:false,
    // pullDrag:false,
    autoHeight:true,
    loop:false,
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
        }
    },
    onChanged: whatarrowsupdate
});
var whatwedocarousel = $('.whatwedocarousel').owlCarousel();

$('.processcarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    //autoWidth:true,
    // mouseDrag:false,
    // touchDrag:false,
    // pullDrag:false,
    autoHeight:true,
    loop:false,
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
        }
    },
    onChanged: processarrowsupdate
});
var processcarousel = $('.processcarousel').owlCarousel();


function aboutarrowsupdate(event) {
  //$('.primarynav').foundation('reflow');
  // alert('Page Count:' + event.page.count + 'Page Index:' + event.page.index + 'Page Size:' + event.page.size);
  switch (event.page.index) {
    case 1 : //whatwedo section is active
      // if ($('.whatwedocarousel .owl-prev').hasClass('disabled') ) {
      //   $('.button.left').attr('data-owltarget','about');
      // } else {
      //   $('.button.left').attr('data-owltarget','whatwedo');
      // };
      // if ($('.whatwedocarousel .owl-next').hasClass('disabled') ) {
      //   $('.button.right').attr('data-owltarget','about');
      // } else {
        $('.button.left, .button.right').attr('data-owltarget','whatwedo');
      // };
    break;
    case 2: //process section is active
      // if ($('.processcarousel .owl-prev').hasClass('disabled') ) {
      //   $('.button.left').attr('data-owltarget','about');
      // } else {
      //   $('.button.left').attr('data-owltarget','process');
      // };
      // if ($('.processcarousel .owl-next').hasClass('disabled') ) {
      //   $('.button.right').attr('data-owltarget','about');
      // } else {
        $('.button.left, .button.right').attr('data-owltarget','process');
      // };
    break;
    default:
      $('.button.left, .button.right').attr('data-owltarget','about');
  }
}





$('.aboutcarousel').owlCarousel({
    smartSpeed:500,
    margin:30,
    autoHeight:true,
    loop:true,
    mouseDrag:false,
    touchDrag:false,
    pullDrag:false,
    items:1,
    nav:false,
    navText: ['<i class="icon icon--chevron-left">', '<i class="icon icon--chevron-right">'],
    itemElement: 'section',
    onChanged: aboutarrowsupdate

});
var aboutcarousel=$('.aboutcarousel').owlCarousel();






$('.button.up, .button.down').on('click', function(e){
  e.preventDefault();
  $('.primarynav').foundation('scrollToLoc', $(this).attr('href'));
});

$('.button.left').on('click', function(e){
  e.preventDefault();
  var owltarget = $(this).attr('data-owltarget');
  switch (owltarget) {
    case 'about':
      aboutcarousel.trigger('prev.owl.carousel');
    break;
    case 'whatwedo':

      if ($('.whatwedocarousel .owl-prev').hasClass('disabled')) {
        //aboutcarousel.trigger('to.owl.carousel', 0);
        $('.button.left' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 2);
        whatwedocarousel.trigger('prev.owl.carousel');
      }
    break;
    case 'process':
      if ($('.processcarousel .owl-prev').hasClass('disabled')) {
        //aboutcarousel.trigger('to.owl.carousel', 1);
        $('.button.left' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 3);
        processcarousel.trigger('prev.owl.carousel');
      }
    break;
  };
});

$('.button.right').click(function(e){
  e.preventDefault();
  var owltarget = $(this).attr('data-owltarget');
  switch (owltarget) {
    case 'about':
      aboutcarousel.trigger('next.owl.carousel');
    break;
    case 'whatwedo':

        if ($('.whatwedocarousel .owl-next').hasClass('disabled')) {
          //aboutcarousel.trigger('to.owl.carousel', 2);
          $('.button.right' ).attr('data-owltarget','about');
          $(this).click();
        } else {
          aboutcarousel.trigger('to.owl.carousel', 0);
          whatwedocarousel.trigger('next.owl.carousel');
        }
    break;
    case 'process':

      if ($('.processcarousel .owl-next').hasClass('disabled')) {
        //aboutcarousel.trigger('to.owl.carousel', 3);
        $('.button.right' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 1);
        processcarousel.trigger('next.owl.carousel');
      }
    break;
  };
});

var projectcarousel = $('.projectcarousel').owlCarousel({
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



