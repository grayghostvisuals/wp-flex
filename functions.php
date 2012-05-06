<?php 
/*------------------------------------------------------------------------------------------------[ custom image header constraints ] */

//Custom Image Header Constants
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/img/default_header.jpg' ); //%s is the template dir uri
define( 'HEADER_IMAGE_WIDTH', 775 ); //use width and height appropriate for your theme
define( 'HEADER_IMAGE_HEIGHT', 200 );


/*------------------------------------------------------------------------------------------------[ after setup theme init ] */


//themename custom function setup
add_action( 'after_setup_theme', 'wpflex_setup' );


/*------------------------------------------------------------------------------------------------[ theme options ] */


//wpflex options
include_once( get_template_directory() . '/wpflex-options.php' );


/*------------------------------------------------------------------------------------------------[ theme setup function ] */


//if ! wpflex_setup
if ( ! function_exists( 'wpflex_setup' ) ) :
//wpflex_setup
function wpflex_setup() {


/*------------------------------------------------------------------------------------------------[ wp enque script ] */


if ( is_singular() ) : 
wp_enqueue_script( 'comment-reply' );
endif;


/*------------------------------------------------------------------------------------------------[ custom theme header ] */


// call to header style
function wpflex_header_style() { ?>
<style>
#wpflex-header { 
	background: url(<?php header_image(); ?>) 
}
</style>
<?php }//end function wpflex_header_style

// gets included in the admin header
function wpflex_admin_header_style() { ?>
<style>
#wpflex-headimg { 
	background: no-repeat;
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px; 
	height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
}
</style>
<?php } //end function wpflex_admin_header_style

//custom image header
add_custom_image_header( 'wpflex_header_style', 'wpflex_admin_header_style' );


/*------------------------------------------------------------------------------------------------[ rss feed ] */


//enables post and comment RSS feed links to head
//required for theme submission
add_theme_support( 'automatic-feed-links' );


/*------------------------------------------------------------------------------------------------[ editor style sheet ] */


//add editor style sheet
add_editor_style();


/*------------------------------------------------------------------------------------------------[ custom background ] */


//allows users to set a custom background
add_custom_background();


/*------------------------------------------------------------------------------------------------[ post thumbnails ] */


//enables post-thumbnail support
//enables for Posts and "movie" post type but not for Pages
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

// set post thumbnail size
set_post_thumbnail_size( 700, 450, true );


/*------------------------------------------------------------------------------------------------[ content width ] */


//if content_width not set
if ( ! isset( $content_width ) ) :
$content_width = 960;
endif;


/*------------------------------------------------------------------------------------------------[ widgets ] */


//wpflex widget setup
function wpflex_widget() {

//call register_sidebar wp method as array
register_sidebar( array(
	'ID'			=> 'wpflex_sidebar',
	'name' 			=> 'WP-Flex Sidebar',
	'before_widget' => '<article id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</article>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
));//end primary sidebar
  
//call to register footer sidebar widgets
register_sidebar( array(
	'ID'			=> 'fw',
	'name' 			=> 'WP-Flex Footer Widget',
	'before_widget' => '<article id="%1$s" class="fwidget %2$s">',
	'after_widget' 	=> '</article>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
)); //end footer widget

}; //end wpflex_widget

//trigger the wpflex widget function
//required for theme submission
add_action( 'widgets_init' , 'wpflex_widget' );	


}//end themename_setup

endif;//end ! function_exists( 'themename_setup' )
