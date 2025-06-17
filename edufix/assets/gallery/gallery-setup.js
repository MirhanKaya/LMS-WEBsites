(function($) {
    "use strict";
    $('.edufix-product-big-img').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: '.edufix-product-small-img'
    });
    $('.edufix-product-small-img').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          asNavFor: '.edufix-product-big-img',
          dots: true,
          arrows: false,
          focusOnSelect: true,
          centerMode: true,
          centerPadding: '60px',
    });
      $('.edufix-spimg').magnificPopup({
        delegate: 'a', 
        type: 'image',
        mainClass: 'mfp-zoom-out', // this class is for CSS animation below
        gallery:{enabled:true},
        zoom: {
          enabled: true, 
          duration: 300,
          easing: 'ease-in-out',
          opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
      });
}(jQuery))