<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package adom
 */
?>

		</div><!-- #content-inner -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-cap">
		
		</div>
		<div class="site-footer-top">
			<div class="site-footer-top-inner">
				<?php
					if(function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-2'))
						dynamic_sidebar('sidebar-2');
				?>
			</div>
		</div>
		<div class="site-footer-bottom">
			<div class="site-footer-bottom-inner">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'adom' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'adom' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'adom' ), 'adom', '<a href="http://taheruddin.com" rel="designer">Taher Uddin</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
