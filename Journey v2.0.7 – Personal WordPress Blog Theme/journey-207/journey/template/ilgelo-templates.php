<?php
	require_once(get_template_directory().'/template/ilgelo-format.php');
	require_once(get_template_directory().'/template/ilgelo-format-slide.php');
	require_once(get_template_directory().'/template/ilgelo-format-single.php');

	define("TEMPLATE_BLOG_CLASSIC_FULL",1);
	define("TEMPLATE_BLOG_CLASSIC_LEFT_SIDEBAR",2);
	define("TEMPLATE_BLOG_CLASSIC_RIGHT_SIDEBAR",3);

	define("TEMPLATE_BLOG_GRID_FULL",11);
	define("TEMPLATE_BLOG_GRID_LEFT_SIDEBAR",12);
	define("TEMPLATE_BLOG_GRID_RIGHT_SIDEBAR",13);

	define("TEMPLATE_BLOG_LIST_FULL",21);
	define("TEMPLATE_BLOG_LIST_LEFT_SIDEBAR",22);
	define("TEMPLATE_BLOG_LIST_RIGHT_SIDEBAR",23);

	define("TEMPLATE_BLOG_PRIMARY_FULL",31);
	define("TEMPLATE_BLOG_PRIMARY_LEFT_SIDEBAR",32);
	define("TEMPLATE_BLOG_PRIMARY_RIGHT_SIDEBAR",33);


	function ilgelo_createtemplate($template,$custom_args) {
		global $post;
		$output = "";
		$cont=0;

		$paged = ilgelo_getpage();
		$custom_query = new WP_Query($custom_args);

		if ($custom_query->have_posts()) {

			if (($template>10 && $template<20)){
				$output.="<div class='masonryContainer portfolio-items isotopeWrapper isotope'>";
			}

			while ($custom_query->have_posts()) {
				$custom_query->the_post();

				if (get_post_format()=="quote") {
					$output.=ilgelo_format_quote($template);
				} elseif( get_post_format()=="link") {
					$output.=ilgelo_format_link($template);
				} else {
					$output.=ilgelo_format_content($template,$paged,$cont);
				}

				if ($cont==0) {
					if (($template>30 && $template<40)){
						$output.="<div class='masonryContainer portfolio-items isotopeWrapper isotope'>";
					}
				}

				$cont++;
			}

			if ($template>30 && $template<40){
				if ($cont>0) {
					$output.="</div>";
				}
			} else if ($template>10 && $template<20){
				$output.="</div>";
			}

			//$output.="<div class='clear'></div>";
			$output.=ilgelo_format_pagination($custom_query->max_num_pages,"",$paged);
			wp_reset_postdata();

			$output.= "<div class='clear'></div>";
		} else {
			$output.="<p>".__( 'Sorry, no posts matched your criteria.','ilgelo' )."</p>";
		}
		return $output;
	}
