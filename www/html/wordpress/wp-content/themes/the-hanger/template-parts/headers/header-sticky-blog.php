<div class="site-header header-sticky-blog">

	<div class="row small-collapse">
		
		<div class="small-12 columns">

			<div class="header-content header-sticky-blog-content">

				<div class="header-sticky-blog-now-reading"><?php esc_html_e('Reading Now', 'the-hanger'); ?></div>
				
				<div class="header-sticky-blog-title site-secondary-font"><?php the_title(); ?></div>

				<div class="header-sticky-blog-buttons">
						
					<ul>
						
						<li>
							<a href="#comments" class="header-sticky-blog-comments">
								<i class="thehanger-icons-chat_chat-15"></i>
								<span><?php esc_html_e('Comments', 'the-hanger'); ?></span>
							</a>
						</li>

						<?php do_action( 'header_sticky_socials' ); ?>

					</ul>		        

				</div>	

			</div>

		</div>

	</div>

	<!-- progress bar temp -->
	<div class="scroll-progress-bar-container">
		<div class="scroll-progress-bar"></div>
	</div>

</div>