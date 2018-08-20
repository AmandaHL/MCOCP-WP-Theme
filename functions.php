<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
        wp_register_script( 'jqueryCycle2', get_template_directory_uri() . '/js/cycle2.js' , array ( 'jquery'), '1.0', true); 
		wp_enqueue_script( 'jqueryCycle2');
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
// Home Page - Fact Carousel
add_action('init', 'facts_register');
 function facts_register() {
 $labels = array(
		'name' => __('Facts'),
		'singular_name' => __('Fact'),
		'add_new' => __('Add New', 'Fact'),
		'add_new_item' => __('Fact'),
		'edit_item' => __('Fact'),
		'new_item' => __('Fact'),
		'view_item' => __('Fact'),
		'search_items' => __('Search Facts'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor', 'revisions', 'author', 'post-formats')
		); 
 register_post_type( 'facts' , $args );
}

//Home Page - Student Spotlight
add_action('init', 'spotlight_register');
 function spotlight_register() {
 $labels = array(
		'name' => __('Student Spotlight'),
		'singular_name' => __('Quote'),
		'add_new' => __('Add New', 'Quote'),
		'add_new_item' => __('Quote'),
		'edit_item' => __('Quote'),
		'new_item' => __('Quote'),
		'view_item' => __('Quote'),
		'search_items' => __('Search Quotes'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor', 'revisions', 'author', 'post-formats')
		); 
 register_post_type( 'spotlight' , $args );
}

//Recipients
add_action('init', 'recipients_register');
 function recipients_register() {
 $labels = array(
		'name' => __('Recipients'),
		'singular_name' => __('Recipient'),
		'add_new' => __('Add New', 'Recipient'),
		'add_new_item' => __('Recipient'),
		'edit_item' => __('Recipient'),
		'new_item' => __('Recipient'),
		'view_item' => __('Recipient'),
		'search_items' => __('Search Recipients'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor', 'revisions', 'author', 'post-formats')
		); 
 register_post_type( 'recipient' , $args );
}
add_action('init', 'schools_register');
 function schools_register() {
 $labels = array(
		'name' => __('High Schools'),
		'singular_name' => __('High School'),
		'add_new' => __('Add New', 'High School'),
		'add_new_item' => __('High School'),
		'edit_item' => __('High School'),
		'new_item' => __('High School'),
		'view_item' => __('High School'),
		'search_items' => __('Search High Schools'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title', 'revisions', 'author', 'post-formats')
		); 
 register_post_type( 'schools' , $args );
}
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


/*------------------------------------*\
  Add Custom Metaboxes using CMB2
\*------------------------------------*/  

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function mcocp_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
	* General Metaboxes
*/
//Default Page Banner
add_action( 'cmb2_init', 'page_banner_register_metabox' );
function page_banner_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_banner_box = new_cmb2_box( array(
		'id'            => $prefix . 'banner_box',
		'title'         => __( 'Page Banner', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_banner_box->add_field( array(
		'name' => esc_html__( 'Banner Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload the banner image.', 'cmb2' ),
		'id'   => $prefix . 'banner_image',
		'type' => 'file'
	) );
	$mcocp_banner_box->add_field( array(
		'name' => esc_html__( 'Title Text', 'cmb2' ),
		'desc' => esc_html__( 'Customize large banner text.', 'cmb2' ),
		'id'   => $prefix . 'landing_title',
		'type' => 'textarea_small'
	) );
	$mcocp_banner_box->add_field( array(
		'name' => esc_html__( 'Banner Text', 'cmb2' ),
		'desc' => esc_html__( 'Add additional paragraph text.', 'cmb2' ),
		'id'   => $prefix . 'lg_banner_text',
		'type' => 'textarea_small'
	) );
}

//Hero Slideshow
add_action( 'cmb2_admin_init', 'home_slider_register_metabox' );
function home_slider_register_metabox() {
	$prefix = 'mcocp_group_';
	/**
	 * Repeatable Field Groups
	 */
	$mcocp_slide_group = new_cmb2_box( array(
		'id'           => $prefix . 'home_slides',
		'title'        => __( 'Home Page Slider', 'cmb2' ),
		'object_types' => array( 'page', ),
		'show_on_cb' => 'mcocp_show_if_front_page',
		'closed'     => true, // true to keep the metabox closed by default
		
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'home_slider_box'
	$group_field_id = $mcocp_slide_group->add_field( array(
		'id'          => 'home_slider_box',
		'type'        => 'group',
		'description' => __( 'Use the fields below to populate the slider. Add additional slides as needed.' ),
		'options'     => array(
			'group_title'   => __( 'Slide {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Slide', 'cmb2' ),
			'remove_button' => __( 'Remove Slide', 'cmb2' ),
			'sortable'      => true, 
			'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	 
	$mcocp_slide_group->add_group_field( $group_field_id, array(
		'name' => __( 'Slide Image', 'cmb2' ),
		'description' => __( 'Upload Slide Image', 'cmb2' ),
		'id'   => 'slide_image',
		'type' => 'file',
	) );
	$mcocp_slide_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Slide Header', 'cmb2' ),
		'description' => __( 'Add Header Text.', 'cmb2' ),
		'id'          => 'slide_header',
		'type'        => 'textarea_small',
	) );
	$mcocp_slide_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Slide Text', 'cmb2' ),
		'description' => __( 'Add Paragraph Text.', 'cmb2' ),
		'id'          => 'slide_text',
		'type'        => 'textarea_small',
	) );
	

	$mcocp_slide_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Page', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the Learn More destination page.', 'cmb2' ),
		'id'   => 'learn_more',
		'type' => 'text_url',
	) );

}

/**
	* Home Page Metaboxes
*/
	
//Secondary Navigation
add_action( 'cmb2_admin_init', 'mcocp_nav_boxes_register' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function mcocp_nav_boxes_register() {
$prefix = 'mcocp_group_';
	
/**
	 * Repeatable Field Groups
	 */
	$mcocp_featured_group = new_cmb2_box( array(
		'id'           => $prefix . 'nav_boxes',
		'title'        => __( 'Secondary Nav Bar', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on_cb' => 'mcocp_show_if_front_page',
		'closed'     => true, // true to keep the metabox closed by default
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $mcocp_featured_group->add_field( array(
		'id'          => 'nav_box',
		'type'        => 'group',
		'description' => __( 'Use the 4 boxes below to edit secondary navigation boxes. If this section has content, it will appear below the banner on the Home page. Note: The layout is designed for 4 boxes of content. Using less than 4 is not advised. ' ),
		'options'     => array(
			'group_title'   => __( 'Nav Box {#}', 'cmb2' ), // {#} gets replaced by row number
			/*'add_button'    => __( 'Add Another Box', 'cmb2' ),
			'remove_button' => __( 'Remove Box', 'cmb2' ),*/
			'add_button'    => false,
			'remove_button' => false,
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	 $mcocp_featured_group->add_group_field( $group_field_id, array(
		'name' => __( 'Nav Box Icon', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );
	
	$mcocp_featured_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$mcocp_featured_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Content', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the featured content.', 'cmb2' ),
		'id'   => 'link_box',
		'type' => 'text_url',
	) );

}

//Student Spotlight
add_action( 'cmb2_init', 'spotlight_register_metabox' );
function spotlight_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_spotlight_box = new_cmb2_box( array(
		'id'            => $prefix . 'spotlight_box',
		'title'         => __( 'Student Details', 'cmb2' ),
		'object_types'  => array( 'spotlight', ), // Post type
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_spotlight_box->add_field( array(
		'name' => esc_html__( 'Student Photo', 'cmb2' ),
		'desc' => esc_html__( 'Upload image image (200x200px is best).', 'cmb2' ),
		'id'   => $prefix . 'student_photo',
		'type' => 'file'
	) );
	$mcocp_spotlight_box->add_field( array(
		'name' => esc_html__( 'Student Name', 'cmb2' ),
		'desc' => esc_html__( 'Add the name of the student here.', 'cmb2' ),
		'id'   => $prefix . 'student_name',
		'type' => 'textarea_small'
	) );
	
}
/**
	* Page Metaboxes
*/

//About Page - Donors
add_action( 'cmb2_init', 'donors_register_metabox' );
function donors_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_donors_box = new_cmb2_box( array(
		'id'            => $prefix . 'donors',
		'title'         => __( 'Donors', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 73 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_donors_box->add_field( array(
		'name' => esc_html__( 'Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section text in the editor.', 'cmb2' ),
		'id'   => $prefix . 'donors_txt',
		'type' => 'wysiwyg'
	) );
	$mcocp_donors_box->add_field( array(
		'name' => esc_html__( 'Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add the button text.', 'cmb2' ),
		'id'   => $prefix . 'btn_txt_donors',
		'type' => 'textarea_small'
	) );
	$mcocp_donors_box->add_field( array(
		'name' => esc_html__( 'Button Link', 'cmb2' ),
		'desc' => esc_html__( 'Add the button link.', 'cmb2' ),
		'id'   => $prefix . 'btn_link_donors',
		'type' => 'text_url'
	) );
}
//About Page - Partner Logos
add_action( 'cmb2_admin_init', 'partners_register_metabox' );
function partners_register_metabox() {
	$prefix = 'mcocp_group_';
	/**
	 * Repeatable Field Groups
	 */
	$logo_group = new_cmb2_box( array(
		'id'           => $prefix . 'partner_logos',
		'title'        => __( 'College Partners', 'cmb2' ),
		'object_types' => array( 'page', ),
		'show_on' => array( 'key' => 'id', 'value' => array( 73 ) ),
		'closed'     => true, // true to keep the metabox closed by default
		
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'home_slider_box'
	$group_field_id = $logo_group->add_field( array(
		'id'          => 'partner_logo',
		'type'        => 'group',
		'description' => __( 'Use the fields below to edit college partners. Add additional logos as needed.' ),
		'options'     => array(
			'group_title'   => __( 'Logo {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Logo', 'cmb2' ),
			'remove_button' => __( 'Remove Logo', 'cmb2' ),
			'sortable'      => true, 
			'closed'     => true, // true to have the groups closed by default
		),
	) );
	 
		$logo_group->add_group_field( $group_field_id, array(
			'name' => __( 'Logo Image', 'cmb2' ),
			'description' => __( 'Upload Logo Image', 'cmb2' ),
			'id'   => 'logo_image',
			'type' => 'file',
		) );
		$logo_group->add_group_field( $group_field_id, array(
			'name'        => __( 'Partner URL', 'cmb2' ),
			'description' => __( 'Add website url.', 'cmb2' ),
			'id'          => 'logo_url',
			'type' => 'text_url',
		) );
}
//Scholarship Page - Application Process
add_action( 'cmb2_init', 'process_register_metabox' );
function process_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_process_box = new_cmb2_box( array(
		'id'            => $prefix . 'app_process',
		'title'         => __( 'Application Process', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 6 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_process_box->add_field( array(
		'name' => esc_html__( 'Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section text in the editor.', 'cmb2' ),
		'id'   => $prefix . 'process_txt',
		'type' => 'wysiwyg'
	) );
	$mcocp_process_box->add_field( array(
		'name' => esc_html__( 'English Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add the button text.', 'cmb2' ),
		'id'   => $prefix . 'btn_txt_process_en',
		'type' => 'textarea_small'
	) );
	$mcocp_process_box->add_field( array(
		'name' => esc_html__( 'English Button Link', 'cmb2' ),
		'desc' => esc_html__( 'Add the button link.', 'cmb2' ),
		'id'   => $prefix . 'btn_link_process_en',
		'type' => 'text_url'
	) );
	$mcocp_process_box->add_field( array(
		'name' => esc_html__( 'Spanish Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add the button text.', 'cmb2' ),
		'id'   => $prefix . 'btn_txt_process_sp',
		'type' => 'textarea_small'
	) );
	$mcocp_process_box->add_field( array(
		'name' => esc_html__( 'Spanish Button Link', 'cmb2' ),
		'desc' => esc_html__( 'Add the button link.', 'cmb2' ),
		'id'   => $prefix . 'btn_link_process_sp',
		'type' => 'text_url'
	) );
	
}
//Mentoring Page - Become a Mentor
add_action( 'cmb2_init', 'mentor_become_register_metabox' );
function mentor_become_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_m_become_box = new_cmb2_box( array(
		'id'            => $prefix . 'mentor_become',
		'title'         => __( 'Application Process', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 8 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_m_become_box->add_field( array(
		'name' => esc_html__( 'Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section text in the editor.', 'cmb2' ),
		'id'   => $prefix . 'm_become_txt',
		'type' => 'wysiwyg'
	) );
	$mcocp_m_become_box->add_field( array(
		'name' => esc_html__( 'Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add the button text.', 'cmb2' ),
		'id'   => $prefix . 'btn_txt_m_brochure',
		'type' => 'textarea_small'
	) );
	$mcocp_m_become_box->add_field( array(
		'name' => esc_html__( 'Button Link', 'cmb2' ),
		'desc' => esc_html__( 'Add the button link.', 'cmb2' ),
		'id'   => $prefix . 'btn_link_m_brochure',
		'type' => 'text_url'
	) );
}
//Mentoring Page - Apply
add_action( 'cmb2_admin_init', 'mentor_apply_register_metabox' );

function mentor_apply_register_metabox() {
$prefix = 'mcocp_group_';
	
	$mcocp_m_apply_group = new_cmb2_box( array(
		'id'           => $prefix . 'mentor_apply',
		'title'        => __( 'Application Options', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on' => array( 'key' => 'id', 'value' => array( 8 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );

	$group_field_id = $mcocp_m_apply_group->add_field( array(
		'id'          => 'm_apply_box',
		'type'        => 'group',
		'description' => __( 'Use the fields below to edit the box content. ' ),
		'options'     => array(
			'group_title'   => __( 'Apply Box {#}', 'cmb2' ), // {#} gets replaced by row number
			/*'add_button'    => __( 'Add Another Box', 'cmb2' ),
			'remove_button' => __( 'Remove Box', 'cmb2' ),*/
			'add_button'    => false,
			'remove_button' => false,
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );

	 $mcocp_m_apply_group->add_group_field( $group_field_id, array(
		'name' => __( 'Header Text', 'cmb2' ),
		'id'   => 'm_apply_header',
		'type' => 'text',
	) );
	
	$mcocp_m_apply_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Text', 'cmb2' ),
		'id'         => 'm_apply_text',
		'type'       => 'textarea',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$mcocp_m_apply_group->add_group_field( $group_field_id, array(
		'name' => __( 'Button Link', 'cmb2' ),
		'id'   => 'm_link_text',
		'type' => 'text',
	) );
	$mcocp_m_apply_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Content', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the featured content.', 'cmb2' ),
		'id'   => 'm_link_box',
		'type' => 'text_url',
	) );

}
//Mentoring Page - Current
add_action( 'cmb2_init', 'mentor_current_register_metabox' );
function mentor_current_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_m_current = new_cmb2_box( array(
		'id'            => $prefix . 'mentor_current',
		'title'         => __( 'Current Mentors', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 8 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_m_current->add_field( array(
		'name' => esc_html__( 'Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section text in the editor.', 'cmb2' ),
		'id'   => $prefix . 'm_current_txt',
		'type' => 'wysiwyg'
	) );
	
}
//Mentoring Page - Policies
add_action( 'cmb2_init', 'mentor_policies_register_metabox' );
function mentor_policies_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_m_policies = new_cmb2_box( array(
		'id'            => $prefix . 'mentor_policies',
		'title'         => __( 'Policies and Procedures', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 8 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_m_policies->add_field( array(
		'name' => esc_html__( 'Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section text in the editor.', 'cmb2' ),
		'id'   => $prefix . 'm_policies_txt',
		'type' => 'wysiwyg'
	) );
	$mcocp_m_policies->add_field( array(
		'name' => esc_html__( 'Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add the button text.', 'cmb2' ),
		'id'   => $prefix . 'btn_txt_m_waiver',
		'type' => 'textarea_small'
	) );
	$mcocp_m_policies->add_field( array(
		'name' => esc_html__( 'Button Link', 'cmb2' ),
		'desc' => esc_html__( 'Add the button link.', 'cmb2' ),
		'id'   => $prefix . 'btn_link_m_waiver',
		'type' => 'text_url'
	) );
	
}
//Support Page - Boxes
add_action( 'cmb2_admin_init', 'support_register_metabox' );

function support_register_metabox() {
$prefix = 'mcocp_group_';
	
	$mcocp_support_group = new_cmb2_box( array(
		'id'           => $prefix . 'support_boxes',
		'title'        => __( 'Support Options', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on' => array( 'key' => 'id', 'value' => array( 10 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );

	$group_field_id = $mcocp_support_group->add_field( array(
		'id'          => 'support_box',
		'type'        => 'group',
		'description' => __( 'Use the fields below to edit the box content. ' ),
		'options'     => array(
			'group_title'   => __( 'Support Option {#}', 'cmb2' ), // {#} gets replaced by row number
			/*'add_button'    => __( 'Add Another Box', 'cmb2' ),
			'remove_button' => __( 'Remove Box', 'cmb2' ),*/
			'add_button'    => false,
			'remove_button' => false,
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );

	 $mcocp_support_group->add_group_field( $group_field_id, array(
		'name' => __( 'Header Text', 'cmb2' ),
		'id'   => 'support_header',
		'type' => 'text',
	) );
	
	$mcocp_support_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Text', 'cmb2' ),
		'id'         => 'support_text',
		'type'       => 'textarea',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	
	$mcocp_support_group->add_group_field( $group_field_id, array(
		'name' => __( 'Button Text', 'cmb2' ),
		'id'   => 'support_link_text',
		'type' => 'text',
	) );
	
	$mcocp_support_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Content', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the featured content.', 'cmb2' ),
		'id'   => 'support_link_box',
		'type' => 'text_url',
	) );

}

//Donate Page - Donate Box
add_action( 'cmb2_admin_init', 'donate_register_metabox' );

function donate_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_donate = new_cmb2_box( array(
		'id'            => $prefix . 'donate',
		'title'         => __( 'Donate Box', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 85 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	
	$mcocp_donate->add_field( array(
		'name'       => __( 'Text', 'cmb2' ),
		'id'         => 'd_donate_text',
		'type'       => 'textarea',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$mcocp_donate->add_field( array(
		'name' => __( 'Button Link', 'cmb2' ),
		'id'   => 'd_link_text',
		'type' => 'text',
	) );
	$mcocp_donate->add_field( array(
		'name' => esc_html__( 'Link to Content', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the featured content.', 'cmb2' ),
		'id'   => 'd_link_url',
		'type' => 'text_url',
	) );
}
//Donate Page - Funding Commitment
add_action( 'cmb2_init', 'donate_funding_register_metabox' );
function donate_funding_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_d_funding_box = new_cmb2_box( array(
		'id'            => $prefix . 'd_funding_commit',
		'title'         => __( 'Funding Commitment', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 85 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Form Intro Text', 'cmb2' ),
		'desc' => esc_html__( 'Add text to precede the form.', 'cmb2' ),
		'id'   => $prefix . 'd_pre_form',
		'type' => 'wysiwyg'
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Funding Commitment Form', 'cmb2' ),
		'desc' => esc_html__( 'Paste form shortcode into the editor.', 'cmb2' ),
		'id'   => $prefix . 'd_funding_form',
		'type' => 'text'
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Form Post Text', 'cmb2' ),
		'desc' => esc_html__( 'Add text to follow the form.', 'cmb2' ),
		'id'   => $prefix . 'd_post_form',
		'type' => 'wysiwyg'
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Add button text.', 'cmb2' ),
		'id'   => $prefix . 'd_funding_btn_txt',
		'type' => 'text',
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Link to Form', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for pdf.', 'cmb2' ),
		'id'   => 'd_funding_btn_url',
		'type' => 'text_url',
	) );
	$mcocp_d_funding_box->add_field( array(
		'name' => esc_html__( 'Additional Section Text', 'cmb2' ),
		'desc' => esc_html__( 'Add section content in the editor.', 'cmb2' ),
		'id'   => $prefix . 'd_funding_txt',
		'type' => 'wysiwyg'
	) );
}
//Partners Page - Benefits
add_action( 'cmb2_admin_init', 'p_benefits_register_metabox' );

function p_benefits_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_p_benefits = new_cmb2_box( array(
		'id'            => $prefix . 'partner_benefits',
		'title'         => __( 'Benefits', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 88 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	
	$mcocp_p_benefits->add_field( array(
		'name'       => __( 'Section Content', 'cmb2' ),
		'id'         => 'p_benefits_content',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}
//Partners Page - Benefits
add_action( 'cmb2_admin_init', 'p_pathways_register_metabox' );

function p_pathways_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_p_pathways = new_cmb2_box( array(
		'id'            => $prefix . 'partner_pathways',
		'title'         => __( 'Pathways', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 88 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	
	$mcocp_p_pathways->add_field( array(
		'name'       => __( 'Section Content', 'cmb2' ),
		'id'         => 'p_pathways_content',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$mcocp_p_pathways->add_field( array(
		'name'       => __( 'Pathway One', 'cmb2' ),
		'id'         => 'p_pathway_one',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$mcocp_p_pathways->add_field( array(
		'name'       => __( 'Pathway Two', 'cmb2' ),
		'id'         => 'p_pathway_two',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}
//Partners Page - Become
add_action( 'cmb2_admin_init', 'p_become_register_metabox' );

function p_become_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_p_become = new_cmb2_box( array(
		'id'            => $prefix . 'partner_become',
		'title'         => __( 'Become A Partner', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 88 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	
	$mcocp_p_become->add_field( array(
		'name'       => __( 'Section Content', 'cmb2' ),
		'id'         => 'p_become_content',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}
//Partners Page - Interest Form
add_action( 'cmb2_admin_init', 'p_interest_register_metabox' );

function p_interest_register_metabox() {
	$prefix = 'mcocp_';

	$mcocp_p_interest = new_cmb2_box( array(
		'id'            => $prefix . 'partner_interest',
		'title'         => __( 'Partner Interest Form', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on' => array( 'key' => 'id', 'value' => array( 88 ) ),
		'closed'     => true, // true to keep the metabox closed by default
	) );
	
	$mcocp_p_interest->add_field( array(
		'name'       => __( 'Section Content', 'cmb2' ),
		'id'         => 'p_interest_content',
		'type'       => 'wysiwyg',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}
//Add metaboxes as needed
?>
