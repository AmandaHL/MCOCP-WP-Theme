<!--Mentoring-->
	<?php
 
		// Retrieves the stored value from the database
		$mentorBecomeTxt = wpautop( get_post_meta(get_the_ID(), 'mcocp_m_become_txt', true) );	
		$mentorApply = get_post_meta(get_the_ID(), 'm_apply_box', true);	
		$mCurrentTxt = get_post_meta(get_the_ID(), 'mcocp_m_current_txt', true);
		$mPoliciesTxt = get_post_meta(get_the_ID(), 'mcocp_m_policies_txt', true);
		$btnMbrochure = get_post_meta(get_the_ID(), 'mcocp_btn_txt_m_brochure', true);
		$btnLinkMbrochure = get_post_meta(get_the_ID(), 'mcocp_btn_link_m_brochure', true);
		$btnMwaiver = get_post_meta(get_the_ID(), 'mcocp_btn_txt_m_waiver', true);
		$btnLinkMwaiver = get_post_meta(get_the_ID(), 'mcocp_btn_link_m_waiver', true);
		
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
				</div>
			</section>
		<!-- /section -->
			
		<!-- section -->	
			<section id="become-mentor">
				<h2>BECOME A MENTOR</h2>
				<div>
					<div class="content">
						<?php echo $mentorBecomeTxt; ?>
						<a class="button" href="<?php echo $btnLinkMbrochure; ?>" target="_blank"><?php echo $btnMbrochure; ?></a>
					</div>
				</div>
			</section>
		<!-- /section -->
			
		<!-- section -->
			<section id="mentor-apply">
				<h2>APPLICATION</h2>
				<div>
					<div class="content">
					<?php
						 if( !empty( $mentorApply ) ) {   
							echo '<div class="info-boxes two-col">';
							// Checks and displays the retrieved values
							foreach ( (array) $mentorApply as $key => $box ) {

							$apply_text = $title = $link_text = $link = '';

							if ( isset( $box ['m_apply_header'] ) ) {
								$title = esc_html( $box['m_apply_header'] );
							}
							if ( isset( $box ['m_apply_text'] ) ) {
								$apply_text = esc_html( $box['m_apply_text'] );
							}
							if ( isset( $box ['m_link_text'] ) ) {
								$link_text = esc_html(  $box['m_link_text'] );
							}
							if ( isset( $box ['m_link_box'] ) ) {
								$link = esc_html(  $box['m_link_box'] );
							}
							//Output the Boxes
							echo '<div class="info-box">
							<h5>'	. $title . '</h5>
							<div>
							<div class="i-box-text">' . $apply_text . '</div>
							<a class="button" href="'. $link .'" target="_blank">'	. $link_text . '</a>
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
		
		<!-- section -->	
			<section id="current-mentors">
				<h2>CURRENT MENTORS</h2>
				<div>
					<div class="content">
						<?php echo $mCurrentTxt; ?>
						
					</div>
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->	
			<section id="current-mentors">
				<h2>POLICIES AND PROCEDURES</h2>
				<div>
					<div class="content">
						<?php echo $mPoliciesTxt; ?>
						<a class="button" href="<?php echo $btnLinkMwaiver; ?>" target="_blank"><?php echo $btnMwaiver; ?></a>
					</div>
				</div>
			</section>
		<!-- /section -->
		