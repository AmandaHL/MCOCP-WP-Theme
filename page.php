<?php get_header(); ?>

	<main role="main">
		
		<?php if (is_page('about-us')) {
			
			get_template_part('parts/template-about');
			
		} else if(is_page('scholarship')) { 
			
			get_template_part('parts/template-scholarship');
			
		} else if(is_page('mentoring')) { 
		
			get_template_part('parts/template-mentoring');
		
		 } else if(is_page('support')) { 
		 
		 	get_template_part('parts/template-support');
		
		 } else if(is_page('donate')) { 
			
		 	get_template_part('parts/template-donate');
		
		 } else if(is_page('college-partners')) { 
			
			get_template_part('parts/template-partners');
		
		 } else if(is_page('contact-us')) { 
		
			get_template_part('parts/template-contact');
			
		 } else { ?>
			
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
		
		<?php } ?>
	</main>


<?php get_footer(); ?>
