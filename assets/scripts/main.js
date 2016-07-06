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


Pace.on('done', function() {
  $('.top-bar').removeClass('darkened');
});

$.each($('.membersquare, .projectsquare, .clientlogo'), function(i, el){
  $(el).addClass('fadeInUp wow').attr('data-wow-delay', i%5*125 + 'ms');
});

function resizeProjectCarousel() {
  if (window.innerWidth>=768 && $('.projectheadrow').innerHeight()<420 ) {
    $('.projectcarousel img').css('max-height', function() {
      return (window.innerHeight>720)?(window.innerHeight - $('.projectheadrow').outerHeight()  - 90 ):400 ;
    });
    $('.projectcarousel .owl-stage-outer').css('max-height', function() {
      return (window.innerHeight>720)?(window.innerHeight - $('.projectheadrow').outerHeight()  - 90 ):400 ;
    });
  } else {
    $('.projectcarousel img').css('max-height', function() {
      return 'none';
    });
    $('.projectcarousel .owl-stage-outer').css('max-height', function() {
      return 'none' ;
    });
  }
}

$('document').ready(function() {

  //tweaking main navigation #-ed elemets on non home pages
  if ( !$('body').hasClass('page-template-tmpl-home') ) {
    $('.menu-item').each(function() {
      if ( $(this).find('a').attr('href').substring(0, 1) === '#') {
       $(this).find('a').attr('href', $('.homelogo').attr('href') + $(this).find('a').attr('href') );
      }
    });
  };

  $('input[type=text], input[type=email]').on('change', function(){
      if ( $(this).val() !== '' ) {
        $(this).addClass('filled');
      } else {
        $(this).removeClass('filled');
      }
  });


  $('a').click(function(e) {
    if ($(this).attr('href').substr(0,1)!=='#') {
      e.preventDefault();
      $('.top-bar').addClass('darkened');
      $('.document').addClass('docfade');
      window.location.href = $(this).attr('href');
    }
  });


  $('.document').removeClass('docfade');


  resizeProjectCarousel();

});

$( window ).on('resize', function() {
  resizeProjectCarousel();
});


$('.menu-item a').on('click', function(){
  if (window.innerWidth<768) {
    $('.menu-icon').click();
  }
});

$('.top-bar-right').on('update.zf.magellan', function() {
  var section = $( $('.primarynav a.active').attr('href') );
  var prevsection = section.prev('main > section').attr('id');
  var nextsection = section.next('main > section').attr('id');
  prevsection = !prevsection?'work':prevsection;
  setTimeout(function() {
    $('.realkeyboard .btn.up').attr('href','#' + prevsection);
    $('.realkeyboard .btn.down').attr('href','#' + nextsection);
    $('.keyboard').removeClass('active');
    if (section.attr('id')==='about') {
      $('.keyboard').addClass('active');
    };
  },500);
});

$(document.documentElement).keydown(function(event) {
    switch (event.keyCode) {
      case 38:
        $('.realkeyboard .btn.up').addClass('pressed');
      break;
      case 40:
        $('.realkeyboard .btn.down').addClass('pressed');
      break;
      case 37:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.left').addClass('pressed');
        };
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.left').addClass('pressed');
        }
      break;
      case 39:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.right').addClass('pressed');
        };
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.right').addClass('pressed');
        }
      break;

    }
});

$(document.documentElement).keyup(function(event) {
    $('.realkeyboard .btn').removeClass('pressed');
    switch (event.keyCode) {
      case 38:
        $('.primarynav').foundation('scrollToLoc', $('.realkeyboard .btn.up').attr('href'));
      break;
      case 40:
        $('.primarynav').foundation('scrollToLoc', $('.realkeyboard .btn.down').attr('href'));
      break;
      case 37:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.left').click();
        };
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.left').click();
        }
      break;
      case 39:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.right').click();
        };
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.right').click();
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
  if (event.item.index === 0) { //first item of carousel
    $('.btn.left').attr('data-owltarget','about');
  } else if (event.page.count === (event.page.index + 1) ) { //last pago of carousel
    $('.btn.right').attr('data-owltarget','about');
  }
}


function whatarrowsupdate(event) {
  if (event.item.index === 0) { //first item of carousel
    $('.btn.left').attr('data-owltarget','about');
  } else if (event.page.count === (event.page.index + 1) ) { //last pago of carousel
    $('.btn.right').attr('data-owltarget','about');
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
  switch (event.page.index) {
    case 1 : //whatwedo section is active
        $('.button.left, .button.right').attr('data-owltarget','whatwedo');
        $('.btn.left, .btn.right').attr('data-owltarget','whatwedo');
    break;
    case 2: //process section is active
        $('.button.left, .button.right').attr('data-owltarget','process');
        $('.btn.left, .btn.right').attr('data-owltarget','process');
    break;
    default:
      $('.button.left, .button.right').attr('data-owltarget','about');
      $('.btn.left, .btn.right').attr('data-owltarget','about');
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






$('.btn.up, .btn.down').on('click', function(e){
  e.preventDefault();
  $('.primarynav').foundation('scrollToLoc', $(this).attr('href'));
});

$('.button.left').on('click', function(e){
  e.preventDefault();
  $('.btn.left').click();
});

$('.button.right').on('click', function(e){
  e.preventDefault();
  $('.btn.right').click();
});

$('.btn.left').on('click', function(e){
  e.preventDefault();
  var owltarget = $(this).attr('data-owltarget');
  switch (owltarget) {
    case 'about':
      aboutcarousel.trigger('prev.owl.carousel');
    break;
    case 'whatwedo':

      if ($('.whatwedocarousel .owl-prev').hasClass('disabled')) {
        //aboutcarousel.trigger('to.owl.carousel', 0);
        $('.btn.left' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 2);
        whatwedocarousel.trigger('prev.owl.carousel');
      }
    break;
    case 'process':
      if ($('.processcarousel .owl-prev').hasClass('disabled')) {
        //aboutcarousel.trigger('to.owl.carousel', 1);
        $('.btn.left' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 3);
        processcarousel.trigger('prev.owl.carousel');
      }
    break;
    case 'project':
      if ($('.projectcarousel .owl-prev').hasClass('disabled')) {

      } else {
        projectcarousel.trigger('prev.owl.carousel');
      }
    break;
  };
});

$('.btn.right').click(function(e){
  e.preventDefault();
  var owltarget = $(this).attr('data-owltarget');
  switch (owltarget) {
    case 'about':
      aboutcarousel.trigger('next.owl.carousel');
    break;
    case 'whatwedo':

        if ($('.whatwedocarousel .owl-next').hasClass('disabled')) {
          $('.btn.right' ).attr('data-owltarget','about');
          $(this).click();
        } else {
          aboutcarousel.trigger('to.owl.carousel', 0);
          whatwedocarousel.trigger('next.owl.carousel');
        }
    break;
    case 'process':

      if ($('.processcarousel .owl-next').hasClass('disabled')) {
        $('.btn.right' ).attr('data-owltarget','about');
        $(this).click();
      } else {
        aboutcarousel.trigger('to.owl.carousel', 1);
        processcarousel.trigger('next.owl.carousel');
      }
    break;
    case 'project':
      if ($('.projectcarousel .owl-next').hasClass('disabled')) {

      } else {
        projectcarousel.trigger('next.owl.carousel');
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
        768:{
            items:2,
            margin:24
        },
        1200:{
            items:3,
            margin:32
        }
    }
});



