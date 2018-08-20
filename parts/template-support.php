<!--Support-->
	<?php
		$supportBoxes = get_post_meta(get_the_ID(), 'support_box', true);
	?>
		<!-- section -->
			<section>
				<div>
					<h1><?php the_title(); ?></h1>
					
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" class="content">

						<?php the_content(); ?>

					</div><!--.content -->

					<?php endwhile; ?>

					<?php endif; ?>
				
		
				
					<div class="content">
					<?php
						 if( !empty( $supportBoxes ) ) {   
							echo '<div class="info-boxes three-col">';
							// Checks and displays the retrieved values
							foreach ( (array) $supportBoxes as $key => $box ) {

							$apply_text = $title = $link_text = $link = '';

							if ( isset( $box ['support_header'] ) ) {
								$title = esc_html( $box['support_header'] );
							}
							if ( isset( $box ['support_text'] ) ) {
								$apply_text = esc_html( $box['support_text'] );
							}
							if ( isset( $box ['support_link_text'] ) ) {
								$link_text = esc_html(  $box['support_link_text'] );
							}
							if ( isset( $box ['support_link_box'] ) ) {
								$link = esc_html(  $box['support_link_box'] );
							}
							//Output the Boxes
							echo '<div class="info-box">
							<h5>'	. $title . '</h5>
							<div>
							<div class="i-box-text">' . $apply_text . '</div>
							<a class="button" href="'. $link .'">'	. $link_text . '</a>
							</div>
							</div><!--.info-box-->';
						}
						echo '</div><!--.info-boxes-->';
						}
					?>
					</div>
				</div>
				
			</section>
		<!-- /section -->