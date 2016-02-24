<?php
/*
*
* template for displaying all single case studies.
* Template Name: Single Case Studies
*
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <header>
        <h1><?php the_title(); ?></h1>
        <?php get_template_part( 'inc/meta' ); ?>
      </header>

      <div id="thumbnail">
        <?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'case-study-thumb' ); ?></a>
        <?php endif; ?>
      </div>

      <!-- *optional* remove read more link -->
      <!-- http://codex.wordpress.org/Customizing_the_Read_More -->
      <!-- Resolves Issue #4: https://github.com/grayghostvisuals/WP-Flex/issues/4 -->
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <!-- pagination  -->
      <?php wp_link_pages( array( 'before' => '<div class="pagination">' . __('Pages &raquo', 'wpflex'), __('after', 'wpflex')  => '</div>' ) ); //end wp_link_pages ?>

      <!-- retrieve and display the custom taxonomies as a list -->
      <?php $caseurl = get_post_meta( $post->ID, 'casestudy_url', true ); ?>
      <?php if( function_exists( 'get_post_meta' ) && ! empty( $caseurl ) ) : ?>

        <!-- custom url meta -->
        <div id="custom-post-meta">
          <h3>Case Study URL</h3>
          <!-- grab the custom meta data to display -->
          <p><a href="<?php echo "$caseurl" ?>"><?php echo "$caseurl" ?></a></p>
        </div>
      <?php endif; ?>
      <!-- end/ custom url meta -->

      <!-- footer -->
      <footer>
        <?php // http://codex.wordpress.org/Function_Reference/get_post_type ?>
        <?php echo __('The post type is: ','wpflex') . get_post_type( $post->ID ); ?>
      </footer>

    </article>

    <div id="single-pagination">
      <span><?php previous_post_link( '%link', __('&larr; Previous Category Post', 'wpflex')); ?></span>
      <span><?php next_post_link( '%link', __('Next Category Post &rarr;', 'wpflex')); ?></span>
    </div>
  <?php endwhile; ?>
  <!-- post loop error message -->

  <?php else : //if no posts were found do this ?>
    <p><?php _e( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again', 'wpflex' ); ?></p>
  <?php endif; //end if have_posts condition ?>
  <!-- end loop -->
</section>

<!-- begin comments template !IMPORTANT FOR THEME SUBMISSION -->
<?php comments_template(); ?>
<!-- end comments template !IMPORTANT FOR THEME SUBMISSION -->

<section id="sidebar" role="complementary">
  <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>