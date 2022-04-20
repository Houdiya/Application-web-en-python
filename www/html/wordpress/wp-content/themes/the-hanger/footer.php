            <?php
                if (get_post_meta( getbowtied_page_id(), 'footer_meta_box_check', true )) {
                    $page_footer_option = get_post_meta( getbowtied_page_id(), 'footer_meta_box_check', true );
                } else {
                    $page_footer_option = "on";
                }
            ?>

            <div class="hover_overlay_content"></div>

        </div><!-- .site-content-wrapper -->

        <?php if ( (1 == GBT_Opt::getOption('footer_prefooter')) && ($page_footer_option == "on") ) : ?>
            <?php get_template_part( 'template-parts/footers/prefooter' ) ?>
        <?php endif; ?>

        <?php if ( $page_footer_option == "on" ) : ?>
            <?php get_template_part( 'template-parts/footers/footer', 'style-1' ) ?>
        <?php endif; ?>     

        <div class="site-content" id="getbowtied_woocommerce_quickview">
            <div class="getbowtied_qv_content site-content"></div>
        </div> 

    </div><!-- .site-wrapper -->

    <!-- .site-search -->
    <?php if( 1 == GBT_Opt::getOption('simple_header_search_toggle') && 'style-2' == GBT_Opt::getOption('header_template') ) : ?>
        <div class="off-canvas-wrapper">
            <div class="site-search off-canvas position-top is-transition-overlap" id="searchOffCanvas" data-off-canvas>
                <div class="row has-scrollbar">

                    <div class="header-search">
                                    
                        <?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
                            <?php do_action('getbowtied_ajax_search_form'); ?>
                        <?php else: ?>
                            <?php get_search_form(); ?>
                        <?php endif; ?>

                        <button class="close-button" aria-label="Close menu" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                </div>
            </div>
        </div><!-- .site-search -->
    <?php endif; ?>

    <?php wp_footer(); ?>

</body>
</html>