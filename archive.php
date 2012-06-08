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

<section id="content" role="main">
  <h1>
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
    <?php endif; //end initial if ?>
  </h1>
  
  <?php if( have_posts() ) : while( have_posts() ) : the_post()?>
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></h1>
      <?php get_template_part( 'inc/meta' ); ?>
    </header>
    
	<?php the_content( 'read more' ); ?>
    
    <footer>
      <div id="comments-count">
      	<a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a>
      </div>
      
      <ul>
        <li class="tags">
          <?php _e( 'Tagged:' );?>
          <ul>
            <li>
              <?php the_tags( ',</li> <li>' ); ?>
            </li>
          </ul>
        </li>
        
        <li class="cats">
          <?php _e('Filed under:' );?>
          <ul>
            <li>
              <?php the_category( ',</li> <li>' ) ?>
            </li>
          </ul>
        </li>
      </ul>
    </footer>
    
  </article>
  <?php endwhile; //end while have_posts() loop ?>
  
  <!-- post loop error message -->
  <?php else : //if no posts were found do this ?>
  <p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
  <?php endif; //end if have_posts condition ?>
  
  <p><?php posts_nav_link( '&#8734;', '&larr; Go Forward In Time', 'Go Back In Time &rarr;' ); ?></p>
</section>

<!-- sidebar -->
<section id="sidebar" role="complementary">
  <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>