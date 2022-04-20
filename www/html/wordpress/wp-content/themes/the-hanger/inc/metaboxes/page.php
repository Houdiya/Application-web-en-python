<?php

// CREATE
add_action( 'add_meta_boxes', 'getbowtied_page_options_meta_box_add' );
function getbowtied_page_options_meta_box_add() {
    add_meta_box( 'page_options_meta_box', 'Page Options', 'getbowtied_page_options_meta_box_content', 'page', 'side', 'high' );
}

function getbowtied_page_options_meta_box_content() {
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values                = get_post_custom( $post->ID );
    $page_title_check      = isset($values['page_title_meta_box_check'])    ? esc_attr($values['page_title_meta_box_check'][0])     : 'on';
	$footer_check          = isset($values['footer_meta_box_check'])        ? esc_attr($values['footer_meta_box_check'][0])         : 'on';
    $header_check          = isset($values['header_meta_box_check'])        ? esc_attr($values['header_meta_box_check'][0])         : 'on';
    ?>

    <div class="components-panel__row">
        <div class="components-base-control">
            <div class="components-base-control__field">
                <span class="components-checkbox-control__input-container">
                    <input type="checkbox" id="header_meta_box_check" name="header_meta_box_check" class="components-checkbox-control__input" <?php checked( $header_check, 'on' ); ?> />
                </span>
                <label for="header_meta_box_check">Show Header</label>
            </div>
        </div>
    </div>

    <div class="components-panel__row">
        <div class="components-base-control">
            <div class="components-base-control__field">
                <span class="components-checkbox-control__input-container">
                    <input type="checkbox" id="page_title_meta_box_check" name="page_title_meta_box_check" class="components-checkbox-control__input" <?php checked( $page_title_check, 'on' ); ?> />
                </span>
                <label for="page_title_meta_box_check">Show Page Title</label>
            </div>
        </div>
    </div>

    <div class="components-panel__row">
        <div class="components-base-control">
            <div class="components-base-control__field">
                <span class="components-checkbox-control__input-container">
                    <input type="checkbox" id="footer_meta_box_check" name="footer_meta_box_check" class="components-checkbox-control__input" <?php checked( $footer_check, 'on' ); ?> />
                </span>
                <label for="footer_meta_box_check">Show Footer</label>
            </div>
        </div>
    </div>

    <?php

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'page_options_meta_box', 'page_options_meta_box_nonce' );
}

// SAVE
add_action( 'save_post', 'getbowtied_page_options_meta_box_save' );
function getbowtied_page_options_meta_box_save($post_id) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['page_options_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['page_options_meta_box_nonce'], 'page_options_meta_box' ) ) return;

    // if our current user can't edit this post, bail
    if ( !current_user_can( 'edit_post', $post_id ) ) return;

    $page_title_chk = isset($_POST['page_title_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'page_title_meta_box_check', $page_title_chk );

	$footer_chk = isset($_POST['footer_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'footer_meta_box_check', $footer_chk );

    $header_chk = isset($_POST['header_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'header_meta_box_check', $header_chk );
}
