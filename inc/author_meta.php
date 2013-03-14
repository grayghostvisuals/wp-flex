<?php
	// Place this snippet within your WordPress Loop to display the
	// post Author Bio Descripiton and Gravatar.
	// http://codex.wordpress.org/Function_Reference/get_avatar
	// http://codex.wordpress.org/Function_Reference/get_the_author_meta
	// http://codex.wordpress.org/Function_Reference/wp_get_current_user
	//
	// @since 1.0.7
	// The the_author_meta template tag displays the
	// desired meta data for a user. If this tag is
	// used within a WP loop, the user ID value need
	// not be specified, and the displayed data is
	// that of the current post author.
	//
	// Use this include within your post loop to pull in
	// this author meta profile snippet.
	//
	// get_template_part( 'inc/profile' );
?>

<div class="wpflex-profile">
	<?php
		// http://codex.wordpress.org/Function_Reference/wp_get_current_user
		// wp_get_current_user();
		$current_user = wp_get_current_user();
	?>

	<?php
		// If you wanna change the gravatar size then pass in another value for the second argument
		//http://codex.wordpress.org/Function_Reference/get_avatar
	?>
	<?php echo get_avatar( get_the_author_meta('ID'), 180 ); ?>

	<div class="wpflex-profile-meta">
		<h3 class="wpflex-profile-name"><?php echo $current_user->user_firstname . " " . $current_user->user_lastname; ?></h3>

		<div class="wpflex-profile-descr">
			<p><?php the_author_meta('description'); ?></p>
			<div>URL : <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></div>
		</div>
	</div>
</div>