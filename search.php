<?php
	global $wp_query;
	$big = 999999999;
?>

<?php get_header(); ?>

<main id="content" class="clearfix" role="main">
	<section>
		<header>
			<h1 class="page-title"><?php printf( __( 'Search Results: %s', '' ), '<span class="page-title__query-term">' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php if (  have_posts() ) : ?>
		<ul class="search-results">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>

		<?php else : ?>
		<p><?php echo ( 'Sorry, your search term(s) did not find any matches within our database. Please do try again won\'t you pretty please ?' ); ?></p>
		<?php endif; ?>

		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="pagination">
			<?php
				echo paginate_links( array(
					'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					'format'       => '?paged=%#%',
					'total'        => $wp_query->max_num_pages,
					'current'      => max( 1, get_query_var( 'paged' ) ),
					'show_all'     => False,
					'end_size'     => 1,
					'mid_size'     => 2,
					'prev_next'    => True,
					'prev_text'    => __('<span id="prev">&laquo; Previous</span>'),
					'next_text'    => __('<span id="nxt">Next &raquo;</span>'),
					'type'         => 'plain',
					'add_args'     => False,
					'add_fragment' => ''
				));
			?>
		</div>
	<?php endif; ?>
	</section>
</main>

<?php get_template_part( 'inc/widget-sidebar' ); ?>
<?php get_footer(); ?>