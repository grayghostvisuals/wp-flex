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
add_theme_support( 'post-thumbnails', array( 'post', 'case-studies', 'movie' ) );

// set post thumbnail size
set_post_thumbnail_size( 700, 450, true );


/*------------------------------------------------------------------------------------------------[ case-studies thumbnails ] */


// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'case-study-thumb', 700, 450, true ); //300 pixels wide (and unlimited height)

// Remove Wordpress Defauly Inline Image Styles
function remove_image_dim_attr( $html ) {
        $html = preg_replace( '/width=(["\'])(.*?)\1/', '', $html );
            $html = preg_replace( '/height=(["\'])(.*?)\1/', '', $html );
                return $html;
}//end function remove_image_dim_attr

// filter for case study feature image
add_filter( 'post_thumbnail_html','remove_image_dim_attr' );


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
    'ID'        => 'wpflex_sidebar',
    'name'      => 'WP-Flex Sidebar',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));//end primary sidebar
  
//call to register footer sidebar widgets
register_sidebar( array(
    'ID'        => 'fw',
    'name'      => 'WP-Flex Footer Widget',
    'before_widget' => '<article id="%1$s" class="fwidget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
)); //end footer widget

}; //end wpflex_widget

//trigger the wpflex widget function
//required for theme submission
add_action( 'widgets_init' , 'wpflex_widget' );



/*------------------------------------------------------------------------------------------------[ case studies setup ] */
// http://codex.wordpress.org/Function_Reference/register_post_type
// Add Case Studies Custom Post Type

function case_studies() {
    // labels as an array for dashboard
    $labels = array(
            // general name for the post stype
            'name'          => 'Cases',
            // singular name for one object of this post type
            'singular_name'     => 'Case Study',
            // the add new text for dashboard nav
            'add_new'       => 'Add New Case',
            // dashboard nav item txt
            'all_items'     => 'View Cases',
            // edit menu header title txt
            'edit_item'         => 'Edit Case Study',
            // add new header title txt
            'add_new_item'      => 'New Case Study',
            // view button txt in visual editor window
            'view_item'         => 'Preview Case Study',
            // case studies search menu button txt
            'search_items'      => 'Search Cases',
            // case studies search error txt
            'not_found'         => 'No Case Studies Found',
            'not_found_in_trash'    => 'No Case Studies Found in Trash', 
            // the parent text. This string isn't used on non-hierarchical types
            // In hierarchical ones the default is Parent Page 
            'parent_item_colon'     => ''
        );// end $labels

    // $args as an array  
    $args = array(
            'labels'        => $labels,
            'public'        => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'show_ui'       => true, 
            'query_var'         => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'menu_position'     => null,
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        );//end $args

    //register the post type and give it a name and pass the $args variable
    register_post_type( 'case-studies', $args );

}//end case_studies

// initialization call
add_action( 'init', 'case_studies' );


/*------------------------------------------------------------------------------------------------[ case studies taxonomy setup ] */


// Begin casestudies_custom_taxonomies
function casestudies_custom_taxonomies(){
    $args = array(
        'hierarchical'      => true, 
        'label'         => 'Add Case Type',
        'labels'        => array(
                        'edit_item' => 'Edit Case Type',
                        'add_new_item'  => 'Add New Case Type',
                        'search_items'  => 'Search Case Types',
                        'update_item'   => 'Update Case Type'
                        ),
        'rewrite'       => array( 
                        'slug'      => 'case-type', 
                        'hierarchical'  => true 
                        ), 
        'public'        => true,
        'show_tagcloud'     => true
    );

    // this call registers our case-study-type in our admin panel from the dashboard
    // http://codex.wordpress.org/Function_Reference/register_taxonomy
    register_taxonomy( 'case-type', array( 'case-studies' ), $args ); 

}// end casestudies_build_taxonomies

// initialization call
add_action( 'init', 'casestudies_custom_taxonomies', 0 );


/*------------------------------------------------------------------------------------------------[ case studies work type display function ] */
// function for retrieving work types on single case studies


function get_case_type() {
    global $post; 
    $postid = $post->ID;
    $terms = wp_get_object_terms( $postid, 'case-type' );
    if( !empty( $terms ) ) :
    echo '<h3>Case Type</h3>';
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



/*------------------------------------------------------------------------------------------------[ case studies url meta setup ] */
//http://return-true.com/2011/07/adding-custom-post-type-and-custom-meta-box-in-wordpress
//http://codex.wordpress.org/Function_Reference/add_meta_box#Example
//http://wp.smashingmagazine.com/2011/10/04/create-custom-post-meta-boxes-wordpress
//http://markjaquith.wordpress.com/2006/06/02/wordpress-203-nonces


// Since you only want your post meta box to appear on the post editor screen in the admin, 
// you’ll use the load-post.php and load-post-new.php hooks to initialize your meta box code
add_action( 'load-post.php', 'casestudy_url_metabox_setup' );
add_action( 'load-post-new.php', 'casestudy_url_metabox_setup' );

// custom meta box setup
function casestudy_url_metabox_setup(){
    // action to add meta box
    add_action( 'add_meta_boxes', 'casestudy_url_metabox' );

    // lets save that custom meta data shall we?
    add_action( 'save_post', 'save_casestudy_url_meta', 10, 2 );
}

// adds a meta box to the the case-studies edit screen
function casestudy_url_metabox() {
    add_meta_box(
        'case-study-url', // $id = assigned to admin metabox
        'Case Study URL', // $title = metabox title name
        'case_study_url', // $callback = function
        'case-studies',   // $post_type = admin page to display metabox 
        'side',       // $context = metabox admin position (normal,advanced,side)
        'low'             // $priority (high,core,default,low)  
        );
}

// prints out the custom meta box input fields
function case_study_url( $object, $box ) { 
    // Nonces are used as a security related protection to prevent attacks and mistakes
    // The nonce field is used to validate that the contents of the form came from the 
    // location on the current site and not somewhere else
    if( function_exists( 'wp_nonce_field' ) ) :
    wp_nonce_field( basename( __FILE__ ), 'casestudy_url_nonce' ); ?>

    <!-- add the custom meta fields -->
    <label for="casestudy-url">Case Study URL</label>
    <p><input type="url" id="casestudy-url" name="casestudy-url" value="<?php echo esc_attr( get_post_meta( $object->ID, 'casestudy_url', true ) ); ?>" size="30" placeholder="http://www."></p>
    <?php endif;
}

/* Save the meta box's post metadata. */
function save_casestudy_url_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( ! isset( $_POST['casestudy_url_nonce'] ) || ! wp_verify_nonce( $_POST['casestudy_url_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value = ( isset( $_POST['casestudy-url'] ) ? esc_attr( $_POST['casestudy-url'] ) : '' );

    /* Get the meta key. */
    $meta_key = 'casestudy_url';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

    /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/*------------------------------------------------------------------------------------------------[ case studies custom excerpts ] */
// http://codex.wordpress.org/Excerpt

// read more link for custom cases excerpts
function excerpt_read_more_link( $output ){
    global $post;
    return $output . '<span class="excerpt-more-btn"><a href="' . get_permalink( $post->ID ) . '">Continue Reading &rarr;</a></span>';
}
add_filter( 'the_excerpt', 'excerpt_read_more_link' );

// custom excerpts length
function custom_excerpt_length( $length ) {
    return 20;
}
// control the length of the excerpt
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


}//end wpflex_setup

endif;//end ! function_exists( 'wpflex_setup' )