<?php get_header(); ?>

<div id="container" class="clearfix">

  <div id="main" role="main">

    <section id="content" class="clearfix">

      <!-- begin post loop -->
      <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
      
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      
        <header class="post-head">
      
          <?php if ( has_post_thumbnail() ) : ?>
          
          <figure class="post-thumbnail">
          
            <?php the_post_thumbnail(); ?>
          
          </figure>
          
		  <?php endif; //end if has_post_thumbnail ?>
          
          <h1 class="post-title"> 
          <span> 
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> blog post entry">
            <?php the_title(); ?>
          </a> 
          </span> 
          </h1>
          
          <small class="post-copyright"> <span class="post-author"></span>
          <time class="post-datetime" datetime="%3$s" pubdate>
            <?php the_time( get_option( 'date_format' ) ); ?>
          </time>
          </small> 
          </header>
          
        <section class="post-txt">
          <?php the_content( '<span class="read-more button-styling">read more</span>' ); ?>
        </section>
        <!-- end /div.post-txt -->
        
        <!-- post footer -->
        <footer class="post-footer">
        
          <div class="post-comments"> 
          
          <span class="comments-link"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?>Comments</a></span>
          
          </div>
          <!-- end /div.post-comments -->
          
          <div class="post-meta"> 
          
          <span class="post-tags"><?php the_tags('Tags', ','); ?></span> 
          
          <span class="post-categories">Posted in <?php the_category(',') ?></span> 
          
          </div>
           <!-- end /div.post-meta -->
            
        </footer>
        
      </article>
      <!-- end /article the_post -->
      <?php endwhile; //end while have_posts loop ?>
      
	  <?php else : //if no posts were found do this ?>
      <p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
      <?php endif; //end if have_posts condition ?>
    </section>
    <!-- end /section#content -->
    
    <div id="index-pagination" class="pagination">
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
		'prev_text'    => __('<!--[if lte IE 8]><span id="iebtn-prev">&laquo; Previous</span><![endif]--><!--[if gt IE 8]><!--><button>&laquo; Previous</button><!--<![endif]-->'),
		'next_text'    => __('<!--[if lte IE 8]><span id="iebtn-nxt">Next &raquo;</span><![endif]--><!--[if gt IE 8]><!--><button>Next &raquo;</button><!--<![endif]-->'),
		'type'         => 'plain',
		'add_args'     => False,
		'add_fragment' => '' ) );
		?>
    </div>
    <!-- end /div#index-pagination-->
    
  </div>
  <!-- end /div#main-->

</div>
<!--! end /div#container -->
<!-- google_ad_section_end -->
<?php get_footer(); ?>
