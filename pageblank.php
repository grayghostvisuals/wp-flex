<?php
/*
 * Just A Blank Template to do what you wish with :) Cheers!
 * Template Name: PageBlank
 */
?>

<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section id="content" class="<?php the_title(); ?> clearfix" role="main">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div>' . 'Pages &rarr;', 'after' => '</div>' ) ); ?>
        </section>
    <?php endwhile; //end while have_posts ?>

    <?php else : ?>
        <p><?php echo ( 'sorry, this page does not exist' ); ?></p>
    <?php endif; //end if have_posts ?>

<?php get_footer(); ?>