<?php //http://wordpress.stackexchange.com/questions/24367/globals-array-for-wordpress ?>
<?php if ( $GLOBALS['wp_query']->max_num_pages < 1 ) : return ?>
  <?php else : ?>
  <ul class="pagination-posts">
    <?php if ( get_next_posts_link() ) : ?>
    <li class="nav-prev">
      <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', '' ) ); ?>
    </li>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <li class="nav-nxt">
      <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', '' ) ); ?>
    </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>