<?php

//======================================================
// Category icon fields.
//======================================================

function woocommerce_add_category_icon() {
	$icon = "thehanger-icons-alignment_align-all-1";
	?>

	<div class="form-field getbowtied_theme_default"">
		<label><?php esc_html_e( 'Icon', 'the-hanger-extender' ); ?></label>
		<input class="widefat icon_picker_input" id="<?php echo esc_attr($icon); ?>" name="icon_picker_input" type="hidden" value="<?php echo esc_attr($icon); ?>">
		<div id="preview_icon_picker" data-target="#<?php echo esc_attr($icon); ?>" class="button icon-picker <?php echo esc_attr($icon); ?>"></div>
		<div class="clear"></div>
	</div>

	<?php

}

add_action( 'product_cat_add_form_fields', 'woocommerce_add_category_icon', 50 );


//======================================================
// Edit category icon field.
//======================================================

function woocommerce_edit_category_icon( $term, $taxonomy ) {

	$icon = get_term_meta( $term->term_id, 'icon_id', true );
	$icon = empty($icon)? 'thehanger-icons-alignment_align-all-1' : $icon;
	?>

	<tr class="form-field getbowtied_theme_default">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Icon', 'the-hanger-extender' ); ?></label></th>
		<td>
			<input class="widefat icon_picker_input" id="<?php echo esc_attr($icon); ?>" name="icon_picker_input" type="hidden" value="<?php echo esc_attr($icon); ?>">
			<div id="preview_icon_picker" data-target="#<?php echo esc_attr($icon); ?>" class="button icon-picker <?php echo esc_attr($icon); ?>"></div>
			<div class="clear"></div>
		</td>
	</tr>

	<?php

}

add_action( 'product_cat_edit_form_fields', 'woocommerce_edit_category_icon', 50, 2 );


//======================================================
// woocommerce_category_icon_save function.
//======================================================

function woocommerce_category_icon_save( $term_id, $tt_id, $taxonomy ) {

	if ( isset( $_POST['icon_picker_input'] ) ) {
		update_term_meta( $term_id, 'icon_id', $_POST['icon_picker_input'] );
	}

	delete_transient( 'wc_term_counts' );

}

add_action( 'created_term', 'woocommerce_category_icon_save', 10, 3 );
add_action( 'edit_term', 'woocommerce_category_icon_save', 10, 3 );


//======================================================
// icon column added to category admin.
//======================================================

function woocommerce_product_cat_icon_columns( $columns ) {

	$new_columns = array();
	$new_columns['icon'] = esc_html__( 'Icon', 'the-hanger-extender' );

	return array_merge( $new_columns, $columns );

}

//======================================================
// Thumbnail column value added to category admin.
//======================================================

function woocommerce_product_cat_icon_column( $columns, $column, $id ) {

	if ( $column == 'icon' ) {

		$icon = get_term_meta( $id, 'icon_id', true );

		$columns .= '<i class="' . $icon . '"></i>';

	}

	return $columns;

}


//======================================================
// woocommerce_get_category_icon function.
//======================================================

function woocommerce_get_category_icon($cat_ID = false) {

	if ( $cat_ID == false && is_product_category() ){
		global $wp_query;

		// get the query object
		$cat = $wp_query->get_queried_object();

		// get the thumbnail id user the term_id
		$cat_ID = $cat->term_id;
	}

    $icon = get_term_meta($cat_ID, 'icon_id', true );

    // get the icon
   return $icon;

}


//======================================================
// Styling the admin area
//======================================================

function product_cat_icon_column() {
   echo '<style>
			table.wp-list-table .column-icon {
				width: 40px;
				text-align: center;
				white-space: nowrap;
			}
			table.wp-list-table .column-icon i {
				font-size: 18px;
				margin-top: 10px;
				display: block;
			}
         </style>';
}

add_action('admin_head', 'product_cat_icon_column');

// =============================================================================
// Enqueue Admin Scripts
// =============================================================================

function thehanger_extender_icon_admin_scripts() {
    wp_enqueue_style(
		'getbowtied_admin_icon_picker',
		plugins_url( 'assets/css/icon-picker.css', __FILE__ ),
		array()
	);

    wp_enqueue_script(
        'getbowtied_admin_icon_picker',
        plugins_url( 'assets/js/icon-picker.js', __FILE__ ),
        array('jquery')
    );
}

add_action( 'admin_enqueue_scripts', 'thehanger_extender_icon_admin_scripts' );
