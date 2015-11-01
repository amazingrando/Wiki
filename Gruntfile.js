module.exports = function(grunt) {


  // 	=======================================================
  //	We setup some variables for directories
  // 	=======================================================
  var cfg = grunt.file.readJSON('config.json');



  // 	=======================================================
  //	Grunt is a task manager.
  //	This is where we define our tasks.
  // 	=======================================================
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // 	=======================================================
    //	Bower — http://bower.io/
    //
    //	We use bower as a package manager.
    // 	=======================================================

    // Configures grunt-bower-task which pulls down common libraries for use in this project.
    // Libraries to be included can be specified in bower.json in the root of the project repository.
    // Call 'grunt bower:install' to pull down the packages and copy them to the libraries directory.
    // Call 'grunt bower:copy' if the bower packages have been installed and just need to be copied to the libraries directory.
    // This way, you can use 'bower install <whatever> --save', then the command above to copy it over rather
    // than having to modify the bower.json file directly.
    // If this task is not copying over all the files you want it to, you can override the files the are copied
    // via the "exportOverrides" section of the bower.json file. The file should have an example in it to follow.
    bower: {
      // default options used by both targets (install and copy) below.
      options: {
        // drop the "main" files of the component into the libraries path
        targetDir: cfg.projectPath + '/' + cfg.librariesPath,

        // override the default directory structure that will be used in the libraries directory.
        // by default js libraries will be put in libraries/js/component/, css in libraries/css/component/
        // the other default does libraries/component/js/, etc.
        // this just puts everything in a libraries/component/ directory.
        layout: function (type, component, source) {
          return component;
        }
      },

      // create an "install" target, but just use the default options
      install: {
      },

      // create a "copy" target, and disable 'bower install' calls
      copy: {
        options: {
          // don't call bower install for each bower component; only copy from the existing bower component folders
          install: false
        }
      }
    },

    // 	=======================================================
    //	Swig — http://paularmstrong.github.io/swig/
    //
    //	Swig is used to generate HTML.
    // 	=======================================================
    swig: {
      options: {
        data: {'output': grunt.option('output')},
      },
      compile: {
        files: [{
          expand : true,
          flatten: true,
          cwd    : cfg.projectPath + '/' + cfg.swigPath,
          src    : '**/*.swig',
          dest   : cfg.productionPath,
          ext    : '.html',
          extDot : 'last'
        }]
      },
      php: {
        files: [{
          expand : true,
          flatten: true,
          cwd    : cfg.projectPath + '/' + cfg.swigPath,
          src    : '**/*.swig',
          dest   : cfg.deployPath,
          ext    : '.php',
          extDot : 'last'
        }]
      }
    },

    // 	=======================================================
    //	SASS — http://sass-lang.com/
    //
    //	SASS is used to preprocess CSS.
    // 	=======================================================
    sass: {
      dist: {
        files: [{
          expand: true,
          cwd: cfg.projectPath + '/' + cfg.sassPath,
          src: ['*.scss'],
          dest: cfg.productionPath + '/' + cfg.cssPath,
          ext: '.css'
        }]
      }
    },

    // 	=======================================================
    //	Autoprefixer — https://github.com/postcss/autoprefixer
    //
    //	Post-process CSS for older browser support. This allows
    //	CSS to be written using current standards and still be
    //	backwards compatible.
    // 	=======================================================
    autoprefixer: {
      options: {
        browsers: ['last 2 version', 'ie 9', 'ie 10']
      },
      execute: {
        files: [{
          expand: true,
          cwd: cfg.productionPath + '/' + cfg.cssPath,
          src: ['*.css'],
          dest: cfg.productionPath + '/' + cfg.cssPath,
          ext: '.css'
        }]
      }
    },

    // 	=======================================================
    //	JS Hint — http://jshint.com/
    //
    //	Helps keep the quality of the scripts more good. :-)
    // 	=======================================================
    // Options documentation here: http://www.jshint.com/docs/options/
    jshint: {
      // defaults
      options: {
        immed       : true,		// prohibit use of immediate function calls without wrapping parens: function() {}() must be (function() {})();
        latedef     : true,		// prohibit use of variables before they are defined in the given scope.
        noarg       : true,		// prohibit use of arguments.caller and arguments.callee.
        noempty     : true,		// prohibits empty blocks of code: { }
        nonbsp      : true,		// prohibits non-breaking whitespace characters in script files.
        nonew       : true,		// prohibit calls to a constructor without assignment: new MyConstructor();
        undef       : false,	// prohibit use of explicitly undeclared variables
        unused      : false,	// warn when a variable is defined, but not used. Keeps code clean.
        strict      : false,	// require 'use strict' in all functions. Note, this can be implemented with a single wrapper function on a script. Do not call 'use script' in the global scope. See https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions_and_function_scope/Strict_mode
        //lastsemic : true,		// suppresses warnings about missing semi-colons after the last line of code in any block.
        //shadow    : true,		// suppresses warnings about variable shadowing (redeclaring a variable in an inner scope)

        // packaged globals
        browser     : true,
        jquery      : true,

        // custom globals
        globals: {			// specify globals to include (true = assignable)
          gruntImport: false
        }
      },

      // merge the following into the above defaults for debug mode
      debug: {
        options: {
          devel: true
        },
        files: {
          src: [ cfg.projectPath + '/' + cfg.jsPath + '/**/*.js' ]
        }
      }
    },


    // 	=======================================================
    //	Includes — https://github.com/vanetix/grunt-includes
    //
    //	Load one file into another file. Think PHP includes.
    //	Used here to merge our modular scripts.
    // 	=======================================================
    includes: {
      options: {
        includeRegexp: /^(\s*)gruntImport\(['"]([^'"]+)['"]\);/
      },
      debug: {
        options: {
          debug: true
        },
        files: [{
          src     : cfg.projectPath + '/' + cfg.jsPath + '/main.js',
          dest    : cfg.productionPath + '/' + cfg.jsPath,
          flatten : true
        }]
      }
    },

    // 	=======================================================
    //	Uglify — https://github.com/mishoo/UglifyJS/
    //
    //	Minify our scripts.
    // 	=======================================================
    // Configures grunt-contrib-uglify which compresses/minifies javascipt files in
    // the destination directory ('js' by default). This should be run after includes above.
    // This only contains a release target since debugging is made more difficult with uglify.
    uglify: {
      release: {
        files: [{
          expand : true,
          cwd    : cfg.productionPath + '/' + cfg.jsPath,
          src    : '*.js',
          dest   : cfg.productionPath + '/' + cfg.jsPath,
          ext     : '.merged.js'
        }]
      }
    },

    // 	=======================================================
    //	Imagemin — https://github.com/gruntjs/grunt-contrib-imagemin
    //
    //	Minify image files.
    // 	=======================================================
    // Configures grunt-contrib-imagemin to optimize images in place in the images directory ('img' by default).
    imagemin: {
      optimize: {
        files: [{
          expand : true,
          cwd    : cfg.projectPath + '/' + cfg.imgPath,
          src    : [ '**/*.{png,jpg,gif,svg}' ],
          dest   : cfg.productionPath + '/' + cfg.imgPath
        }]
      }
    },


    // 	=======================================================
    //	Watch — https://github.com/gruntjs/grunt-contrib-watch
    //
    //	Run tasks whenever files change.
    // 	=======================================================
    // Configures grunt-contrib-watch to watch various files for changes. If changes occur,
    // certain tasks are fired to keep the project functioning with the most recent changes.
    // All triggered tasks run in debug mode since it is assumed that development is occurring
    // while watch is active.
    watch: {
      options: {
        livereload: true
      },
      // Causes swig template changes to trigger the swig task.
      html: {
        files: [ cfg.projectPath + '/' + cfg.swigPath + '/**/*.swig', cfg.projectPath + '/' + cfg.swigPath + '/**/*.tpl' ],
        tasks: [ 'swig','includereplace:dev','copy:php' ],
        options: {
          nospawn: true
        }
      },
      // Causes scss file changes to trigger scss file compilation and autoprefixer.
      styles: {
        files: [ cfg.projectPath + '/' + cfg.sassPath + '/**/*.scss' ],
        tasks: [ 'sass', 'autoprefixer', 'includereplace:dev','copy:php' ],
        options: {
          nospawn: true
        }
      },
      // Causes script file changes in the source directory to be tested with jshint and processed by includes.
      scripts: {
        files: [ cfg.projectPath + '/' + cfg.jsPath + '/**/*.js' ],
        tasks: [ 'newer:jshint:debug', 'includes:debug','copy:php' ],
        options: {
          nospawn: true
        }
      },
      // Causes image file changes to trigger image optimization
      images: {
        files: [ cfg.projectPath + '/' + cfg.imgPath + '/**/*.{png,jpg,gif,svg}' ],
        tasks: [ 'newer:imagemin','copy:php' ],
        options: {
          nospawn: true
        }
      }
    },

    // 	=======================================================
    //	Copy — https://github.com/gruntjs/grunt-contrib-copy
    //
    //	Configures the grunt-contrib-copy task with deployment options.
    // 	=======================================================
    copy: {
      php: {
        files: [{
          expand: true,
          cwd: cfg.productionPath,
          src: [
            cfg.cssPath + '/*.css',
            cfg.imgPath +'/**.*',
            cfg.jsPath +'/**.js',
            cfg.librariesPath +'/**.*'
          ],
          dest: cfg.deployPath,
          flatten: false
        }]
      },
    },

    // 	=======================================================
    //	Include Replace — https://github.com/alanshaw/grunt-include-replace
    //
    //	Replace variables with real paths, depending on
    //	if we are deploying to dev or live.
    //
    //	@@variable is the pattern.
    // 	=======================================================
    includereplace: {
      dev: {
        options: {
          globals: {
            css : 'css',
            js : 'js',
            libraries : 'libraries',
            img : 'img'
          }
        },
        expand : true,
        src    : [ cfg.productionPath + '/*.html', cfg.productionPath + '/css/main.css', cfg.deployPath + '/*.php', cfg.deployPath + '/css/main.css' ]
      }
    }
  });


  // 	=======================================================
  //	We load the task modules here. Without these, the
  //	tasks above will fail.
  // 	=======================================================
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-includes');
  grunt.loadNpmTasks('grunt-include-replace');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-bower-task');
  grunt.loadNpmTasks('grunt-swig-templates');
  grunt.loadNpmTasks('grunt-newer');


  // 	=======================================================
  //	Here we define the suite(s) of tasks and
  //	assign them a command.
  //
  //	In the terminal type "grunt" to execute the "default" task.
  // 	=======================================================
  var output = grunt.option('output') == 'php' ? 'php' : 'compile';

  grunt.registerTask('default','',function(){
    grunt.log.writeln('NOPE. Please pick a specific grunt task. :-)');
  });
  grunt.registerTask('design', ['swig:compile', 'sass', 'includereplace:dev', 'autoprefixer', 'includes:debug', 'newer:imagemin', 'watch']);

};