<?php 

if ( !function_exists('getbowtied_related_posts')):
/**
 * Related posts shortcode
 *
 * @param  array  $atts 
 *
 */
function getbowtied_related_posts( $per_page ) {
	if (!$per_page) $per_page= 4; // temp

	// Build the post category ids
	$post_cats= wp_get_post_categories(get_the_ID());

	// Build the post tag ids
	$tags= wp_get_post_tags(get_the_ID());
	$post_tags= array();
	foreach ($tags as $tag) {
		$post_tags[]= $tag->term_id;
	}

	// Query posts that share the same category OR tag
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> $per_page,
		'post__not_in'		=> array(get_the_ID()),
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'terms'    => $post_cats,
				'operator' => 'IN'
			),
			array(
				'taxonomy' => 'post_tag',
				'terms'    => $post_tags,
				'operator' => 'IN',
			),
		),
	);

	$posts = get_posts($args);
	if (!empty($posts) && is_array($posts)):
		echo '<div class="single_related_post_container">';
			echo '<div class="row">';
				echo '<div class="single_related_posts">';
					echo '<h2 class="entry-title">Related Articles</h2>';
					echo '<div class="row">';
						foreach ($posts as $post) :
							echo '<div class="small-12 medium-6 large-3 ' . ( $class = is_sticky($post->ID) ? 'sticky' : '' ) .  ' columns related-post ' . ( $class = has_post_thumbnail($post->ID) ? 'with-image' : '' ) . '">';
								echo '<a class="related_post_image" href="' . get_the_permalink($post->ID) . '"> ';
					            	if(has_post_thumbnail($post->ID)):
										echo get_the_post_thumbnail($post->ID,'medium');
										echo get_the_post_thumbnail($post->ID,'thumbnail');
									endif;
					        	echo '</a>';
								echo '<div class="related_post_content">';
									echo '<span class="date">' . get_the_date('', $post->ID) .'</span>';
							    	echo '<h2 class="related_post_title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h2>';
							    echo '</div>';
						    echo '</div>';
						endforeach;
				    echo '</div>';
			    echo '</div>';
			echo '</div>';
		echo '</div>';
	endif;
}
endif;

add_action('getbowtied_related_posts', 'getbowtied_related_posts');