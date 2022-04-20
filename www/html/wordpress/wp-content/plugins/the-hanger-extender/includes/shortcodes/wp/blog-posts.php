<?php

// [blog_posts]
function getbowtied_shortcode_blog_posts($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"posts" 		=>  '9',
		"category" 		=>  '',
	), $atts));
	ob_start();
	?>

	<div class="gbt_shortcode_blog_posts">
		<div class="row">

	        <?php 

	        $args = array(
	            'post_status' => 'publish',
	            'post_type' => 'post',
	            'category_name' => $category,
	            'posts_per_page' => $posts
	        );

	        $recentPosts = new WP_Query( $args );

	        if ( $recentPosts->have_posts() ) : ?>

	            <?php while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); ?>
	                
					<div class="small-12 medium-4 large-3 columns">

						<div class="gbt_shortcode_blog_post">

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="gbt_shortcode_blog_posts_image">
									<a href="<?php the_permalink(); ?>">
										<?php echo the_post_thumbnail('medium'); ?>
										<?php echo the_post_thumbnail('thumbnail'); ?>
									</a>
								</div>
							<?php endif; ?>

							<div class="gbt_shortcode_blog_posts_content">
								<div class="gbt_shortcode_blog_posts_meta">
									<?php echo getbowtied_posted_on(); ?>
								</div>
								<h4 class="gbt_shortcode_blog_posts_title site-secondary-font">
									<a href="<?php the_permalink(); ?>">
										<?php echo get_the_title(); ?>
									</a>
								</h4>
							</div>

						</div>

					</div>
				
	            <?php endwhile; ?>

	        <?php endif; ?>

	    </div>
    </div>
	
	<?php
	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("blog_posts", "getbowtied_shortcode_blog_posts");