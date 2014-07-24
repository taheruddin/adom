<?php
/**
 * @package adom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('home-grid'); ?>>
	<a class="thumbnail" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() && ! post_password_required() ) the_post_thumbnail(); ?></a>
	<div class="entry-header">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>

		<div class="entry-meta">
			<?php adom_posted_on(); ?>
		</div><!-- .entry-meta -->
	</div><!-- .entry-header -->

	<?php /*?><div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'adom' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content --><?php */?>

	
</article><!-- #post-## -->
