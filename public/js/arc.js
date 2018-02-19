(function($) {
  // body...
   "use strict"; // Start of use strict

   // Highlight the top nav as scrolling occurs
   $('body').scrollspy({
    target: 'fixed-top',
    offset: 51

   })

   // Offset for Main Navigation
   $(window).on('scroll', function (event) {
     // body...
     var scrollValue = $(window).scrollTop();
     if (scrollValue > 120) {
      $('.navbar-custom').addClass('affix');
     } else {
        $('.navbar-custom').removeClass('affix');  
     }
   })

})(jQuery);