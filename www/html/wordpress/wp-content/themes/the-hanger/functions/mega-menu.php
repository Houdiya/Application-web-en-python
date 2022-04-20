<?php

//==============================================================================
//	Hook into Walker to output our megamenu
//==============================================================================

if ( !function_exists( 'getbowtied_megamenu_css_classes' )) :

	add_filter( 'nav_menu_css_class', 'getbowtied_megamenu_css_classes',10,4);
	/**
	 * Add megamenu specific classes to megamenu marked items
	 *
	 * @param  array $classes <li> classes
	 * @param  object $item    menu item
	 * @param  object $args    menu object
	 * @param  int $depth
	 *
	 * @return array  an array of classes
	 */
	function getbowtied_megamenu_css_classes ( $classes, $item, $args, $depth ) {
		if (( $args->theme_location === 'gbt_primary' || $args->theme_location === 'gbt_nav_but') && // Only for primary navigation
			( GBT_Opt::getOption('enable_megamenu_' . $item->ID, 0) == true )) // Is there a megamenu option on this item
		{
			$classes[] = '';
			// Add our own megamenu classes here
			if ( 'style-1' == GBT_Opt::getOption('header_template')) {
				$classes[] = 'getbowtied_megamenu';
			}
			// $classes[] = 'getbowtied_megamenu_' . GBT_Opt::getOption( 'widthof_megamenu_' . $item->ID, 'boxed'); // Layout type of megamenu
			if ($args->menu_class == 'vertical menu drilldown mobile-menu' && (GBT_Opt::getOption('header_mobile_megamenu_show', 'simple_links') != 'simple_links')) {
				$classes[] = 'menu-item-has-children is-drilldown-submenu-parent';
			}
		}
		return $classes;
	}
endif;

if ( !function_exists( 'getbowtied_megamenu_item' )) :

	add_filter( 'walker_nav_menu_start_el', 'getbowtied_megamenu_item', 10, 4);
	/**
	 * Add our megamenu html to megamenu items
	 *
	 * @param  string $item_output html output of menu item
	 * @param  object $item        menu item
	 * @param  int $depth
	 * @param  object $args        menu object
	 *
	 * @return string            html for the menu item
	 */
	function getbowtied_megamenu_item ( $item_output, $item, $depth, $args ) {

		if (( $args->theme_location === 'gbt_primary' || $args->theme_location === 'gbt_nav_but') &&
			( GBT_Opt::getOption('enable_megamenu_' . $item->ID, 0) == true )) {

			if ( (GBT_Opt::getOption('header_mobile_megamenu_show', 'simple_links') == 'simple_links') && ($args->menu_class == 'vertical menu drilldown mobile-menu') ) {
				return $item_output;
			}

			$id_fragment = '';



			switch ($args->menu_class) {
				case 'vertical menu drilldown mobile-menu':
					$id_fragment = 'mobile-';
					break;
				case 'gbt-sticky dropdown menu site-secondary-font':
					$id_fragment = 'sticky-';
					break;
				case 'gbt-primary-menu dropdown menu site-secondary-font':
					$id_fragment = 'primary-';
					break;
				case 'vertical menu drilldown mega-dropdown-menu':
					$id_fragment = 'dropdown-';
					break;
				case 'vertical menu drilldown mega-dropdown-menu sticky':
					$id_fragment = 'sticky-dropdown-';
					break;
				default :
					$id_fragment = '';
			}

			$item_output = '<a data-toggle="'.$id_fragment.'panel-'.$item->ID.'" href="'.$item->url.'"><span>' . $item->title .'</span></a>';

			$megamenu_content = '';
			$mega_wrapper = 'class="gbt-mega-menu-content dropdown-pane" data-dropdown data-hover="true" data-hover-pane="true"';

			if ($args->menu_class == 'vertical menu drilldown mobile-menu') {
				$item_output = '<a href="'.$item->url.'"><span>' . $item->title .'</span></a>';
				$item_output .= '<ul class="menu vertical nested site-main-font">';
				$mega_wrapper = 'class="gbt-mega-menu-content"';
			}


			switch ( GBT_Opt::getOption( 'typeof_megamenu_' . $item->ID, 'shop_mega')) {
				case 'blog':
					$megamenu_content .= '<div id="'.$id_fragment.'panel-'.$item->ID.'" ' . $mega_wrapper . '>' . getbowtied_megamenu_output_blog( $item->ID, $args->theme_location ). '</div> ';
					break;

				case 'shop_mega':
					$megamenu_content .= '<div id="'.$id_fragment.'panel-'.$item->ID.'" ' . $mega_wrapper . '>' . getbowtied_megamenu_output_shop_mega( $item->ID, false, $args->theme_location ). '</div>';
					break;

				case 'shop_icons':
					$megamenu_content .= '<div id="'.$id_fragment.'panel-'.$item->ID.'" ' . $mega_wrapper . '>' . getbowtied_megamenu_output_shop_icons( $item->ID ). '</div> ';
					break;

				case 'contact':
					$megamenu_content .= '<div id="'.$id_fragment.'panel-'.$item->ID.'" ' . $mega_wrapper . '>' . getbowtied_megamenu_output_contact( $item->ID, $args->theme_location ). '</div> ';
					break;

				default:
					break;
			}

			if ($args->menu_class == 'vertical menu drilldown mobile-menu') {
				$item_output .= '<li>'. $megamenu_content . '</li></ul>';
			} else {

				/**
				 * Enqueue megamenu output to action
				 */

				$args_kses = array(
					'div' => array('class' => array(), 'id'=> array(), 'data-dropdown'=>array(), 'data-hover'=>array(), 'data-hover-pane'=>array()),
					'span' => array('class' => array(), 'style'=> array()),
					'br' => array(),
					'a' => array('href'=>array(), 'class'=> array(), 'data-catid'=> array()),
					'i' => array('class'=>array()),
					'img' => array('src'=> array(), 'class' => array(), 'width'=> array(), 'height'=>array()),
					'li'  => array('class' => array()),
					'ul'  => array('class' => array()),
					'dt'  => array('class' => array()),
					'dl'  => array('class' => array()),
					'dd'  => array('class' => array()),
					'p'   => array(),
				);

				switch ($args->theme_location) {
				case 'gbt_primary':
					add_action($id_fragment . 'getbowtied_megamenu', function() use ( $megamenu_content, $args_kses ) { echo wp_kses($megamenu_content, $args_kses); });
					break;
				case 'gbt_nav_but':
					add_action($id_fragment . 'getbowtied_mega_dropdown_megamenu_action', function() use ( $megamenu_content, $args_kses ) { echo wp_kses($megamenu_content, $args_kses); });
					break;
				default:
				}
			}

		}

		return $item_output;

	}
