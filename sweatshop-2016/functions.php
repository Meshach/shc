<?php
function js_async_attr($tag){
	return str_replace( ' src', ' defer="defer" src', $tag );
}
//add_filter( 'script_loader_tag', 'js_async_attr', 10 );
function my_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array(), false, true);
	wp_enqueue_script('foundation',''.get_bloginfo('template_directory').'/scripts/foundation.min.js', array(), false, true);
	wp_enqueue_script('slideshow',''.get_bloginfo('template_directory').'/scripts/bxslider.min.js', array(), false, true);
	wp_enqueue_script('cookie',''.get_bloginfo('template_directory').'/scripts/cookie.js', array(), false, true);
	wp_enqueue_script('bnm',''.get_bloginfo('template_directory').'/scripts/scripts.js', array(), false, true);
	wp_enqueue_script('wfload',''.get_bloginfo('template_directory').'/scripts/webfont.js', array(), false, true);
	wp_enqueue_script( 'healcode', 'https://widgets.healcode.com/javascripts/healcode.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

// add_image_size('tn300crop', 300, 280, true); Set as Thumbnail size in admin

add_image_size('tn415crop', 415, 415, true);
add_image_size('tn490', 490);
add_image_size('tn490crop', 490, 285, true);
add_image_size('tn800crop', 800, 424, true);
add_image_size('tn1012crop', 1012, 315, true);
add_image_size('tn1600crop', 1600, 505, true);
add_image_size('tn1600crop462', 1600, 462, true);
add_image_size('tn1600crop752', 1600, 752, true);

/*class foundation6_class_walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"vertical menu\">\n";
  }
}*/

function isa_add_img_title( $attr, $attachment = null ) {
    $img_title = trim( strip_tags( $attachment->post_title ) );
    $attr['title'] = $img_title;
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','isa_add_img_title', 10, 2 );

function ssf_excerpt( $args ) {

	$defaults = array('length' => 40, 'suffix' => '&hellip;', 'link_text' => 'Read More');
	extract(wp_parse_args( $args, $defaults ));

	global $post;

	$text = $post->post_content;

	$text = strip_shortcodes( $text );

	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = strip_tags($text);
	$words = preg_split("/[\n\r\t ]+/", $text, $length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $suffix;
	} else {
		$text = implode(' ', $words);
	}
	if($link_text == '') {
		echo $text;
	}
	else {
		echo $text.'</p><p class="newslink"><a href="'.get_permalink($post->ID).'" class="textuppercase">'.$link_text.'</a>';
	}
}


/*<?php ssf_excerpt(array('length' => 150, 'suffix' => '&hellip;', 'link_text' => 'Read Full Article')); ?>*/

add_action( 'init', 'ssf_post_types' );
function ssf_post_types() {

	register_post_type( 'trainer', array(
		'labels' => array(
			'name' => __( 'Team Members' ),
			'singular_name' => __( 'Team Member' ),
			'add_new' => __( 'Add New Team Member' ),
			'add_new_item' => __( 'Add New Team Member' ),
			'edit_item' => __( 'Edit Team Member' ),
			'new_item' => __( 'New Team Member' ),
			'view_item' => __( 'View Team Member' ),
			'search_items' => __( 'Search Team Members' ),
			'not_found' => __( 'No Team Members found' ),
			'not_found_in_trash' => __( 'No Team Members found in Trash' ),
			'parent_item_colon' => __( 'Parent Team Member:' ),
			'menu_name' => __( 'Team Members' )
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'trainer' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	) );

	register_post_type( 'fitness', array(
		'labels' => array(
			'name' => __( 'Fitness Trainings' ),
			'singular_name' => __( 'Fitness Training' ),
			'add_new' => __( 'Add New Fitness Training' ),
			'add_new_item' => __( 'Add New Fitness Training' ),
			'edit_item' => __( 'Edit Fitness Training' ),
			'new_item' => __( 'New Fitness Training' ),
			'view_item' => __( 'View Fitness Training' ),
			'search_items' => __( 'Search Fitness Trainings' ),
			'not_found' => __( 'No Fitness Trainings found' ),
			'not_found_in_trash' => __( 'No Fitness Trainings found in Trash' ),
			'parent_item_colon' => __( 'Parent Fitness Training:' ),
			'menu_name' => __( 'Fitness Trainings' )
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'fitness' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	) );

	register_post_type( 'pilates', array(
		'labels' => array(
			'name' => __( 'Pilates Trainings' ),
			'singular_name' => __( 'Pilates Training' ),
			'add_new' => __( 'Add New Pilates Training' ),
			'add_new_item' => __( 'Add New Pilates Training' ),
			'edit_item' => __( 'Edit Pilates Training' ),
			'new_item' => __( 'New Pilates Training' ),
			'view_item' => __( 'View Pilates Training' ),
			'search_items' => __( 'Search Pilates Trainings' ),
			'not_found' => __( 'No Pilates Trainings found' ),
			'not_found_in_trash' => __( 'No Pilates Trainings found in Trash' ),
			'parent_item_colon' => __( 'Parent Pilates Training:' ),
			'menu_name' => __( 'Pilates Trainings' )
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'pilates' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	) );

	register_post_type( 'professional', array(
		'labels' => array(
			'name' => __( 'Professional Training' ),
			'singular_name' => __( 'Professional Training' ),
			'add_new' => __( 'Add New Professional Class' ),
			'add_new_item' => __( 'Add New Professional Training' ),
			'edit_item' => __( 'Edit Professional Training' ),
			'new_item' => __( 'New Professional Training' ),
			'view_item' => __( 'View Professional Training' ),
			'search_items' => __( 'Search Professional Training' ),
			'not_found' => __( 'No Professional Training found' ),
			'not_found_in_trash' => __( 'No Professional Training found in Trash' ),
			'parent_item_colon' => __( 'Parent Professional Training:' ),
			'menu_name' => __( 'Professional Training' )
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'professional' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	) );
	flush_rewrite_rules();
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_page(array(
		'page_title' 	=> 'Sweatshop Fitness Userguide',
		'menu_title'	=> 'User Guide',
		'menu_slug' 	=> 'user-guide',
		'icon_url'		=> 'dashicons-book',
		'capability'	=> 'read'
	));
}

/**
* Conditional function to check if post belongs to term in a custom taxonomy.
*
* @param    tax        string                taxonomy to which the term belons
* @param    term    int|string|array    attributes of shortcode
* @param    _post    int                    post id to be checked
* @return             BOOL                True if term is matched, false otherwise
*/
function pa_in_taxonomy($tax, $term, $_post = NULL) {
// if neither tax nor term are specified, return false
if ( !$tax || !$term ) { return FALSE; }
// if post parameter is given, get it, otherwise use $GLOBALS to get post
if ( $_post ) {
$_post = get_post( $_post );
} else {
$_post =& $GLOBALS['post'];
}
// if no post return false
if ( !$_post ) { return FALSE; }
// check whether post matches term belongin to tax
$return = is_object_in_term( $_post->ID, $tax, $term );
// if error returned, then return false
if ( is_wp_error( $return ) ) { return FALSE; }
return $return;
}
/*<?php if(pa_in_taxonomy('style_option', 'light-theme')) { echo('<span class="lighttheme">'); } ?><?php the_content(); ?><?php if(pa_in_taxonomy('slideshow', 'light-theme')) { echo('</span>'); } ?>*/


/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
		'secondary' => __( 'Secondary Navigation', 'twentyten' ),
		'footer' => __( 'Footer Navigation', 'twentyten' ),
		'mobile' => __( 'Mobile Navigation', 'twentyten' )
	) );

}
endif;
