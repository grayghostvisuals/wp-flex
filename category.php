<?php get_header(); ?>

    <section>
      <h1><?php printf( 'Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
      
	  <?php if( have_posts() ) : while( have_posts() ) : the_post()?>
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      
        <header>
          <h1>
          	<span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></span>
          </h1>
          <?php get_template_part( 'inc/meta'); ?>
         </header>
         
          <?php the_content( 'read more' ); ?>
        
        <footer>
          	<a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?> Comments</a>
          
          	<ul>
              <li class="tags"><?php _e( 'Tagged:' );?>
                  <ul>
                      <li><?php the_tags( ',</li> <li>' ); ?></li>
                  </ul>
              </li>
              
              <li class="cats"><?php _e( 'Filed under:' );?>
                  <ul>
                      <li><?php the_category( ',</li> <li>' ) ?></li>
                  </ul>
              </li>
            </ul>
        </footer>
      
      </article>
      
	  <?php endwhile; //end while have_posts ?>
      
	  <!-- post loop error message -->
	  <?php else : //if no posts were found do this ?>
      	<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
      <?php endif; //end if have_posts condition ?>
      
      <p><?php posts_nav_link( '&#8734;', '&laquo; Go Forward In Time', 'Go Back In Time &raquo;' ); ?></p>
      
    </section>
  
  <!-- sidebar -->
  <section role="complementary">
    <?php get_sidebar(); ?>
  </section>

<?php get_footer(); ?>
