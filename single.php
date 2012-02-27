<?php get_header(); ?>

<div id="container">
  <div role="main">
    <section>
      <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <header>
          <h1><span><?php the_title(); ?></span></h1>
          <small>posted by: <span><?php the_author(); ?></span> on <time datetime="%3$s" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time></small>
        </header>
        
        <div>
          <?php the_content(); ?>
          <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages &raquo' ), 'after' => '</div>' ) ); ?>
        </div>
        
        <footer>
          <div>
            <p><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></p>
          </div>
          
          <div>
            <p><span>Posted In &raquo;<?php the_category( ',' ); ?></span> <span>Tagged: <?php the_tags( 'Post Tags &raquo;' . ' ',',' ); ?></span></p>
          </div>
        </footer>
      </article>
      
      <div><span><?php previous_post_link('%link','&laquo;Previous Category Post', TRUE); ?></span> | <span><?php next_post_link('%link','Next Category Post&raquo;', TRUE); ?></span></div>
      <?php endwhile; ?>
    </section>
    
    <!-- begin comments template !IMPORTANT FOR THEME SUBMISSION -->
    <?php comments_template(); ?>
    <!-- end comments template !IMPORTANT FOR THEME SUBMISSION -->
    <?php else : ?>
    <p><?php echo ( 'sorry, no posts matched your criteria' ); ?></p>
    <?php endif; ?>
    
    <!-- end loop -->
  </div>
  
  <section role="complementary"><?php get_sidebar(); ?></section>

</div>
<!--! end /div#container -->
<?php get_footer(); ?>