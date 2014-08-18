<?php
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
    };

    // trigger the wpflex widget function
    // required for theme submission
    add_action( 'widgets_init' , 'wpflex_widget' );
?>