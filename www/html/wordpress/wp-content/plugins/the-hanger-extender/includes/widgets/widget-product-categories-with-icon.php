<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style(
		'getbowtied-th-widget-styles',
		plugins_url( 'assets/css/widget-product-categories-with-icon.css', __FILE__ ),
		array()
	);

	wp_enqueue_script(
		'getbowtied-th-widget-scripts',
		plugins_url( 'assets/js/widget-product-categories-with-icon.js', __FILE__ ),
		array( 'jquery' )
	);
});

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

	if( !class_exists('WC_Product_Cat_List_With_Icon_Walker') ) {
		class WC_Product_Cat_List_With_Icon_Walker extends Walker {

			public $tree_type = 'product_cat';

			public $db_fields = array(
				'parent' => 'parent',
				'id'     => 'term_id',
				'slug'   => 'slug',
			);

			public function start_lvl( &$output, $depth = 0, $args = array() ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "$indent<ul class='children'".($args['expand_all']==1? 'style=display:block':'').">\n";
			}

			public function end_lvl( &$output, $depth = 0, $args = array() ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "$indent</ul>\n";
			}

			public function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {

				$output .= '<li class="cat-item cat-item-' . $cat->term_id;

				if ( $args['current_category'] == $cat->term_id ) {
					$output .= ' current-cat';
				}

				if ( $args['has_children'] ) {
					$output .= ' cat-parent';
					$drop_icon = '<span class="dropdown_icon thehanger-icons-arrow-down-dark"></span>';
				} else {
					$drop_icon = '';
				}

				if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
					$output .= ' active current-cat-parent';
				}

				if ( $depth == 0 ) {
					$cat_link_classes = 'site-secondary-font';
				} else {
					$cat_link_classes = '';
				}

				if ($args['expand_all'] == 1) {
					$output .= ' active';
				}

				$icon_type = get_term_meta( $cat->term_id, 'getbowtied_icon_type', true );
				$category_icon= '';

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

				if ( ! empty( $args['hide_icon'] ) ) {
					$category_icon = '';
				}

				$output .= '"><a class="' . $cat_link_classes . '" href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . $category_icon . sprintf(_x( '%s', 'product category name', 'woocommerce' ), $cat->name) . '</a>';

				if ( $args['show_count'] ) {
					$output .= ' <span class="count">' . $cat->count . '</span>';
				}

				$output .= $drop_icon;
			}

			public function end_el( &$output, $cat, $depth = 0, $args = array() ) {
				$output .= "</li>\n";
			}

			public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
				if ( ! $element || ( 0 === $element->count && ! empty( $args[0]['hide_empty'] ) ) ) {
					return;
				}
				parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}
		}
	}

	if( !class_exists('WC_Widget_Custom_Product_Categories') ) {
		class WC_Widget_Custom_Product_Categories extends WC_Widget {

			public $cat_ancestors;
			public $current_cat;

			public function __construct() {
				$this->widget_cssclass    = 'woocommerce widget_product_categories_with_icon';
				$this->widget_description = __( 'A list of product categories.', 'the-hanger-extender' );
				$this->widget_id          = 'woocommerce_product_categories_with_icon';
				$this->widget_name        = __( 'WooCommerce product categories with icon', 'the-hanger-extender' );
				$this->settings           = array(
					'orderby' => array(
						'type'  => 'select',
						'std'   => 'name',
						'label' => __( 'Order by', 'the-hanger-extender' ),
						'options' => array(
							'order' => __( 'Category order', 'the-hanger-extender' ),
							'name'  => __( 'Name', 'the-hanger-extender' ),
						),
					),
					'count' => array(
						'type'  => 'checkbox',
						'std'   => 1,
						'label' => __( 'Show product counts', 'the-hanger-extender' ),
					),
					'hide_empty' => array(
						'type'  => 'checkbox',
						'std'   => 0,
						'label' => __( 'Hide empty categories', 'the-hanger-extender' ),
					),
					'hide_icon' => array(
						'type'  => 'checkbox',
						'std'   => 0,
						'label' => __( 'Hide category icon', 'the-hanger-extender' ),
					),
					'expand_all' => array(
						'type'  => 'checkbox',
						'std'   => 0,
						'label' => __( 'Expand All', 'the-hanger-extender' ),
					),
				);

				parent::__construct();
			}

			public function widget( $args, $instance ) {
				global $wp_query, $post;

				$count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
				$orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : $this->settings['orderby']['std'];
				$hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
				$hide_icon          = isset( $instance['hide_icon'] ) ? $instance['hide_icon'] : $this->settings['hide_icon']['std'];
				$expand_all         = isset( $instance['expand_all'] ) ? $instance['expand_all'] : $this->settings['expand_all']['std'];
				$list_args          = array( 'show_count' => $count, 'taxonomy' => 'product_cat', 'hide_empty' => $hide_empty, 'hide_icon' => $hide_icon, 'expand_all' => $expand_all );

				// Menu Order
				$list_args['menu_order'] = false;
				if ( 'order' === $orderby ) {
					$list_args['menu_order'] = 'asc';
				} else {
					$list_args['orderby']    = 'title';
				}

				// Setup Current Category
				$this->current_cat   = false;
				$this->cat_ancestors = array();

				if ( is_tax( 'product_cat' ) ) {

					$this->current_cat   = $wp_query->queried_object;
					$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );

				} elseif ( is_singular( 'product' ) ) {

					$product_category = wc_get_product_terms( $post->ID, 'product_cat', apply_filters( 'woocommerce_product_categories_widget_product_terms_args', array( 'orderby' => 'parent' ) ) );

					if ( ! empty( $product_category ) ) {
						$this->current_cat   = end( $product_category );
						$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );
					}
				}

				$this->widget_start( $args, $instance );

				$list_args['walker']                     = new WC_Product_Cat_List_With_Icon_Walker;
				$list_args['title_li']                   = '';
				$list_args['pad_counts']                 = 1;
				$list_args['show_option_none']           = __( 'No product categories exist.', 'the-hanger-extender' );
				$list_args['current_category']           = ( $this->current_cat ) ? $this->current_cat->term_id : '';
				$list_args['current_category_ancestors'] = $this->cat_ancestors;

				echo '<ul class="product-categories-with-icon">';

				$links_html= '';
				$new_products_icon = '';
				$on_sale_icon = '';

				if ( ! $hide_icon )  {
					$new_products_icon 	= '<i class="thehanger-icons-ui_star"></i>';
					$on_sale_icon 		= '<i class="thehanger-icons-ecommerce_discount-symbol"></i>';
				}

				if ( getbowtied_new_products_page_url() !== false ):
					$links_html .= '<li class="cat-item">
										<a class="site-secondary-font" href="'. getbowtied_new_products_page_url().'">  ' . $new_products_icon .'   '. getbowtied_new_products_title('') .
										'</a>
										<span class="count">' . getbowtied_count_new_products() . '</span>
									</li>';
				endif;

				if ( getbowtied_sale_page_url() !== false ):
					$links_html .= '<li class="cat-item">
										<a class="site-secondary-font" href="'. getbowtied_sale_page_url().'"> ' . $on_sale_icon . '  '. getbowtied_on_sale_products_title('') .
										'</a>
										<span class="count">' . getbowtied_count_sale_products() . '</span>
									</li>';
				endif;

				print $links_html;

				wp_list_categories( $list_args );

				echo '</ul>';

				$this->widget_end( $args );
			}
		}
	}

	function th_register_custom_product_categories_widget() {
		register_widget( 'WC_Widget_Custom_Product_Categories' );
	}

	add_action( 'widgets_init', 'th_register_custom_product_categories_widget' );
}
