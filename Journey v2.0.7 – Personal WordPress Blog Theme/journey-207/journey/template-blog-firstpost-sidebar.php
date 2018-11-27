<?php
/*
Template Name: Primary Post (Sidebar)
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
				<div class="col-md-9">
					<?php
						$catid = get_query_var('cat');
						$paged = ilgelo_getpage();
						$num_post = get_field('number_of_posts');
						$custom_args = array(
						  "post_type" => "post",
						  "posts_per_page" => $num_post,
						  "paged" => $paged,
						  "cat" => $catid
						);
						echo ilgelo_createtemplate(TEMPLATE_BLOG_PRIMARY_RIGHT_SIDEBAR,$custom_args);
					?>
				</div>

				<div class="col-md-3 sticky_sider">
					<?php  if ($ilgelo_options['ilgelo-special-authors']==1) : ?>
					          <?php include(TEMPLATEPATH."/template/sidebar/indie-sidebar.php");?>
					<?php endif; ?>
					<?php get_sidebar( $name ); ?>
				</div><!--  END col-md-3 -->
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->
<?php get_footer(); ?>