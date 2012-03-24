<?php get_header(); ?>

    <section>
      <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
      
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <header>
          <h1><span><?php the_title(); ?></span></h1>
          <?php get_template_part( 'inc/meta'); ?>
        </header>
          
        <?php the_content(); ?>
           
        <?php
          wp_link_pages( array( 
          	'before' => '<div>' . 'Pages &raquo',
          	'after'  => '</div>' 
          )); 
         ?>
        
        <footer>
          	<a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?> Comments</a>

          	<ul>
              <li class="tags"><?php _e( 'Tagged:' );?>
                  <ul>
                      <li><?php the_tags( ',</li> <li>'); ?></li>
                  </ul>
              </li>
              
              <li class="cats"><?php _e('Filed under:' );?>
                  <ul>
                      <li><?php the_category( ',</li> <li>' ) ?></li>
                  </ul>
              </li>
            </ul>

        </footer>
        
      </article>
      
      <span><?php previous_post_link( '%link', '&laquo;Previous Category Post', TRUE ); ?></span>
      <span><?php next_post_link( '%link', 'Next Category Post&raquo;', TRUE ); ?></span>
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
  
  <section role="complementary">
  <?php get_sidebar(); ?>
  </section>

</div>
<!--! end /div#container -->
<?php get_footer(); ?>