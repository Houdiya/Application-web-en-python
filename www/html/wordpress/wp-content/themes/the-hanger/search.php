<?php get_header(); ?>

<div class="archive-header site-secondary-font">
		<div class="row small-collapse">
			<div class="small-12 columns">
				<div class="archive-title-wrapper">
					<h1 class="archive-title">
						<?php printf( esc_html__( 'Search Results for: %s', 'the-hanger' ),'' ); ?>
						<?php  echo get_search_query() ?>
					</h1>

				</div>
			</div>
		</div>
	</div>

<div class="blog-listing listing-search">
	<div class="row small-collapse">
		<div class="small-12 columns">
			<div class="site-content">
				<div class="row">
					<?php if ( 1 == GBT_Opt::getOption('blog_sidebar') && 'left' == GBT_Opt::getOption('blog_sidebar_position') ) : ?>
					<div class="small-12 large-3 columns">
						<div class="show-for-large">
							<?php if (is_active_sidebar( 'blog-widget-area' )) : ?>
								<?php get_sidebar(); ?>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>

					<div class="small-12 <?php echo ( 1 == GBT_Opt::getOption('blog_sidebar') ) ? 'large-9' : 'large-12' ?> columns site-main-content-wrapper">

						<div class="site-main-content">

							<div class="blog-articles">
								<?php
									if ( have_posts() ) :
										while ( have_posts() ) : the_post();
											get_template_part( 'template-parts/content/content', get_post_format() );
										endwhile;
									else :
										get_template_part( 'template-parts/content/content', 'none' );
									endif;
								?>
							</div>

							<?php 
							the_posts_navigation(array( 
							  'prev_text' => esc_html__( 'Older posts', 'the-hanger' ), 
							  'next_text' => esc_html__( 'Newer posts', 'the-hanger' ), 
							)); 
							?> 
							
						</div>

					</div>

					<?php if ( 1 == GBT_Opt::getOption('blog_sidebar') && 'right' == GBT_Opt::getOption('blog_sidebar_position') ) : ?>

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
</div>

<?php get_footer();
