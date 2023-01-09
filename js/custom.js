/*------------------------------------File Name: custom.js---------------------------------------------*/



/* Scroll to Top*/

$(window).on('scroll', function () {
   scroll = $(window).scrollTop();
   if (scroll >= 100) {
      $(".main_wrapper").addClass('fixed');
      $('.header-sticky').addClass('header-scrolled');
      $('.header_main').addClass('fadeOutUp');
      $('.header_main').removeClass('fadeInDown');
      $('.header-sticky').addClass('fadeInDown');
      $('.header-sticky').removeClass('fadeOutUp');
      $('.header-sticky').addClass('animated');
      //$("#reveal1").addClass('visible')
   } else {
      $(".main_wrapper").removeClass('fixed');
      $('.header-sticky').removeClass('header-scrolled');
      $('.header_main').addClass('fadeInDown');
      $('.header_main').removeClass('fadeOutUp');
      $('.header-sticky').addClass('fadeOutUp');
      $('.header-sticky').removeClass('fadeInUp');
      //$("#reveal1").removeClass('visible')
   }
});


$(window).scroll(function () {
   if ($(this).scrollTop() > 100) {
      $('#scroll').fadeIn();
      $('#scroll').addClass("active");
   } else {
      $('#scroll').fadeOut();
      $('#scroll').removeClass("active");
   }
});
$('#scroll').click(function () {
   $("html, body").animate({ scrollTop: 0 }, 600);
   return false;
});
jQuery(".navTrigger").click(function (e) {
   jQuery(this).toggleClass("active");
   jQuery(".toggle_box").toggleClass("toggled");
   jQuery(".menu_blog").toggleClass("toggled");
   e.preventDefault();
});




jQuery(document).ready(function ($) {
   jQuery('.slider_box1').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [{
         breakpoint: 1100,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      },
      {
         breakpoint: 900,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      },
      {
         breakpoint: 400,
         settings: {
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1
         }
      }]
   });

   jQuery('.story_slider1').slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      Speed: 800,
      autoplaySpeed: 3000,
      arrows: false,
      vertical: true,
      draggable: false,
      touchMove: false,
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
      responsive: [{
         breakpoint: 1100,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      },
      {
         breakpoint: 900,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      },
      {
         breakpoint: 400,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      }]
   });
});

//smoothscroll

$(document).on('click', 'a[href^="#"]', function (event) {
   //alert("vdfvd");
   event.preventDefault();

   $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top
   }, 500);
});




$(document).ready(function(){

        var list = $(".gallery_zoom .grid-item1");
        var numToShow = 6;
        var button = $("#see_more");
        var numInList = list.length;
        list.hide();
        if (numInList > numToShow) {
          button.show();
        }
        list.slice(0, numToShow).show();
  
        button.click(function(){
            var showing = list.filter(':visible').length;
            list.slice(showing - 1, showing + numToShow).fadeIn();
            var nowShowing = list.filter(':visible').length;
            if (nowShowing >= numInList) {
              button.hide();
            }
        });

// //////

 new Swiper('.story_slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
     navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });


//  $('.tilt').tilt({

//     scale: 1.1,

//     glare: true,

//   maxGlare: 0.3

// });
  
  });