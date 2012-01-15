<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]><html class="no-js ie6 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
  <!-- character encoding -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  
  <!-- google chrome frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  
  <!-- title -->
  <title><?php esc_attr( bloginfo( 'name' ) ); ?>:<?php esc_attr( bloginfo( 'description' ) ); ?>:<?php esc_attr( wp_title() ); ?></title>
  
  <!-- Typekit Asynchronous Snippet -->
  <script>TypekitConfig={kitId:'xxxxxx',scriptTimeout:3000};(function(){var h=document.getElementsByTagName('html')[0];h.className+'wf-loading';var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g,'');h.className+='wf-inactive';},TypekitConfig.scriptTimeout);var tk=document.createElement('script');tk.src='//use.typekit.com/'+TypekitConfig.kitId+'.js';tk.type='text/javascript';tk.async='true';tk.onload=tk.onreadystatechange=function(){var rs=this.readyState;if(rs&&rs!='complete'&&rs!='loaded')return;clearTimeout(t);try{Typekit.load(TypekitConfig);}catch(e){}};var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(tk,s);})();</script>
  <!-- End Typekit Asynchronous Snippet -->
  
  <!-- search engine robots meta instructions -->
  <?php if ( is_search() || is_404() ) : ?>
  <meta name="robots" content="noindex, nofollow" /> 
  <?php else: ?>
  <meta name="robots" content="all" />
  <?php endif; ?>
  
  <!-- seo meta data -->
  <?php if ( is_home() || is_404() || is_search() ) : ?>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>" /><!-- general useage meta tag description -->
  <?php elseif ( is_single() ) : ?>
  <meta name="description" content="" /><!-- should be unique for single page -->
  <?php elseif ( is_archive() ) : ?>
  <meta name="description" content="" /><!-- should be unique for archive pages -->
  <?php else : ?>
  <meta name="description" content="" /><!-- the fallback meta description -->
  <?php endif; ?>
  
  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- http://t.co/dKP3o1e -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  
  <!-- Sets whether a web application runs in full-screen mode -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  
  <!-- open graph meta tags
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <meta property="fb:admins" content="1" />
  end facebook open graph meta tags -->
  
  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=0.0.0" />
  
  <!-- favicon reference -->
  <link rel="shortcut-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
  
  <!-- General Favicon -->
  <link rel="shortcut-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
  
  <!-- 
  Apple Favicons 
  Apple Developers Documentation    	
  http://developer.apple.com/library/ios/#documentation/userexperience/conceptual/mobilehig/IconsImages/IconsImages.html#//apple_ref/doc/uid/TP40006556-CH14-SW1  \
  -->
  
  <!-- iPhone 3G, iPod Touch and Android -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png">
  
  <!-- iPad Favicon -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72-precomposed.png">
  
  <!-- iPhone 4 Retina Favicon -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114-precomposed.png">
  
  <!-- Opera Speed Dial Favicons -->
  <link rel="icon" type="image/png" href="path/to/195x195image.png">
    
  <!-- pingback url -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <!-- RSS Feed -->
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo( 'rss2_url' ); ?>" />
  
  <!-- All JavaScript at the bottom, except this Modernizr. Modernizr enables HTML5 elements & feature detects; 
         for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr.js?v=2.0.6.min"></script>
  
  <!-- EnhanceJS get started at 
       http://code.google.com/p/enhancejs courtesy of The Filament Group -->
  <script src="//static.grayghostvisuals.com/js/libs/enhance.js?v=20120112"></script>
  <script>
      //root directory
      var rootDir = 'path/to/your/directory';
      
      //EnhanceJS
      enhance({
          loadStyles: [
                       { media : '-ejs-desktop', href: rootDir + '/css/enhanced.css?v=0.0.0' },
                       { media : '-ejs-handheld', href: rootDir + '/css/handheld.css?v=0.0.0' }
                       ],
          loadScripts: [
                       { media : '-ejs-desktop', src: rootDir + '/js/screen.js?v=0.0.0' },
                       { media : '-ejs-handheld', src: rootDir + '/js/handheld.js?v=0.0.0' }
                       ]
      });
      //end enhance
  </script>
  
  <script>
  Modernizr.load([]);//end Modernizr.load
  </script>
  
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); //required for all wordpress themes ?>
  
</head>

<!-- start body element -->
<?php if ( is_single() ) : ?>
<body <?php body_class(); ?> id="themename-single">
<?php elseif ( is_home() ) : ?>
<body <?php body_class(); ?> id="themename-index">
<?php else : ?>
<body <?php body_class(); ?> id="themename-<?php the_title(); ?>">
<?php endif; ?>

<div id="mast-contain">
  
  <div id="mast-head" role="banner">
  
    <header id="site-header">
    
      <h1 id="branding"><a href="<?php echo home_url()  ?>"><?php bloginfo( 'name' ) ?></a></h1>
      
      <h2 id="site-descr"><?php echo esc_attr( bloginfo( 'description' ) ); ?></h2>
      
      <nav id="nav-prime" role="navigation">
        <ol id="nav-list">
          <?php 
				//wp_list_pages arguments as an array
				$nav_theme-name = array(
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option('date_format'),
					'child_of'     => 0,
					'exclude'      => '',
					'include'      => '',
					'title_li'     => __(''),
					'echo'         => 1,
					'authors'      => '',
					'sort_column'  => 'menu_order',
					'link_before'  => '',
					'link_after'   => '',
					'walker' => '' ); 
		?>
        
          <?php if( wp_list_pages($nav_theme-name) ) : while ( wp_list_pages( $nav_theme-name ) ) : ?>
          <?php wp_list_pages( $nav_theme-name ); ?>
          <?php endwhile; //end while wp_list_pages ?>
          <?php endif; //end if wp_list_pages ?>
        </ol>
      </nav>
    </header>
    
    <article id="widgetRSS">
      <div id="rssfeed"><a href="<?php bloginfo('rss2_url') ?>">RSS FEED</a></div>
      <!-- end /div#rss -->
    </article>
    
    <?php include TEMPLATEPATH . '/searchform.php' ?>

  </div>
  <!-- end /div#mast-head -->
</div>
<!-- end /div#mast-contain -->
