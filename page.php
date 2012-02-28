<?php get_header(); ?>

<div id="container">
  <div role="main">
    
	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <section class="<?php the_title(); ?>">
      <header>
        <h1><span><?php the_title(); ?></span></h1>
      </header>
      <div class="clearfix">
	  <?php the_content(); ?>
      </div>
	  <?php wp_link_pages( array( 'before' => '<div>' . __( 'Pages &raquo;' ), 'after' => '</div>' ) ); ?>
    </section>
	<?php endwhile; //end while have_posts ?>
    
    <!-- begin comments template !IMPORTANT FOR THEME SUBMISSION -->
    <?php comments_template(); ?>
    <!-- end comments template !IMPORTANT FOR THEME SUBMISSION -->
    
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
