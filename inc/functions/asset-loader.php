<?php
    /*-----------------------------------[ external javascript and stylesheet assets ] */

    // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
    // http://wpcandy.com/teaches/how-to-load-scripts-in-wordpress-themes
    // Themes are recommended to hook stylesheet and script enqueue callbacks into `wp_enqueue_scripts`
    // Loads in your document <head> along with a WordPress version flag ?ver=X.X.X
    // included scripts willl load relative to the URL of your theme directory
    function wpflex_assets_loader() {
        wp_register_style( 'normalize', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . '://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css');
        wp_register_style( 'style', get_stylesheet_uri(), array('normalize'), '1.0.7', 'all' );
        wp_enqueue_style( 'style');

        // Load WordPress' jQuery. Must be registered first before wp_enqueue_script()
        // http://css-tricks.com/snippets/wordpress/include-jquery-in-wordpress-theme
        // http://digwp.com/2009/06/use-google-hosted-javascript-libraries-still-the-right-way
        if ( ! is_admin() ) {
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null );
            wp_enqueue_script( 'jquery' );
        }

        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), '2.6.2', false );

        wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery'), '1.0.7', true );

        wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery'), '1.0.7', true );
    }

    add_action( 'wp_enqueue_scripts', 'wpflex_assets_loader' );
?>