endif;

if ( !function_exists( 'getbowtied_megamenu_output_blog' ) ):
	/**
	 * Build the layout for the "Blog" type megamenu
	 *
	 * @param  int $theID  id of the menu item
	 *
	 * @return html
	 */
	function getbowtied_megamenu_output_blog( $theID, $theme_location = 'gbt_primary' ) {


		$cat_list = GBT_Opt::getOption('categories_megamenu_' . $theID );
		ob_start();

		if (is_array($cat_list)):

			$categories = get_categories( array(
			    'parent'  => 0,
			    'include' => $cat_list,
			    'hide_empty' => 0
			) );

			$unsorted = array();
			$sorted   = array();

			foreach ($categories as $v) {
				$unsorted[$v->term_id] = $v;
			}

			foreach ($cat_list as $v) {
				if (isset($unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)]))
					$sorted[] = $unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)];
			}

		else:
			$categories = get_categories( array('parent' => 0, 'hide_empty' => 0 ) );
			$sorted = $categories;
		endif;

			echo '<div class="megamenu_blog_wrapper">';

				echo '<div class="row small-collapse">';

				$lcol = (isset($theme_location) && $theme_location == 'gbt_nav_but' )? 4 : 3;
				$rcol = (isset($theme_location) && $theme_location == 'gbt_nav_but' )? 8 : 9;

				echo '<div class="small-12 medium-12 large-'.$lcol.' columns">'; ?>
					<div class="row is-collapse-child"><div class="small-12 medium-12 columns"><dl class="megamenu_posts_category_list site-secondary-font">
						<dt>
							<a data-catid="all" href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>">
								<?php esc_html_e('All Articles', 'the-hanger'); ?>
							</a>
						</dt>
					<?php foreach( $sorted as $category ) { ?>
					        <dt>
					        	<a data-catid="<?php echo esc_attr($category->term_id); ?>" href="<?php echo esc_url(get_term_link( $category->term_id ));?>">
					        		<?php echo esc_html(esc_html( $category->name )); ?>
					        	</a>
					        </dt>
					<?php
					}
					echo '<dd></dd></dl></div></div>';
				echo '</div>';

				$noposts = (isset($theme_location) && $theme_location == 'gbt_nav_but' )? 4 : 3;
				$nocols  = (isset($theme_location) && $theme_location == 'gbt_nav_but' )? 2 : 3;
				$recent_posts = wp_get_recent_posts( array("numberposts" => $noposts, 'post_status'      => 'publish'));
				echo '<div class="small-12 medium-12 large-'.$rcol.' columns">';

					echo '<div class="megamenu_posts">';
					echo '<div class="megamenu_posts_overlay"></div>';
					echo '<div class="row small-up-1 large-up-'.$nocols.'">';

					foreach( $recent_posts as $recent ) {
						echo '<div class="column">';
							echo '<a href="' . get_permalink($recent["ID"]) . '" class="megamenu_post">';
								if( has_post_thumbnail($recent["ID"]) ) :
									echo '<div class="megamenu_post_image">' . get_the_post_thumbnail($recent["ID"], 'medium_large') . '</div>';
								endif;
								echo '<span class="megamenu_post_title">' . $recent["post_title"] . '</span>';
							echo '</a>';
						echo '</div>';
					}

					echo '</div>';
					echo '</div>';

				echo '</div>'; // end large-9

				echo '</div>'; // end row
			echo '</div>'; // end megamenu_blog_wrapper

			wp_reset_postdata();

		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
