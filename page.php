<?php get_header(); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
<section id="content" class="<?php the_title(); ?>" role="main">
  <header>
    <h1><span><?php the_title(); ?></span></h1>
  </header>
  
  <?php the_content(); ?>
  
  <?php wp_link_pages( array( 'before' => '<div>' . 'Pages &raquo;', 'after' => '</div>' ) ); ?>
</section>
<?php endwhile; //end while have_posts ?>

<!-- begin comments template !IMPORTANT FOR THEME SUBMISSION -->
<?php comments_template(); ?>
<!-- end comments template !IMPORTANT FOR THEME SUBMISSION -->

<?php else : ?>
<p><?php echo ( 'sorry, this page does not exist' ); ?></p>
<?php endif; //end if have_posts ?>

<!-- sidebar -->
<section id="sidebar" role="complementary">
  <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
