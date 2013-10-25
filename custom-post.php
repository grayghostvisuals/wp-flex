<?php
/*
 * Template Name: Custom Post
 *
 * @since v1.0
 *
 */
?>

<?php get_header(); ?>

<?php
	// Custom Post Loop
	$args = array(
		'post_type' 	 => 'custom-post',
		'posts_per_page' => 6
	);

	// Loop Query
	// http://codex.wordpress.org/Class_Reference/WP_Query
	$loop = new WP_Query( $args );

	if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop -> the_post();
?>

	<article class="wpfcp-entry" role="article">
		<header>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</header>

		<div class="wpfcp-thumbnail">
			<?php if ( has_post_thumbnail() ) : // Check if the post has a 'Post Thumbnail' assigned to it. ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'wpflex-custom-post-thumb' ); ?>
				</a>
			<?php endif; ?>
		</div>

		<!-- Custom Excerpt -->
		<div class="wpfcp-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</article>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>