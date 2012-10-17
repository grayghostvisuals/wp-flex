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

        // http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
        // http://codex.wordpress.org/Function_Reference/wp_title
        //
        // Feel free to pick your poison
        // https://gist.github.com/3907296
        // https://gist.github.com/3907306
        //
        // Title tag filter required for themes
        // a custom callback function that displays a meaningful title
        // depending on the page being rendered
        function wpflex_title_filter( $title ) {
            global $wp_query, $s, $paged, $page;

            if ( ! is_feed() ) :
                $sep = __( '&raquo;' );
                $new_title = get_bloginfo( 'name' ) . ' ';
                $bloginfo_description = get_bloginfo( 'description' );

                if ( ( is_home () || is_front_page() ) && !empty( $bloginfo_description ) && !$paged && !$page ) :
                    $new_title .= $sep . ' ' . $bloginfo_description;
                elseif ( is_single() || is_page() ) :
                    $new_title .= $sep . ' ' . single_post_title( '', false );
                elseif ( is_search() ) :
                    $new_title .= $sep . ' ' . sprintf( __( 'Search Results: %s' ), esc_html( $s ) );
                else :
                    $new_title .= $title;
                endif;

                if ( $paged || $page ) :
                    $new_title .= ' ' . $sep . ' ' . sprintf( __( 'Page: %s' ), max( $paged, $page ) );
                endif;

                $title = $new_title;
            endif;
            return $title;
        }

        add_filter( 'wp_title', 'wpflex_title_filter' );


        /*-----------------------------------[ register the custom nav menu(s) ] */

        // this will take another array for another nav menu
        // i.e.
        // 'primary'      => 'Primary Menu',
        // 'another menu' => 'Footer Menu'
        register_nav_menus( array(
            'primary'   => 'Primary Menu'
        ));


        /*-----------------------------------[ comment reply wp enque script ] */

        // Required WordPress Core Feature for Theme Review
        if ( is_singular() ) :
            wp_enqueue_script( 'comment-reply' );
        endif;


        /*-----------------------------------[ external javascript and stylesheet assets ] */

        // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
        // http://wpcandy.com/teaches/how-to-load-scripts-in-wordpress-themes
        // Themes are recommended to hook stylesheet and script enqueue callbacks into `wp_enqueue_scripts`
        // Loads in your document <head> along with a WordPress version flag ?ver=X.X.X
        // included scripts willl load relative to the URL of your theme directory
        function wpflex_assets_loader() {
            // load main stylesheet
            wp_register_style( 'style', get_stylesheet_uri(), array(), '1.0.5', 'all' );
            wp_enqueue_style( 'style' );

            // Load WordPress' jQuery. Must be registered first before wp_enqueue_script()
            wp_register_script( 'jquery', false, array(), '', true);
            wp_enqueue_script( 'jquery' );

            // Load Modernizr
            wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), '2.6.2', false );

            // load plugins.js
            wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery'), '1.0.5', true );

            // load main.js
            wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery'), '1.0.5', true );

            // load google analytics
            wp_enqueue_script( 'google-analytics', get_template_directory_uri() . '/js/google-analytics.js', array(), '', true );
        }

        add_action( 'wp_enqueue_scripts', 'wpflex_assets_loader' );


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
            )); // end primary sidebar

            // call to register footer sidebar widgets
            register_sidebar( array(
                'ID'            => 'wpflex-footer-sidebar',
                'name'          => 'wpflex footer sidebar',
                'before_widget' => '<article id="%1$s" class="fwidget %2$s">',
                'after_widget'  => '</article>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )); // end footer widget

        };

        // trigger the wpflex widget function
        // required for theme submission
        add_action( 'widgets_init' , 'wpflex_widget' );
    }// end wpflex_setup
endif;// end ! function_exists( 'wpflex_setup' )


/*-----------------------------------------------------------------------[ after setup theme init ] */

//themename custom function setup
add_action( 'after_setup_theme', 'wpflex_setup' );