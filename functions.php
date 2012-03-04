<?php 
//Custom Image Header Constants
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/img/default_header.jpg' ); //%s is the template dir uri
define( 'HEADER_IMAGE_WIDTH', 775 ); //use width and height appropriate for your theme
define( 'HEADER_IMAGE_HEIGHT', 200 );

//themename custom function setup
add_action( 'after_setup_theme', 'themename_setup' );

//themename options
include_once( get_template_directory() . '/themeoptions.php' );

//if !themename_setup
if ( ! function_exists( 'themename_setup' ) ) :
 
//themename_setup
function themename_setup() {

//wp enque script
if ( is_singular() ) : 
wp_enqueue_script( 'comment-reply' );
endif;

// gets included in the site header
function themename_header_style() {
    ?><style type="text/css">
        #themename-header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
}//end function themename_header_style

// gets included in the admin header
function themename_admin_header_style() {
    ?><style type="text/css">
        #themename-headimg {
            width:  <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style>
<?php } //end function themename_admin_header_style

//custom theme image header
add_custom_image_header('themename_header_style', 'themename_admin_header_style');

//enables post and comment RSS feed links to head
//required for theme submission
add_theme_support( 'automatic-feed-links' );

//add editor style sheet
add_editor_style();

//allows users to set a custom background
add_custom_background();

//enables post-thumbnail support
//enables for Posts and "movie" post type but not for Pages
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );
set_post_thumbnail_size( 600, 400, true );

//trigger the theme-name widget function
//required for theme submission
add_action( 'widgets_init' , 'themename_widget' );

//if content_width not set
if ( ! isset( $content_width ) ) :
$content_width = 960;
endif;

//themename widget setup
function themename_widget(){

//call register_sidebar wp method as array
register_sidebar( array(
'ID'			=> 'themename_sidebar',
'name' 			=> 'themename Sidebar',
'before_widget' => '<article id="%1$s" class="widget %2$s">',
'after_widget' 	=> '</article>',
'before_title' 	=> '<h3 class="widget-title">',
'after_title' 	=> '</h3>',
));//end primary sidebar
  
//call to register footer sidebar widgets
register_sidebar( array(
'ID'				=> 'fw',
'name' 				=> 'Footer Widget',
'before_widget' 	=> '<article id="%1$s" class="fwidget %2$s">',
'after_widget' 		=> '</article>',
'before_title' 		=> '<h3 class="widget-title">',
'after_title' 		=> '</h3>',
)); //end footer widget

}; //end themename_widget

}//end themename_setup
endif;//end ! function_exists( 'themename_setup' )