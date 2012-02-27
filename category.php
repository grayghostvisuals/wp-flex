<?php get_header(); ?>

<div id="container">

  <div role="main">
    <section>
      <h1><?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
      
	  <?php if( have_posts() ) : while( have_posts() ) : the_post()?>
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      
        <header>
          <h1><span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></span></h1>
          <small><span>Posted by: <?php the_author(); ?></span> on <time datetime="%3$s" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time></small> 
         </header>
         
         <section class="post-txt">
		  <?php the_content( '<span>read more</span>' ); ?>
        </section>
        
        <footer>
          <div>
            <p><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></p>
          </div>
          
          <div>
            <p><span>Posted In &raquo;<?php the_category( ',' ); ?></span> Tagged: <span><?php the_tags( 'Post Tags &raquo;' . ' ',',' ); ?></span></p>
          </div>
        </footer>
      
      </article>
      
	  <?php endwhile; //end while have_posts ?>
      
	  <?php endif; //end if have_posts ?>
    </section>
    
    <div><p><?php posts_nav_link( '&#8734;', '&laquo; Go Forward In Time', 'Go Back In Time &raquo;'); ?></p></div>
  
  </div>
  
  <!-- sidebar -->
  <section role="complementary">
    <?php get_sidebar(); ?>
  </section>

</div>
<!--! end /div#container -->

<?php get_footer(); ?>
