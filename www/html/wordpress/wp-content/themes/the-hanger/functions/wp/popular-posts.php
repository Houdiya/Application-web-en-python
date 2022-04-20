<?php
/**
 * Get posts tagged with 'featured'
 *
 * @return html
 */
function getbowtied_featured_posts() {
    $args = [
        'post_type'           => 'post',
        // 'post__in'            => $stickies,
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => 1,
        'tag'				  => 'featured'
    ];

    $the_query = new WP_Query($args);

    if ( $the_query->have_posts() ) { 

    	echo '<div class="getbowtied_popular_posts_container">
					<div class="row">
					<div class="popular_posts_columns">';

    		echo '<h3 class="popular_posts_title">'.__('Featured Posts', 'the-hanger').'</h3>';
		
			echo '<div class="getbowtied_popular_posts">';
			echo '<div class="row">';

		        while ( $the_query->have_posts() ) { 
		            $the_query->the_post();
		            
		            echo '<div class="small-12 medium-6 large-3 ' . ( $class = is_sticky(get_the_ID()) ? 'sticky' : '' ) . ' columns popular-post ' . ( $class = has_post_thumbnail() ? 'with-image' : '' ) . '">';

		            	if(has_post_thumbnail()):
							echo '<div class="sticky_post_image">
					            <a href="' . get_the_permalink() . '"> ';
									echo the_post_thumbnail('medium');
									echo the_post_thumbnail('thumbnail');
					        	echo '</a>
							</div>';
						endif;

						echo '<div class="sticky_post_content">

					            <div class="entry-meta">'. getbowtied_posted_on(). ' </div>
									
					            <h4 class="entry-title sticky_post_title site-secondary-font"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
							</div>

		           		 </div>';

		        }    
	        echo '</div>';
	        echo '</div>';

        echo '</div></div>
		</div>';
      

        wp_reset_postdata();   
    } 
}