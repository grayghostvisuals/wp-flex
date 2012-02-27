<?php get_header(); ?>
<div id="container">

  <div role="main">
  
    <?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() ) the_post();

	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();
	?>
    
    <section>
    
      <h1>
        <?php if ( is_day() ) : ?>
        <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
        
        <?php elseif ( is_month() ) : ?>
        <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date( 'F Y' ) ); ?>
        
        <?php elseif ( is_year() ) : ?>
        <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date( 'Y' ) ); ?>
        
        <?php elseif ( is_tag() ) : ?>
        <?php printf( __( single_tag_title( 'Tag Archives : ' ) . ' ' . '<span>%s</span>' ), get_the_date( 'F Y' ) ); ?>
        
		<?php else : ?>
        <?php echo ( 'The Archives' ); ?>
        <?php endif; //end initial if ?>
      </h1>
      
      <?php if( have_posts() ) : while( have_posts() ) : the_post()?>
      
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      
        <header>
          <h1><span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></span></h1>
          <small><span>Posted by: <?php the_author(); ?></span> on <time datetime="%3$s" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time></small> 
        </header>
         
        <section>  
		  <?php the_content( '<span>read more</span>' ); ?>
        </section>
        
        <footer>
          <div><p><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></p></div>
          <div><p><span>Posted in:<?php the_category( ',' ); ?></span> <span>Tagged: <?php the_tags( 'Post Tags &raquo;' . ' ',',' ); ?></span></p></div>
        </footer>
        
      </article>
      <?php endwhile; //end while have_posts() loop ?>
      
      <?php endif; //end if have_posts() condition ?>
      
      <div><p><?php posts_nav_link( '&#8734;', '&laquo; Go Forward In Time', 'Go Back In Time &raquo;'); ?></p></div>
      
    </section>
    
  </div>
  
  <section role="complementary">
    <?php get_sidebar(); ?>
  </section>
  
</div>
<!--! end /div#container -->

<?php get_footer(); ?>
