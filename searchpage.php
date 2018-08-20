<?php 
/*
Template Name: Search Page
*/
	get_header();
?>
	<main role="main"> 
		<section class="">
			<div class="adjust-height">
				<div class="content">
					<h1>Search Our Website</h1>
					<div class="searchpage">
						<h3>Enter your search term(s) below:</h3>
					<div class="searchform" >
						<?php get_search_form(); ?>
					</div><!--end searchform-->
				</div><!--.content-->
			</div>
		</section>
	</main>

<?php get_footer(); ?>