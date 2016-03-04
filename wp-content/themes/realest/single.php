<?php get_header(); ?>
	<?php $post_id = get_the_id(); ?>
	<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post_id)); ?>
	<header class="header text-center single" style="background:url('<?php echo $image; ?>');">
		
	</header>
	<nav class="sticky-nav" style="background:url('/wp-content/uploads/filter-bg-1.jpg');">
		<div class="sticky-nav-list clearfix container">
			<ul class="nav navbar-nav col-md-2">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Link</a>
				</li>
			</ul>
			<ul class="nav navbar-nav col-md-2 col-md-offset-2 center">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Link</a>
				</li>
			</ul>
			<ul class="nav navbar-nav col-md-2 col-md-offset-2">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Link</a>
				</li>
			</ul>
		</div>
	</nav>
	<main class="container-fluid" role="main">
		<div class="container">
			<div class="row">

			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="thepost-title"></h1>
					<div class="thepost-content"><?php the_content(); ?></div>
					<h1 id="recipe" class="thepost-title"><?php the_title(); ?></h1>
					<div class="thepost-recipe"><?php the_field('post_recipe') ?></div>
					</article>
				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
				</div><!--col-lg-8 col-md-8-->
				<div class="col-lg-4 col-md-4">
					<?php if(is_active_sidebar('sidebar1' )):
						dynamic_sidebar('sidebar1' );
					endif; ?>
				</div>
			</div>
		</div><!--.container-->
		
	</main><!--.container-fluid-->
<?php get_footer(); ?>