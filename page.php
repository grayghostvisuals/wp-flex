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
				'before' => '<div>' . 'Pages &rarr;',
				'after'  => '</div>'
			));
		?>

		<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
	</main>
<?php endwhile; ?>

<?php
	// If comments are open or has at least one comment.
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>

<?php else : ?>
	<p><?php echo ( 'sorry, this page does not exist' ); ?></p>
<?php endif; ?>

<aside id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>