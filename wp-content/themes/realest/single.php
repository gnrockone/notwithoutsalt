<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article ud="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!--post content-->
		</article>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?> ?>
<?php get_footer(); ?>