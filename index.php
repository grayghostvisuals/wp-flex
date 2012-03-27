<?php get_header(); ?>
<section id="content" role="main">
  <!-- begin post loop -->
  <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header>
      <?php if ( has_post_thumbnail() ) : ?>
      <figure>
        <?php the_post_thumbnail(); ?>
      </figure>
      <?php endif; //end if has_post_thumbnail ?>
      
      <h1><span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry"><?php the_title(); ?></a></span></h1>
      <!-- meta tags for posts -->
      <?php get_template_part( 'inc/meta' ); ?>
      </header>
      <!-- post content -->
      <?php the_content( 'read more' ); ?>
      <!-- post footer -->
      <footer>
      <div id="comments-count"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></div>
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
            <?php _e( 'Filed under:' );?>
            <ul>
              <li>
                <?php the_category( ',</li> <li>' ) ?>
              </li>
            </ul>
          </li>
        </ul>
      </footer>
      </article>
      <?php endwhile; //end while have_posts loop ?>
      <!-- end post loop -->
      <!-- post loop error message -->
      <?php else : //if no posts were found do this ?>
      <p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
      <?php endif; //end if have_posts condition ?>
	  <?php 
        global $wp_query;
        $big = 999999999;
        echo paginate_links( array(
          'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format'       => '?paged=%#%',
          'total'        => $wp_query -> max_num_pages,
          'current'      => max( 1, get_query_var( 'paged' ) ),
          'show_all'     => False,
          'end_size'     => 1,
          'mid_size'     => 2,
          'prev_next'    => True,
          'prev_text'    => '&laquo; Previous',
          'next_text'    => 'Next &raquo;',
          'type'         => 'plain',
          'add_args'     => False,
          'add_fragment' => '' 
        ));//end array
      ?>
</section>
<?php get_footer(); ?>