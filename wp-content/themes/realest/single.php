<?php get_header(); ?>
	<?php $post_id = get_the_id(); ?>
	<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post_id)); ?>
	<header class="header text-center single" style="background:url('<?php echo $image; ?>');">
		
	</header>
	<nav class="sticky-nav" style="background:url('/wp-content/uploads/filter-bg-1.jpg');">
		<div class="sticky-nav-list clearfix container">
			<ul class="nav col-md-2 col-xs-2 col-sm-2 col-lg-2 nav-ul">
				<li class="active nav-list">
					<a href="#intro">Intro</a>
				</li>
				<li class="nav-list">
					<a href="#recipe">Recipe</a>
				</li>
			</ul>
			<ul class="nav col-md-2 col-xs-2 col-sm-2 col-lg-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-offset-3 nav-ul">
				<li class="active nav-list">
					<a href="#">Print</a>
				</li>
				<li class="nav-list">
					<a href="javascript:void();" onclick="">Share</a>
				</li>
			</ul>
			<ul class="nav col-md-2 col-md-offset-3 col-xs-2 col-sm-2 col-lg-2 col-sm-offset-3 col-xs-offset-3 col-lg-offset-3 nav-ul">
				<?php rl_single_pagination(); ?>
				<li class="nav-list">
					<a href="/"><i class="fa fa-list"></i></a>
				</li>
			</ul>
		</div>
	</nav>
	<main class="container-fluid" role="main">
		<div class="container">
			<div class="row fwd-padding">
			<a class="btn btn-block btn-social btn-twitter">
    <span class="fa fa-twitter"></span> Sign in with Twitter
  </a>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8 fwd-padding">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 id="intro" class="thepost-title">Intro</h1>
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
				<div class="col-lg-4 col-md-4 fwd-padding">
					<?php if(is_active_sidebar('sidebar1' )):
						dynamic_sidebar('sidebar1' );
					endif; ?>
				</div>
			</div>
			<div class="row comments-template fwd-padding">
				<div class="col-lg-8 col-md-8">
				<?php comments_template(); ?>
				</div>
			</div>
		</div><!--.container-->
		
	</main><!--.container-fluid-->
<?php get_footer(); ?>