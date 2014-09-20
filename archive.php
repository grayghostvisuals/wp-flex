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
			<?php printf( 'Daily Archives: <span>%s</span>', get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( 'Monthly Archives: <span>%s</span>', get_the_date( 'F Y' ) ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( 'Yearly Archives: <span>%s</span>', get_the_date( 'Y' ) ); ?>
		<?php elseif ( is_tag() ) : ?>
			<?php printf( single_tag_title( 'Tag Archives : ' ) . ' ' . '<span>%s</span>', get_the_date( 'F Y' ) ); ?>
		<?php else : ?>
			<?php echo ( 'The Archives' ); ?>
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

			<footer class="entry-footer">
				<?php get_template_part( 'inc/comment-count' ); ?>
				<?php get_template_part( 'inc/taxonomy' ); ?>
			</footer>
		</article>
	<?php endwhile; ?>
	<?php else : ?>
		<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
	<?php endif; ?>
	
	<?php if ( $GLOBALS['wp_query']->max_num_pages < 2 ) : return ?>
	<?php else : ?>
	<p><?php posts_nav_link( '&#8734;', 'Go Forward In Time &rarr;', '&larr; Go Back In Time' ); ?></p>
	<?php endif; ?>
</main>

<aside id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>