endif;

if ( !function_exists( 'getbowtied_megamenu_output_shop_mega' )):
	/**
	 * Build the layout for the "Shop" type megamenu
	 *
	 * @param  int $theID  id of the menu item
	 *
	 * @return html
	 */
	function getbowtied_megamenu_output_shop_mega( $theID, $in_cat= false, $loc= false) {
		if ( !GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) return;
			$cat_list = GBT_Opt::getOption('product_categories_megamenu_' . $theID );
			ob_start();
			if ($in_cat !== true):
				$args= array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'menu_order' => 'asc',  'parent' =>0, 'include' => $cat_list );
			else:
				$args= array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'menu_order' => 'asc',  'parent' =>$theID, 'include' => $cat_list );
			endif;
			$cats = get_terms( $args );
			if ( is_array($cat_list)):
			$unsorted = array();
			$sorted   = array();

			foreach ($cats as $v) {
				$unsorted[$v->term_id] = $v;
			}

			foreach ($cat_list as $v) {
				if (isset($unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)]))
					$sorted[] = $unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)];
			}
			else:
				if ( GBT_Opt::getOption('thumbnail_shop_megamenu_' . $theID, false) == true)
					$sorted = array_slice($cats, 0, 4);
				else
					$sorted = array_slice($cats, 0, 6);
			endif;

			echo '<div class="megamenu_category_wrapper">';

				echo '<div class="row">';

					echo '<div class="' . ( GBT_Opt::getOption('featured_shop_megamenu_' . $theID, false) == true ? (($loc=='gbt_nav_but' || $in_cat== true)? 'large-8': 'large-9') : 'large-12' ) . ' columns">';

						$cno = ($loc=='gbt_nav_but' || $in_cat == true )? 2 : 3;

						$cno2 = ($loc=='gbt_nav_but' || $in_cat == true )? 3 : 4;

						echo '<div class="megamenu_category_list row ' . ( GBT_Opt::getOption('featured_shop_megamenu_' . $theID, false) == true ? 'small-up-1 medium-up-2 large-up-'.$cno : 'small-up-1 medium-up-3 large-up-'.$cno2 ) . '">';

						foreach( $sorted as $cat ) {

					    	$category_image_html  = '';
					    	$subcategories_html   = '';

							if ( GBT_Opt::getOption('thumbnail_shop_megamenu_' . $theID, false) == true ):
								$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
						    	$image = wp_get_attachment_image_src( $thumbnail_id, 'medium_large' );

						    	if (!empty($image[0])) {
						    		$category_image_html = '<span style="background-image: url(' . $image[0] .') "  class="megamenu_thumbnail"></span>';
						    	}
						    endif;

						    if ( GBT_Opt::getOption('subcategories_shop_megamenu_' . $theID, true) == true ):
						    	$subcats = get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>$cat->term_id ) );
						    	if ( !empty ($subcats) && is_array( $subcats) ):
						    		$subcategories_html = '<div class="megamenu_subcategory_list">';
							    	foreach ( $subcats as $subcat ) {

							    		$subcategory_link_text = is_rtl() ? '<div><a href="%1$s">' : ' <div><a href="%1$s">%3$s ';

										if ( GBT_Opt::getOption('product_counter_megamenu_' . $theID, true) == true ) {

											$subcategory_link_text .= '<span class="count">%4$s</span>';
										}

										$subcategory_link_text .=  is_rtl() ? '%3$s</a></div>' : '</a></div>';

							    		$subcategories_html .= sprintf(
									        $subcategory_link_text,
									        esc_url( get_term_link( $subcat->term_id ) ),
									        esc_attr( sprintf( esc_html__( 'View all posts in %s', 'the-hanger' ), $subcat->name ) ),
									        esc_html( $subcat->name ),
									        $subcat->count
									    );
							    	}
							    	$subcategories_html .= '</div>';
							    endif;
						    endif;

						    $category_link_text = is_rtl() ? '<a href="%1$s">%3$s ' : '<a href="%1$s">%3$s %4$s ';

							if ( GBT_Opt::getOption('product_counter_megamenu_' . $theID, true) == true ) {

								$category_link_text .= '<span class="count">%5$s</span>';
							}

							$category_link_text .=  is_rtl() ? '<span>%4$s</span></a><br/>' : '</a><br/>';

						    $category_link = sprintf(
						        $category_link_text,
						        esc_url( get_term_link( $cat->term_id ) ),
						        esc_attr( sprintf( esc_html__( 'View all posts in %s', 'the-hanger' ), $cat->name ) ),
						        $category_image_html,
						        esc_html( $cat->name ),
						        $cat->count
						    );

						    echo '<div class="megamenu_category column ">'. $category_link . $subcategories_html .'</div>';
						}

						echo '</div>';

					echo '</div>';

					// Featured Products
					if ( GBT_Opt::getOption('featured_shop_megamenu_' . $theID, false) == true ):

					    $meta_query  = WC()->query->get_meta_query();
					    $tax_query   = WC()->query->get_tax_query();
					    $tax_query[] = array(
					        'taxonomy' => 'product_visibility',
					        'field'    => 'name',
					        'terms'    => 'featured',
					        'operator' => 'IN',
					    );

						$args = array(
						    'post_type'           => 'product',
						    'post_status'         => 'publish',
						    'ignore_sticky_posts' => 1,
						    'posts_per_page'      => -1,
						    'meta_query'          => $meta_query,
						    'tax_query'           => $tax_query,
						);

						$featured = new WP_Query( $args );

						if ( $featured->have_posts()):
							$count = 0; ?>
							<div class="<?php if ('gbt_nav_but' === $loc || $in_cat==true) { ?> large-4 <?php } else { ?> large-3 <?php } ?>columns gbt-stack-gallery-wrapper">
								<dl class="gbt-stack-gallery">
									<dt>
										<dl class="gbt-stack-items">
										<?php while ( $featured->have_posts() ) : $featured->the_post();
												$count++;
												$class= 'gbt-stack-item-out';
												switch ($count) {
													case '1':
														$class= 'gbt-stack-item-front';
														break;
													case '2':
														$class= 'gbt-stack-item-middle';
														break;
													case '3':
														$class= 'gbt-stack-item-back';
														break;
													default:
														$class= 'gbt-stack-item-out';
														break;
												}
												echo '<dt class="' . $class . '">';
												$_product = wc_get_product($featured->post->ID);
													echo '<a href="'.$_product->get_permalink().'"><div>'.wp_get_attachment_image($_product->get_image_id(), 'shop_catalog').'</div></a>';
													echo '<span class="gbt_featured_title"><a href="'.$_product->get_permalink().'">'.$_product->get_name().'</a></span>';
													echo wc_price($_product->get_price());
												echo '</dt>';
											endwhile; ?>
											<dd></dd>
										</dl>
										<dl class="gbt-stack-nav">
											<dt><a class="prev"><i class="thehanger-icons-arrow-left"></i></a></dt>
											<dt><a class="next"><i class="thehanger-icons-arrow-right"></i></a></dt>
											<dd></dd>
										</dl>
									</dt>
									<dd></dd>
								</dl>
							</div>
						<?php endif;
						wp_reset_postdata();

					?>

					<?php
					endif;

				echo '</div>';

			echo '</div>';

			if ( GBT_Opt::getOption('bottom_links_shop_megamenu_' . $theID, true) ): ?>
				<div class="megamenu_bottom_links">
					<?php if ( GBT_Opt::getOption('bottom_new_shop_megamenu_' . $theID, true)  ):
						if ( getbowtied_new_products_page_url() !== false ): ?>
							<a href="<?php echo esc_url(getbowtied_new_products_page_url()); ?>"><?php echo esc_html(getbowtied_new_products_title('')); ?></a>
						<?php endif;
					endif;

				if ( GBT_Opt::getOption('bottom_sale_shop_megamenu_' . $theID, true)  ):
					if ( getbowtied_sale_page_url() !== false ): ?>
						<a href="<?php echo esc_url(getbowtied_sale_page_url()); ?>"><?php echo esc_html(getbowtied_on_sale_products_title('')); ?></a>
					<?php endif;
				endif; ?>
				</div>
			<?php endif;

		    if ( GBT_Opt::getOption('bottom_cta_shop_megamenu_' . $theID, true) == true ):

				$cta_text = GBT_Opt::getOption('bottom_cta_text_shop_megamenu_' . $theID, '50&#37; SALE ON ALL WINTER ITEMS');

				if ( !empty( $cta_text) ) : ?>
					<div class="megamenu_cta"><p><?php echo esc_html($cta_text); ?></p></div>
				<?php endif;
			endif;
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
	}
