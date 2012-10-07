<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>

<!-- character encoding utf-8 -->
<meta charset="<?php bloginfo( 'charset' ); ?>">

<!-- google chrome frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">

<!-- title -->
<!-- http://codex.wordpress.org/Function_Reference/wp_title -->
<title>
<?php wp_title(); ?>
<?php
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );

    if ( $site_description && ( is_home() || is_front_page() ) ) :
        echo " &raquo; $site_description";
    endif;
?>
</title>

<!-- search engine robots meta instructions -->
<?php if ( is_search() || is_404() ) : ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="all">
<?php endif; ?>

<!-- index search meta data -->
<?php if ( is_home() ) : ?>
<meta name="description" content="<?php esc_attr( bloginfo( 'name' ) ); esc_attr( bloginfo( 'description' ) ); ?>">

<!-- single page meta tag description -->
<?php elseif ( is_single() ) : ?>
<meta name="description" content="<?php esc_attr( wp_title() ) ?>">

<!-- archive pages meta tag description -->
<?php elseif ( is_archive() ) : ?>
<meta name="description" content="">
<?php elseif ( is_search() ) : ?>
<meta name="description" content="<?php esc_html( $s ) ?>">

<!-- fallback meta tag description -->
<?php else : ?>
<meta name="description" content="<?php esc_attr( bloginfo( 'name' ) ); esc_attr( bloginfo( 'description' ) ) ?>">
<?php endif; ?>

<!-- Mobile viewport optimized: h5bp.com/viewport -->
<meta name="viewport" content="width=device-width">

<!-- http://t.co/dKP3o1e -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

<!-- Sets whether a web application runs in full-screen mode -->
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
<link rel="stylesheet" media="all" href="<?php echo get_stylesheet_uri(); ?>">

<!-- pingback url -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- RSS Feed -->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo( 'rss2_url' ); ?>">

<!--
All JavaScript at the bottom, except this Modernizr. Modernizr enables HTML5 elements & feature detects;
for optimal performance, create your own custom Modernizr build: www.modernizr.com/download
-->
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>

<?php //required comment functionality ?>
<?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>

<!-- required for all wordpress themes and placed at the end of the head tag element -->
<?php wp_head(); ?>
</head>

<!-- body element tag -->
<body <?php body_class(); ?>>

<!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<header role="banner">
    <?php $header = get_header_image() ?>
    <?php if ( isset( $header ) || $header ) : ?>
        <div id="header-image">
            <a href="<?php echo home_url() ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" usemap="#Map"></a>
        </div>
    <?php endif; ?>

    <h1 class="blogname"><a href="<?php echo home_url();  ?>"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
    <h2 class="tagline"><?php echo esc_attr( bloginfo( 'description' ) ); ?></h2>

    <!-- http://codex.wordpress.org/Function_Reference/wp_nav_menu -->
    <!-- http://codex.wordpress.org/Navigation_Menus -->
    <!-- http://codex.wordpress.org/Function_Reference/wp_list_pages -->
    <nav role="navigation">
        <?php
            // Custom Nav Call
            function wpflex_custom_nav() {
                if ( 'wp_nav_menu' ) :
                    wp_nav_menu( array(
                        'theme_location'  => '', // Location in the theme to be used--must be registered with register_nav_menu() in order to be selectable by the user
                        'menu'            => '', //  The menu that is desired; accepts (matching in order) id, slug, name
                        'container'       => 'false', // Whether or not to wrap the ul, and what to wrap it with. Allowed tags are 'div' and 'nav.' Use false for no container
                        'container_class' => '', // What will the container from the previous option have as its 'class' name. (if you used a div as the 'container')
                        'container_id'    => '', // What will the container from the previous option have as its 'id' name. (if you used a div as the 'container')
                        'menu_class'      => '', // The navigations containg element surrounding li elements will have this class (i.e. <ul class="menu_class"><li></li></ul>)
                        'menu_id'         => '', // The ID that is applied to the ul element which forms the menu
                        'echo'            => true, // Removes the custom nav menu entirely from view and the HTML markup
                        'fallback_cb'     => 'wpflex_nav_fallback', // wp_nav_menu falback call function. If wp_nav_menu is not used by the author then do the following within the callback
                        'before'          => '', // Output text before the anchor tag of the link. This value can be a string or HTML
                        'after'           => '', // Output text before the anchor tag of the link. This value can be a string or HTML
                        'link_before'     => '', // If HTML is injected in this value then the anchor is strippped away entirely. Only use strings of content ( NO HTML)
                        'link_after'      => '', // If HTML is injected in this value then the anchor is strippped away entirely. Only use strings of content ( NO HTML )
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Whatever to wrap the items with, and how to wrap them
                        'depth'           => 0, // how many levels of the hierarchy are to be included where 0 means all
                        'walker'          => '' // Custom walker object to use (Note: You must pass an actual object to use, not a string)- Feel free to make this clearer
                    ));
                else :
                    wpflex_nav_fallback();
                endif;
            }

            // Navigation Fallback Call using wp_list_pages
            function wpflex_nav_fallback() {
                //wp_list_pages arguments as an array
                $wpflex_nav = array(
                    'depth'       => 0, // All Pages and sub-pages are displayed (no depth restriction)
                    'show_date'   => '', // Display creation or last modified date next to each Page. The default value is the null value (do not display dates).
                    'date_format' => get_option( 'date_format' ), // Controls the format of the Page date set by the show_date parameter (example: "l, F j, Y"). This parameter defaults to the date format configured in your WordPress options
                    'child_of'    => 0, // Displays the sub-pages of a single Page only; uses the ID for a Page as the value Defaults to 0 (displays all Pages).
                    'exclude'     => '', // Define a comma-separated list of Page IDs to be excluded from the list (example: 'exclude' => '3,7,31'). There is no default value
                    'include'     => '', // Only include certain Pages in the list generated by wp_list_pages. Accepts a comma-separated list of Page IDs. There is no default value
                    'title_li'    => '', // Set the text and style of the Page list's heading
                    'echo'        => 1, // Results are echoed (displayed)
                    'authors'     => '', // Only include Pages authored by the authors in this comma-separated list of author IDs
                    'sort_column' => 'menu_order, post_title', // Sorted by Page Order over Page Title.
                    'sort_order'  => 'ASC', // Change the sort order of the list of Pages (either ascending=ASC or descending=DESC). The default is ASC
                    'link_before' => '', // Sets the text or html that precedes the link text inside the anchor tag
                    'link_after'  => '', // Sets the text or html that follows the link text inside the anchor tag
                    'walker'      => '', // Custom walker object to use (Note: You must pass an actual object to use, not a string)- Feel free to make this clearer
                    'post_type'   => 'page', // List custom post types. Default is 'page'.
                    'post_status' => 'publish' // Comma-separated list of all post status types to return. For example: 'publish,private'
                );?>

                <ol>
                    <?php
                        //begin wp_list_pages loop
                        if ( wp_list_pages( $wpflex_nav ) ) : while ( wp_list_pages( $wpflex_nav ) ) :
                            //list items from the array above
                            wp_list_pages( $wpflex_nav );
                        endwhile;
                        endif;
                    ?>
                </ol>
        <?php } // end wp_nav_fallback

            // custom_nav call
            wpflex_custom_nav();
        ?>
    </nav>
</header>

<article><a href="<?php bloginfo( 'rss2_url' ) ?>">RSS Feed</a></article>

<?php //required call for search-form ?>
<?php get_search_form(); ?>