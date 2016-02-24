<?php get_header(); ?>

<main id="content" class="clearfix" role="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <header>
        <h1><?php the_title(); ?></h1>
        <?php get_template_part( 'inc/meta' ); ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <?php
        wp_link_pages( array(
          'before' => '<div>' . __('Pages &raquo', 'wpflex'),
          'after'  => '</div>'
        ));
      ?>

      <?php get_template_part( 'inc/edit-post-link' ); ?>
      <?php get_template_part( 'inc/entry-footer' ); ?>
    </article>

    <?php
      // Don't print empty markup if there's nowhere to navigate.
      $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
      $next     = get_adjacent_post( false, '', false );

      if ( ! $next && ! $previous ) : return;
    ?>
    <?php else : ?>
    <ul class="pagination-posts">
      <?php previous_post_link( '<li>%link</li>',  __( '&larr; Previous Category Post', 'wpflex' ) ); ?></li> 
      <?php next_post_link( '<li>%link</li>',  __( 'Next Category Post &rarr;', 'wpflex' ) ); ?></li> 
    </ul>
    <?php endif; ?>

    <?php
      $pagination_defaults = array(
        'before'           => '<p>' . __( 'Pages:', 'wpflex' ),
        'after'            => '</p>',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'number',
        'separator'        => ' ',
        'nextpagelink'     => __( 'Next page', 'wpflex' ),
        'previouspagelink' => __( 'Previous page', 'wpflex' ),
        'pagelink'         => '%',
        'echo'             => 1
      );
    ?>
    <?php wp_link_pages( $pagination_defaults ); ?>
  <?php endwhile; ?>
  <?php else : ?>
  <?php get_template_part( 'inc/error-msg' ); ?>
  <?php endif; ?>
</main>

<?php
  if ( comments_open() || '0' != get_comments_number() ) :
    comments_template();
  endif;
?>

<?php get_template_part( 'inc/widget-sidebar' ); ?>
<?php get_footer(); ?>
