<?php 

/*
	==================================================
	| Custom Made Function
	==================================================
 */

/*
	==================================================
	| Category Pagination
	==================================================
 */
/**
 * use this in a category.php only
 *
 */
/**
 * use this in category.php
 * tested in category.php
 * tested using taxonomy category
 * [category pagination. paginate category terms]
 * @return [type] [<<category term     category term>>]
 */
function rl_category_pagination() {
	foreach(get_categories() as $all_cat) {  $cat_ids[] = $all_cat->term_id; }
  	$this_cat = get_query_var('cat');
  	$this_cat_position = array_search( $this_cat, $cat_ids ); ?>

	<div class="pagination-category row-pagination row">
	<?php $prev_cat_position = $this_cat_position -1;
    if( $prev_cat_position >=0 ) {
    $prev_cat_id = array_slice( $cat_ids, $prev_cat_position, 1 );
    echo '<a class="pull-left" href="' . get_category_link($prev_cat_id[0]) . '">&laquo; ' . get_category($prev_cat_id[0])->name . '</a>'; } ?>

	<?php $next_cat_position = $this_cat_position +1;
    if( $next_cat_position < count($cat_ids) ) {
    $next_cat_id = array_slice( $cat_ids, $next_cat_position, 1 );
	echo '<a class="pull-right" href="' . get_category_link($next_cat_id[0]) . '">' . get_category($next_cat_id[0])->name . ' &raquo;</a>'; } ?>
	</div><!--end of pagination-category-->
<?php } 
	/*
	==================================================
	| Single Post Pagination for Post Type
	| Change post_type for custom post type
	==================================================
 	*/
 /**
  * rl_single_pagination - add this pagination to single.php
  * auto query already, has its own row, bootstrap made
  * tested on in single.php
  * tested only on post post types
  * @param  array  $class [class parameters]
  * @return []        [returns single pagination left right links]
  */
 function rl_single_pagination(array $class = null) {
 	$default = array(
 		'class' => 'row row-single-pagination clearfix',
 		'leftclass' => 'pull-left',
 		'rightclass' => 'pull-right'
 	);
 	$class = isset($class) ? $class : $default;
 	$this_post_ID = get_queried_object_id();
 	$query = array(
 		'orderby' => 'menu_order',
 		'sort_order' => 'asc',
 		'post_type' => 'post',
 		'post_status' => 'publish',
 		'posts_per_page' => -1
 		);
 	$postlist = get_posts( $query );
	$posts = array();
	foreach ( $postlist as $post ) {
   	$posts[] += $post->ID;
	}
	$this_post_position = array_search($this_post_ID,$posts);
	$next_post_position = $this_post_position + 1;
	$prev_post_position = $this_post_position - 1;
	echo '<div class="' .$class['class']. '">';
	if ($prev_post_position >= 0) {
		$prev_post_ID = array_slice($posts, $prev_post_position ,1);
		echo '<a class="'.$class['leftclass'].'" href="' . get_post_permalink($prev_post_ID[0]) . '">&laquo; ' . get_post($prev_post_ID[0])->post_title . '</a>';
	}
	if ($next_post_position < count($posts) ) {
		$next_post_ID = array_slice($posts, $next_post_position ,1);
		echo '<a class="'.$class['rightclass'].'" href="' . get_post_permalink($next_post_ID[0]) . '">' . get_post($next_post_ID[0])->post_title . ' &raquo;</a>';
	}
	echo '</div>';
 }
 	

/**
 * use this in single.php
 * not yet tested in custom post type
 * related post are base on tags
 * shows related post / if no related,shows recent posts
 * @param $post_id - post id of single post
 * @param $showposts - number of related post to show
 * @return featured image and title of related posts
 */
if(!function_exists('rl_similar_posts')) {
	function rl_similar_posts($post_id,$showposts) {
		global $post;
		$backup = $post;
		$tags = wp_get_post_tags($post_id);
		$tagIDs = array();
		$count = 0;
		$related_post_found = false;
		$columns = 12 / $showposts;
		$output ='';
		if($tags) {
			$tagcount = count($tags);
			foreach($tags as $tagobject) {
				$tagIDs[$count] =  $tagobject->term_id;
			}
		}
		$args = array(
				'tag__in' => $tagIDs,
				'post__not_in' => array(
				    $post->ID
				) ,
				'showposts' => $showposts,
				'ignore_sticky_posts' => 1
			);
		$related = new WP_Query( $args );
			if($related->have_posts()):
				$related_post_found = true;
			
				$output .= '<div class="row related-posts">';
				while($related->have_posts()): $related->the_post();
					$output .= '<div class="col-md-'.$columns.'col-lg-'.$columns.'"><article>';
					if(has_post_thumbnail()):
						$imgUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
						$output .= '<img src="'.$imgUrl.'" class="img-responsive recent-posts-img">';
					endif;
						$output .= '<h3 class="related-posts-title"><a href="'.the_permalink().'">'.the_title().'</a></h3>';

					$output .= '</article></div>';
				endwhile;
				$output .= '</div><!--.row.related-posts-->';
			
			else:
			
			endif;
		$post = $backup;
		if(!$related_post_found):
			$args = array(
				'showposts' => $showposts,
                'nopaging' => 0,
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'post__not_in' => array(
                    $post->ID)
				);
		endif;	
		$output='';
		$recent = new WP_Query($args);
			if($recent->have_posts()):
					$output .= '<div class="row recent-posts">';
					while($recent->have_posts()): $recent->the_post();
					$output .= '<div class="col-md-'.$columns.' col-lg-'.$columns.'"><article>';
					if(has_post_thumbnail()):
					$imgUrl = wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
						$output .= '<img src="'.$imgUrl.'" class="img-responsive recent-posts-img">';
						// $output .= the_post_thumbnail(null,array('class'=>'img-responsive recent-posts-img'));
					endif;
						$output .= '<h3 class="related-posts-title"><a href="'. get_permalink().'">'.get_the_title().'</a></h3>';

					$output .= '</article></div>';
					endwhile;
					$output .= '</div><!--.row.recent-posts-->';
			else:

			endif;
		wp_reset_postdata();
		echo $output;
			
	}
}



// WordPress Paginate Links Function
// http://codex.wordpress.org/Function_Reference/paginate_links
//http://design.sparklette.net/teaches/how-to-add-wordpress-pagination-without-a-plugin/
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}































?>