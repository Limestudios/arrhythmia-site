module.exports = function(grunt) {

	'use strict';
  
	grunt.initConfig({ 
        
    pkg:grunt.file.readJSON('package.json'),
        
    // combine LESS
    less: {
      production: {
        options: {
          yuicompress: true
        },
        files: {
          '<%= pkg.build %>/css/styles.css':'<%= pkg.source %>/less/styles.less'
        }
      }
    },
    
    // minify JS
    uglify: { 
      production: {
        files: {
          '<%= pkg.build %>/js/pre.min.js':'<%= pkg.source %>/js/pre.js'
        }
      }
    },	
    
    // watch all source files for changes 
    watch: {
      development: {
        files: ['<%= pkg.source %>/**/*.{less,js}'],
        tasks: ['less','uglify']
       }
      }
    
	});
	
	// load plugins; such wow
	grunt.loadNpmTasks('grunt-contrib-watch');	
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify'); 
	
	// register the tasks
	grunt.registerTask('default',['less','uglify']);		
	grunt.registerTask('dev', ['watch:development']);
	grunt.registerTask('build',['less','uglify']);	
	
}