<?php get_header(); ?>

<div id="container">
    <div role="main">
        <section>
            <header>
                <h1>Search Results</h1>
            </header>

            <ul>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); //start search page DB query loop ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; //end while have_posts ?>

                <?php else : ?>
                    <li><p><?php echo ( 'Sorry, your search term(s) did not find any matches within our database. Please do try again won\'t you pretty please ?' ); ?></p></li>
                <?php endif; //end if have_posts condition ?>
            </ul>

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
                    'prev_text'    => __('<!--[if lte IE 8]><span id="iebtn-prev">&laquo; Previous</span><![endif]--><!--[if gt IE 8]><!--><button>&laquo; Previous</button><!--<![endif]-->'),
                    'next_text'    => __('<!--[if lte IE 8]><span id="iebtn-nxt">Next &raquo;</span><![endif]--><!--[if gt IE 8]><!--><button>Next &raquo;</button><!--<![endif]-->'),
                    'type'         => 'plain',
                    'add_args'     => False,
                    'add_fragment' => '' ) );
                ?>
            </div>
        </section>
    </div>

    <section role="complementary">
        <?php get_sidebar(); ?>
    </section>
</div>
<!--! end /div#container -->

<?php get_footer(); ?>