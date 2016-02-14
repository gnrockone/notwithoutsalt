<?php

if( is_admin() ):
	add_action( 'admin_menu', 'add_rl_theme_menu');
	add_action( 'admin_init', 'register_rl_theme_settings');
endif;

function add_rl_theme_menu() { //add this function in admin_menu action
	//add_menu_page('page title', 'menu title', 'capability', ' menu slug', 'function', 'icon url', 'position')
	// @param page_title - The page title
	// @param menu_title - This is the menu name and will be seen in the dashboard widget tab
	// @param capability - Who can edit this. Check wordpress capabilities
	// @param menu_slug  - the slug name. When clicking widget tab. url will be yourdomain.com/slug
	// @param function   - the function to be called after admin menu hook. This is content inside the tab
	// @param icon_url   - the icon url. check it in wordpress for more wordpress icon url
	// @param position   - the location on where to put the widget tab in the db panel
	add_menu_page( 'Realest', 'Realest Panel', 'manage_options','realest-options','realest_theme_settings', null, 99);
}
function register_rl_theme_settings() { //add this function in admin_init action

// add_settings_section is used to display the section heading and description.
// add_settings_field is used to display the HTML code of the fields.
// register_setting is called to automate saving the values of the fields.

	// @param option_group - The name of the group of settings you are going to store. This must match the group name used in the settings_field() function.
	// @param option_name  - The name of the option which will be saved, this is the key that is used in the options table.
	// @param Sanitize Callback - This is the function that is used to validate the settings for this option group.
	register_setting( 'realest-options', 'facebook_url');
	register_setting( 'realest-options', 'twitter_url');
	register_setting( 'realest-options', 'linkedin_url');
	register_setting( 'realest-options', 'instagram_url');
	register_setting( 'realest-options', 'youtube_url');
	register_setting( 'realest-options', 'sticky_back_to_top');
	// register_setting( 'realest-options', 'pinterest_url');
	// register_setting( 'realest-options', 'tumblr_url');
	// register_setting( 'realest-options', 'bloglovin_url');
	// register_setting( 'realest-options', 'vimeo_url');
	// register_setting( 'realest-options', 'social_medias_url');
	// $social_medias_url = array(
	// 	'facebook_url'	 	 => '',
	// 	'twitter_url'	 	 => '',
	// 	'linkedin_url'	 	 => '',
	// 	'instagram_url'	 	 => '',
	// 	'pinterest_url'  	 => '',
	// 	'tumblr_url'	 	 => '',
	// 	'bloglovin_url'	 	 => '',
	// 	'vimeo_url'		 	 => ''
	// 	);

	// @param Id - String to use for the ID of the section.
	// @param Title - The title to use on the section. - Shown in top page
	// @param Callback - This is the function that will display the settings on the page. We dont want anything
	// @param Page - This is the page that is displaying the section, should match the menu slug of the page.
	add_settings_section( 'Realest Options', "", null, 'realest-options' );
	
	//@param id - string for use in the id attribute of tags
	//@param title - title of the field
	//@param callback - functions that filles the field with the desired inputs
	//@param page - the menu page on w/c to display this field. should match menu slug from add_theme_page
	//@param section - the section of the settings page in w/c to show the box
	//@param args -
	add_settings_field('facebook_url',"Facebook link", "display_facebook_url", "realest-options", "Realest Options");
	add_settings_field('twitter_url',"Twitter link", "display_twitter_url", "realest-options", "Realest Options");
	add_settings_field('linkedin_url',"Linkedin link", "display_linkedin_url", "realest-options", "Realest Options");
	add_settings_field('instagram_url',"Instagram link", "display_instagram_url", "realest-options", "Realest Options");
	add_settings_field('youtube_url',"Youtube link", "display_youtube_url", "realest-options", "Realest Options");
	add_settings_field('sticky_back_to_top',"Sticky Back to Top Button", "display_back_to_top", "realest-options", "Realest Options");

}

function realest_theme_settings() {
// settings_fields('realest-options'); - Settings group name - should match the group named used in register_settings();
// do_settings_sections('realest-options');  - do the group settings
// submit_button() - the save button
?>
 <div class="wrap">
	<h2>Realest Theme Options</h2>
	<form method="post" action="options.php">
		<?php
			settings_fields('realest-options'); 
			do_settings_sections('realest-options');
			submit_button();
		?>
	</form><!--end of form-->
</div><!--end of wrap class-->

<?php } ?>
<?php function display_facebook_url() { ?>
	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" placeholder="Your facebook link" />
<?php } ?>
<?php function display_twitter_url() { ?>
	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" placeholder="Your twitter link" />
<?php } ?>
<?php function display_instagram_url() { ?>
	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" placeholder="Your instagram link" />
<?php } ?>
<?php function display_linkedin_url() { ?>
	<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" placeholder="Your linkedin link" />
<?php } ?>
<?php function display_youtube_url() { ?>
	<input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" placeholder="Your youtube link" />
<?php } ?>
<?php function display_back_to_top() { ?>
	<input type="checkbox" name="sticky_back_to_top" id="sticky_back_to_top" value="1" <?php checked(1, get_option('sticky_back_to_top'), true); ?> /> 
<?php }  ?>
