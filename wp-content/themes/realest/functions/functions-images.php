<?php
/*
	==================================================
	| Add Theme Support Image Function
	==================================================
 */

//feature: 'post-thumbnails' - adds thumbnail feature/feature image in creating post/page
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	//add more image size
	//@param1 - string name identifier
	//@param2 - width in px
	//@param3 - height in px
	//@param4 - crop(boolean) || array  - sample: array('center','center') hardcrop center center
	//array(x axis, y axis)
	//add_image_size('500x500',500,500,array('center','center'));
}

?>