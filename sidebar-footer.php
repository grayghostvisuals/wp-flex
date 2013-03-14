<?php  if( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'WP-Flex Footer Widget' ) ) : ?>
	<p>these are the default widgets not your custom ones</p>

	<article>
		<h3>Meta</h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://wordpress.org" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
			<?php wp_meta(); ?>
		</ul>
	</article>

	<article>
		<h3>Categories</h3>
		<ul>
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
	</article>

	<article>
	<?php wp_list_bookmarks(); ?>
	</article>

	<article>
		<h3>Tag Cloud</h3>
		<?php wp_tag_cloud(); ?>
	</article>
<?php endif; ?>