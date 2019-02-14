<?php
	/************************************************************************
	* Index
	*************************************************************************/
	get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container-full">
		<div class="container container_up">
			<div class="row">
				<div class="col-md-9">
				  <?php
					$paged = ilgelo_getpage();
					$custom_args = array(
						'post_type' => 'post',
						'posts_per_page' => get_option('posts_per_page'),
						'paged' => $paged
					);

					echo ilgelo_createtemplate(TEMPLATE_BLOG_CLASSIC_FULL, $custom_args)
				?>
              </div><!--  END col-md-9 -->
				<div class="col-md-3  sticky_sider">
					<?php  if ($ilgelo_options['ilgelo-special-authors']==1) : ?>
						<?php include(TEMPLATEPATH."/template/sidebar/indie-sidebar.php");?>
					<?php endif; ?>

					<div id="widget-area">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-sidebar') ) : ?>
							<div class="widget">
								<h4>Widget Area</h4>
								<p>This section is widgetized. To add widgets here, go to the <a href="<?php echo admin_url(); ?>widgets.php">Widgets</a> panel in your WordPress admin, and add the widgets you would like to <strong>Blog Sidebar</strong>.</p>
								<p><small>*This message will be overwritten after widgets have been added</small></p>
							</div>
						<?php endif; ?>
					</div><!--  END #widget-area -->
				</div><!--  END col-md-3 -->

	    </div><!--  .row -->
    </div><!--  .container -->
</div><!--  .container-full -->


<?php get_footer(); ?>