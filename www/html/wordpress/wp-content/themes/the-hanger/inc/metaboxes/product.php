<?php

// CREATE
add_action( 'add_meta_boxes', 'product_options_meta_box_add' );
function product_options_meta_box_add() {
    add_meta_box( 'product_options_meta_box', esc_html__("Product Options","the-hanger"), 'product_options_meta_box_content', 'product', 'side', 'high' );
}

function product_options_meta_box_content() {
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );

    $page_product_youtube = isset($values['page_product_youtube']) ? esc_attr( $values['page_product_youtube'][0]) : '';
    ?>

    <div class="components-panel__row">
        <div class="components-base-control">
            <div class="components-base-control__field">
                <label for="page_product_youtube"><?php esc_html_e("Youtube Video", "the-hanger"); ?></label>
                <input type="text" id="page_product_youtube" name="page_product_youtube" value="<?php echo esc_attr($page_product_youtube); ?>" style="width:100%">
            </div>
        </div>
    </div>

    <?php

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'product_options_meta_box', 'product_options_meta_box_nonce' );
}

// SAVE
add_action( 'save_post', 'product_options_meta_box_save' );
function product_options_meta_box_save($post_id) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['product_options_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['product_options_meta_box_nonce'], 'product_options_meta_box' ) ) return;

    // if our current user can't edit this post, bail
    if ( !current_user_can( 'edit_post', $post_id ) ) return;

    if( isset( $_POST['page_product_youtube'] ) )
    update_post_meta( $post_id, 'page_product_youtube', esc_attr( $_POST['page_product_youtube'] ) );

}
