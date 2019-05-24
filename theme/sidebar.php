<?php
	if (sizeof($GLOBALS['current_children']) != 0) {

	?>
		<div class="sidebar">
		<ul>
	<?php

	foreach ($GLOBALS['current_children'] as $page) {
		$isCurrent = $page->guid == get_the_guid();
		?>
			<li><a href="<?php echo get_page_link($page->ID); ?>" class="<?php echo $isCurrent ? "active" : ""; ?>"><?php echo $page->post_title; ?></a></li>
		<?php
	}
			
	?>
		</ul>
		</div>
	<?php
	}