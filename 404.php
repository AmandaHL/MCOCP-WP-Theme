<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<div class="adjust-height">
				
					<div class="content not-found">
						<h1><?php _e( 'Not Found', 'mcocp' ); ?></h1>
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'mcocp' ); ?></p>
						<div id="searchpage">
								<h3>Enter your search term(s) below:</h3>
								<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
						</div><!--#searchpage-->
					</div><!--.content-->
				
			</div>
			
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
