<?php get_header(); ?>
<div id="container">

  <div role="main">

    <section>
    
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
          
          <small><span>posted by: <?php the_author(); ?></span> on <time datetime="%3$s" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time></small>
           
          </header>
          
        <section>
          <?php the_content( '<span>read more &raquo;</span>' ); ?>
        </section>
        
        <!-- post footer -->
        <footer>
          <div>
          	<span><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></span>
          </div>
          
          <div>
          	<span>Tagged: <?php the_tags('Tags', ','); ?></span> <span>Posted in: <?php the_category(',') ?></span>
          </div>
        </footer>
      </article>
      <?php endwhile; //end while have_posts loop ?>
      <!-- end post loop -->
      
      <!-- post loop error message -->
	  <?php else : //if no posts were found do this ?>
      	<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
      <?php endif; //end if have_posts condition ?>
      
    </section>
    
    <!-- post pagination -->
    <div>
      <?php 
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
		'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'       => '?paged=%#%',
		'total'        => $wp_query->max_num_pages,
		'current'      => max( 1, get_query_var( 'paged' ) ),
		'show_all'     => False,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_next'    => True,
		'prev_text'    => __('<!--[if lte IE 8]><span>&laquo; Previous</span><![endif]--><!--[if gt IE 8]><!--><button>&laquo; Previous</button><!--<![endif]-->'),
		'next_text'    => __('<!--[if lte IE 8]><span id="iebtn-nxt">Next &raquo;</span><![endif]--><!--[if gt IE 8]><!--><button>Next &raquo;</button><!--<![endif]-->'),
		'type'         => 'plain',
		'add_args'     => False,
		'add_fragment' => '' 
		) );//end array
		?>
    </div>
    <!-- end post pagination -->
    
  </div>

</div>
<!--! end /div#container -->

<?php get_footer(); ?>