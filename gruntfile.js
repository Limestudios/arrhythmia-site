module.exports = function(grunt) {
  
  'use strict';
  
  var buildDir = '<%= pkg.build %>';
  var sourceDir = '<%= pkg.source %>';
  
  grunt.initConfig({ 
    pkg:grunt.file.readJSON('package.json'),
    less: {
      production: {
        options: {
          yuicompress: true
        },
        files: {
          '<%= pkg.build %>/css/styles.css' : '<%= pkg.source %>/less/styles.less'
        }
      }
    },
    uglify: { 
      production: {
        files: {
          '<%= pkg.build %>/js/pre.min.js':'<%= pkg.source %>/js/pre.js',
          '<%= pkg.build %>/js/post.min.js':'<%= pkg.source %>/js/post.js'
        }
      }
    },	
    watch: {
      development: {
        files: ['<%= pkg.source %>/**/*.{less,js}'],
        tasks: ['less','uglify']
      }
    }
  });
  
  grunt.loadNpmTasks('grunt-contrib-watch');	
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  
  grunt.registerTask('default',['less','uglify']);		
  grunt.registerTask('dev', ['watch:development']);
  grunt.registerTask('build',['less','uglify']);
  
};