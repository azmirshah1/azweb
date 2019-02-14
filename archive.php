<?php get_header(); ?>

<div class="container container_up margin-40">


<?php

	global $query_string;
	global $wp_query;
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	$query_args = explode("&", $query_string);
	$search_query = array();
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	}
	$search_query["posts_per_page"] = 5;
	$search_query["paged"] = $paged;
	$search_query["tax_query"] = array(array('taxonomy' => 'post_format',
											 'field' => 'slug',
											 'terms' => array( 'post-format-quote','post-format-link' ),
											 'operator' => 'NOT IN'
											),
							  	 	  );

	$custom_query = new WP_Query($search_query);
?>

<?php if ( $custom_query->have_posts() ) : ?>
	
	<div class="container_fluid xxsmall_padding category_bg  margin-20">
	      <h2 class="textaligncenter title_category">
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
echo "<div class='container_fluid xsmall_padding category_bg  margin-20'>";
echo "						<div class='textaligncenter title_category'>";
echo "							<span>";
									_e( 'Browsing Tag', 'ilgelo' );			
echo "							</span>";
echo "					     </div><!-- End .container_fluid -->";
echo "						<h2 class='textaligncenter title_category'>";
									single_tag_title();
echo "						</h2>";
echo "					</div><!-- End .container_fluid -->";


				elseif ( is_author() ) :

					the_post();
					
echo "<div class='container_fluid xsmall_padding category_bg  margin-20'>";
echo "						<div class='textaligncenter title_category'>";
echo "							<span>";
							_e( 'Author: ', 'ilgelo' );
echo "							</span>";
echo "					     </div><!-- End .container_fluid -->";
echo "						<h2 class='textaligncenter title_category'>";
									the_author();
echo "						</h2>";
					
					rewind_posts();


				elseif ( is_day() ) :
					printf( __( 'day: %s', 'ilgelo' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( '%s', 'ilgelo' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'ilgelo' ), '<span>' . get_the_date( 'Y' ) . '</span>' );


				else :
					_e( 'archive', 'ilgelo' );

				endif;
			?>


	      </h2>
	</div><!-- End .container_fluid -->


	<!-- Start the Loop --> 
	<div class="container-full">
		<div class="container container_up">
			<div class="row">
				<?php
					echo ilgelo_createtemplate(TEMPLATE_BLOG_LIST_FULL,$search_query);
				?>
			</div><!--  .row -->
		</div><!--  .container -->
	</div><!--  .container-full -->
	
     <?php else:  ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.','ilgelo' ); ?></p>
     <?php endif; ?>
	<!-- End the Loop --> 


</div><!-- End .container -->

<?php get_footer(); ?>