<?php
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
            $sep = '&raquo;';
            $new_title = get_bloginfo( 'name' ) . ' ';
            $bloginfo_description = get_bloginfo( 'description' );

            if ( ( is_home () || is_front_page() ) && !empty( $bloginfo_description ) && !$paged && !$page ) :
                $new_title .= $sep . ' ' . $bloginfo_description;
            elseif ( is_single() || is_page() ) :
                $new_title .= $sep . ' ' . single_post_title( '', false );
            elseif ( is_search() ) :
                $new_title .= $sep . ' ' . sprintf( 'Search Results: %s', esc_html( $s ) );
            else :
                $new_title .= $title;
            endif;

            if ( $paged || $page ) :
                $new_title .= ' ' . $sep . ' ' . sprintf( 'Page: %s', max( $paged, $page ) );
            endif;

            $title = $new_title;
        endif;
        return $title;
    }

    add_filter( 'wp_title', 'wpflex_title_filter' );
?>