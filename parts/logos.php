<?php
/*
Display the secondary navigation on the Home Page
*/
 $partners = get_post_meta(get_the_ID(), 'partner_logo', true);
 if( !empty( $partners ) ) {   
	echo '<div class="logo-grid">';
    // Checks and displays the retrieved values
    foreach ( (array) $partners as $key => $logo ) {

    $img = $link = '';

    if ( isset( $logo ['logo_image_id'] ) ) {
        $img = wp_get_attachment_image( $logo['logo_image_id'], 'share-pick', null);
    }
 	if ( isset( $logo ['logo_url'] ) ) {
    $link = esc_html(  $logo['logo_url'] );
    }
    //Output the Boxes
    echo '<div class="logo"><a href="'. $link .'" target="_blank">'. $img .'</a></div>';
}
echo '</div><!--.logo-grid-->';
}
?>