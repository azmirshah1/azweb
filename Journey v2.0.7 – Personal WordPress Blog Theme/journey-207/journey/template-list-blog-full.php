<?php
/*
Template Name: List blog
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
					<?php
						$num_post = get_field('number_of_posts');
						$paged = ilgelo_getpage();
						$custom_args = array(
						  'post_type' => 'post',
						  'posts_per_page' => $num_post,
						  'paged' => $paged,
							'tax_query' => array(
										array(
										'taxonomy' => 'post_format',
										'field' => 'slug',
										'terms' => array( 'post-format-quote','post-format-link' ),
										'operator' => 'NOT IN'
										),
								   )
						);
						echo ilgelo_createtemplate(TEMPLATE_BLOG_LIST_FULL,$custom_args);
					?>
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->
<?php get_footer(); ?>