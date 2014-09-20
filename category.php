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

			<?php get_template_part( 'entry-footer' ); ?>
		</article>
	<?php endwhile; ?>

	<?php else : ?>
		<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
	<?php endif; ?>

	<p><?php posts_nav_link( '&#8734;', '&laquo; Previous Entries', 'Next Entries &raquo;' ); ?></p>
</main>

<aside id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>