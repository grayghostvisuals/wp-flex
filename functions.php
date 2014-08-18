<?php
	include_once( get_template_directory() . '/wpflex-options.php' );

	if ( ! function_exists( 'wpflex_setup' ) ) :
		function wpflex_setup() {
			require_once locate_template('/inc/functions/theme-support.php');
			require_once locate_template('/inc/functions/asset-loader.php');
			require_once locate_template('/inc/functions/title.php');
			require_once locate_template('/inc/functions/header.php');
			require_once locate_template('/inc/functions/nav-menu.php');
			require_once locate_template('/inc/functions/comments.php');
			require_once locate_template('/inc/functions/comment-reply.php');
			require_once locate_template('/inc/functions/widgets.php');
			require_once locate_template('/inc/functions/editor-styles.php');
			require_once locate_template('/inc/functions/content-width.php');
		}
	endif;

	add_action( 'after_setup_theme', 'wpflex_setup' );
?>