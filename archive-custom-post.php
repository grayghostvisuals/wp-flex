<?php
/*
Template Name: Custom Post Archive
*/
?>
<?php get_header(); ?>

<h1><?php single_cat_title(); ?></h1>

<?php
	// Get Term
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	// Query Posts
	query_posts( array(
		'post_type' => 'custom-post',
		'case-type' => $term->slug
	));
?>

<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="wpfcp-entry wpfcp-entry--archived">
		<header>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<?php if ( has_post_thumbnail() ) : // Check if the post has a 'Post Thumbnail' assigned to it. ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'case-study-thumb' ); ?>
				</a>

			<?php else : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img src="#" alt="<?php the_title_attribute(); ?>" />
				</a>
			<?php endif; ?>
		</header>

		<?php the_excerpt(); ?>

	</article>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>