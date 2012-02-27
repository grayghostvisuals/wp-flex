<?php get_header(); ?>

<div id="container">
  <div role="main">
    
	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <section class="<?php the_title(); ?>">
      <header>
        <h1><span><?php the_title(); ?></span></h1>
      </header>
	  <?php the_content(); ?>
	  <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages &raquo;' ), 'after' => '</div>' ) ); ?>
    </section>
	<?php endwhile; //end while have_posts ?>
    
	<?php else : ?>
    <p><?php echo ( 'sorry, this page does not exist' ); ?></p>
	<?php endif; //end if have_posts ?>
  
  </div>
  
  <!-- sidebar -->
  <section role="complementary">
    <?php get_sidebar(); ?>
  </section>

</div>
<!--! end /div#container -->

<?php get_footer(); ?>