endif;

if ( !function_exists( 'getbowtied_megamenu_output_shop_icons' )):
	/**
	 * Build the layout for the "Shop Icons" type megamenu
	 *
	 * @param  int $theID  id of the menu item
	 *
	 * @return html
	 */
	function getbowtied_megamenu_output_shop_icons( $theID, $cat= false) {
		if ( !GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) return;
			$cat_list = GBT_Opt::getOption('product_categories_icons_megamenu_' . $theID );
			ob_start();
			if ($cat !== true):
				$args= array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'menu_order' => 'asc',  'parent' =>0, 'include' => $cat_list );
			else:
				$args= array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'menu_order' => 'asc',  'parent' =>$theID, 'include' => $cat_list );
			endif;
			$cats = get_terms( $args );

			if ( is_array($cat_list)):
			$unsorted = array();
			$sorted   = array();

			foreach ($cats as $v) {
				$unsorted[$v->term_id] = $v;
			}

			foreach ($cat_list as $v) {
				if (isset($unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)]))
				$sorted[] = $unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)];
			}
			else:
				$sorted = $cats;
				$sorted = array_slice($cats, 0, 8);
			endif;

			echo '<div class="megamenu_icon_list">';
			foreach( $sorted as $cat ) {
				$icon_type = get_term_meta( $cat->term_id, 'getbowtied_icon_type', true );
				if ( $icon_type == 'custom_icon' ) {
					$thumbnail_id 	= get_term_meta( $cat->term_id, 'icon_img_id', true );
					if ($thumbnail_id)
						$icon = wp_get_attachment_thumb_url( $thumbnail_id );
					else
						$icon = wc_placeholder_img_src();
					// Prevent esc_url from breaking spaces in urls for image embeds
					// Ref: https://core.trac.wordpress.org/ticket/23605
					$icon = str_replace( ' ', '%20', $icon );
					echo '<a href="'.esc_url( get_term_link( $cat->term_id ) ).'"><img src="'. $icon .'" alt="'. $cat->name .'" /><span>'. $cat->name .'</span></a>';
				} else {
					$icon = get_term_meta( $cat->term_id, 'icon_id', true );
					if (!$icon) {
						$icon = 'thehanger-icons-alignment_align-all-1';
					}
					echo '<a href="'.esc_url( get_term_link( $cat->term_id ) ).'"><i class="'. $icon .'"></i><span>'. $cat->name .'</span></a>';
				}
			}
			echo '</div>';
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
	}
