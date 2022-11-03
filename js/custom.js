/*------------------------------------File Name: custom.js---------------------------------------------*/



/* Scroll to Top*/

$(window).on('scroll', function () {
   scroll = $(window).scrollTop();
   if (scroll >= 100) {
      $(".main_wrapper").addClass('fixed');
      //$("#reveal1").addClass('visible')
   } else {
      $(".main_wrapper").removeClass('fixed');
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
jQuery(".burger").click(function (e) {
   jQuery(this).toggleClass("opened");
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

   jQuery('.story_slider').slick({
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


