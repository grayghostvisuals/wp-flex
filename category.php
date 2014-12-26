<?php get_header(); ?>

<main id="content" class="clearfix" role="main">
  <h1 class="page-title"><?php printf( 'Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post()?>
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