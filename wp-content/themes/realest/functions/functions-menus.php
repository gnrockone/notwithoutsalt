<?php 

/*
	==================================================
	| Creating Menu Setup Function
	==================================================
 */

if (!function_exists('rl_menu_setup')) {
	function rl_menu_setup() {
		add_theme_support('menus');
		register_nav_menus(array(
			'primary' => __('Description: Primary Menu'),
			'sidebar' => __('Description: Sidebar Menu'),
			'footer' => __('Description: Footer Menu')
			));
	}
}
add_action('init','rl_menu_setup');

?>