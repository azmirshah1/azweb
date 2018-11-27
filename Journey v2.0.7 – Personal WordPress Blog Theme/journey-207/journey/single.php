<?php
	global $ilgelo_options;
	$single_blog_layout = "3";

	if (!empty($ilgelo_options['ilgelo-page-blog-layout'])) {
		$single_blog_layout=$ilgelo_options['ilgelo-page-blog-layout'];
	}

	if ($single_blog_layout=="1") {
		include(TEMPLATEPATH."/TEMPLATE-post-full.php");
	} else if ($single_blog_layout=="2") {
		include(TEMPLATEPATH."/TEMPLATE-post-sidebar-left.php");
	} else if ($single_blog_layout=="3") {
		include(TEMPLATEPATH."/TEMPLATE-post-sidebar-right.php");
	}
?>