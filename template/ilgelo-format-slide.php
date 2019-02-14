<?php

	function ilgelo_post_slide() {
		global $post;
		global $ilgelo_options;
		$output="";

		if(class_exists('acf') && get_field('activate_post_slide')) {
			$slide_post_layout = "2";
			if (!empty($ilgelo_options['ilgelo-slide-post-layout'])) {
				$slide_post_layout=$ilgelo_options['ilgelo-slide-post-layout'];
			}

			if ($slide_post_layout=="1") {
				$imgsize="indie-post-carusel-image-three";
				$cid="ig-slide-post";
				$column=3;

			} else if ($slide_post_layout=="2") {
				$imgsize="indie-post-carusel-image-four";
				$cid="ig-slide-post";
				$column=4;

			} else if ($slide_post_layout=="3") {
				$imgsize="indie-post-carusel-horizontal";
				$cid="ig-slide-post";
				$column=5;


			}





			echo "<div class='" .$ilgelo_options['ilgelo-container-slide-post']."'>";
			echo "	<div id='".$cid."' class='owl-carousel owl-theme'>";

			if (get_field("select_post")) {
				while(has_sub_field("select_post")) {
					$post_object = get_sub_field('choose_your_post');
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$post_per_page = -1; // -1 shows all posts
					$do_not_show_stickies = 0; // 0 to show stickies
					$args=array(
						"page_id" => $post_object->ID,
						"genre" => "mystery",
						"post_type" => "post",
						"paged" => $paged,
						"posts_per_page" => $post_per_page
					);
					//$temp = $wp_query;  // assign orginal query to temp variable for later use
					$wp_query = null;
					$wp_query = new WP_Query($args);
					if (have_posts()) {
						while ($wp_query->have_posts()) {
							$wp_query->the_post();

							$thumb_slide_post = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imgsize);
							$url_slide = $thumb_slide_post["0"];






echo "<div class='promo-item'  alt='".get_the_title()."' style='background-image:url(".$url_slide.")'>";

echo "<span class='section_mask' style='background-color: #000; opacity: 0.2;'></span>";



echo "<a title='".get_the_title()."' href='".get_the_permalink()."' class='promo-link'></a>";

echo "	<div class='promo-overlay'>";
echo "		<h6 class='cat_slide_post'>";
                	the_category(',&nbsp;');
echo "		</h6>";
echo "		<h2 class='title_slide_post'>";
echo "			".get_the_title();
echo "		</h2>";
echo "<p>".__( "READ ARTICLE", 'ilgelo')."</p>";
echo "	</div>";


echo "</div>";





						}
					} else {
					}

					//$wp_query = $temp;
					wp_reset_postdata();
				}
			}

			echo "	</div>";
			echo "</div>";

			echo "<script>\n";
			echo "jQuery(document).ready(function($){\n";
			echo "	'use strict';";
			echo "	jQuery('#".$cid."').owlCarousel({\n";
			echo "		autoPlay: 3000, //Set AutoPlay to 3 seconds\n";
			echo "		itemsCustom : [\n";
			echo "		[0, 1],\n";
			echo "		[450, 2],\n";
			echo "		[600, 2],\n";
			echo "		[700, 2],\n";
			echo "		[1000, 3],\n";
			echo "		[1200, ".$column."]\n";
			echo "		],\n";
			echo "		lazyLoad : true,\n";
			echo "		pagination : false,\n";
			echo "		navigationText:	[".'"'."<i class='fa fa-angle-left'></i>".'"'.",".'"'."<i class='fa fa-angle-right'></i>".'"'."],";
			echo "		navigation : true";
			echo "	});";
			echo "});";
			echo "</script>";

		}
	}




/* ===========================
	RELATED POST
	=========================*/




	function ilgelo_post_related() {
		global $post;
		global $ilgelo_options;
		$output="";
		$cclass="";
		$numpost=0;

		$orig_post = $post;

		$layout_related_post = "2";
		if (!empty($ilgelo_options['ilgelo-related-post-layout'])) {
			$layout_related_post=$ilgelo_options['ilgelo-related-post-layout'];
		}

		if ($layout_related_post=="1") {
			$numpost=9;
		} else if ($layout_related_post=="2") {
			$numpost=3;
		}

		$categories = get_the_category($post->ID);
		if ($categories) {
			$category_ids = array();
			foreach ($categories as $individual_category) {
				$category_ids[] = $individual_category->term_id;
			}
			$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> $numpost, // Number of related posts that will be shown.
					'ignore_sticky_posts' => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( 'post-format-quote','post-format-link' ),
							'operator' => 'NOT IN'
						)
					)
			);

			$my_query = new wp_query($args);

			if($my_query->have_posts()) {
				echo "<div class='content-related-post'>";

				echo "<div class='fancy_one'>";
				echo "	<span>" . __( "RELATED POSTS", 'ilgelo' ) . "</span>";
				echo "</div>";
				echo "<div class='row'>";

				while($my_query->have_posts()) {
					$my_query->the_post();

					if ($layout_related_post=="1") {
						echo "<div class='col-xs-12 col-sm-6 col-md-4 related-post-style1 margin-20'>";
						echo "	<div class='img_related_post'>";
						echo "		<a href='".get_the_permalink()."' title='".get_the_title()."'>";
						echo get_the_post_thumbnail($post->ID, "indie-small-posts", array("class" => "img_full_responsive margin-15"));
						echo "		</a>";
						echo "	</div>";
						echo "	<div class='title_related_post'>";
						echo "		<a href='".get_the_permalink()."' rel='bookmark' title='".get_the_title()."'>";
						echo "			<h5>".get_the_title()."</h5>";
						echo "		</a>";
						echo "	<p class='r-p-date'>".get_the_date()."</p>";
						echo "	</div>";
						echo "</div>";
					} else if ($layout_related_post=="2") {
						echo "<div class='col-md-4 related-post-style2'>";
						echo "	<a href='".get_the_permalink()."' title='".get_the_title()."'>";
						echo get_the_post_thumbnail($post->ID, 'indie-medium-posts', array('class' => 'img_full_responsive margin-15'));
						echo "	</a>";
						echo "	<a href='".get_the_permalink()."' rel='bookmark' title='".get_the_title()."'>";
						echo "		<h5>".get_the_title()."</h5>";
						echo "	</a>";
						echo "	<p class='r-p-date'>".get_the_date()."</p>";
						echo "</div>";
					}
				}

				echo "</div>";
				echo "</div>";
			}

			$post = $orig_post;
			wp_reset_postdata();
		}
	}



