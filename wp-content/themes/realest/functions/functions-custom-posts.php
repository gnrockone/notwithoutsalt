<?php
/*
	==================================================
	| Creating Custom Type Setup Function
	==================================================
 */

//template for creating custom post type
// function CPT_Book() {
// 	$labels = array(
// 		'name'               => __( 'Books'),
// 		'singular_name'      => __( 'Book'),
// 		'menu_name'          => __( 'Books'),
// 		'name_admin_bar'     => __( 'Book'),
// 		'add_new'            => __( 'Add New'),
// 		'add_new_item'       => __( 'Add New Book'),
// 		'new_item'           => __( 'New Book'),
// 		'edit_item'          => __( 'Edit Book'),
// 		'view_item'          => __( 'View Book'),
// 		'all_items'          => __( 'All Books'),
// 		'search_items'       => __( 'Search Books'),
// 		'parent_item_colon'  => __( 'Parent Books:'),
// 		'not_found'          => __( 'No books found.'),
// 		'not_found_in_trash' => __( 'No books found in Trash.')
// 	);

// 	$args = array(
// 		'labels'             => $labels,
//         'description'        => __( 'Description.'),
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'menu_icon'			 => 'dashicons-book-alt',
// 		'query_var'          => true,
// 		'rewrite'            => array( 'slug' => 'book' ),
// 		'capability_type'    => 'post',
// 		'has_archive'        => true,
// 		'hierarchical'       => false,
// 		'menu_position'      => 5,
// 		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'author' )
// 	);

// 	register_post_type( 'book', $args );
// }
// add_action('init','CPT_Book');
// 
// function register_testimonials_post_type() {


// 	register_post_type( 'testimonial', array(
// 			'labels' => array(
// 				'name' => __( 'Testimonials', 'mk_framework' ),
// 				'singular_name' => __( 'Testimonial', 'mk_framework' ),
// 				'add_new' => __( 'Add New Testimonial', 'mk_framework' ),
// 				'add_new_item' => __( 'Add New Testimonial', 'mk_framework'),
// 				'edit_item' => __( 'Edit Testimonial', 'mk_framework' ),
// 				'new_item' => __( 'New Testimonial', 'mk_framework' ),
// 				'view_item' => __( 'View Testimonials', 'mk_framework' ),
// 				'search_items' => __( 'Search Testimonials', 'mk_framework' ),
// 				'not_found' =>  __( 'No Testimonials found', 'mk_framework' ),
// 				'not_found_in_trash' => __( 'No Testimonials found in Trash', 'mk_framework' ),
// 				'parent_item_colon' => '',

// 			),
// 			'singular_label' => 'Testimonials',
// 			'public' => true,
// 			'exclude_from_search' => true,
// 			'show_ui' => true,
// 			'menu_icon'=> 'dashicons-awards',
// 			'capability_type' => 'post',
// 			'hierarchical' => false,
// 			'rewrite' => false,
// 			'menu_position' => 5,
// 			'query_var' => false,
// 			'show_in_nav_menus' => false,
// 			'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions')
// 		) );
// }
// add_action( 'init', 'register_testimonials_post_type' );

?>