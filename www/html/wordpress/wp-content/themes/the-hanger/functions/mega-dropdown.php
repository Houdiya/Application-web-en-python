<?php 

if ( !function_exists( 'getbowtied_walk_categories' )):
/**
 * Walk and output the category tree
 *
 * @param  $cat category id
 *
 */
function getbowtied_walk_categories( $cat, $sticky = false ) {
	if (!class_exists('WooCommerce')) return;
	$selected_cats = GBT_Opt::getOption('nav_button_categories', 0);
	if ( is_array( $selected_cats ) && $cat == 0):
		$categories =get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'parent' => $cat, 'include' => $selected_cats ) );
			
		$unsorted = array();
		$sorted   = array();

		foreach ($categories as $v) {
			$unsorted[$v->term_id] = $v;
		}

		foreach ($selected_cats as $v) {
			if (isset($unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)]))
				$sorted[] = $unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)];
		}

		$next = is_array($sorted)? $sorted : $categories;

	else: 
		$next =get_terms( array( 'taxonomy' => 'product_cat', 'menu_order' => 'asc', 'hide_empty' => 0,  'parent' => $cat) );
	endif;

	$has_icons= (GBT_Opt::getOption('nav_button_show_category_icons', 1) == 1)? true : false;
	$has_product_counts = (GBT_Opt::getOption('nav_button_show_product_counts', 1) == 1)? true : false;
	$icon_class= $has_icons==true? 'has-icons' : '';

	if( $next ) :    
		if ($cat != 0):
			echo '<ul class="menu vertical nested site-main-font">';
		else:
			echo '<ul class="' . $icon_class . ' vertical menu drilldown mega-dropdown-categories" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.esc_html__("Back", "the-hanger").'&lt;/a&gt;&lt;/li&gt;" data-drilldown data-auto-height="true" data-animate-height="true" data-parent-link="true">';
		endif;

		if ($cat == 0):

			$new_products_icon 	= $has_icons?'<i class="thehanger-icons-ui_star"></i>' : '';
			$on_sale_icon 		= $has_icons?'<i class="thehanger-icons-ecommerce_discount-symbol"></i>' : '';

			if ( getbowtied_new_products_page_url() !== false ):
				$product_counter = $has_product_counts? '<span class="count">' . getbowtied_count_new_products() . '</span>' : '';
				echo 			'<li>
									<a class="site-secondary-font" href="'. getbowtied_new_products_page_url().'">  ' . $new_products_icon .'   '. getbowtied_new_products_title('') .
									$product_counter . '</a>
								</li>';
			endif;

			if ( getbowtied_sale_page_url() !== false ):
				$product_counter = $has_product_counts? '<span class="count">' . getbowtied_count_sale_products() . '</span>' : '';
				echo 			'<li>
									<a class="site-secondary-font" href="'. getbowtied_sale_page_url().'"> ' . $on_sale_icon . '  '. getbowtied_on_sale_products_title('') .
									$product_counter . '</a>
								</li>';
			endif;

		endif;

		foreach( $next as $cat ) :
			$icon_type = get_term_meta( $cat->term_id, 'getbowtied_icon_type', true );

			$category_icon = '';
			// Fetch the category icon
			if ( $has_icons ) {
				if ( ($icon_type == 'theme_default') || ($icon_type != 'custom_icon' && get_term_meta( $cat->term_id, 'icon_id', true )) ) {
					$icon = get_term_meta( $cat->term_id, 'icon_id', true );
					$category_icon = '<i class="' . $icon . '"></i>';
				}

				if ($icon_type == 'custom_icon') {
					$thumbnail_id 	= get_term_meta( $cat->term_id, 'icon_img_id', true );
					if ($thumbnail_id)
						$image = wp_get_attachment_thumb_url( $thumbnail_id );
					else
						$image = wc_placeholder_img_src();
					// Prevent esc_url from breaking spaces in urls for image embeds
					// Ref: https://core.trac.wordpress.org/ticket/23605
					$image = str_replace( ' ', '%20', $image );
					$category_icon = '<img src="' . esc_url( $image ) . '"  />';
				}

				if (empty($icon_type)) {
					$icon = 'thehanger-icons-alignment_align-all-1';
					$category_icon = '<i class="' . $icon . '"></i>';
				}
			}

			// Is it a megamenu?
			if (GBT_Opt::getOption('enable_megamenu_' . $cat->term_id, 0) === true):
				// do megamenu stuff
				if ($sticky === true) {
					$fragment = 'sticky-dropdown-';
				} else {
					$fragment = 'dropdown-';
				}
				$product_counter = $has_product_counts? '<span class="count">'. $cat->count . '</span>' : '';
				$item_output = '<li class="getbowtied_megamenu"><a data-toggle="' . $fragment . 'panel-'.$cat->term_id.'" aria-controls="' . $fragment . 'panel-'.$cat->term_id.'" href="'.get_term_link( $cat->term_id ).'">' . $category_icon . '<span>' . $cat->name .'</span> ' . $product_counter . '</a></li>';
				$megamenu_content = '';
				$mega_wrapper = 'class="gbt-mega-menu-content dropdown-pane" data-dropdown data-hover="true" data-hover-pane="true"';
				
				switch ( GBT_Opt::getOption( 'typeof_megamenu_' . $cat->term_id, 'shop_mega')) {
					case 'shop_mega':
						$megamenu_content .= '<div id="' . $fragment . 'panel-'.$cat->term_id.'" class="gbt-mega-menu-content dropdown-pane" data-dropdown data-hover="true" data-hover-pane="true">' . getbowtied_megamenu_output_shop_mega( $cat->term_id, true ). '</div> ';
						break;

					case 'shop_icons':
						$megamenu_content .= '<div id="' . $fragment . 'dropdown-panel-'.$cat->term_id.'" class="gbt-mega-menu-content dropdown-pane" data-dropdown data-hover="true" data-hover-pane="true">' . getbowtied_megamenu_output_shop_icons( $cat->term_id, true ). '</div> ';
						break;

					default: 
						break;
				}
				$args_kses = array(
					'div' => array('class' => array(), 'id'=> array(), 'data-dropdown'=>array(), 'data-hover'=>array(), 'data-hover-pane'=>array()),
					'span' => array('class' => array(), 'style'=> array()),
					'br' => array(),
					'a' => array('href'=>array(), 'class'=> array(), 'data-toggle' =>array(), 'data-catid'=> array() ),
					'i' => array('class'=>array()),
					'img' => array('src'=> array(), 'class' => array(), 'width'=> array(), 'height'=>array()),
					'li'  => array('class' => array()),
					'ul'  => array('class' => array()),
					'dt'  => array('class' => array()),
					'dl'  => array('class' => array()),
					'dd'  => array('class' => array()),
					'p'   => array(),
				);
				echo wp_kses($item_output, $args_kses);
				add_action($fragment . 'getbowtied_mega_dropdown_megamenu_action', function() use ( $megamenu_content, $args_kses ) { echo wp_kses($megamenu_content, $args_kses); });
			// Walk the tree normally
			else:
				if (!empty(get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' => $cat->term_id )))):
					echo '<li class="menu-item-has-children">';
				else:
					echo '<li>';
				endif;

				$product_counter = $has_product_counts? '<span class="count">'. $cat->count . '</span>' : '';

				echo '<a href="' . get_term_link( $cat->term_id ) . '" title="' . $cat->name . '" ' . '>' . $category_icon . $cat->name . ' ' . $product_counter . '</a>  '; 
				getbowtied_walk_categories( $cat->term_id );
				echo '</li>';
			endif;
		endforeach;   
		echo '</ul>'; 

	endif;
}
endif;

if ( !function_exists( 'getbowtied_mega_dropdown_action_output' )):
/**
 * Output the mega button
 * 
 */
// add_action('getbowtied_mega_dropdown_action', 'getbowtied_mega_dropdown_action_output');
function getbowtied_mega_dropdown_action_output( $sticky = false ) {
	
	if (GBT_Opt::getOption('mega_dropdown_toggle', 1) == 1):
		
		ob_start();

		echo '<div class="gbt-mega-dropdown-content">';
			echo '<div class="gbt-mega-dropdown-content-inside">';
				
				if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE && GBT_Opt::getOption('nav_button_show_categories', 1) == 1):
					getbowtied_walk_categories(0, $sticky);
				endif;
				
				if (GBT_Opt::getOption('nav_button_enable_menu', 1) == 1):

					if ($sticky === true) {
						$menu_class = 'vertical menu drilldown mega-dropdown-menu sticky';
					} else {
						$menu_class = 'vertical menu drilldown mega-dropdown-menu';
					}
		            wp_nav_menu(array(
						'theme_location'    => 'gbt_nav_but',
						'container'         => false,
						'menu_class'        => $menu_class,
						'items_wrap'        => '<ul id="%1$s" class="%2$s" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.esc_html__("Back", "the-hanger").'&lt;/a&gt;&lt;/li&gt;" data-drilldown data-auto-height="true" data-animate-height="true" data-parent-link="true">%3$s</ul>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'fallback_cb'       => false,
						'walker'            => new Foundation_Drilldown_Menu_Walker(),
					));
				endif;

			echo '</div>';
		echo '</div>';

	endif;
}
endif;