<?php /*
Template Name: Front Page
*/ 
get_header();?>
<main role="main">
	<section class="bannerbox-home">
		<div class="home-banner-content">
			<?php
 
			// Retrieves the stored value from the database
			$bannerImage = get_post_meta(get_the_ID(), 'mcocp_banner_image', true);
 
			// Checks and displays the retrieved value
			if( !empty( $bannerImage ) ) {
				 echo '<div class="home-banner"><img src="'.$bannerImage.'"></div><!--.home-banner-->';
			}
 
			?>
		</div><!--.home-banner-content-->
	</section><!--bannerbox-home-->
	
	<section class="secondary-nav">
		<?php //get the Featured metabox content
			get_template_part('parts/secondary-nav');
		?>
	</section><!--.secondary-nav-->
	
	<section class="mission">
		<div>
			<div class="content">
				<h6>THE COLLEGE PROMISE MISSION</h6>
				<div class="mission-content">
					<div>
		
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; endif; ?>
			
					</div>
					<div>
						<div class="fact-box">
	
							<?php get_template_part('parts/facts');?>	
						
						</div>
					</div>
				</div><!--.two-col-->
			</div><!--.content-->
		</div>
	</section><!--.mission-->
	<section class="spotlight">
		<h2>STUDENT SPOTLIGHT</h2>
		<div>
			<div class="content">
		
			<?php get_template_part('parts/spotlight');?>	
		
			</div>
		</div>
	
	</section><!--.spotlight-->
</main>
 
<?php get_footer(); ?>