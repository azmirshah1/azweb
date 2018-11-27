<?php get_header(); ?>
	<div class="container-full">
		<div class="container container_up margin-40">
			<div class="section_divider"></div><!-- end section_divider -->
			<div class="row">
				<div class="col-md-12">
					<div class="container_fluid xxsmall_padding category_bg  margin-20">
						<h2 class="textaligncenter title_category"><?php _e('Search Results for: ', 'ilgelo'); ?>"<i><?php echo esc_attr($s); ?> </i>&nbsp;"</h2>
					</div><!-- End .container_fluid -->
					<?php
						//$paged = ilgelo_getpage();
						//$query_args = explode("&", $query_string);
						$search_query = array();

						$paged = ilgelo_getpage();
						$search = (get_query_var('s')) ? get_query_var('s') : '';
						$category = (get_query_var('cat')) ? get_query_var('cat') : '';
						$tag = (get_query_var('tag')) ? get_query_var('tag') : '';

						/*foreach($query_args as $key => $string) {
							$query_split = explode("=", $string);
							if (count($query_split) > 1) {
								$search_query[$query_split[0]] = urldecode($query_split[1]);
							} else {
								$search_query[$query_split[0]] = "";
							}
						}*/
						$search_query["posts_per_page"] = 5;
						$search_query["paged"] = $paged;
						$search_query["cat"] = $category;
						$search_query["tag"] = $tag;
						$search_query["s"] = $search;

						echo ilgelo_createtemplate(TEMPLATE_BLOG_LIST_FULL, $search_query)
					?>
				</div><!--  END col-md-9 -->
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->
<?php get_footer(); ?>
