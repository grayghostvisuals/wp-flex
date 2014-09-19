<ul class="entry-taxonomies">
	<li>
		<?php echo ( 'Tagged:' ); ?>
		<ul class="entry-tags-list">
			<li class="entry-tags">
				<?php the_tags( '</li><li>' ); ?>
			</li>
		</ul>
	</li>

	<li>
		<?php echo ( 'Filed under:' ); ?>
		<ul class="entry-categories-list">
			<li class="entry-categories">
				<?php the_category( '</li><li>,' ) ?>
			</li>
		</ul>
	</li>
</ul>