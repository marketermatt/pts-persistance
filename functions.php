<?php
/**
 * @package Persistence
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */

define('VALIDATION_URL','http://validator.w3.org/check/referer');
define('GMPG','http://gmpg.org/xfn/');
define('WP_ORG','http://wordpress.org/');

// Add a text domain
add_action('init', 'persistence_setup');
function persistence_setup()
{
    load_theme_textdomain('persistence', get_template_directory() . '/languages');
}

function pts_enqueue() {
    global $wp_styles;
    wp_enqueue_style( 'themestyle', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'pts_enqueue' );

// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	
// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'persistence' ),
	) );

add_theme_support( 'automatic-feed-links' );

function sidebar_reg(){
	 // Right Column replaces default sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Right Column', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Left Column
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Left Column', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Inset Column
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Inset Column', // The sidebar name to register
          'id' => 'inset-col',
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Banner
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Banner', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));	 
  	 // Bottom Widget Left	
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Left', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
  	 // Bottom Widget Center
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Center', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
     // Bottom Widget Right
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Right', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Logo
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Logo', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h1>',
          'after_title' => '</h1>',
     ));
	 // Menu
     /*if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Menu', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ))*/;
     // Footer Links
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Footer Links', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Footer Info
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Footer Info', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
}
add_action( 'widgets_init', 'sidebar_reg' );
	 
	 
	 // Below is custom read more link for articles
	add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

function my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, __('Continue...','persistence'), $more_link );
} 
	 
	 // This is for the breadcrumbs without the need of a plugin
	 
function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo home_url();
		echo '">';
		bloginfo('name');
		echo "</a> &raquo; ";
		if (is_category() || is_single()) {
			single_cat_title();
			if (is_single()) {
				echo " &raquo; ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}

function persistence_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= ' '.get_bloginfo( 'name' );

    //if is normal page or post


    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'persistence' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'persistence_wp_title', 10, 2 );

if ( ! isset( $content_width ) ) $content_width = 620;

function pts_comment_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case '' :
            ?>
            <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div class="commentgroup">
                    <div id="comment-<?php comment_ID(); ?>">
                        <div class="cmeta">
                            <?php echo get_avatar($comment, 40); ?><?php printf(__('%s', 'persistence'), sprintf('<span class="cname">%s</span>', get_comment_author_link())); ?>
                            <br/>
	<span class="cdate">Commented:&nbsp;<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf(__('%1$s at %2$s', 'persistence'), get_comment_date(), get_comment_time()); ?></a>(<?php edit_comment_link(__('Edit', 'persistence'), ' ');
        ?>)</div>
                        </span>
                        <?php if ($comment->comment_approved == '0') : ?>
                            <div class="cmoderation">
                                <?php _e('Your comment is awaiting moderation.', 'persistence'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="comment-body"><?php comment_text(); ?></div>
                        <div
                            class="reply"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>


                    </div>
                </div>
                <!-- #comment-##  -->
            </div>
            <?php
            break;
        case 'pingback'  :
        case 'trackback' :
            ?>
            <li class="post pingback">
            <p><?php _e('Pingback:', 'persistence'); ?> <?php comment_author_link(); ?>(<?php edit_comment_link(__('Edit', 'persistence'), ' '); ?>)</p>
            <?php
            break;
    endswitch;
}

add_theme_support('post-thumbnails');

$args = array(
    'width' => 980,
    'height' => 300,
    'default-image' => '',
    'uploads' => true,
    'header-text' => false,
);
add_theme_support('custom-header', $args);

function my_theme_add_editor_styles()
{
    add_editor_style(get_stylesheet_directory_uri() . '/editor.css');
}
add_action('after_setup_theme', 'my_theme_add_editor_styles');