<?php 
/*------------------------------------------------------------------------------------------------[ custom image header constraints ] */


//Custom Image Header Constants
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/img/default_header.jpg' ); //%s is the template dir uri
define( 'HEADER_IMAGE_WIDTH', 775 ); //use width and height appropriate for your theme
define( 'HEADER_IMAGE_HEIGHT', 200 );


/*------------------------------------------------------------------------------------------------[ after setup theme init ] */


//themename custom function setup
add_action( 'after_setup_theme', 'themename_setup' );


/*------------------------------------------------------------------------------------------------[ theme options ] */


//themename options
include_once( get_template_directory() . '/themeoptions.php' );


/*------------------------------------------------------------------------------------------------[ theme setup function ] */


//if !themename_setup
if ( ! function_exists( 'themename_setup' ) ) :
//themename_setup
function themename_setup() {


/*------------------------------------------------------------------------------------------------[ wp enque script ] */


if ( is_singular() ) : 
wp_enqueue_script( 'comment-reply' );
endif;


/*------------------------------------------------------------------------------------------------[ custom theme header ] */


// call to header style
function themename_header_style() { ?>
<style>#themename-header { background: url(<?php header_image(); ?>) }</style><?php }//end function themename_header_style

// gets included in the admin header
function themename_admin_header_style() { ?>
<style>#themename-headimg { width:  <?php echo HEADER_IMAGE_WIDTH; ?>px; height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; background: no-repeat }</style> <?php } //end function themename_admin_header_style

//custom theme image header
add_custom_image_header('themename_header_style', 'themename_admin_header_style');


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


/*------------------------------------------------------------------------------------------------[ post thumnails ] */


//enables post-thumbnail support
//enables for Posts and "movie" post type but not for Pages
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );
set_post_thumbnail_size( 600, 400, true );


/*------------------------------------------------------------------------------------------------[ content width ] */


//if content_width not set
if ( ! isset( $content_width ) ) :
$content_width = 960;
endif;


/*------------------------------------------------------------------------------------------------[ widgets ] */


//themename widget setup
function themename_widget() {

//call register_sidebar wp method as array
register_sidebar( array(
	'ID'		=> 'themename_sidebar',
	'name' 		=> 'themename Sidebar',
	'before_widget' => '<article id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</article>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
));//end primary sidebar
  
//call to register footer sidebar widgets
register_sidebar( array(
	'ID'		=> 'fw',
	'name' 		=> 'Footer Widget',
	'before_widget' => '<article id="%1$s" class="fwidget %2$s">',
	'after_widget' 	=> '</article>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
)); //end footer widget

}; //end themename_widget

//trigger the theme-name widget function
//required for theme submission
add_action( 'widgets_init' , 'themename_widget' );


/*------------------------------------------------------------------------------------------------[ case studies setup ] */

// http://codex.wordpress.org/Function_Reference/register_post_type
// Add Case Studies Custom Post Type

function case_studies() {
	// labels as an array for dashboard
	$labels = array(
			// general name for the post stype
			"name"		 	=> "Cases",
			// singular name for one object of this post type
			"singular_name"  	=> "Case Study",
			// the add new text for dashboard nav
			"add_new" 	 	=> "Add New Case",
			// dashboard nav item txt
			"all_items"		=> "Cases",
			// edit menu header title txt
			"edit_item" 	 	=> "Edit Case Study",
			// add new header title txt
			"add_new_item" 	 	=> "New Case Study",
			// view button txt in visual editor window
			"view_item" 	 	=> "Preview Case Study",
			// case studies search menu button txt
			"search_items" 	 	=> "Search Cases",
			// case studies search error txt
			"not_found" 	 	=> "No Case Studies Found",
			"not_found_in_trash" 	=> "No Case Studies Found in Trash", 
			// the parent text. This string isn't used on non-hierarchical types
			// In hierarchical ones the default is Parent Page 
			'parent_item_colon' 	=> ''
		);// end $labels

	// $args as an array  
	$args = array(
			"labels" 		=> $labels,
			"public" 		=> true,
			"exclude_from_search" 	=> true,
			"publicly_queryable" 	=> true,
			"show_ui" 		=> true, 
			"query_var" 		=> true,
			"capability_type" 	=> 'post',
			"hierarchical"		=> false,
			"menu_position" 	=> null,
			"supports" 		=> array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);//end $args
	
	//register the post type and give it a name and pass the $args variable
	register_post_type( 'case-studies', $args );

}//end case_studies

// initialization call
add_action( "init", "case_studies" );


/*------------------------------------------------------------------------------------------------[ case studies taxonomy setup ] */


// Begin tz_build_taxonomies
function casestudies_custom_taxonomies(){
	$args = array(
		"hierarchical" 	 	=> true, 
		"label"		 	=> "Case Types",
		"labels"		=> array(
						"edit_item"	=> "Edit Case Type",
						"add_new_item"	=> "Add New Case Type",
						"search_items"	=> "Search Case Types",
						"update_item"	=> "Update Case Type"
						),
		"rewrite" 	 	=> array( 
						"slug" 		=> "case-type", 
						"hierarchical"  => true 
						), 
		"public" 	 	=> true,
		"show_tagcloud"		=> true
	);
	
	// this call registers our case-study-type in our admin panel from the dashboard
	// http://codex.wordpress.org/Function_Reference/register_taxonomy
	register_taxonomy( "case-type", array( "case-studies" ), $args ); 

}// end casestudies_build_taxonomies

// initialization call
add_action( "init", "casestudies_custom_taxonomies", 0 );


/*------------------------------------------------------------------------------------------------[ case studies work type display function ] */

// function for retrieving work types on single case studies
function get_case_type() {

	global $post; 
	$postid = $post->ID;
	$terms = wp_get_object_terms( $postid, "case-type" );
	
	if( !empty( $terms ) ) :
	echo '<ul class="case-types">';
     
     	foreach ( $terms as $term ) {
     
     	$ct_name = $term->name;
     	$ct_id = $term->slug;
     
       	echo '<li><a href="/case-type/' . $ct_id . '" class="case-type-item" id="cti-'.$ct_id.'">'.$ct_name.'</a></li>';
        
     	} //end foreach loop

     	echo "</ul>";
 	else :
 	echo "No Case Type Filed";
 	endif;
	
}//end get_work_type	


/*------------------------------------------------------------------------------------------------[ case studies custom meta data setup ] */

//http://return-true.com/2011/07/adding-custom-post-type-and-custom-meta-box-in-wordpress/
//http://codex.wordpress.org/Function_Reference/add_meta_box#Example

// action to add meta box
add_action( 'add_meta_boxes', 'casestudies_custom_url_meta' );

/* adds a meta box to the main column on the case-studies edit screen */
function casestudies_custom_url_meta() {
    add_meta_box(
		'case-url',  // $id
		'Case Study URL', // $title
		'case_study_URL', // $callback
		'case-studies',   // $post_type	
		'side',		  // $context (normal,advanced,side)
		'low'	          // $priority (high,core,default,low)	
		);
}

// prints out the custom meta box
function case_study_url( $post ) { 
	wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
	echo '<label for="url-address">enter URL</label>';
	echo '<input type="url" id="url-address" name="url-address" placeholder="http://www.dominaname.com">';
}


}//end themename_setup

endif;//end ! function_exists( 'themename_setup' )
