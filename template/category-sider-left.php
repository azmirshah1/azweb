	<div class="container-full">
		<div class="container container_up">
			<div class="row">
					<div class="col-md-3 sticky_sider">
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


				<div class="col-md-9">
					<div class="archive-box container_fluid xsmall_padding category_bg  margin-20">
						<div class="textaligncenter title_category">
							<span><?php echo __("Browsing Category", "ilgelo"); ?></span>
					     </div><!-- End .container_fluid -->
						<h2 class="textaligncenter title_category">
							<?php
								if ( is_category() ) :
									single_cat_title();
								endif;
							?>
						</h2>
						<div class="desc_archive">
							<?php echo category_description(); ?>
						</div>
					</div><!-- End .container_fluid -->
					<?php
						$paged = ilgelo_getpage();
						$custom_args = array(
							'post_type' => 'post',
							'posts_per_page' => get_option('posts_per_page'),
							'paged' => $paged,
							'cat' => get_query_var('cat')
						);

						echo ilgelo_createtemplate(TEMPLATE_BLOG_CLASSIC_FULL, $custom_args)
					?>
				</div><!--  END col-md-9 -->
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->

