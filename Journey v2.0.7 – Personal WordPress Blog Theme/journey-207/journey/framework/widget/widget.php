<?php
	require_once(get_template_directory().'/framework/widget/widget-social.php');
	require_once(get_template_directory().'/framework/widget/widget-twitter.php');
	require_once(get_template_directory().'/framework/widget/widget-posts.php');
	require_once(get_template_directory().'/framework/widget/widget-big-posts.php');
	require_once(get_template_directory().'/framework/widget/widget-banner.php');
	require_once(get_template_directory().'/framework/widget/widget-full-banner.php');



	// Register and load the widget
	function widget_load() {
		register_widget('ilgelo_wSocial');
		register_widget('ilgelo_wTwitter');
		register_widget('ilgelo_banner');
	}


add_action( 'widgets_init', 'widget_load' );

?>