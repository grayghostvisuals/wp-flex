<?php
  // Place this snippet within your WordPress Loop to display the
  // post author's meta data and gravatar.

  // http://codex.wordpress.org/Function_Reference/get_avatar
  // http://codex.wordpress.org/Function_Reference/get_the_author_meta
  // http://codex.wordpress.org/Function_Reference/wp_get_current_user

  // @since 1.0.7
  // If this tag is used within a WP loop, the user ID value needs
  // not be specified, and the displayed data is that of the current
  // post author.

  // Use the following line within your post loop to pull in
  // this author meta profile module:
  
  // get_template_part( 'inc/author_meta' );
?>

<?php if ( get_the_author_meta('ID') ) : ?>
<div class="profile">
  <div class="profile__avatar">
    <?php echo get_avatar( get_the_author_meta('ID'), 180 ); ?>
  </div>

  <div class="profile__meta">
    <h3 class="profile-name"><?php the_author(); ?></h3>

    <?php if ( get_the_author_meta('description') ) : ?>
    <div class="profile-desc">
      <?php the_author_meta('description'); ?>
    </div>
    <?php endif; ?>

    <?php if ( get_the_author_meta('user_url') ) : ?>
    <span class="profile-url">
      <?php the_author_meta('user_url'); ?>
    </span>
    <?php endif; ?>

  </div>
</div>
<?php endif; ?>