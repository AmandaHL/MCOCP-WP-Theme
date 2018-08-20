<!--Scholarship-->
	<?php
 
		// Retrieves the stored value from the database
		$processTxt = get_post_meta(get_the_ID(), 'mcocp_process_txt', true);
		$btnTxtProcessEn = get_post_meta(get_the_ID(), 'mcocp_btn_txt_process_en', true);
		$btnLinkProcessEn = get_post_meta(get_the_ID(), 'mcocp_btn_link_process_en', true);
		$btnTxtProcessSp = get_post_meta(get_the_ID(), 'mcocp_btn_txt_process_sp', true);
		$btnLinkProcessSp = get_post_meta(get_the_ID(), 'mcocp_btn_link_process_sp', true);
		
	?>
	<!-- section -->
	<section>
		<div>
			<h1><?php the_title(); ?></h1>	
		</div>
	</section>
	<!-- /section -->			
	
			<section id="apply">
				
				<h2>WHO CAN APPLY</h2>
				<div>
					
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
			<section id="process">
				<h2>APPLICATION PROCESS</h2>
				<div>
					<div class="content">
						<?php echo $processTxt; ?>
						<a class="button" href="<?php echo $btnLinkProcessEn; ?>" target="_blank"><?php echo $btnTxtProcessEn; ?></a>
						<a class="button" href="<?php echo $btnLinkProcessSp; ?>" target="_blank"><?php echo $btnTxtProcessSp; ?></a>
					</div>
				</div>
			</section>
		<!-- /section -->	
		
		<!-- section -->
			<section id="recipients">
				<h2>PAST RECIPIENTS</h2>
				<div>
					<div class="content">
						<div class="recipients">
							<?php 
								$args = array( 'post_type' => 'recipient', 'posts_per_page'=>-1, 'orderby'=>'title','order'=>'DESC');
								$recipients = new WP_Query( $args );
								while ( $recipients->have_posts() ) : $recipients->the_post();
							?>
							<h3 class="year"><?php the_title(); ?></h3>
							<div>
								<?php the_content(); ?>
							</div>
							<?php endwhile;?>
						</div>
				</div>
			</div>
			</section>
		<!-- /section -->