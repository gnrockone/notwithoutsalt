<?php
if (!function_exists('rl_enqueque_scripts')) {
	function rl_enqueue_scripts() {
		//css
     	wp_enqueue_style('normalize', get_template_directory_uri() . '/bower_components/normalize-css/normalize.css', array(), '1.0.0.0', 'all');
		wp_enqueue_style('wordpress-default', get_template_directory_uri() . '/css/wordpress-default.css', array(), '1.0.0.0', 'all');
		wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.3.0', 'all');
		wp_enqueue_style('flexlider', get_template_directory_uri() .'/bower_components/flexslider/flexslider.css', array(), '2.6.0', 'all');
		wp_enqueue_style('animate', get_template_directory_uri() . '/bower_components/wow/css/libs/animate.css', array(), '', 'all');
		//wp_enqueue_style('bootstrap',get_template_directory_uri(). '/bower_components/bootstrap/dist/css/bootstrap.css',array(),'3.3.5','all');
		wp_enqueue_style('bootstrap',get_template_directory_uri(). '/css/bootstrap.css',array(),'3.3.5','all');
		wp_enqueue_style('fonts', get_template_directory_uri(). '/fonts/stylesheet.css',array(),'1.0.0','all');
		wp_enqueue_style('style',get_stylesheet_uri(),array(),'1.0.0','all');
		wp_enqueue_style('all',get_template_directory_uri() .'/css/all.css',array(),'1.0.0','all');
		//js
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'comment-reply' ); 
		//wp_enqueue_script('modernizr', get_template_directory_uri(). '/js/modernizr.js',array('jquery'),'3.3.5',true);
		wp_enqueue_script('flexslider', get_template_directory_uri(). '/bower_components/flexslider/jquery.flexslider-min.js',array('jquery'),'2.6.0',true);
		wp_enqueue_script('bootstrapjs',get_template_directory_uri(). '/js/bootstrap.js',array('jquery'),'3.3.5',true);
		wp_enqueue_script('wowjs', get_template_directory_uri(). '/bower_components/wow/dist/wow.min.js', array('jquery'),'',true);
		//wp_enqueue_script('bootstrapjs',get_template_directory_uri(). '/bower_components/bootstrap/dist/js/bootstrap.js',array('jquery'),'3.3.5',true);
		wp_enqueue_script('masonryjs',get_template_directory_uri(). '/bower_components/masonry/dist/masonry.pkgd.js',array('jquery'), '',true);
		wp_enqueue_script('imagesloadedjs',get_template_directory_uri(). '/bower_components/imagesloaded/imagesloaded.pkgd.js',array('jquery'),'',true);
		wp_enqueue_script('realestjs',get_template_directory_uri(). '/js/realest.js',array(),'1.0.0',true);
	}
}
add_action('wp_enqueue_scripts','rl_enqueue_scripts');
/*
    ==================================================
    | Creating Scripts Function
    ==================================================
 */

//Please retain this for templating/guide
// if (!function_exists('rl_enqueque_scripts')) {
// 	function rl_enqueue_scripts() {
// 		//css
//      	wp_enqueue_style('normalize', get_template_directory_uri() . '/bower_components/normalize-css/normalize.css', array(), '1.0.0.0', 'all');
// 		wp_enqueue_style('wordpress-default', get_template_directory_uri() . '/css/wordpress-default.css', array(), '1.0.0.0', 'all');
// 		wp_enqueue_style('flexlider','/bower_components/flexslider/flexslider.css', array(), '2.6.0', 'all');)
// 		wp_enqueue_style('animate', get_template_directory_uri() . '/bower_components/wow/css/animate.css', array(), '', 'all');
// 		wp_enqueue_style('bootstrap',get_template_directory_uri(). '/bower_components/bootstrap/dist/css/bootstrap.css',array(),'3.3.5','all');
// 		wp_enqueue_style('style',get_stylesheet_uri(),array(),'1.0.0','all');
// 		wp_enqueue_style('all',get_template_directory_uri() .'/css/all.css',array(),'1.0.0','all');
// 		//js
// 		wp_enqueue_script('jquery');
// 		wp_enqueue_script('modernizr', get_template_directory_uri(). '/js/modernizr.js',array('jquery'),'3.3.5',true);
// 		wp_enqueue_script('flexslider', get_template_directory_uri(). '/bower_components/flexslider/jquery.flexslider-min.js',array('jquery'),'2.6.0',true);
// 		wp_enqueue_script('wowjs', get_template_directory_uri(). '/bower_components/wow/dist/wow.min.js', array('jquery'),'',true);
// 		wp_enqueue_script('bootstrapjs',get_template_directory_uri(). '/bower_components/bootstrap/dist/js/bootstrap.js',array('jquery'),'3.3.5',true);
// 		wp_enqueue_script('masonryjs',get_template_directory_uri(). '/bower_components/masonry/dist/masonry.pkgd.js',array('jquery'), '',true);
// 		wp_enqueue_script('imagesloadedjs',get_template_directory_uri(). '/bower_components/imagesloaded/imagesloaded.pkgd.js',array('jquery'),'',true);
// 		wp_enqueue_script('realestjs',get_template_directory_uri(). '/js/realest.js',array(),'1.0.0',true);
// 	}
// }
// add_action('wp_enqueue_scripts','rl_enqueue_scripts');



?>