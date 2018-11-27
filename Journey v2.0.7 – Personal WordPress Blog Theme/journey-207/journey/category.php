<?php get_header(); ?>

<?php
	global $ilgelo_options;
	$category_blog_layout = "3";
	if (!empty($ilgelo_options['ilgelo-category-layout'])) {
		$category_blog_layout=$ilgelo_options['ilgelo-category-layout'];
	}
 ?>
	<!-- LAYOUT 1 FULL-->
	<?php if ($category_blog_layout=="1"): ?>
          <?php include(TEMPLATEPATH."/template/category-full.php");?>
	<?php endif; ?>
     <!-- END LAYOUT 1 -->

	<!-- LAYOUT 2 LEFT -->
	<?php if ($category_blog_layout=="2"): ?>
           <?php include(TEMPLATEPATH."/template/category-sider-left.php");?>
     <?php endif; ?>
	<!-- END LAYOUT 2 -->

	<!-- LAYOUT 3 RIGHT-->
	<?php if ($category_blog_layout=="3"): ?>
            <?php include(TEMPLATEPATH."/template/category-sider-right.php");?>
	<?php endif; ?>
	<!-- END LAYOUT 3 -->

	<!-- LAYOUT 4 RIGHT-->
	<?php if ($category_blog_layout=="4"): ?>
            <?php include(TEMPLATEPATH."/template/category-list.php");?>
	<?php endif; ?>
	<!-- END LAYOUT 4 -->

	<!-- LAYOUT 5 RIGHT-->
	<?php if ($category_blog_layout=="5"): ?>
            <?php include(TEMPLATEPATH."/template/category-grid.php");?>
	<?php endif; ?>
	<!-- END LAYOUT 5 -->

<?php get_footer(); ?>