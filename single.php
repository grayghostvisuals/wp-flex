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

			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
				<?php get_template_part( 'inc/comment-count' ); ?>
				<?php get_template_part( 'inc/taxonomy' ); ?>
			</footer>
		</article>

		<?php
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) : return;
		?>
		<?php else : ?>
		<ul class="pagination-posts">
			<?php previous_post_link( '<li>%link</li>', '&larr; Previous Category Post', TRUE ); ?></li>
			<?php next_post_link( '<li>%link</li>', 'Next Category Post &rarr;', TRUE ); ?></li>
		</ul>
		<?php endif; ?>

		<?php
			$pagination_defaults = array(
				'before'           => '<p>' . __( 'Pages:' ),
				'after'            => '</p>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Next page' ),
				'previouspagelink' => __( 'Previous page' ),
				'pagelink'         => '%',
				'echo'             => 1
			);
		?>
		<?php wp_link_pages( $pagination_defaults ); ?>

	<?php endwhile; ?>

	<?php else : ?>
		<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
	<?php endif; ?>
</main>

<?php
	// If comments are open or has at least one comment.
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>

<section id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>