/* ===========================
	BIG AUTHOR
	=========================*/

	function ilgelo_post_author() {
		global $ilgelo_options;
		$textauthor="";

		if (!empty($ilgelo_options['ilgelo-text-s-author'])) {
			$textauthor=$ilgelo_options['ilgelo-text-s-author'];
		}

		if(class_exists('acf') && get_field('activate_big_author')) {
			if (function_exists('icl_translate' )){
				$textauthor = icl_translate('User values', 'Author About Text', $textauthor);
			}

			echo "<div class='container-full color_big_author'>";
			echo "	<div class='container medium_padding' style='margin-top: 0px; margin-bottom: 0px;'>";
			echo "		<div class='col-md-10 col-md-offset-1 indie_big_author'>";
			echo "			<div class='col-md-3'>";
			echo "				<img class='img_big_author' src='".esc_attr($ilgelo_options['ilgelo-bg-s-author']['url'])."'>";
			echo "			</div><!--  END col-md-3 -->";
			echo "			<div class='col-md-9 indie_big_aboutme'>";
			echo "			      <div class='title_special_aut'>";
			echo esc_attr($ilgelo_options['ilgelo-name-s-author']);
			echo "			      </div>";
			echo "				<div class='local_special_aut'>";
			echo "	          		<i class='ion-ios-location'></i> ";
									echo esc_attr($ilgelo_options['ilgelo-local-s-author']);
			echo "	            	</div>";
			echo "<p>";
			echo esc_attr($textauthor);
			echo "</p>";
			echo "			<div class='clear'></div>";

			$icons_social_library = "1";
			if (!empty($ilgelo_options['ilgelo-social-library'])) {
				$icons_social_library=$ilgelo_options['ilgelo-social-library'];
			}
			if ($ilgelo_options['ilgelo-social-about-author']==1) {
				echo "<div class='ig-top-social ig-top-social-left margin-15top'>";
				if ($icons_social_library=="1") {
					/* Mono Social Icons  http://drinchev.github.io/monosocialiconsfont/ */
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-facebook'],"<span class='symbol'>roundedfacebook</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-twitter'],"<span class='symbol'>roundedtwitterbird</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-google'],"<span class='symbol'>roundedgoogleplus</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-behance'],"<span class='symbol'>roundedbehance</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-dribbble'],"<span class='symbol'>roundeddribble</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-linkedin'],"<span class='symbol'>roundedlinkedin</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-flickr'],"<span class='symbol'>roundedflickr</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-vimeo'],"<span class='symbol'>roundedvimeo</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-soundcloud'],"<span class='symbol'>roundedsoundcloud</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-deviantart'],"<span class='symbol'>roundeddeviantart</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-instagram'],"<span class='symbol'>roundedinstagram</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-pinterest'],"<span class='symbol'>roundedpinterest</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-youtube'],"<span class='symbol'>roundedyoutube</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tumblr'],"<span class='symbol'>roundedtumblr</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-rss'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-etsy'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-bandcamp'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-500px'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tripadvisor'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-snapchat'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-spotify'],"<span class='symbol'>roundedblip</span>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-email'],"<span class='symbol'>roundedblip</span>");

				} else if ($icons_social_library=="2") {
					/* Fort Awesome Social Icons  http://fortawesome.github.io/Font-Awesome/icon/ */
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-facebook'],"<i class='fa fa-facebook-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-twitter'],"<i class='fa fa-twitter-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-google'],"<i class='fa fa-google-plus-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-behance'],"<i class='fa fa-behance-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-dribbble'],"<i class='fa fa-dribbble'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-linkedin'],"<i class='fa fa-linkedin-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-flickr'],"<i class='fa fa-flickr'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-vimeo'],"<i class='fa fa-vimeo'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-soundcloud'],"<i class='fa fa-soundcloud'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-deviantart'],"<i class='fa fa-deviantart'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-instagram'],"<i class='fa fa-instagram'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-pinterest'],"<i class='fa fa-pinterest-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-youtube'],"<i class='fa fa-youtube-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tumblr'],"<i class='fa fa-tumblr-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-rss'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-etsy'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-bandcamp'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-500px'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tripadvisor'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-snapchat'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-spotify'],"<i class='fa fa-rss-square'></i>");
					echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-email'],"<i class='fa fa-rss-square'></i>");
				}
				echo "</div>";
			}


			echo "			</div><!--  END col-md-9 -->";
			echo "		</div><!--  END off-set -->";
			echo "	</div><!--  .container -->";
			echo "</div><!--  .container-full -->";
		}
	}