endif;

if ( !function_exists( 'getbowtied_megamenu_output_contact' )):
	/**
	 * Build the layout for the "Contact" type megamenu
	 *
	 * @param  int $theID  id of the menu item
	 *
	 * @return html
	 */
	function getbowtied_megamenu_output_contact( $theID, $loc= false ) {
		ob_start();

		echo '<div class="megamenu_contact">';

			echo '<div class="row collapse">';

				$image = GBT_Opt::getOption('map_image_' . $theID, get_template_directory_uri() . '/images/contact/map.jpg');

				if ( !empty($image)) {
					echo '<div class="small-12 ' . ($loc=='gbt_nav_but'? 'medium-7 large-7 columns' : 'medium-6 large-6 columns') . '">';
					echo '<img src="'.$image.'" alt="'. esc_html__('Contact','the-hanger').'">';
					echo '</div>';
				}

				$phone 			= GBT_Opt::getOption('phone_number_' . $theID, 'Call Us +40 123 123 123' );
				$business_hours = GBT_Opt::getOption('business_hours_' . $theID, 'Monday — Friday,<br/>9:00 AM — 5:00 PM' );
				$email 			= GBT_Opt::getOption('email_' . $theID, 'support@yourstore.com' );
				$location 		= GBT_Opt::getOption('location_' . $theID, '17 Princess Road<br/>London, Greater London<br/>NW1 8JRUK, Europe' );

				echo '<div class="small-12 ' . ($loc=='gbt_nav_but'? 'medium-4 large-4 medium-offset-1 columns' : 'medium-6 large-6 columns') . '">';

						echo '<div class="megamenu_contact_info">';

							echo '<div class="row">';

								echo '<div class="small-12 ' . ($loc=='gbt_nav_but'? 'medium-12 large-12 columns' : 'medium-6 large-6 columns') . '">';
									if ( !empty($phone) ) echo '<p><i class="thehanger-icons-phone_iphone"></i><span>' . sprintf(nl2br(esc_html__( '%s', 'the-hanger')), $phone) . '</span></p>';
									if ( !empty($business_hours) ) echo '<p><i class="thehanger-icons-calendar_wall-clock-2"></i><span>' . sprintf(nl2br(esc_html__( '%s', 'the-hanger')), $business_hours) . '</span></p>';
									if ( !empty($email) ) echo '<p><i class="thehanger-icons-mail_mail"></i><span>' . sprintf(nl2br(esc_html__('%s', 'the-hanger')), $email) . '</span></p>';
								if ($loc != 'gbt_nav_but'):
								echo '</div>';
								echo '<div class="small-12 medium-12 large-6 columns">';
								endif;
								if ( !empty($location) ) echo '<p><i class="thehanger-icons-ecommerce_shop-location2"></i><span>' . sprintf(nl2br(esc_html__( '%s', 'the-hanger')), $location) . '</span></p>';
								echo '</div>';

							echo '</div>'; // row

						echo '</div>'; // megamenu_contact_info

				echo '</div>'; // large-6

			echo '</div>'; // row collapse

		echo '</div>'; // megamenu_contact

		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
endif;

if (! function_exists( 'getbowtied_ajax_posts' )):
	/**
	 * Ajax request for fetching and showing blog posts in blog megamenu
	 *
	 * @return html
	 */
	function getbowtied_ajax_posts(){
		ob_start();
		$noposts = (isset($_POST['menuType']) && $_POST['menuType'] == 1 )? 4 : 3;
		$nocols  = (isset($_POST['menuType']) && $_POST['menuType'] == 1 )? 2 : 3;
		$recent_posts = wp_get_recent_posts( array("numberposts" => $noposts, 'post_status'      => 'publish', 'category'=> $_POST['catid']));
		if (empty($recent_posts) ) wp_send_json(0);
		echo '<div class="megamenu_posts_overlay"></div>';

			echo '<div class="row small-up-1 medium-up-'.$nocols.' large-up-'.$nocols.'">';

			foreach( $recent_posts as $recent ) {
				echo '<div class="column">';
					echo '<a href="' . get_permalink($recent["ID"]) . '" class="megamenu_post">';
						if( has_post_thumbnail($recent["ID"]) ) :
							echo '<div class="megamenu_post_image">' . get_the_post_thumbnail($recent["ID"], 'medium_large') . '</div>';
						endif;
						echo '<span class="megamenu_post_title" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</span>';
					echo '</a>';
				echo '</div>';
			}

			echo '</div>';

		$output = ob_get_contents();
		ob_end_clean();
		wp_send_json( $output, true);
	}

	add_action( 'wp_ajax_getbowtied_ajax_posts', 'getbowtied_ajax_posts' );
	add_action( 'wp_ajax_nopriv_getbowtied_ajax_posts', 'getbowtied_ajax_posts' );
endif;
