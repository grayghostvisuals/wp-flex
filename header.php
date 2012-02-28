<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]><html class="no-js ie6 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" <?php language_attributes(); ?>><![endif]-->
<!-- consider adding a cache manifest simply add this attribute to the html tag
	 manifest="cache.manifest"
-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
  <!-- character encoding utf-8 -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  
  <!-- google chrome frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  
  <!-- title -->
  <title><?php esc_attr( bloginfo( 'name' ) ); ?>:<?php esc_attr( bloginfo( 'description' ) ); ?>, <?php esc_attr( wp_title() ); ?></title>
  
  <!-- Typekit Asynchronous Snippet -->
  <!--<script src="<?php /*uncomment for tk glory => */ /*echo get_template_directory_uri();*/ ?>/js/tk-async.js"></script>-->
  <!-- End Typekit Asynchronous Snippet -->
  
  <!-- search engine robots meta instructions -->
  <?php if ( is_search() || is_404() ) : ?>
  <meta name="robots" content="noindex, nofollow" /> 
  <?php else: ?>
  <meta name="robots" content="all" />
  <?php endif; ?>
  
  <!-- seo meta data -->
  <?php if ( is_home() || is_404() || is_search() ) : ?>
  <meta name="description" content="<?php esc_attr( bloginfo( 'description' ) ); ?>" /><!-- general useage meta tag description -->
  <?php elseif ( is_single() ) : ?>
  <meta name="description" content="" /><!-- should be unique for single page -->
  <?php elseif ( is_archive() ) : ?>
  <meta name="description" content="" /><!-- should be unique for archive pages -->
  <?php else : ?>
  <meta name="description" content="" /><!-- the fallback meta description -->
  <?php endif; ?>
  
  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">
  
  <!-- http://t.co/dKP3o1e -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  
  <!-- Sets whether a web application runs in full-screen mode -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  
  <!-- open graph meta tags -->
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property="og:site_name" content="">
  <meta property="fb:admins" content="">
  
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  
  <!-- css -->
  <link rel="stylesheet" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    
  <!-- pingback url -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <!-- RSS Feed -->
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo( 'rss2_url' ); ?>" />
  
  <!-- All JavaScript at the bottom, except this Modernizr. Modernizr enables HTML5 elements & feature detects; 
         for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr.js"></script>
  
  <?php //required comment functionality ?>
  <?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
  
  <?php wp_head(); //required for all wordpress themes and placed at the end of the head tag element ?>
</head>

<!-- body element tag -->
<?php if ( is_single() ) : ?>
<body <?php body_class(); ?> id="themename-single">
<?php elseif ( is_home() ) : ?>
<body <?php body_class(); ?> id="themename-index">
<?php else : ?>
<body <?php body_class(); ?> id="themename-<?php the_title(); ?>">
<?php endif; ?>
    
    <header role="banner">
      <h1><a href="<?php echo home_url();  ?>"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
      <h2><?php echo esc_attr( bloginfo( 'description' ) ); ?></h2>
      
      <!-- http://codex.wordpress.org/Function_Reference/wp_nav_menu -->
      <nav role="navigation">
        <ol>
          	<?php 
				//wp_list_pages arguments as an array
				$nav_themename = array(
									   'depth'        	=> 2,
									   'show_date'    	=> '',
									   'date_format'  	=> get_option('date_format'),
									   'child_of'     	=> 0,
									   'exclude'      	=> '',
									   'include'      	=> '',
									   'title_li'     	=> __(''),
									   'echo'         	=> 1,
									   'authors'      	=> '',
									   'sort_column'  	=> 'menu_order',
									   'link_before'  	=> '',
									   'link_after'   	=> '',
									   'walker' 		=> '' 
									); 
		  	?>
		           
          <?php 
		  //begin wp_list_pages loop
		  if( wp_list_pages($nav_themename) ) : while ( wp_list_pages( $nav_themename ) ) : 
		  ?>
          <?php wp_list_pages( $nav_themename ); //list items from the array above ?>
      	  <?php endwhile; //end while wp_list_pages ?>
  	 	  <?php endif; //end if wp_list_pages ?>
        </ol>
      </nav>
      <?php //endif; ?>
     
    </header>
    
    <article>
    	<div><a href="<?php bloginfo('rss2_url') ?>">RSS Feed</a></div>
    </article>
    
    <?php //required call for search-form ?>
    <?php get_search_form(); ?>