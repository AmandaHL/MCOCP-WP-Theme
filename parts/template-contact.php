<!--Contact Us-->

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