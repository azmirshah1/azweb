<?php
/*
Template Name: Blog Full
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
				<div class="col-md-12">
					<?php
						$num_post = get_field('number_of_posts');
						$paged = ilgelo_getpage();
						$custom_args = array(
							"post_type" => "post",
							"posts_per_page" => $num_post,
							"paged" => $paged
						);

						echo ilgelo_createtemplate(TEMPLATE_BLOG_CLASSIC_FULL,$custom_args);
					?>
				</div><!--  END col-md-12 -->
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->


<?php get_footer(); ?>

