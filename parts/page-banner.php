<?php 
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';


	// Retrieves the stored value from the database
    $bannerImage = get_post_meta(get_the_ID(), 'zf_banner_image', true);
	$lgBannerText = get_post_meta(get_the_ID(), 'zf_lg_banner_text', true);
	$parentTitle = get_the_title( $post->post_parent );
	

//Get Industry subpage large banner
if (is_page_template('industry-sub.php')){
	echo '<div class="large-banner">'
	.'<div class="lg-banner-image"><img src="'
	.$bannerImage
	.'" alt="Banner Image"/></div><!--.banner-image-->
	<div class="lg-banner-text-wrap">
	<div class="lg-banner-header">' 
		. $parentTitle
    	.': '
	 	.	get_the_title()
	 .'</div>
	 <div class="lg-banner-text">'
	 . wpautop($lgBannerText)
	 .'</div></div>
	 <!--.slide-text-wrap-->
	 </div><!--.large-banner-->';
} else if(is_archive()){
$productsId = 8; //product categories use Products page banner
$bannerImage = get_post_meta($productsId, 'zf_banner_image', true);
$catID = $wp_query->get_queried_object();
//Get the default banner
	echo '<div class="banner">';
    	// Checks and displays the retrieved value
       	 echo '<div class="banner-image"><img src="'.$bannerImage.'" alt="Banner Image"/></div><!--.banner-image-->';
       	echo '<div class="banner-text"><h5>'
       	.$catID->name
       	.'</h5>
       	</div><!--.banner-text-->
       	</div><!--.banner-->';	
} else {
//Get the default banner
echo '<div class="banner">';
    // Checks and displays the retrieved value
       	echo '<div class="banner-image"><img src="'.$bannerImage.'" alt="Banner Image"/></div><!--.banner-image-->';
       	echo '<div class="banner-text"><h5>'
       	.get_the_title() 
       	.'</h5>
       	</div><!--.banner-text-->
       	</div><!--.banner-->';
}
?>