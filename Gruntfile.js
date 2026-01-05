// Gruntfile.js
// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function(grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({

    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.grunt_name)
    pkg: grunt.file.readJSON('package.json'),
	
	banner: '/*!\n' +
            ' * Bootstrap 4 Admin Theme v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright 2016-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' * License: Propeller Pro Developer License \n' +
	  		' * License URI: https://pro.propeller.in/propeller-pro-developer-license/ \n' +
            ' */\n',
	
	// Task configuration.
	clean: {
	  archive: 'archive',
    },
	concat: {
      options: {
		  stripBanners: false
      },
      MargeJs: {
		  src: [
				'assets/js/vendors/jquery/jquery-3.3.1.min.js',
			  'assets/js/vendors/jquery/jquery-3.3.1.min.js',
			  'assets/js/vendors/popper/popper.min.js',
				'assets/js/vendors/bootstrap/bootstrap.min.js',
				'assets/js/vendors/propeller/propeller.min.js'
			],
		  dest: 'assets/js/<%= pkg.name %>-compress.js'
      },
      MargeCSS: {
		  src: [
				'assets/css/vendors/booststrap/bootstrap.min.css',
				'assets/css/vendors/propeller/propeller.min.css',
				'assets/css/impactery.min.css'
		  ],
		  dest: 'assets/css/<%= pkg.name %>-compress.css'
      }
    },
	uglify: {
    	MinJs: {
		  options: {
			banner: '<%= banner %>',
			compress: {
			  warnings: false
			},
			mangle: true,
			preserveComments:'some'
		  },
		src: '<%= concat.MargeJs.dest %>',
        dest: 'assets/js/<%= pkg.name %>-compress.min.js'
      }
    },
	sass: {
        options: {
            sourceMap: true,
			outputStyle: 'expanded'
        },
        dist: {
            files: [
				{
					expand: true, // Recursive
					cwd: 'scss/', // The startup directory
					src: '**/*.scss', // Source files
					dest: 'assets/css/',
					ext: ".css" // File extension 
        }	
			]
        }
    },
	cssmin: {
      options: {
  	    compatibility: 'ie8',
        keepSpecialComments: 0,
        advanced: false,
      },
	  MinCss: {
	    src: 'assets/css/impactery.css',
        dest: 'assets/css/impactery.min.css'
      }
    },  
	copy: {
      theme: {
		expand: true,
		cwd: '',
		src: ['**',
			  '!.git/**',
			  '!node_modules/**',
			  '!.htaccess',
			  '!*.json',
			  '!README.md',
			  '!themes/css/<%= pkg.name %>-compress.min.css',
			  '!themes/css/<%= pkg.name %>-compress.css',
			  '!themes/js/<%= pkg.name %>-compress.min.js',
			  '!themes/js/<%= pkg.name %>-compress.js',
			  '!themes/css/propeller-topbar.css',
			  '!themes/js/propeller-topbar.js',
			  '!iframe.html',
			  ],
		dest: 'archive/pmd-<%= pkg.name %>-theme-1.0.0/',
	  }
	},
	processhtml: {
	  theme:{
		options: {
		  process: true,
		},
		files: [
			{
			  expand: true,
			  cwd: 'archive/pmd-<%= pkg.name %>-theme-1.0.0/',
			  src: '*.html',
			  dest: 'archive/pmd-<%= pkg.name %>-theme-1.0.0/',
			  ext: '.html'
			},
		],
	  },
	},
	compress: {
		options: {
			archive: 'archive/pmd-<%= pkg.name %>-theme-1.0.0.zip',
			mode: 'zip',
			level: 9,
			pretty: true
		},
		files: {
			expand: true,
			cwd: 'archive/pmd-<%= pkg.name %>-theme-1.0.0',
			src: ['**',
				  '!snippets/**'
				 ],
			dest: 'pmd-<%= pkg.name %>-theme-1.0.0'
		}
	},
	watch: {
		css: {
			files: ['<%= concat.MargeJs.src %>', '<%= concat.MargeCSS.src %>','**/*.scss','Gruntfile.js'],
			tasks: ['sass', 'uglify', 'cssmin']
		}
	},  
	stamp: {
		yourTarget: {
			options: {
				banner: '<%= banner %>',
			},	
			files: {
				src: '<%= cssmin.propellerMinCss.dest %>'
			}
		}
	},
  });
  
  // Project configuration.
  grunt.util.linefeed = '\n';
  
  // this default task will go through all configuration (dev and production) in each task 
  grunt.registerTask('default', ['clean', 'copy', 'processhtml', 'compress']);

  grunt.registerTask('dev', ['watch']);

  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // we can only load these if they are in our package.json
  // make sure you have run npm install so our app can find these
  
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-processhtml');
  grunt.loadNpmTasks('grunt-stamp');
};
