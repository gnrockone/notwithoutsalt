<?php
//gets wp_footer hook
//includes script that are enqueue in footer
?>

<?php do_action('before_body_end'); ?>
<footer id="main-footer" class="main-footer">
	<h2 class="main-footer-copyright">&copy; 2016 <?php echo get_bloginfo('name'); ?> | <span class="privacy-policy">Privacy Policy</span></h2>
	<div class="footer-social-medias">
		<?php if(is_active_sidebar('footer-social-media')) ?>
			<?php dynamic_sidebar('footer-social-media' ); ?>
	</div>
</footer>
</main>
<?php wp_footer(); ?>
</body>
<?php do_action('after_body_end'); ?>
</html>