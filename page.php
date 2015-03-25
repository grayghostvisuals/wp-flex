<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <main id="content" class="clearfix" role="main">
    <header>
      <h1><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <?php
      wp_link_pages( array( 
        'before' => '<div>' . __('Pages &rarr;', 'wpflex'),
        'after'  => '</div>'
      ));
    ?>

    <?php get_template_part( 'inc/edit-post-link' ); ?>
  </main>
<?php endwhile; ?>

<?php
  // If comments are open or has at least one comment.
  if ( comments_open() || '0' != get_comments_number() ) :
    comments_template();
  endif;
?>

<?php else : ?>
<p><?php  _e( 'sorry, this page does not exist', 'wpflex' ); ?></p>
<?php endif; ?>

<?php get_template_part( 'inc/widget-sidebar' ); ?>
<?php get_footer(); ?>
