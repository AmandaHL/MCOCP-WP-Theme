<!--About Us-->
	<?php
 
		// Retrieves the stored value from the database
		$btnTxtBrochure = get_post_meta(get_the_ID(), 'mcocp_btn_txt_brochure', true);
		$btnLinkBrochure = get_post_meta(get_the_ID(), 'mcocp_btn_link_brochure', true);
		$donorsTxt = wpautop( get_post_meta( get_the_ID(), 'mcocp_donors_txt', true) );
		$btnTxtDonors = get_post_meta(get_the_ID(), 'mcocp_btn_txt_donors', true);
		$btnLinkDonors = get_post_meta(get_the_ID(), 'mcocp_btn_link_donors', true);
		
		$logos = get_post_meta(get_the_ID(), 'mcocp_logos', true);
		$btnTxtMentor = get_post_meta(get_the_ID(), 'mcocp_btn_txt_a_mentor', true);
		$btnLinkMentor = get_post_meta(get_the_ID(), 'mcocp_btn_link_a_mentor', true);
	
	?>
		<!-- section -->
			<section>
				<div>
					<h1><?php the_title(); ?></h1>
					
						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<div id="post-<?php the_ID(); ?>" class="content">

							<?php the_content(); ?>
							<a class="button" href="<?php echo $btnLinkBrochure; ?>" target="_blank"><?php echo $btnTxtBrochure; ?></a>
						</div><!--.content -->

					<?php endwhile; ?>

					<?php endif; ?>
					
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->
			<section id="donors">
				<h2>DONORS</h2>
				<div>
					<div class="content">
						
						<?php echo $donorsTxt; ?>
						<a class="button" href="<?php echo $btnLinkDonors; ?>"><?php echo $btnTxtDonors; ?></a>
						
					</div>
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->
			<section id="partners">
				<h2>COLLEGE PARTNERS</h2>
				<div>
					<div class="content">
						<?php get_template_part('parts/logos');?>
						<a class="button" href="<?php echo $btnLinkMentor; ?>"><?php echo $btnTxtMentor; ?></a>
					</div>
				</div>
			</section>
		<!-- /section -->
