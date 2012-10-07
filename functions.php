<?php
/*-----------------------------------[ custom image header constraints ] */

//Custom Image Header Constants
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '' ); //%s is the template dir uri || %s/img/default_header.jpg
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

        /*-----------------------------------[ HTML title tag filter ] */

        // http://shinraholdings.com/59/using-the-wp_title-filter
        // http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
        // http://codex.wordpress.org/Function_Reference/wp_title

        // Title tag filter
        // required for themes
        function wpflex_title_filter( $title, $sep, $seplocation ) {
            // get special index page type (if any)
            if ( is_category() )
                $type = 'Category';
            elseif ( is_tag() )
                $type = 'Tag';
            elseif ( is_author() )
                $type . 'Author';
            elseif ( is_date() || is_archive() )
                $type = 'Archives';
            else
                $type = false;

            // get the page number
            if ( get_query_var( 'paged' ) )
                $page_num = 'Page ' . get_query_var( 'paged' ); // on index
            elseif ( get_query_var( 'page' ) )
                $page_num = 'Page ' . get_query_var( 'page' ); // on single
            else $page_num = false;

            // strip title separator
            $title = trim( str_replace( $sep, '', $title ) );

            // determine seplocation order
            if ( $seplocation == 'right' )
                $parts = array( $page_num, $title, $type, get_bloginfo( 'name' ) );
            else
                $parts = array( get_bloginfo( 'name' ), $type, $title, $page_num );

            // strip blanks, implode, and return title tag
            $parts = array_filter( $parts );
            return implode( ' ' . $sep . ' ', $parts );
        }

        // call our custom wp_title filter, with normal (10) priority, and 3 args
        add_filter( 'wp_title', 'wpflex_title_filter', 10, 3 );


        /*-----------------------------------[ register the custom nav menu(s) ] */

        // this will take another array for another nav menu
        // i.e.
        // 'primary'      => 'Primary Menu',
        // 'another menu' => 'Footer Menu'
        register_nav_menus( array(
            'primary'   => 'Primary Menu'
        ));


        /*-----------------------------------[ wp_enqueue styles ] */

        //Themes are recommended to hook stylesheet and script enqueue callbacks into `wp_enqueue_scripts`
        //uncomment and implement before submission for theme review
        //
        //function wpflex_style() {
        //    // Register the style like this for a theme:
        //    // (First the unique name for the style (custom-style) then the src,
        //    // then dependencies and ver no. and media type)
        //    wp_register_style();

        //    // enqueing:
        //    wp_enqueue_style();
        //}

        //add_action('wp_enqueue_scripts', 'wpflex_style');


        /*-----------------------------------[ wp enque script ] */

        // Required WordPress Core Feature for Theme Review
        if ( is_singular() ) :
            wp_enqueue_script( 'comment-reply' );
        endif;


        /*-----------------------------------[ custom theme header ] */

        // http://codex.wordpress.org/Custom_Headers
        // http://codex.wordpress.org/Appearance_Header_Screen
        $wpflex_custom_header_defaults = array(
            'default-image'          => '',
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
        add_theme_support( 'custom-header', $wpflex_custom_header_defaults );


        /*-----------------------------------[ rss feed ] */

        // enables post and comment RSS feed links to head
        // * required for theme submission
        add_theme_support( 'automatic-feed-links' );


        /*-----------------------------------[ editor style sheet ] */

        //add editor style sheet
        add_editor_style();


        /*-----------------------------------[ custom background ] */

        // allows users to set a custom background
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
            'ID'            => 'wpflex-sidebar',
            'name'          => 'wpflex sidebar',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget'  => '</article>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));// end primary sidebar

        // call to register footer sidebar widgets
        register_sidebar( array(
            'ID'            => 'wpflex-footer-sidebar',
            'name'          => 'wpflex footer sidebar',
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