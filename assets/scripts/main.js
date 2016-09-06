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

(function($) {})(jQuery); // Fully reference jQuery after this point.

$(document).foundation();

Pace.on('done', function() {
  $('.top-bar').removeClass('darkened');
});

$.each($('.card, .membersquare, .projectsquare, .clientlogo'), function(i, el){
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
    $('.menu-the-work a' ).addClass('active');
    $('.menu-item').each(function() {
      if ( $(this).find('a').attr('href').substring(0, 1) === '#') {
       $(this).find('a').attr('href', $('.homelogo').attr('href') + $(this).find('a').attr('href') );
      }
    });
    //$('.primarynav').foundation('reflow');
  }

  $('input[type=text], input[type=email]').on('change', function(){
      if ( $(this).val() !== '' ) {
        $(this).addClass('filled');
      } else {
        $(this).removeClass('filled');
      }
  });


  $('a').click(function(e) {
    if ( ($(this).attr('href').substr(0,1)!=='#') && ($(this).attr('href').substr(0,6)!=='mailto') && (!$(this).hasClass('popimg'))
        ) {
      e.preventDefault();
      $('.top-bar').addClass('darkened');
      $('.document').addClass('docfade');
      window.location.href = $(this).attr('href');
    }
  });


  $('.document').removeClass('docfade');


  resizeProjectCarousel();


  //Home intra accordion control

  $('.homeintromore, .whatwedoclose').on('click', function(e) {
    e.preventDefault();
    $('#intro').foundation('toggle', $('#introblock'));
    $('#intro').foundation('toggle', $('#whatwedo'));
    //$('.keyboard').toggleClass('is-hidden');
  });



  //popimg Gallery popup
  $('.whatwedogrid').magnificPopup({
    delegate: 'a.popimg',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title') + '<small>by Spire</small>';
      }
    }
  });


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
    if (section.attr('id')==='approach') {
      $('.keyboard').addClass('active');
    }
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
        }
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.left').addClass('pressed');
        }
        $('.keyboard .button.left').addClass('pressed');
      break;
      case 39:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.right').addClass('pressed');
        }
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.right').addClass('pressed');
        }
        $('.keyboard .button.right').addClass('pressed');
      break;

    }
});

$(document.documentElement).keyup(function(event) {
    $('.realkeyboard .btn').removeClass('pressed');
    $('.keyboard .button').removeClass('pressed');
    switch (event.keyCode) {
      case 38:
      if ( $('body').hasClass('page-template-tmpl-home') ) {
        $('.primarynav').foundation('scrollToLoc', $('.realkeyboard .btn.up').attr('href'));
      }
      break;
      case 40:
      if ( $('body').hasClass('page-template-tmpl-home') ) {
        $('.primarynav').foundation('scrollToLoc', $('.realkeyboard .btn.down').attr('href'));
      }
      break;
      case 37:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.left').click();
        }
        if ($('.single-project .primarynav .menu-the-work a').hasClass('active')) {
          $('.realkeyboard .btn.left').click();
        }
      break;
      case 39:
        if ($('.primarynav .menu-about a').hasClass('active')) {
          $('.realkeyboard .btn.right').click();
        }
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



var whatwedocarousel = $('.whatwedocarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    //autoWidth:true,
    // mouseDrag:false,
    // touchDrag:false,
    // pullDrag:false,
    autoHeight:true,
    loop:true,
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
    }
});

var processcarousel = $('.processcarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    //autoWidth:true,
    // mouseDrag:false,
    // touchDrag:false,
    // pullDrag:false,
    autoHeight:true,
    loop:true,
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
        1024:{
            items:2,
            margin:32
        }
    }

});


var aboutcarousel = $('.aboutcarousel').owlCarousel({
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
    itemElement: 'section'
});


var projectcarousel = $('.projectcarousel').owlCarousel({
    //margin:32,
    smartSpeed:500,
    loop:true,
    autoWidth:true,
    autoHeight:true,
    items:1,
    nav:false,
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
    case 'project':
      projectcarousel.trigger('prev.owl.carousel');
    break;
  }
});

$('.btn.right').click(function(e){
  e.preventDefault();
  var owltarget = $(this).attr('data-owltarget');
  switch (owltarget) {
    case 'about':
      aboutcarousel.trigger('next.owl.carousel');
    break;
    case 'project':
      projectcarousel.trigger('next.owl.carousel');
    break;
  }
});







