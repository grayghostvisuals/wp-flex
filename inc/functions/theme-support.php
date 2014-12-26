<?php
  /*-----------------------------------[ Switch default core markup ] */
    
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  // Output valid HTML5 for search form, comment form, and comments/
  add_theme_support( 'html5', array( 
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ));


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


  /*-----------------------------------[ custom background ] */

  // allows users to set a custom background
  add_theme_support( 'custom-background' );


  /*-----------------------------------[ post thumbnails ] */

  // enables post-thumbnail support
  // enables for Posts and "movie" post type but not for Pages
  add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

  // set post thumbnail size
  set_post_thumbnail_size( 700, 450, true );
?>