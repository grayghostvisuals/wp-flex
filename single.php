<?php get_header(); ?>
<section id="content" role="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <header>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part( 'inc/meta' ); ?>
        </header>

        <!-- *optional* remove read more link -->
        <!-- http://codex.wordpress.org/Customizing_the_Read_More -->
        <?php the_content(); ?>

        <!-- Required Theme Functionality -->
        <?php
            wp_link_pages( array(
                'before' => '<div>' . 'Pages &raquo',
                'after'  => '</div>'
            ));
        ?>

        <!-- post footer -->
        <footer>
            <div class="comments-count">
                <a href="<?php comments_link(); ?>" class="comments-count-number"><?php comments_number( '0', '1', '%' ); ?>Comments</a>
            </div>

            <ul class="entry-taxonomies">
                <li>
                    <?php echo ( 'Tagged:' ); ?>
                    <ul class="entry-tags-list">
                        <li class="entry-tags">
                            <?php the_tags( ',</li> <li>' ); ?>
                        </li>
                    </ul>
                </li>

                <li>
                    <?php echo ( 'Filed under:' ); ?>
                    <ul class="entry-categories-list">
                        <li class="entry-categories">
                            <?php the_category( ',</li> <li>' ) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </footer>

    </article>

    <div class="pagination single">
        <ul>
            <li><?php previous_post_link( '%link', '&larr; Previous Category Post', TRUE ); ?></li>
            <li><?php next_post_link( '%link', 'Next Category Post &rarr;', TRUE ); ?></li>
        </ul>
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