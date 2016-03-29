<?php 

function rl_load_more() {
	global $wp_query;
	if(!is_singular()):
		//wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	endif;
	$max = $wp_query->max_num_pages;
	$paged = (get_query_var('paged') > get_query_var('paged') : 1;

	wp_localize_script( 'realestjs', $data, array(
		'startPage' => $paged
		'maxPages' => $max
		'nextLink' => next_posts($max,false)
		)
	);
}

 ?>