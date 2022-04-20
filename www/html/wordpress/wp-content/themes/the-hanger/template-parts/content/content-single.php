<?php
	$author = get_the_author();
	$author_meta_desc = get_the_author_meta( 'description' )
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php if ( GBT_Opt::getOption('blog_single_featured') == 1 ) the_post_thumbnail('large'); ?>

	</header><!-- .entry-header -->

	<div class="row">

		<div class="small-12 small-centered medium-12 large-12 columns">

			<div class="entry-content">

				<div class="entry-meta site-secondary-font">

					<div class="entry-meta__item entry-meta-author">

						<a class="author-all-posts" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>">
							<?php echo get_the_author_meta( 'nickname' ) ?>
						</a>

						<span><?php esc_html_e( 'on ', 'the-hanger' ); ?></span><?php echo getbowtied_posted_on(); ?>

					</div>

					<div class="entry-meta__item entry-meta_post_comments">
						<?php if ( comments_open() ) : ?>
							<i class="thehanger-icons-chat_chat-15"></i>
							<a href="#comments">
						 		<span class="comments_number"><?php comments_number( '0 <span>'.esc_html__( 'Comments', 'the-hanger').'</span>', '1 <span>'.esc_html__( 'Comment', 'the-hanger').'</span>', '% <span>'.esc_html__( 'Comments', 'the-hanger').'</span>' ); ?></span>
						 	</a>
						<?php endif; ?>
					</div>

				</div>

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pages">' . esc_html__( 'Pages:', 'the-hanger' ) . '</span>',
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>

				<div class="entry-tags">
					<div class="entry-meta__item entry-meta__item--tags site-secondary-font">
						<?php the_tags('<span>Tags</span>', '', ''); ?>
					</div>
				</div>

			</div><!-- .entry-content -->

		</div>

	</div>

</article><!-- #post-## -->
