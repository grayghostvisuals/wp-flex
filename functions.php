<?php
/*-----------------------------------[ custom image header constraints ] */

//Custom Image Header Constants
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/img/default_header.jpg' ); //%s is the template dir uri
define( 'HEADER_IMAGE_WIDTH', 775 ); //use width and height appropriate for your theme
define( 'HEADER_IMAGE_HEIGHT', 200 );


/*-----------------------------------[ theme options ] */

//wpflex options
include_once( get_template_directory() . '/wpflex-options.php' );


/*-----------------------------------------------------------------------[ theme setup function ] */

//if ! wpflex_setup
if ( ! function_exists( 'wpflex_setup' ) ) :

//wpflex_setup
function wpflex_setup() {


/*-----------------------------------[ register the custom nav menus ] */

register_nav_menus( array(
    'primary' => 'Primary Menu'
));


/*-----------------------------------[ wp enque script ] */

if ( is_singular() ) :
    wp_enqueue_script( 'comment-reply' );
endif;


/*-----------------------------------[ custom theme header ] */

// http://codex.wordpress.org/Custom_Headers
// http://codex.wordpress.org/Appearance_Header_Screen
$custom_header_defaults = array(
    'default-image'          => '', //get_template_directory_uri() . 'screenshot.png',
    'random-default'         => false,
    'width'                  => '980',
    'height'                 => '200',
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);

// custom image header
// add_theme_support( 'custom-header', $args ) as of WP 3.4
add_theme_support( 'custom-header', $custom_header_defaults );


/*-----------------------------------[ rss feed ] */

// enables post and comment RSS feed links to head
// required for theme submission
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------[ editor style sheet ] */

//add editor style sheet
add_editor_style();


/*-----------------------------------[ custom background ] */

// allows users to set a custom background
// add_theme_support( 'custom-background', $args )
add_theme_support( 'custom-background' );


/*-----------------------------------[ post thumbnails ] */

// enables post-thumbnail support
// enables for Posts and "movie" post type but not for Pages
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

// set post thumbnail size
set_post_thumbnail_size( 700, 450, true );


/*-----------------------------------[ content width ] */

// if content_width not set
if ( ! isset( $content_width ) ) :
$content_width = 960;
endif;


/*-----------------------------------[ widgets ] */

// wpflex widget setup
function wpflex_widget() {

// call register_sidebar wp method as array
register_sidebar( array(
    'ID'            => 'wpflex_sidebar',
    'name'          => 'WP-Flex Sidebar',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));// end primary sidebar

// call to register footer sidebar widgets
register_sidebar( array(
    'ID'            => 'fw',
    'name'          => 'WP-Flex Footer Widget',
    'before_widget' => '<article id="%1$s" class="fwidget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
)); // end footer widget

}; // end wpflex_widget

// trigger the wpflex widget function
// required for theme submission
add_action( 'widgets_init' , 'wpflex_widget' );


}// end wpflex_setup

endif;// end ! function_exists( 'wpflex_setup' )


/*-----------------------------------------------------------------------[ after setup theme init ] */

//themename custom function setup
add_action( 'after_setup_theme', 'wpflex_setup' );