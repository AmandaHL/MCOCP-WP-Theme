<?php /*
Template Name: Front Page
*/ 
get_header();?>
<main role="main">
	<section class="hero">

		<div class="hero-content">
	
			<?php
				// Retrieves the stored value from the database
				$slide = get_post_meta(get_the_ID(), '_cmb_banner_slide', true);
 
				// Checks and displays the retrieved value
				if( !empty( $slide ) ) {
				 echo '<div class="home-slider">'.$slide.'</div><!--.home-slider-->';
				}
			?>
	
		</div><!--hero-content-->
	
	</section><!--.hero-->

	<section class="home-content">

		<div class="entry-content">
	
			<div>
		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
			
			</div>
		
		</div><!--.entry-content-->
	
	</section><!--.home-content-->

	
	
	<section>

		<div>Content of choice... Optional section shows when content is entered in page edit area.</div>
	
	</section>

</main>
 
<?php get_footer(); ?>