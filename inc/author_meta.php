<?php
	// Place this snippet within your WordPress Loop to display the
	// post author's bio description and gravatar.
	//
	// http://codex.wordpress.org/Function_Reference/get_avatar
	// http://codex.wordpress.org/Function_Reference/get_the_author_meta
	// http://codex.wordpress.org/Function_Reference/wp_get_current_user
	//
	// @since 1.0.7
	// The the_author_meta call displays the
	// desired meta data for a post author. If this tag is
	// used within a WP loop, the user ID value needs
	// not be specified, and the displayed data is
	// that of the current post author.
	//
	// Use the following line within your post loop to pull in
	// this author meta profile snippet.
	//
	// get_template_part( 'inc/author_meta' );
?>

<div class="profile">
	<!-- Avatar -->
	<div class="profile-avatar">
		<?php echo get_avatar( get_the_author_meta('ID'), 128 ); // 128 is your avatar size. Change as you see fit. I like 180 ?>
	</div>

	<!-- Author Meta -->
	<div class="profile-meta">
		<h3 class="profile-name"><?php the_author(); ?></h3>

		<div class="profile-descr">
			<?php the_author_meta('description'); ?>
		</div>
	</div>
</div>