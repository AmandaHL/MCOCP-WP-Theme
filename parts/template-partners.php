<!--College Partners-->
	<?php	
			$pBenefitsTxt = wpautop( get_post_meta(get_the_ID(), 'p_benefits_content', true) );
			$pPathwaysTxt = wpautop( get_post_meta(get_the_ID(), 'p_pathways_content', true) );
			$pPathwayOne = wpautop( get_post_meta(get_the_ID(), 'p_pathway_one', true) );
			$pPathwayTwo = wpautop( get_post_meta(get_the_ID(), 'p_pathway_two', true) );
			$pBecomeTxt = wpautop( get_post_meta(get_the_ID(), 'p_become_content', true) );
			$pInterestTxt = wpautop( get_post_meta(get_the_ID(), 'p_interest_content', true) );
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
			<section>
				<h2>BENEFITS</h2>
				<div>
					<div class="content">
						<?php echo  $pBenefitsTxt; ?>
					</div>
				</div>
			</section>
		<!-- /section -->
			
		<!-- section -->	
			<section>
				<h2>PATHWAYS</h2>
				<div>
					<div class="content">
						<?php echo  $pPathwaysTxt; ?>
						<div class="two-col">
							<div>
								<?php echo  $pPathwayOne; ?>
							</div>
							<div>
								<?php echo  $pPathwayTwo; ?>
							</div>
						</div><!--.two-col-->
					</div>
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->	
			<section>
				<h2>HOW TO BECOME A PARTNER</h2>
				<div>
					<div class="content">
						<?php echo  $pBecomeTxt; ?>
					</div>
				</div>
			</section>
		<!-- /section -->
		
		<!-- section -->	
			<section>
				<h2>PARTNER INTEREST FORM</h2>
				<div>
					<div class="content">
						<?php echo do_shortcode($pInterestTxt); ?>
					</div>
				</div>
			</section>
		<!-- /section -->