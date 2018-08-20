<?php
$all = array(
            'posts_per_page' => -1,
            'post_type' => 'facts',
            'order' => 'ASC'  
    ); 
$facts = new WP_Query($all); 
?>
<div id="slideshow-facts" class="slideshow-2">

    <div id="cycle-facts" class="cycle-1 cycle-slideshow"
        data-cycle-slides="> div"
		data-cycle-fx="fade"
        data-cycle-speed="2000"
        >
		<?php while ($facts->have_posts()) : $facts->the_post(); ?>
	
			<div class="fact">
				<div>
				<?php the_content();?>
				</div>
			</div><!--.fact-->
	
		<?php endwhile; ?>
	</div><!--#cycle-facts-->
 
</div><!--#slideshow-facts-->
<?php wp_reset_postdata();?>

