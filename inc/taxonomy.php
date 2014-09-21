<ul class="entry-taxonomies">
	<?php
	$posttags = get_the_tags();
	if ($posttags) :
	?>
	<li>
		<?php echo ( 'Tagged:' ); ?>
		<ul class="entry-tags-list">
			<li class="entry-tags">
				<?php the_tags( '</li><li>' ); ?>
			</li>
		</ul>
	</li>
	<?php endif ?>

	<?php
	$postcats = get_the_category();
	if ($postcats) :
	?>
	<li>
		<?php echo ( 'Filed under:' ); ?>
		<ul class="entry-categories-list">
			<li class="entry-categories">
				<?php the_category( '</li><li>,' ) ?>
			</li>
		</ul>
	</li>
	<?php endif ?>
</ul>