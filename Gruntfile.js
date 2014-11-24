module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
      uglify: {
        options: {
            mangle: false,
            banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        '<%= grunt.template.today("yyyy-mm-dd") %> */'
        },
          my_target: {
              files: {
                'assets/js/min/scripts.min.js': ['assets/js/scripts.js'],
              }
        }
    },
      
    imagemin: {
        dynamic: {
            files: [{
                expand: true,
                cwd: 'assets/images/',
                src: ['**/*.{png,jpg,gif}'],
                dest: 'assets/images/'
            }]
        }
    },
      
    sass: {
        dist: {
            files: {
                'assets/styles/styles.css': 'assets/sass/styles.scss'
            }
        }
    },
      
    autoprefixer: {
        options: {
          browsers: ['last 2 version']
        },
        single_file: {
            src: 'assets/styles/styles.css',
            dest: 'assets/styles/styles.css'
        }
    },
      
    cssmin: {
        combine: {
            files: {
                'assets/styles/styles.min.css': ['assets/styles/styles.css']            
            }
        }
    }, 
    
    ////!!WATCH-LIST!!////  
      
    watch: {

      options: {
        dateFormat: function(time) {
          grunt.log.writeln('Watch completed: ' + (new Date()).toString());
          grunt.log.writeln('Awaiting your next command, master...');
        }
      },
        
        sass: {
            files: ['assets/sass/*.scss'],
            tasks: ['sass']
        },
        
        /*scripts: {
            files: ['assets/js/*.js'],
            tasks: ['uglify']
        },
    
        cssfixmin: {
            files: ['assets/styles/styles.css'],
            tasks: ['autoprefixer','cssmin']
        }*/
    }, 

  });

  // Load plugins.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

  //Task(s).
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('min', ['imagemin','uglify','sass','autoprefixer','cssmin']);

};