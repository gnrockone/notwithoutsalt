'use strict';
module.exports = function(grunt) {
    var hostProxy = '';
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
                files: ['*.scss','css/*.scss'],
                //files: ['assets/styles/**/*.{scss,sass}','*.scss'],
                tasks: ['sass', 'autoprefixer', 'cssmin'],
                options: {
                    livereload: true,
                }
            },
            js: {
                //files: '<%= jshint.all %>',
                files: ['js/*.js','!js/*.min.js','Gruntfile.js','!js/modernizr.js'],
                tasks: ['jshint', 'uglify']
                //Do not include generated minified to avoid endless loop. Add ! then
            },
            images: {
                //files: ['assets/images/**/*.{png,jpg,gif}'],
                files: ['images/*.{png,jpg,gif}','!images/theme_images/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            php: {
                files: ['*.php'],
                options: {
                    livereload: 35729
                }
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                },
                files: {
                    'style.css' : 'style.scss',
                    'css/all.css' : 'css/*.scss'
                    //'youcanaddmore.css' : 'youcanaddmore.scss'
                    //'directory.css' : 'directory.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 20 versions', 'ie 9', 'ios 6', 'android 4','ie 8','ie 7','Firefox >= 20'],
                map: true
            },
            dist: {
                expand: true,
                flatten: true,
                files: {
                    'style.css' : 'style.css',
                    'css/all.css' : 'css/all.css'
                }
                //src: 'style.css','css/*.css'
                //dest: 'style.css','css/*.css'
            },

        },

        // css minify
        cssmin: {
            options: {
                keepSpecialComments: 1
            },
            // minify: {
            //     expand: true,
            //     cwd: 'assets/styles/build',
            //     src: ['*.css', '!*.min.css'],
            //     ext: '.css'
            // },
            dist: {
                expand: true,
                files: {
                    'style.css' : [
                        'style.css',
                        'css/all.css'
                        ]
                    //'cssdestinatnion.css' : ['csssource.css','csssource2.css','bootstrap.css','more.css']
                }
            }
        },

        // image sprites
        sprite: {
            all: {
                //src: 'assets/images/sprites/*.png',
                //dest: 'assets/images/spritesheet.png',
                //destCss: 'assets/styles/partials/_spritesheet.scss',
                //padding: 30,
                //cssFormat: 'css',
                //imgPath: 'assets/images/spritesheet.png'
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
                //'addmoresource.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            plugins: {
                options: {
                    sourceMap: true, //if true. generate the map on where the files created
                    preserveComments: 'some',
                    //sourceMapPrefix: 2
                },
                files: {
                    'js/realest.min.js': [
                        'js/realest.js'
                        //'addmorefiles.js'
                    ]
                }
            },
            //you can add more plugins, just copy format, change plugins name into other name
        },

        // image optimization
        imagemin: {
            // dist: {
            //     options: {
            //         optimizationLevel: 7,
            //         progressive: true,
            //         interlaced: true
            //     },
            //     files: [{
            //         expand: true,   // Enable dynamic expansion
            //         cwd: '../../uploads/',   // Src matches are relative to this path
            //         src: ['**/*.{png,jpg,gif}'],    // Actual patterns to match
            //         dest: '../../uploads/'  // Destination path prefix
            //     }]
            // },
            themeimage: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,   // Enable dynamic expansion
                    cwd: 'images/',   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],    // Actual patterns to match
                    dest: '../../uploads/'  // Destination path prefix
                }]
            }
        },

        // browserSync
        browserSync: {
            dev: {
                bsFiles: {
                    src : ['style.css', 'js/*.js', '../../uploads/*.{png,jpg,jpeg,gif,webp,svg}','css/all.css','*.php']
                },
                options: {
                    //proxy: "local.dev",
                    proxy: hostProxy,
                    //proxy: 'hostalias'
                    watchTask: true,
                    browser: "google chrome"
                }
            }
        },

        // deploy via rsync
        deploy: {
            options: {
                src: "./",
                args: ["--verbose"],
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc'],
                recursive: true,
                syncDestIgnoreExcl: true
            },
            staging: {
                 options: {
                    dest: "~/path/to/theme",
                    host: "user@host.com"
                }
            },
            production: {
                options: {
                    dest: "~/path/to/theme",
                    host: "user@host.com"
                }
            }
        }

    });

    // Load in `grunt-spritesmith`
    grunt.loadNpmTasks('grunt-spritesmith');

    // rename tasks
    grunt.renameTask('rsync', 'deploy');

    // register task
    grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'imagemin', 'browserSync', 'watch']);

};
