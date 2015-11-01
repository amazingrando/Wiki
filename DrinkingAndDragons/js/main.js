(function ($) {
  'use strict';

  $(document).ready(function () {
/* Begin: design/js/modules/scroll-to.js */
    console.log('My update worked!');
    var $root = $('html, body'),
        offset = 0;

    $('a[href*=#]:not([href=#])').click(function() {
      var href = $.attr(this, 'href');

      $root.animate({
        scrollTop: $(href).offset().top - offset
      }, function () {
        window.location.hash = href;
      });

      return false;
    });

    var t = window.location.hash;
    if (t) {
      $root.animate({
        scrollTop: $(t).offset().top - offset
      });
    }/* End: design/js/modules/scroll-to.js */
  });

})(jQuery);