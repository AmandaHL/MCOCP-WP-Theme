<!--Donate-->
		<?php
					
			$donateTxt = get_post_meta(get_the_ID(), 'd_donate_text', true);
			$btnTextDonate = get_post_meta(get_the_ID(), 'd_link_text', true);
			$btnLinkDonate = get_post_meta(get_the_ID(), 'd_link_url', true);
			
			$donorPreForm = wpautop( get_post_meta(get_the_ID(), 'mcocp_d_pre_form', true) );
			$donorPostForm = wpautop( get_post_meta(get_the_ID(), 'mcocp_d_post_form', true) );
			$donorFundingForm = get_post_meta(get_the_ID(), 'mcocp_d_funding_form', true);
			$donorFundingTxt = wpautop( get_post_meta(get_the_ID(), 'mcocp_d_funding_txt', true) );
			$btnTextFunding = wpautop( get_post_meta(get_the_ID(), 'mcocp_d_funding_btn_txt', true) );
			$btnLinkFunding = get_post_meta(get_the_ID(), 'd_funding_btn_url', true);
		?>
		<!-- section -->
			<section>
				<div>
					<h1><?php the_title(); ?></h1>
					
						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<div id="post-<?php the_ID(); ?>" class="content donate-main">
							<div>
								<?php the_content(); ?>
							</div>
							
							<div class="donate-box">
								<?php
								
									echo '<div class="info-box">
										<div>
											<div class="i-box-text">' . $donateTxt . '</div>
											<a class="button" href="'. $btnLinkDonate .'" target="_blank">'	. $btnTextDonate . '</a>
										</div>
									</div><!--.info-box-->';
								
								?>
							</div>
							
						</div><!--.content donate-main -->

					<?php endwhile; ?>

					<?php endif; ?>
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->
			<section>
				<h2>FUNDING COMMITMENT</h2>
				<div>
					
					<div class="content funding">
						<?php 
							echo $donorPreForm; 
							echo do_shortcode($donorFundingForm); 
							echo $donorPostForm; 
							if( !empty( $btnTextFunding ) ) {
								echo '<a class="button" href="'. $btnLinkFunding .'" target="_blank">'	. $btnTextFunding . '</a>';
							}
						?>
					</div>
				
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->
			<section>
				<h2>MAIL A CONTRIBUTION</h2>
				<div>
					
					<div class="content">
						<?php 
						
						 echo '<div>'
						 .  $donorFundingTxt 
						 . '</div>';
						 ?>
					</div>
				
				</div>
			</section>
		<!-- /section -->