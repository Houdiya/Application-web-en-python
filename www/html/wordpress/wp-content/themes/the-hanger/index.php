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

	<?php if( ( single_post_title('', false) ) || ( 1 == GBT_Opt::getOption('blog_categories') ) ) : ?>

		<div class="archive-header site-secondary-font">
			
			<div class="row small-collapse">
				<div class="small-12 columns">

				<div class="archive-header-inner">
					<div class="archive-title-wrapper">
						<h1 class="archive-title"><?php single_post_title(); ?></h1>

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
				</div>

				</div>
			</div>

		</div>

	<?php endif; ?>

<?php endif; ?>

<?php if (GBT_Opt::getOption('blog_highlighted_posts') == 1 && !is_paged()): ?>

<div class="blog_highlighted_posts animated-blog-articles">
	
	<div class="row">

		<div class="blog_highlighted_posts_container">
			
			<div class="row">
				
				<div class="small-12 medium-8 large-8 columns">
					<div class="blog_highlighted_posts_left">
						<?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content/content', 'highlight' );
									break;
								endwhile;
							else:
								get_template_part( 'template-parts/content/content', 'none' );
							endif;
						?>
					</div>
				</div>
				
				<div class="small-12 medium-4 large-4 columns">
					<div class="blog_highlighted_posts_right">
						<?php
							if ( have_posts() ) :
								$count= 0;
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content/content', 'highlight' );
									$count++;
									if ($count > 1) break;
								endwhile;
							endif;
						?>
					</div>
				</div>

			</div>

		</div>
	</div>

</div>

<?php endif; ?>

<?php 
	if ( !is_paged() ):
		getbowtied_featured_posts();
	endif;
?>

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
								if (	
									! (( GBT_Opt::getOption('blog_highlighted_posts')==1)  &&
									( ($wp_query->found_posts <= 3) || get_option('posts_per_page') <= 3 ))

								):
									if ( have_posts() ) :
										while ( have_posts() ) : the_post();
											get_template_part( 'template-parts/content/content', get_post_format() );
										endwhile;
									else :
										get_template_part( 'template-parts/content/content', 'none' );
									endif;
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
