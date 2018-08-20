<?php
$all = array(
            'posts_per_page' => -1,
            'post_type' => 'spotlight',
            'order' => 'ASC'  
    ); 
$facts = new WP_Query($all); 
?>
<div id="slideshow-spotlight" class="student-spotlight">

    <div id="cycle-spotlight" class="cycle-spotlight cycle-slideshow"
        data-cycle-slides="> div"
		data-cycle-fx="fade"
         data-cycle-timeout="0"
    	data-cycle-prev="#prev"
    	data-cycle-next="#next"
    >
		<?php while ($facts->have_posts()) : $facts->the_post(); ?>
		
		<?php 
			 $studentName = get_post_meta(get_the_ID(), 'mcocp_student_name', true);
			 $studentPhoto = get_post_meta(get_the_ID(), 'mcocp_student_photo', true);
		?>
			<div class="slide-content">
			
				<div class="quote">
					<p class="qm-left">&#8220;</p>
					<div>
						
						<?php the_content();?>
						
					</div>
					<p class="qm-right">&#8221;</p>
				</div><!--.quote-->
				<div class="student-info">
					<div>
						<p>
							<?php echo $studentName;?>
						</p>
					</div>
					<div class="student-photo">
						<img src="<?php echo $studentPhoto; ?>" alt="MCOCP Student Spotlight" />
					</div>
				</div><!--student-info-->
				

			</div><!--.slide-content-->
			
		<?php endwhile; ?>
		
		
	</div><!--#cycle-spotlight-->
	 <div class="spotlight-controls">
					<a href=# id="prev">&lt;</a> <span>|</span> <a href=# id="next">&gt;</a>
				</div>
</div><!--#slideshow-spotlight-->
<?php wp_reset_postdata();?>

