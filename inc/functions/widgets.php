<?php
  function wpflex_widget() {
    register_sidebar( array(
      'ID'            => 'wpflex-sidebar',
      'name'          => 'wpflex sidebar',
      'before_widget' => '<article id="%1$s" class="widget %2$s">',
      'after_widget'  => '</article>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  }

  add_action( 'widgets_init' , 'wpflex_widget' );
?>