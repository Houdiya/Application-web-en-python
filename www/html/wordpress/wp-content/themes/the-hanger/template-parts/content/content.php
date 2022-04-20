	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(has_post_thumbnail()): ?>
		<div class="entry-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_post_thumbnail('large'); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="entry-content-wrap">

		<header class="entry-header">

			<?php //if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php echo getbowtied_posted_on(); ?>
				</div>
			<?php //endif; ?>

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

		</header>

		<div class="entry-content">

			<div><?php the_excerpt(); ?></div>

		</div>

		<a class="entry-content__readmore site-secondary-font" href="<?php echo(esc_url(get_permalink())); ?>"><?php esc_html_e( 'Read More', 'the-hanger') ?></a>

	</div>

</article>
