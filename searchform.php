<form action="<?php echo home_url(); ?>" method="get">
  <label for="s">Search</label>
  <input type="search" value="<?php esc_attr( the_search_query() ); ?>" name="s" placeholder="type search term here" />
</form>
