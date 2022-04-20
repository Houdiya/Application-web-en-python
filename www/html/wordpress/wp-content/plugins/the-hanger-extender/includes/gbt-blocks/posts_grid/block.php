<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once( dirname( __FILE__ ) . '/functions/function-setup.php' );
include_once( dirname( __FILE__ ) . '/functions/function-helpers.php' );

//==============================================================================
//	Frontend Output
//==============================================================================
if ( ! function_exists( 'gbt_18_th_render_frontend_posts_grid' ) ) {
	function gbt_18_th_render_frontend_posts_grid( $attributes ) {

		extract( shortcode_atts( array(
			'number'				=> '12',
			'categoriesSavedIDs'	=> '',
			'align'					=> 'center',
			'orderby'				=> 'date_desc',
			'columns'				=> '3'
		), $attributes ) );

		$args = array(
	        'post_status' 		=> 'publish',
	        'post_type' 		=> 'post',
	        'posts_per_page' 	=> $number
	    );

	    switch ( $orderby ) {
	    	case 'date_asc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'asc';
				break;
			case 'date_desc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'desc';
				break;
			case 'title_asc' :
				$args['orderby'] = 'title';
				$args['order']	 = 'asc';
				break;
			case 'title_desc':
				$args['orderby'] = 'title';
				$args['order']	 = 'desc';
				break;
			default: break;
		}

	    if( substr($categoriesSavedIDs, - 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 0, -1);
		}

		if( substr($categoriesSavedIDs, 0, 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 1);
		}

	    if( $categoriesSavedIDs != '' ) $args['category'] = $categoriesSavedIDs;
	    
	    $recentPosts = get_posts( $args );

		ob_start();
		        
	    if ( !empty($recentPosts) ) : ?>

		    <div class="gbt_18_th_posts_grid align<?php echo $align; ?>">

				<div class="gbt_18_th_blog_posts columns-<?php echo $columns; ?>">
				                    
			        <?php foreach($recentPosts as $post) : ?>
			    
						<div class="gbt_18_tr_posts_grid_item">

							<?php if ( has_post_thumbnail($post->ID) ) : 
								$image_id = get_post_thumbnail_id($post->ID);
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
							?>
								<a href="<?php echo get_post_permalink($post->ID); ?>">
									<span class="gbt_18_th_posts_grid_img gbt_18_th_posts_grid_with_img" 
										style="background-image: url(<?php echo esc_url($image_url[0]); ?> );">
									</span>
								</a>
							<?php endif; ?>

							<div class="gbt_18_th_blog_post_content">
								<div class="gbt_18_th_blog_post_meta">
									<a href="<?php echo get_post_permalink($post->ID); ?>" rel="bookmark">
										<time class="entry-date published" datetime="<?php echo get_the_date( DATE_W3C, $post->ID ); ?>">
											<?php echo get_the_date( '', $post->ID ); ?>
										</time>
									</a>
								</div>
								<h4 class="gbt_18_th_blog_post_title site-secondary-font">
									<a href="<?php echo get_post_permalink($post->ID); ?>">
										<?php echo $post->post_title; ?>
									</a>
								</h4>
							</div>

						</div>

			        <?php endforeach; // end of the loop. ?>

		        </div>
		        
		    </div>

	    <?php

	    endif;
		        
		wp_reset_query();

		return ob_get_clean();
	}
}