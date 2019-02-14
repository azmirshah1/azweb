<div id="widget-area">
	<?php
		global $post;
		$id = $post->ID;
		$sidebar = get_post_meta($id, 'sidebar', true);		
		
		if($sidebar != '') {
			dynamic_sidebar($sidebar);
		
		} else {
			dynamic_sidebar('Blog sidebar');
		
		}	
	?>	
</div>