<?php
/*
Display the secondary navigation on the Home Page
*/
 $navBoxes = get_post_meta(get_the_ID(), 'nav_box', true);
 if( !empty( $navBoxes ) ) {   
	echo '<div class="nav-boxes">';
    // Checks and displays the retrieved values
    foreach ( (array) $navBoxes as $key => $box ) {

    $img = $title = $link = '';

    if ( isset( $box ['title'] ) ) {
        $title = esc_html( $box['title'] );
    }
    if ( isset( $box ['image_id'] ) ) {
        $img = wp_get_attachment_image( $box['image_id'], 'share-pick', null);
    }
 	if ( isset( $box ['link_box'] ) ) {
    $link = esc_html(  $box['link_box'] );
    }
    //Output the Boxes
    echo '<div class="nav-box"><div class="icon">'. $img .'</div><div class="nav-text">'.$title.'</div><a href="'. $link .'">| READ MORE |</a></div><!--.nav-box-->';
}
echo '</div><!--.nav-boxes-->';
}
?>