<?php
    if( ! empty( $_SERVER[ 'SCRIPT_FILENAME' ] ) && 'comments.php' == basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) )
    die('please do not load this page directly kind sir');
?>
<section class="comments">
    <?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php echo( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
    <?php return; ?>
    <?php endif; ?>

    <!-- begin comment count -->
    <?php if ( have_comments() ) : ?>
        <h3 id="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?></h3>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // check if there comments to navigate through ?>
    <div class="comment-pagination">
        <span class="prev-comments-link"><?php previous_comments_link( '<span>&larr; older comments</span>' ); ?></span>
        <span class="nxt-comments-link"><?php next_comments_link( '<span>newer comments &rarr;</span>' ); ?></span>
    </div>

    <?php endif; //end check for comment navigation ?>

    <ol class="commentlist">
        <?php foreach( $comments as $comment ) ?>

        <?php
            //comment array
            //see developer docs http://codex.wordpress.org/Function_Reference/wp_list_comments
            $themename_comment_array = array(
                          'walker'            => null,
                          'max_depth'         => '',
                          'style'             => 'ol',
                          'callback'          => null,
                          'end-callback'      => null,
                          'type'              => 'all',
                          'reply_text'        => 'shout back',
                          'page'              => '',
                          'per_page'          => '',
                          'avatar_size'       => 32,
                          'reverse_top_level' => true,
                          'reverse_children'  => true,
                        );
        ?>

        <?php if ( $comment -> comment_approved == '0' ) : ?>
          <p class="moderating"><em><?php echo('Your rant, suggestion, or comment is awaiting moderation from our head cheese. Please be patient') ?></em></p>
        <?php endif; ?>
        <?php wp_list_comments( $themename_comment_array ); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="comment-pagination">
        <span class="prev-comments-link"><?php previous_comments_link( '<span>&larr; older comments</span>' ); ?></span>
        <span class="nxt-comments-link"><?php next_comments_link( '<span>newer comments &rarr;</span>' ); ?></span>
    </div>
    <?php endif; // check for comment navigation ?>
    <?php else :
        //If there are no comments and comments are closed,
        //let's leave a little note, shall we?
        if ( ! comments_open() ) : ?>
            <p class="nocomments"><?php echo( 'comments are closed. you\'re too late unfortunately mate' ); ?></p>
        <?php endif; //endif !comments_open ?>
    <?php endif; //endif have_comments ?>

    <?php //required for theme submission and functionality of comments ?>
    <?php comment_form(); ?>
</section>
<!-- end /.comments -->