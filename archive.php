<?php get_header(); ?>

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

<main id="content" class="clearfix" role="main">
  <h1 class="page-title">
    <?php if ( is_day() ) : ?>
      <?php sprintf( __( 'Daily Archives: <span>%s</span>','wpflex' ),get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?>
      <?php sprintf( __( 'Monthly Archives: <span>%s</span>','wpflex' ),get_the_date( 'F Y' ) ); ?>
    <?php elseif ( is_year() ) : ?>
      <?php sprintf( __( 'Yearly Archives: <span>%s</span>','wpflex' ), get_the_date( 'Y' ) ); ?>
    <?php elseif ( is_tag() ) : ?>
      <?php sprintf( __(single_tag_title( 'Tag Archives : ' ) . ' ' . '<span>%s</span>','wpflex' ),get_the_date( 'F Y' ) ); ?>
    <?php else : ?>
      <?php _e( 'The Archives' , 'wpflex' ); ?>
    <?php endif; ?>
  </h1>

  <?php if( have_posts() ) : while( have_posts() ) : the_post()?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <header>
        <h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark tag" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></h1>
        <?php get_template_part( 'inc/meta' ); ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <?php get_template_part( 'inc/entry-footer' ); ?>
    </article>
  <?php endwhile; ?>
  <?php else : ?>
  <?php get_template_part( 'inc/error-msg' ); ?>
  <?php endif; ?>

  <?php get_template_part( 'inc/pagination-posts' ); ?>
</main>

<?php get_template_part( 'inc/widget-sidebar' ); ?>
<?php get_footer(); ?>
