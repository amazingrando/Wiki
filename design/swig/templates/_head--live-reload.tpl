<script>
  // 	==================================================================
  //	FOR PRODUCTION ONLY — we load a script that keep the page refreshed
  //	as changes are made.
  // 	==================================================================

  if (location.host == '{{'foo.ar.dev'}}') {
    $.getScript( '//localhost:35729/livereload.js' )
        .done(function( script, textStatus ) {
          console.log('livereload.js is up and running. The grunt watch task will keep the page fresh as you make edits.');
        });
  } else {
    console.log('livereload.js did not load and the grunt watch task will not refresh the page. Are you on a dev domain?');
  }
  // 	END ===============================================================
</script>
