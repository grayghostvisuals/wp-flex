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
					'before' => '<div>' . 'Pages &raquo',
					'after'  => '</div>'
				));
			?>

			<footer>
				<?php get_template_part( 'inc/comment-count' ); ?>
				<?php get_template_part( 'inc/taxonomy' ); ?>
			</footer>
		</article>

		<div class="pagination single">
			<ul>
				<li><?php previous_post_link( '%link', '&larr; Previous Category Post', TRUE ); ?></li>
				<li><?php next_post_link( '%link', 'Next Category Post &rarr;', TRUE ); ?></li>
			</ul>
		</div>
	<?php endwhile; ?>

	<?php else : ?>
		<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
	<?php endif; ?>
</main>

<?php comments_template(); ?>

<section id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>