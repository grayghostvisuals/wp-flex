<?php get_header(); ?>

    <section id="content" class="<?php the_title(); ?> clearfix" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <?php the_content(); ?>

            <?php wp_link_pages( array( 'before' => '<div>' . 'Pages &rarr;', 'after' => '</div>' ) ); ?>
        <?php endwhile; //end while have_posts ?>

        <!-- begin comments template !IMPORTANT FOR THEME SUBMISSION -->
        <?php comments_template(); ?>
        <!-- end comments template !IMPORTANT FOR THEME SUBMISSION -->

        <?php else : ?>
            <p><?php echo ( 'sorry, this page does not exist' ); ?></p>
        <?php endif; //end if have_posts ?>
    </section>

    <!-- sidebar -->
    <section id="sidebar" role="complementary">
        <?php get_sidebar(); ?>
    </section>

<?php get_footer(); ?>