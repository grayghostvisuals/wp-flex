<?php
/*
 *
 * template for displaying all single case studies.
 * Template Name: Single Case Study Template
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

    <!-- the content -->
    <?php the_content(); ?>
    
    <!-- pagination  -->
    <?php wp_link_pages( array( 'before' => '<div class="pagination">' . 'Pages &raquo', 'after'  => '</div>' ) ); //end wp_link_pages ?>
       
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
      <?php get_case_type(); ?>
    </footer>
    
  </article>
  
  <div id="single-pagination">
        <span><?php previous_post_link( '%link', '&larr; Previous Category Post'); ?></span>
	<span><?php next_post_link( '%link', 'Next Category Post &rarr;'); ?></span>
  </div>
  
<?php endwhile; ?>
<!-- post loop error message -->

<?php else : //if no posts were found do this ?>
<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
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
