<?php get_header(); ?>

<div class="row small-collapse">

	<div class="small-12 columns">

		<div class="site-content">

			<div class="row">

				<div class="large-8 columns">

					<div class="single_post_header">

						<div class="entry-categories site-secondary-font">
							<?php the_category(); ?>
						</div>

						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>

				</div>
			</div>

			<div class="row">

				<?php if ( 1 == GBT_Opt::getOption('blog_single_sidebar') && 'left' == GBT_Opt::getOption('blog_single_sidebar_position') ) : ?>

					<div class="small-12 large-3 columns">
						<div class="show-for-large">
							<?php if (is_active_sidebar( 'blog-widget-area' )) : ?>
								<?php get_sidebar(); ?>
							<?php endif; ?>
						</div>
					</div>

				<?php endif; ?>

				<div class="small-12 <?php echo ( 1 == GBT_Opt::getOption('blog_single_sidebar') ) ? 'large-9' : 'large-12' ?> columns site-main-content-wrapper">

					<div class="site-main-content">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content/content', 'single' );

						endwhile; // End of the loop.
						?>

					</div>

				</div>

				<?php if ( 1 == GBT_Opt::getOption('blog_single_sidebar') && 'right' == GBT_Opt::getOption('blog_single_sidebar_position') ) : ?>

					<div class="small-12 large-3 columns">
						<div class="show-for-large">
							<?php if (is_active_sidebar( 'blog-widget-area' )) : ?>
								<?php get_sidebar(); ?>
							<?php endif; ?>
						</div>
					</div>

				<?php endif; ?>

			</div>
			
		</div>

	</div>

</div>

<?php if( get_next_post() || get_previous_post() ) : ?>

	<div class="single_navigation_container">
		<div class="row">
			<div class="single_navigation">
				<div class="row">

					<?php if( get_previous_post() ) : ?>
					    <div class="small-12 <?php echo get_next_post() ? 'medium-6 large-6' : 'medium-12 large-12'; ?> columns">
					    	<div class="nav-previous"><?php previous_post_link( '%link', '<div class="nav-previous-title">'.__( "Previous Reading", "the-hanger" ).'</div> <span> %title </span>' ); ?></div>
					    </div>
				    <?php endif; ?>
				    
				    <?php if( get_next_post() ) : ?>
					    <div class="small-12 <?php echo get_previous_post() ? 'medium-6 large-6' : 'medium-12 large-12'; ?> columns">
					    	<div class="nav-next"><?php next_post_link( '%link', '<div class="nav-next-title">'.__( "Next Reading", "the-hanger" ).'</div> <span> %title </span>' ); ?></div>
					    </div>
					<?php endif; ?>
			    </div>
		    </div>
		</div>
	</div>

<?php endif; ?>

<?php do_action( 'getbowtied_related_posts'); ?>

<?php if ( comments_open() || get_comments_number() ) : ?>
<div class="single-comments-container">
	<div class="row small-collapse single-comments-row">
		<div class="large-8 columns large-offset-2">
			<?php comments_template(); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php
get_footer();
