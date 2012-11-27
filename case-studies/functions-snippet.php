<?php

/*
 * Custom Post Type Snippet
 *
 * Place the following
 * lines in your functions.php
 *
 * @since v1.0.6
 *
 */

/*------------------------------------------------------------------------------------------------[ case studies setup ] */
// http://codex.wordpress.org/Function_Reference/register_post_type
// Add Custom Post Type

function wpflex_custom_post() {
    // labels as an array for dashboard
    $wpflex_custom_post_labels = array(
            // general name for the post stype
            'name'               => 'Custom Posts',
            // singular name for one object of this post type
            'singular_name'      => 'Custom Post',
            // the add new text for dashboard nav
            'add_new'            => 'Add New Custom Post',
            // dashboard nav item txt
            'all_items'          => 'View Custom Posts',
            // edit menu header title txt
            'edit_item'          => 'Edit Custom Post',
            // add new header title txt
            'add_new_item'       => 'New Custom Post',
            // view button txt in visual editor window
            'view_item'          => 'Preview Custom Post',
            // case studies search menu button txt
            'search_items'       => 'Search Custom Posts',
            // case studies search error txt
            'not_found'          => 'No Custom Post(s) Found',
            'not_found_in_trash' => 'No Custom Post(s) Found in Trash',
            // the parent text. This string isn't used on non-hierarchical types
            // In hierarchical ones the default is Parent Page
            'parent_item_colon'  => ''
        );// end $labels

    // $args as an array
    $wpflex_custom_post_args = array(
            'labels'              => $wpflex_custom_post_labels,
            'public'              => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'query_var'           => true,
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'menu_position'       => null,
            'show_ui'             => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        );//end $args

    //register the post type and give it a name and pass the $args variable
    register_post_type( 'custom-post', $wpflex_custom_post_args );

}//end wpflex_custom_post

// initialization call
add_action( 'init', 'wpflex_custom_post' );


/*------------------------------------------------------------------------------------------------[ case studies taxonomy setup ] */

// Begin wpflex_custom_taxonomies
function wpflex_custom_taxonomies(){
    $args = array(
        'hierarchical'  => true,
        'label'         => 'Add Taxonomy Type',
        'labels'        => array(
                            'edit_item'     => 'Edit Taxonomy Type',
                            'add_new_item'  => 'Add New Taxonomy Type',
                            'search_items'  => 'Search Taxonomy Types',
                            'update_item'   => 'Update Taxonomy Type'
                        ),
        'rewrite'       => array(
                            'slug'          => 'taxonomy-type',
                            'hierarchical'  => true
                        ),
        'public'            => true,
        'show_tagcloud'     => true
    );

    // this call registers our case-study-type in our admin panel from the dashboard
    // http://codex.wordpress.org/Function_Reference/register_taxonomy
    register_taxonomy( 'taxonomy-type', array( 'custom-post' ), $args );

}// end casestudies_build_taxonomies

// initialization call
add_action( 'init', 'wpflex_custom_taxonomies', 0 );


/*------------------------------------------------------------------------------------------------[ case studies work type display function ] */
// function for retrieving work types on single custom posts

function get_taxonomy_type() {
    global $post;
    $postid = $post->ID;
    $terms = wp_get_object_terms( $postid, 'taxonomy-type' );
    if( !empty( $terms ) ) :
    echo '<h3>Case Type</h3>';
    echo '<ul class="taxonomy-types">';
        foreach ( $terms as $term ) {
            $ct_name = $term->name;
            $ct_id   = $term->slug;
            echo '<li><a href="/taxonomy-type/' . $ct_id . '" class="taxonomy-type-item" id="cti-'.$ct_id.'">'.$ct_name.'</a></li>';
        }
        echo "</ul>";
    else :
    echo "No Case Type Filed";
    endif;
}


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

// adds a meta box to the the custom-post edit screen
function casestudy_url_metabox() {
    add_meta_box(
            'case-study-url',   // $id = assigned to admin metabox
            'Case Study URL',   // $title = metabox title name
            'case_study_url',   // $callback = function
            'custom-post',      // $post_type = admin page to display metabox
            'side',             // $context = metabox admin position (normal,advanced,side)
            'low'               // $priority (high,core,default,low)
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

?>
