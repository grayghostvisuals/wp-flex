
  if( ! empty( $_SERVER[ 'SCRIPT_FILENAME' ] ) && 'comments.php' == basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) )
  die('please do not load this page directly kind sir');
?>

<div class="comments">
  <?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' , 'wpflex'); ?></p>
    <?php return; ?>
  <?php endif; ?>

  <div id="comment-count">
    <?php if ( have_comments() ) : ?>
      <h3><a href="<?php the_permalink(); ?>#respond"><?php _e( 'Leave a Comment','wpflex');?></a></h3>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // check if there comments to navigate through ?>
      <div class="pagination comment-pagination">
        <span class="prev-comments-link"><?php previous_comments_link( __( '<span>&larr; older comments</span>','wpflex')); ?></span>
        <span class="nxt-comments-link"><?php next_comments_link( __('<span>newer comments &rarr;</span>','wpflex')); ?></span>
      </div>
    <?php endif; ?>
  </div>

  <ol class="comment-list">
    <?php
      $wpflex_comment_array = array(
                                'walker'            => null,
                                'max_depth'         => '',
                                'style'             => 'ol',
                                'callback'          => 'wpflex_comments',
                                'end-callback'      => null,
                                'type'              => __( 'comment', 'wpflex' ), 
                                'reply_text'        => __( 'reply', 'wpflex' ),
                                'page'              => '',
                                'per_page'          => '',
                                'reverse_top_level' => false,
                                'reverse_children'  => false,
                              );
    ?>

    <?php wp_list_comments( $wpflex_comment_array ); ?>
  </ol>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="pagination comment-pagination">
      <span class="prev-comments-link"><?php previous_comments_link( __( '<span>&larr; older comments</span>','wpflex')); ?></span>
      <span class="nxt-comments-link"><?php next_comments_link( __('<span>newer comments &rarr;</span>','wpflex')); ?></span>
    </div>
  <?php endif; ?>
  <?php else :
    if ( ! comments_open() ) : ?>
    <p class="nocomments"><?php _e( 'Comments are closed' , 'wpflex' ); ?></p>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ( comments_open() ) : ?>
    <?php
      $commentform_args = array( 'comment_notes_after' => '<p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:<pre><code class="language-markup">&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt;</code></pre></p>' );
    ?>
    <?php comment_form($commentform_args); ?>
  <?php endif; ?>
</div>
