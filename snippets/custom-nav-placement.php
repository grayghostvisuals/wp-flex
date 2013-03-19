<?php
	//Custom Nav Placement
	//
	// Place this snippet anywhere in your theme to
	// display a custom navigation menu of your choosing
?>
<?php
		// Custom Nav Call
		function wpflex_custom_nav() {
				if ( has_nav_menu( '$menu_name' ) ) :
						wp_nav_menu( array( 'container' => '', 'container_class' => '', 'theme_location' => '$location', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				endif;
		}
		wpflex_custom_nav();
?>