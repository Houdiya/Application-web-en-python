<?php
 
//======================================================
// Category icon fields.
//======================================================

function woocommerce_add_category_icon_img() {
	?>

	<div class="form-field getbowtied_custom_icon">
		<label><?php esc_html_e( 'Icon', 'the-hanger-extender' ); ?></label>
		<div id="product_cat_icon_img" style="float:left;margin-right:10px;"><img src="<?php echo wc_placeholder_img_src(); ?>" width="60px" height="60px" /></div>
		<div style="line-height:60px;">
			<input type="hidden" id="product_cat_icon_img_id" name="product_cat_icon_img_id" />
			<button type="submit" class="upload_icon_img_button button"><?php esc_html_e( 'Upload/Add image', 'the-hanger-extender' ); ?></button>
			<button type="submit" class="remove_icon_img_image_button button"><?php esc_html_e( 'Remove image', 'the-hanger-extender' ); ?></button>
		</div>

		<script>

			// Only show the "remove image" button when needed
			if ( ! jQuery('#product_cat_icon_img_id').val() )
				jQuery('.remove_icon_img_image_button').hide();

			// Uploading files
			var icon_file_frame;
			
			jQuery(document).on( 'click', '.upload_icon_img_button', function( event ){

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( icon_file_frame ) {
					icon_file_frame.open();
					return;
				}

				// Create the media frame.
				icon_file_frame = wp.media.frames.downloadable_file = wp.media({
					title: '<?php esc_html_e( 'Choose an image', 'the-hanger-extender' ); ?>',
					button: {
						text: '<?php esc_html_e( 'Use image', 'the-hanger-extender' ); ?>',
					},
					multiple: false
				});

				// When an image is selected, run a callback.
				icon_file_frame.on( 'select', function() {
					attachment = icon_file_frame.state().get('selection').first().toJSON();
					jQuery('#product_cat_icon_img_id').val( attachment.id );
					jQuery('#product_cat_icon_img img').attr('src', attachment.url );
					jQuery('.remove_icon_img_image_button').show();
				});

				// Finally, open the modal.
				icon_file_frame.open();

			});

			jQuery(document).on( 'click', '.remove_icon_img_image_button', function( event ){
				jQuery('#product_cat_icon_img img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
				jQuery('#product_cat_icon_img_id').val('');
				jQuery('.remove_icon_img_image_button').hide();
				return false;
			});

		</script>

		<div class="clear"></div>

	</div>

	<?php

}

add_action( 'product_cat_add_form_fields', 'woocommerce_add_category_icon_img', 50 );


//======================================================
// Edit category icon field.
//======================================================

function woocommerce_edit_category_icon_img( $term, $taxonomy ) {

	$display_type = get_term_meta( $term->term_id, 'display_type', true );
	$icon_img_id = absint( get_term_meta( $term->term_id, 'icon_img_id', true ) );

	if ( $icon_img_id ) {
		$image = wp_get_attachment_thumb_url( $icon_img_id );
	} else {
		$image = wc_placeholder_img_src();
	}

	?>

	<tr class="form-field getbowtied_custom_icon">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Icon', 'the-hanger-extender' ); ?></label></th>
		<td>
			<div id="product_cat_icon_img" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
			<div style="line-height:60px;">
				<input type="hidden" id="product_cat_icon_img_id" name="product_cat_icon_img_id" value="<?php echo esc_attr($icon_img_id); ?>" />
				<button type="submit" class="upload_icon_img_button button"><?php esc_html_e( 'Upload/Add image', 'the-hanger-extender' ); ?></button>
				<button type="submit" class="remove_icon_img_image_button button"><?php esc_html_e( 'Remove image', 'the-hanger-extender' ); ?></button>
			</div>

			<script>			 

			if (jQuery('#product_cat_thumbnail_id').val() == 0)
				 jQuery('.remove_image_button').hide();

			if (jQuery('#product_cat_icon_img_id').val() == 0)
				 jQuery('.remove_icon_img_image_button').hide();

				// Uploading files
				var icon_file_frame;

				jQuery(document).on( 'click', '.upload_icon_img_button', function( event ){

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( icon_file_frame ) {
						icon_file_frame.open();
						return;
					}

					// Create the media frame.
					icon_file_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php esc_html_e( 'Choose an image', 'the-hanger-extender' ); ?>',
						button: {
							text: '<?php esc_html_e( 'Use image', 'the-hanger-extender' ); ?>',
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					icon_file_frame.on( 'select', function() {
						attachment = icon_file_frame.state().get('selection').first().toJSON();
						jQuery('#product_cat_icon_img_id').val( attachment.id );
						jQuery('#product_cat_icon_img img').attr('src', attachment.url );
						jQuery('.remove_icon_img_image_button').show();
					});

					// Finally, open the modal.
					icon_file_frame.open();
				});

				jQuery(document).on( 'click', '.remove_icon_img_image_button', function( event ){
					jQuery('#product_cat_icon_img img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
					jQuery('#product_cat_icon_img_id').val('');
					jQuery('.remove_icon_img_image_button').hide();
					return false;
				});

			</script>

			<div class="clear"></div>

		</td>

	</tr>

	<?php

}

add_action( 'product_cat_edit_form_fields', 'woocommerce_edit_category_icon_img', 50, 2 );


//======================================================
// woocommerce_category_icon_img_save function.
//======================================================

function woocommerce_category_icon_img_save( $term_id, $tt_id, $taxonomy ) {	

	if ( isset( $_POST['product_cat_icon_img_id'] ) )
		update_term_meta( $term_id, 'icon_img_id', absint( $_POST['product_cat_icon_img_id'] ) );

	delete_transient( 'wc_term_counts' );

}

add_action( 'created_term', 'woocommerce_category_icon_img_save', 10, 3 );
add_action( 'edit_term', 'woocommerce_category_icon_img_save', 10, 3 );


//======================================================
// icon column added to category admin.
//======================================================

function woocommerce_product_cat_icon_img_columns( $columns ) {

	$new_columns = array();
	$new_columns['icon_img'] = esc_html__( 'Icon Img', 'the-hanger-extender' );

	return array_merge( $new_columns, $columns );

}

//======================================================
// Thumbnail column value added to category admin.
//======================================================

function woocommerce_product_cat_icon_img_column( $columns, $column, $id ) {

	if ( $column == 'icon_img' ) {

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

//======================================================
// woocommerce_get_category_icon_img function.
//======================================================

function woocommerce_get_category_icon_img($cat_ID = false) {

	if ($cat_ID==false && is_product_category()){
		global $wp_query;
		
		// get the query object
		$cat = $wp_query->get_queried_object();
		
		// get the thumbnail id user the term_id
		$cat_ID = $cat->term_id;
	}

    $thumbnail_id = get_term_meta($cat_ID, 'icon_img_id', true ); 

    // get the image URL
   return wp_get_attachment_url( $thumbnail_id ); 

}

//======================================================
// Styling the admin area
//======================================================

function product_cat_icon_img_column() {
   echo '<style>
			table.wp-list-table .column-icon_img {
				width: 40px;
				text-align: center;
				white-space: nowrap;
			}
			table.wp-list-table td.column-icon_img img {
				margin: 0;
				width: auto;
				height: auto;
				max-width: 40px;
				max-height: 40px;
				vertical-align: middle;
			}
         </style>';
}

add_action('admin_head', 'product_cat_icon_img_column');