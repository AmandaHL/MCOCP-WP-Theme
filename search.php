<?php 
get_header(); ?>

	<main role="main"> 
        
	<section>
	<div id="searchpage" class="adjust-height">
	
		<div class="content">
			<h1><?php _e( 'You searched for: ', 'mcocp' ); ?><span><?php the_search_query(); ?></span></h1>
			<?php if ( have_posts() ) : ?>

			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		
					<div id="nav-above" class="navigation">
						<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'mcocp' )) ?></div>
						<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'mcocp' )) ?></div>
					</div><!-- #nav-above -->
			<?php } ?>                            
 
			<?php while ( have_posts() ) : the_post() ?>
 
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="found-item">                  

							<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'mcocp'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
					
								<?php the_title(); ?></a>
							
							</h4>
 
							<?php if ( $post->post_type == 'post' ) { ?>
		
								<div class="entry-meta">
									<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'mcocp'); ?></span>
									<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
									<?php edit_post_link( __( 'Edit', 'mcocp' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
								</div><!-- .entry-meta -->
	
							<?php } ?>
 
								 <div class="entry-summary">
									<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'mcocp' )  ); ?>
									<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'mcocp' ) . '&after=</div>') ?>
								  </div><!-- .entry-summary -->
 
							<?php if ( $post->post_type == 'post' ) { ?>
								 <div class="entry-utility">
										<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'mcocp' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
										 <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'mcocp' ), __( '1 Comment', 'mcocp' ), __( '% Comments', 'mcocp' ) ) ?></span>
										 <?php edit_post_link( __( 'Edit', 'mcocp' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
								 </div><!-- #entry-utility -->
	 
							<?php } ?>
						
					</div><!--end .found-item-->
					
				</div><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; ?>
			<div class="search-again ">
						<div class="search-blurb">
						   <h3><?php _e( 'Start a New Search', 'mcocp' ); ?>
						   </h3>
   
						</div><!-- .search-blurb -->
						<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
					</div>
 
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<div id="nav-below" class="navigation">
						<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'mcocp' )) ?></div>
						<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'mcocp' )) ?></div>
				 </div><!-- #nav-below -->
			<?php } ?>            
 
			<?php else : ?>
 
					<div id="post-0" class="post no-results not-found ">
						<h3><?php _e( 'No results were found.', 'mcocp' ) ?></h3>
						<div class="search-blurb">
						   <p><?php _e( 'Nothing matched your search criteria. Please try again with some different keywords.', 'mcocp' ); ?></p>
   
						</div><!-- .search-blurb -->
						<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
						<div class="clear">&nbsp;</div>
					</div>
 
			<?php endif; ?>
		</div><!--.content -->
		
	</div><!-- #searchpage -->

</section>
<?php get_footer();?>