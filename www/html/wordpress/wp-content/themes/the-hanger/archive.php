<?php 
	get_header(); 
	global $wp_query;

	if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
	    $page_title_option = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );
	} else {
	    $page_title_option = "on";
	}
?>

<?php if ( "on" == $page_title_option ) : ?>

	<?php if( ( get_the_archive_title() != "" ) || ( 1 == GBT_Opt::getOption('blog_categories') ) ) : ?>

		<div class="archive-header archive-template site-secondary-font">
		
			<div class="row small-collapse">
				<div class="small-12 columns">

					<div class="archive-header-inner">
					
						<div class="archive-title-wrapper">
							<h1 class="archive-title"><?php the_archive_title(); ?></h1>

							<?php if( 1 == GBT_Opt::getOption('blog_categories') ) : ?>

								<ul class="archive-list show-for-large">
									<?php $current_cat = is_home()? 'current-cat' : ''; ?>
						    		<li class="cat-item <?php echo esc_attr($current_cat); ?>">
										<a href="<?php if ( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
											else echo esc_url( home_url() );?>"><?php esc_html_e( 'All Articles', 'the-hanger'); ?>
										</a>
									</li>
									<?php wp_list_categories(array('title_li'=> '')); ?>
								</ul>

								<ul class="archive-mobile-list hide-for-large">
									<li class="cat-item">
										<a><?php esc_html_e( 'All Articles', 'the-hanger'); ?></a>
									</li>
									<?php wp_list_categories(array('title_li'=> '')); ?>
								</ul>

							<?php endif; ?>

						</div>

						<?php if( get_the_archive_description() ) : ?>
							<div class="archive-description">
								<div class="row">
									<div class="small-12  medium-12 large-8 columns ">
										<?php the_archive_description(); ?>
									</div>
								</div>	
							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>

<?php endif; ?>

<div class="row small-collapse">
	<div class="small-12 columns">

		<div class="site-content">

			<div class="blog-listing">

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

							<div class="blog-articles animated-blog-articles">
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