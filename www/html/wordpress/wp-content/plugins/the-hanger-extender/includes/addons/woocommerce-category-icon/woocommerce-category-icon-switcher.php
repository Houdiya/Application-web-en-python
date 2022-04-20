<?php

//======================================================
// Category icon fields.
//======================================================

function woocommerce_add_category_icon_switch() {
	$icon = "thehanger-icons-alignment_align-all-1";
	?>

	<div class="form-field">
		<label><?php esc_html_e( 'Icon Type', 'the-hanger-extender' ); ?></label>
		<select name="getbowtied_icon_type">
			<option value="theme_default" selected><?php esc_html_e('Theme Default', 'the-hanger-extender'); ?></option>
			<option value="custom_icon"><?php esc_html_e('Custom Icon', 'the-hanger-extender'); ?></option>
		</select>
		<div class="clear"></div>
			<script>
				jQuery('select[name="getbowtied_icon_type').on('change', function(){
					if (jQuery(this).val() == 'theme_default') {
						jQuery('.form-field.getbowtied_custom_icon').hide();
						jQuery('.form-field.getbowtied_theme_default').show()
					}

					if (jQuery(this).val() == 'custom_icon') {
						jQuery('.form-field.getbowtied_theme_default').hide();
						jQuery('.form-field.getbowtied_custom_icon').show();
					}
				})

				jQuery( function(){
					jQuery('select[name="getbowtied_icon_type').change();
				})
			</script>
	</div>

	<?php

}

add_action( 'product_cat_add_form_fields', 'woocommerce_add_category_icon_switch', 50 );


//======================================================
// Edit category icon field.
//======================================================

function woocommerce_edit_category_icon_switch( $term, $taxonomy ) {
	$icon = get_term_meta( $term->term_id, 'icon_id', true );
	?>

	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Icon Type', 'the-hanger-extender' ); ?></label></th>
		<td>
			<?php
				$icon_type = get_term_meta( $term->term_id, 'getbowtied_icon_type', true );
			?>
			<select name="getbowtied_icon_type">
				<option value="theme_default" <?php if ($icon_type ==  'theme_default') echo "selected"; ?>><?php esc_html_e('Theme Default', 'the-hanger-extender'); ?></option>
				<option value="custom_icon"   <?php if ($icon_type ==  'custom_icon') echo "selected"; ?>><?php esc_html_e('Custom Icon', 'the-hanger-extender'); ?></option>
			</select>

			<script>
				jQuery('select[name="getbowtied_icon_type').on('change', function(){
					if (jQuery(this).val() == 'theme_default') {
						jQuery('.form-field.getbowtied_custom_icon').hide();
						jQuery('.form-field.getbowtied_theme_default').show()
					}

					if (jQuery(this).val() == 'custom_icon') {
						jQuery('.form-field.getbowtied_theme_default').hide();
						jQuery('.form-field.getbowtied_custom_icon').show();
					}
				})

				jQuery( function(){
					jQuery('select[name="getbowtied_icon_type').change();
				})
			</script>
		</td>
	</tr>



	<?php

}

add_action( 'product_cat_edit_form_fields', 'woocommerce_edit_category_icon_switch', 50, 2 );


//======================================================
// woocommerce_category_icon_save function.
//======================================================

function woocommerce_category_icon_switch_save( $term_id, $tt_id, $taxonomy ) {

	if ( isset( $_POST['getbowtied_icon_type'] ) ) {
		update_term_meta( $term_id, 'getbowtied_icon_type', $_POST['getbowtied_icon_type'] );
	}

	delete_transient( 'wc_term_counts' );

}

add_action( 'created_term', 'woocommerce_category_icon_switch_save', 10, 3 );
add_action( 'edit_term', 'woocommerce_category_icon_switch_save', 10, 3 );


//======================================================
// icon column added to category admin.
//======================================================

function woocommerce_product_cat_icon_switch_columns( $columns ) {

	$new_columns = array();
	$new_columns['icon'] = esc_html__( 'Icon', 'the-hanger-extender' );

	return array_merge( $new_columns, $columns );

}

add_filter( 'manage_edit-product_cat_columns', 'woocommerce_product_cat_icon_switch_columns', 5 );


//======================================================
// Thumbnail column value added to category admin.
//======================================================

function woocommerce_product_cat_icon_switch_column( $columns, $column, $id ) {

	if ($column != 'icon') return $columns;

	$icon_type = get_term_meta( $id, 'getbowtied_icon_type', true );

	if ( ($icon_type == 'theme_default') || ($icon_type != 'custom_icon' && get_term_meta( $id, 'icon_id', true )) ) {
		$icon = get_term_meta( $id, 'icon_id', true );
		$columns .= '<i class="' . $icon . '"></i>';
	}

	if ($icon_type == 'custom_icon') {
		$thumbnail_id 	= get_term_meta( $id, 'icon_img_id', true );
		if ($thumbnail_id)
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		else
			$image = wc_placeholder_img_src();
		// Prevent esc_url from breaking spaces in urls for image embeds
		// Ref: https://core.trac.wordpress.org/ticket/23605
		$image = str_replace( ' ', '%20', $image );
		$columns .= '<img src="' . esc_url( $image ) . '" class="wp-post-image" height="48" width="48" />';
	}

	return $columns;

}

add_filter( 'manage_product_cat_custom_column', 'woocommerce_product_cat_icon_switch_column', 10, 3 );


//======================================================
// woocommerce_get_category_icon function.
//======================================================

function woocommerce_get_category_icon_switch($cat_ID = false) {

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

function product_cat_icon_switch_column() {
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

add_action('admin_head', 'product_cat_icon_switch_column');
