<?php
/*
Template Name: Primary Post
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
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
					echo ilgelo_createtemplate(TEMPLATE_BLOG_PRIMARY_FULL,$custom_args);
				?>
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->
<?php get_footer(); ?>