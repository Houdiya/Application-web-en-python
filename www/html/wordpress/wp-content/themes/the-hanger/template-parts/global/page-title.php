<?php
if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
    $page_title_option = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );
} else {
    $page_title_option = "on";
}
?>

<?php if ( "on" == $page_title_option ) : ?>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

<?php endif; ?>