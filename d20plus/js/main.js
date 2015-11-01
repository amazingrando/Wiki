(function ($) {
  'use strict';

  $(document).ready(function () {
/* Begin: design/js/modules/typekit.js */
    (function(d) {
      var config = {
            kitId: 'jgx0qay',
            scriptTimeout: 3000,
            async: true
          },
          h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
/* End: design/js/modules/typekit.js */
/* Begin: design/js/modules/scroll-to.js */
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