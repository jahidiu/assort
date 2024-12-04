var swiper = new Swiper(".heroSlider", {
   loop: true,
   autoplay: true,
   speed: 2000,
   allowTouchMove: true,
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
      position: "left",
   },
});

$(document).ready(function () {
   $(".owl-carousel.ongoing-project-slider").owlCarousel({
      items: 4,
      loop: false,
      autoplay: true,
      autoplayHoverPause: true,
      speed: 1000,
      margin: 20,
      nav: true,
      navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
      dots: true,
      responsive: {
         0: {
            items: 1,
            nav: false,
         },
         420: {
            items: 2,
            nav: false,
         },
         576:{
            nav: true,
            items: 2,
         },
         767: {
            items: 3,
         },
         991: {
            items: 4,
         },
         1300: {
            items: 5,
         },
         1500: {
            items: 6,
         },
      },
   });
});

$(document).ready(function () {
   $(".owl-carousel.upcoming-project-slider").owlCarousel({
      items: 4,
      loop: false,
      autoplay: true,
      autoplayHoverPause: true,
      speed: 1000,
      margin: 20,
      nav: true,
      navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
      dots: true,
      responsive: {
         0: {
            items: 1,
            nav: false,
         },
         375: {
            items: 1.5,
            nav: false,
         },
         480: {
            items: 2,
         },
         576:{
            items: 2,
            nav: true,
         },
         767: {
            items: 3,
         },
         991: {
            items: 4,
         },
         1300: {
            items: 5,
         },
         1500: {
            items: 6,
         },
      },
   });
});

$(document).ready(function () {
   $(".owl-carousel.completed-project-slider").owlCarousel({
      items: 4,
      loop: false,
      autoplay: true,
      autoplayHoverPause: true,
      speed: 1000,
      margin: 20,
      nav: true,
      navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
      dots: true,
      responsive: {
         0: {
            items: 1,
            nav: false,
         },
         375: {
            items: 1.5,
            nav: false,
         },
         480: {
            items: 2,
            nav: false,
         },
         576: {
            nav: true,
            items: 2,
         },
         767: {
            items: 3,
         },
         991: {
            items: 4,
         },
         1300: {
            items: 5,
         },
         1500: {
            items: 6,
         },
      },
   });
});

$(document).ready(function () {
   $(".owl-carousel.similar-project-slider").owlCarousel({
      items: 4,
      loop: false,
      autoplay: true,
      autoplayHoverPause: true,
      speed: 1000,
      margin: 20,
      nav: true,
      navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
      dots: true,
      responsive: {
         0: {
            items: 1,
            nav: false,
         },
         576: {
            items: 2,
            nav: true,
         },
         767: {
            items: 3,
         },
         991: {
            items: 4,
         },
         1300: {
            items: 5,
         },
         1500: {
            items: 6,
         },
      },
   });
});

$(document).ready(function () {
   $(".owl-carousel.testimonial-section").owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      speed: 1000,
      nav: false,
      dots: true,
   });
});

$(window).on("load", function () {
   if (!localStorage.getItem("shown-modal")) {
      $("#anniversaryModal").modal("show");
      localStorage.setItem("shown-modal", "true");
   }
});

$(document).ready(function () {
   $(".thumbnail").on("click", function (e) {
      e.preventDefault();
      let clicked = $(this);
      let newSelection = clicked.data("big");
      let $img = $(".main-image").css(
         "background-image",
         "url(" + newSelection + ")"
      );
      $(".thumbnail").removeClass("selected");
      clicked.addClass("selected");
      $(".main-image").empty().append($img.hide().fadeIn("slow"));
   });
});

$(document).ready(function () {
   $(".image-gallery").magnificPopup({
      delegate: ".masonry a.brick",
      type: "image",
      gallery: {
         enabled: true,
      },
   });
});
$(document).ready(function () {
   $(".video-gallery").magnificPopup({
      delegate: "a",
      type: "iframe",
      gallery: {
         enabled: false,
      },
   });
});

$(document).ready(function () {
   $(".gallery_page").magnificPopup({
      delegate: ".masonry a.brick",
      type: "image",
      gallery: {
         enabled: true,
      },
   });
});

$(document).ready(function () {
   $(".top_cta_video").magnificPopup({
      delegate: "a.video_item",
      type: "iframe",
      gallery: {
         enabled: false,
      },
   });
});

// Project Details Zoom
$(function () {
   $(".xzoom, .xzoom-gallery").xzoom({
      zoomWidth: 320,
      zoomHeight: 320,
      tint: "#333333",
      position: "lens",
   });
});

// Headroom

$(document).ready(function () {
   var Header = document.querySelector("header");
   var headroom = new Headroom(Header, {
      offset: 50,
      tolerance: 5,
   });
   headroom.init();
});

$(document).ready(function () {
   $(".single-project-container.tilt").tilt({
      maxTilt: 10,
      perspective: 1000,
      easing: "cubic-bezier(.03,.98,.52,.99)",
      speed: 200,
   });
});

$(document).ready(function () {
   AOS.init({
      duration: 2000,
   });
});

$(document).ready(function () {
   $(".single-project-container.tilt").trigger("mouseenter");
});


$(".image-gallery .thumbnails").owlCarousel({
   items: 5,
   nav: false,
   dots: false,
});

// nav tabs customization

$(document).ready(function() {
   $(".project-tablist .nav-tabs button").click(function() {
     var position = $(this).parent().position();
     var width = $(this).parent().width();
     $(".project-tablist .slider").css({"left": position.left, "width": width});
   });
 
   var activeTab = $(".project-tablist .nav-tabs .active").parent("li");
   if (activeTab.length > 0) {
     var actWidth = activeTab.width();
     var actPosition = activeTab.position();
     $(".project-tablist .slider").css({"left": actPosition.left, "width": actWidth});
   }
 });
 