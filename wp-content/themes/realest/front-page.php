<?php get_header(); ?>
	<?php
	/**
	 * The WordPress Query class.
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 *
	 */
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$page = (get_query_var('page')) ? get_query_var('page') : 1;
	$args = array(
		//Type & Status Parameters
		'post_type'      => 'post',
		'post_status'    => 'publish',
		
		//Order & Orderby Parameters
		'order'          => 'DESC',
		'orderby'        => 'date',
		
		//Pagination Parameters
		'posts_per_page' => 2,
		'paged'          => $page,
		'total' => 6

	);

	$wp_query = new WP_Query( $args );
	// print_r($wp_query);
	// global $wp_query;
	// print_r($wp_query);
	$count=0;
	//print_r($wp_query); ?>
	
	<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
		if($count == 0): $count++; ?>
			<?php $image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
			<header class="header text-center" style="background:url('<?php echo $image; ?>'); height:auto; ">
				<h2 class="header-latest">Latest Journal Post</h2>
				<h1 class="header-title"><?php the_title(); ?></h1>
			</header>
			<nav class="sticky-nav" style="background:url('wp-content/uploads/filter-bg-1.jpg');">
				
			</nav>

			<main class="container-fluid" role="main">
			<div class="container">
				<div class="col-lg-8 col-md-8 loadmore-container">
		<?php else: ?>
					<article <?php post_class(); ?>>
						<div class="space"></div>
						<h1 class="thepost-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="thepost-content"><?php the_content(); ?></div>
						<div class="space"></div>
						<h1 class="thepost-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="thepost-recipe"><?php the_field('post_recipe') ?></div>
						<div class="space"></div>
						<div class="thepost-meta">
							<ol class="breadcrumb no-padding">
								<li><a href="#" class="themeta-comments"><?php comments_number('0 Comment', '1 Comment', '% Comment' );?></a>
								</li>
								<li>
									<a href="#" class="themeta-share">Share</a>
								</li>
								<li><a href="<?php echo the_permalink(); ?>" class="themeta-permalink">Permalink</a></li>
							</ol>
						</div>
					</article>
		<?php endif;
	endwhile;  ?>
	<?php Realest::custom_pager();
	Realest::custom_pagination();
	?>
	</div><!--.col-lg-8 col-md-8-->
				
	<?php else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	
	<?php endif; ?>

			<div class="col-lg-4 col-md-4">
				<?php if(is_active_sidebar('sidebar1')) ?>
				<?php dynamic_sidebar('sidebar1' ); ?>
			</div>
			
			</div><!--.container-->
			<div class="row text-center">
				<?php
				//rl_custom_pager();

				 ?>
			</div>
			</main>
<?php get_footer(); ?>

