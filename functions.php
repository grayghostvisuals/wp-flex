<?php 
//theme-name custom function setup
add_action( 'after_setup_theme', 'theme-name_setup' );

require_once ( get_template_directory() . '/theme-options.php' );

//if !theme-name_setup
if ( ! function_exists( 'theme-name_setup' ) ):
 
//theme-name_setup
function theme-name_setup() {

//wp enque script
if ( is_singular() ) : 
wp_enqueue_script( 'comment-reply' );
endif;

//trigger the theme-name widget function
add_action( 'widgets_init' , 'theme-name_widget' );

//if content_width not set
if ( ! isset( $content_width ) ) :
$content_width = 960;
endif;

//theme-name widget setup
function theme-name_widget(){
	
  //call register_sidebar wp method as array
  register_sidebar( array(
						 'ID'				=> 'theme-name_sidebar',
						 'name' 			=> 'theme-name Sidebar',
						 'before_widget' 	=> '<article id="%1$s" class="widget %2$s">',
						 'after_widget' 	=> '</article>',
						 'before_title' 	=> '<h3 class="widget-title">',
						 'after_title' 		=> '</h3>',
						));//end primary sidebar
  
  register_sidebar(array(
						 'ID'				=> 'footer_widget',
						 'name' 			=> 'Footer Widget',
						 'before_widget' 	=> '<article id="%1$s" class="footerwidget %2$s">',
						 'after_widget' 	=> '</article>',
						 'before_title' 	=> '<h3 class="widget-title">',
						 'after_title' 		=> '</h3>',
						));//end footer widget
	
};

//add editor style sheet
add_editor_style();

//enables post and comment RSS feed links to head
add_theme_support( 'automatic-feed-links' );

//enables post-thumbnail support
//enables for Posts and "movie" post type but not for Pages
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );
set_post_thumbnail_size( 600, 400, true );

}//end theme-name_setup
endif;//end ! function_exists( 'theme-name_setup' )