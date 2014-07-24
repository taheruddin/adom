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
			<div class="footer-cap-inner">
				<?php global $stardev; echo $stardev['footer_cap']; ?>
			</div>
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
					<?php global $stardev; echo $stardev['site_info']; ?>
				</div><!-- .site-info -->
			</div>
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
