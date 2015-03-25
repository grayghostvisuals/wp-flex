<form action="<?php echo home_url(); ?>" method="get" role="search">
  <label for="s"><?php _e('Search','wpflex');?></label>
  <input type="search" value="<?php esc_attr( the_search_query() ); ?>" name="s" id="s" placeholder="<?php _e('type search term here' , 'wpflex'); ?>">
</form>
