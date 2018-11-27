<?php
/*
Template Name: Blog Sidebar Left
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
				<div class="col-md-3 resposive_left_sidebar sticky_sider">
					<?php  if ($ilgelo_options['ilgelo-special-authors']==1) : ?>
					          <?php include(TEMPLATEPATH."/template/sidebar/indie-sidebar.php");?>
					<?php endif; ?>
					<?php get_sidebar($name); ?>
				</div><!--  END col-md-3 -->
				<div class="col-md-9">
					<?php
						$num_post = get_field('number_of_posts');
						$paged = ilgelo_getpage();
						$custom_args = array(
							"post_type" => "post",
							"posts_per_page" => $num_post,
							"paged" => $paged
						);

						echo ilgelo_createtemplate(TEMPLATE_BLOG_CLASSIC_LEFT_SIDEBAR,$custom_args);
					?>
				</div><!--  END col-md-9 -->
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->

<?php get_footer(); ?>