<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Realest
 * @since Realest 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"><!--gets the charset utf-8-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--pingback - server accepts POST request only-->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
	//gets the action wp_head
	//gets the title tag - if add_theme_support('title-tag') is declared
	wp_head(); ?>
</head>
<?php if ( is_front_page() ):
	$front_page_class = array('front-page'); 
	else: 
	$front_page_class = null; 
	endif;
?>
<?php do_action('before_body_start'); ?>
<body <?php body_class( $front_page_class ); ?> >
<?php do_action('after_body_start'); ?>

	<div id="main-container" class="container-fluid main-container">
		<!--header-->
		<?php if ( has_header_image() ): ?>
		<div class="container">
			<img id="header-image" style="width:100%;" src="<?php echo (get_header_image()); ?>" alt="<?php echo (get_bloginfo('title')); ?>"
			id="header-image"/>
		</div>
		<?php endif; ?>
		<!--menu-->
		<!--container-fluid for full width menu-->
		<!--container for container width menu-->
		<div class="container-fluid">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
							<?php 
								$logo = null;
								if ($logo) :
									echo $logo;
								else:
									echo bloginfo('title');
								endif;
							?>
						</a>
					</div> <!--end of navbar -header -->
					<?php
						//get_search_form() has navbar-right thats why use custom search;
						//get_search_form() gets searchform.php
						//get search form for header - searchheader.php
						get_template_part('searchheader');
			            wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 2,
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse navbar-right',
			        		'container_id'      => 'navbar-collapse-1',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
        			?>
				</div><!--end of container fluid-->
			</nav><!--end of nav tag-->
		</div> <!--end of container menu-->
		<!--end of menu-->
<!--closing body tag is in footer-->
<!--closing html tag is in footer-->