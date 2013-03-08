<?php
	// Place this snippet within your WordPress Loop to display the
	// post Author Bio Descripiton and Gravatar.
	// http://codex.wordpress.org/Function_Reference/get_avatar
	// http://codex.wordpress.org/Function_Reference/get_the_author_meta
	// http://codex.wordpress.org/Function_Reference/wp_get_current_user
	//
	// @since 1.0.5
	// The the_author_meta template tag displays the
	// desired meta data for a user. If this tag is
	// used within a WP loop, the user ID value need
	// not be specified, and the displayed data is
	// that of the current post author.
	echo get_avatar( get_the_author_meta('ID') );
	the_author_meta('description');
?>