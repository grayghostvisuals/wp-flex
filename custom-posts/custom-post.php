<?php
/*
 * Template Name: Custom Post
 */
?>

<?php get_header(); ?>

<?php
  // our loop array
  $args = array( 'post_type' => 'custom-post', 'posts_per_page' => 6 );

  // the loop called as an array
  // http://codex.wordpress.org/Class_Reference/WP_Query
  $loop = new WP_Query( $args );

  if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop -> the_post();
?>

  <article class="wpflex-custom-post-item">
    <header>
      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header>

    <div id="thumbnail">
      <?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?>
        <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'wpflex-custom-post-thumb' ); ?></a> -->
      <?php endif; ?>
    </div>

    <!-- the excerpt -->
    <div class="excerpt">
      <?php the_excerpt(); ?>
    </div>
    <!-- end/ div.excerpt -->

  </article>
  <!-- end/ article -->

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>