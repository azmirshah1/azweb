<?php

function ilgelo_blogpx($paged) {
	global $post;
	global $ilgelo_options;
	$odd=true;
	$numpost = wp_count_posts("post");
	$cont=0;
	$output="";

    if (isset($_POST['page_id'])) {
    	$page_id = $_POST['page_id'];
		if (class_exists('acf') && get_field("number_of_posts",$page_id)) {
			$numpost = get_field("number_of_posts",$page_id);
		}
    } else if (class_exists('acf') && get_field("number_of_posts")) {
    	$numpost = get_field("number_of_posts",$page_id);
    }

	$custom_args = array(
	  'post_type' => 'post',
	  'posts_per_page' => $numpost,
	  'post_status' => 'publish',
	  'paged' => $paged
	);


	$custom_query = new WP_Query($custom_args);
	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			if (get_post_format()=="quote") {
				$output.=ilgelo_blogpxquote();
			} elseif (get_post_format()=="link") {
				$output.=ilgelo_blogpxlink();
			} else {
				$output.=ilgelo_blogpxstandard();
			}
			$cont++;
		endwhile;

	wp_reset_postdata();

	elseif ($paged==0):
		$output.="<p>".__( 'Sorry, no posts matched your criteria.','ilgelo' )."</p>";
	endif;

	if ($cont<$numpost) {
		$output.="<script type='text/javascript'>";
		$output.="	jQuery(document).ready(function(){";
		$output.="		'use strict';";
		$output.="		jQuery('#blog-loadmore').remove();";
		$output.="	});";
		$output.="</script>";
	}

	$output.="<div class='clear'></div>";

	return $output;
}


function ilgelo_blogpxstandard() {
	global $post;
	global $ilgelo_options;
	$output="";
	$outputc="";
	$outputt="";
     $ctemplate=0;

	$post_id = get_the_ID();
	$title = get_the_title($post->ID);
	$categories = get_the_category($post->ID);
	$postClass = implode(' ',get_post_class('custom-class', $post->ID));
	$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-parallax-blog' );
	$url_slide = $thumb_slide_post["0"];

	$separator = "&nbsp;";
	if($categories){
		foreach($categories as $category) {
			if ($outputc!="") {
				$outputc.=$separator;
			}
			$outputc .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'ilgelo'), $category->name ) ) . '">'.$category->cat_name.'</a>';
		}
	}

	$output.="<div class='parallax-element parallax-window-".$post_id." paral-shadow' data-natural-width='1600' data-natural-height='900' data-parallax='scroll' data-bleed='0' position='center' speed='0.2'  data-image-src='".esc_url($url_slide)."'>";
	$output.="	<div class='fadeInUp wow animated cont_parallax_blog large_padding'>";
	$output.="		<div class='blog-post-content ".$postClass."' id='post-".$post_id."'>";
	$output.="			<div class='border_post_p'>";
	$output.="				<div class='title-content ".$postClass."' id='post-".$post_id."'>";
	$output.="					<div class='textaligncenter subtitle_post_standard'>".$outputc."</div>";
	$output.="					<h2 class='title_post_standard textaligncenter'>";
	$output.="						<a href='".get_permalink($post->ID)."'>".$title."</a>";
	$output.="					</h2>";
	$output.="				</div>";
	$output.=ilgelo_format_metapost($ctemplate);

	$excerpt_length = apply_filters('excerpt_length', 5);

	if ( !empty( $post->post_excerpt ) ) :
	$output.=get_the_excerpt();
	else :
	$output.=mvc_content_limit($post->post_content,16);
	endif;


	$output.="				<div class='aligncenter textaligncenter foot_post_cont_reading margin-15top'>";
	$output.="					<a href='".get_permalink($post->ID)."'>";
	$output.="						<i class='ion-ios-book ico_footer_post'></i>";
	$output.="						<span class='nav-text'>";
	$output.="							".__("READ ARTICLE", "ilgelo");
	$output.="						</span>";
	$output.="					</a>";
	$output.="				</div>";
	$output.="			</div>";
	$output.="		</div>";
	$output.="	</div>";
	$output.="</div>";

	return $output;
}

function ilgelo_blogpxquote() {
	global $post;
	global $ilgelo_options;
	$output="";

	$title = get_the_title($post->ID);
	$post_id = get_the_ID();
	$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-parallax-blog' );
	$url_slide = $thumb_slide_post["0"];
	$postClass = implode(' ',get_post_class('custom-class', $post->ID));

	$output.="<div class='parallax-element parallax-window-".$post_id." paral-shadow' data-natural-width='1600' data-natural-height='900' data-parallax='scroll' data-bleed='0' position='center' speed='0.2'  data-image-src='".esc_url($url_slide)."'>";
	$output.="	<div class='fadeInUp wow animated cont_parallax_blog large_padding'>";
	$output.="		<div class='".$postClass."' id='post-".$post_id."'>";
	$output.="			<a href='".get_the_permalink($post_id)."' target='_blank'>";
	$output.="				<div class='quote_style cover_section medium_padding'>";
	$output.="					<div class='cont_logo_quote'>";
	$output.="						<div class='logo_quote'>";
	$output.="							<i class='ion-android-hangout'></i>";
	$output.="						</div>";
	$output.="					</div>";
	$output.="					<h3 class='textaligncenter title_post_standard' style='color: #fff;'>".$title."</h3>";
	$output.="					<div class='textaligncenter' style='color: #fff;'>".esc_attr($post->post_content)."</div>";
	$output.="				</div>";
	$output.="			</a>";
	$output.="		</div>";
	$output.="	</div>";
	$output.="</div>";
	/*$output.="<script>";
	$output.="	jQuery(document).ready(function(){";
	$output.="		'use strict';";
	$output.="		setTimeout(function(){ jQuery('.parallax-window-".$post_id."').parallax(); }, 500);";
	$output.="		jQuery('.parallax-window-".$post_id."').parallax();";
	$output.="	});";
	$output.="</script>";*/

	return $output;
}

function ilgelo_blogpxlink() {
	global $post;
	global $ilgelo_options;
	$output="";

	$title = get_the_title($post->ID);
	$post_id = get_the_ID();
	$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-parallax-blog' );
	$url_slide = $thumb_slide_post["0"];
	$postClass = implode(' ',get_post_class('custom-class', $post->ID));

	$output.="<div class='parallax-element parallax-window-".$post_id." paral-shadow' data-natural-width='1600' data-natural-height='900' data-parallax='scroll' data-bleed='0' position='center' speed='0.2'  data-image-src='".esc_url($url_slide)."'>";
	$output.="	<div class='fadeInUp wow animated cont_parallax_blog large_padding'>";
	$output.="		<div class='".$postClass."' id='post-".$post_id."'>";
	$output.="			<a href='".get_the_permalink($post_id)."' target='_blank'>";
	$output.="				<div class='quote_style cover_section medium_padding'>";
	$output.="					<div class='cont_logo_quote'>";
	$output.="						<div class='logo_quote'>";
	$output.="							<i class='ion-forward'></i>";
	$output.="						</div>";
	$output.="					</div>";
	$output.="					<h3 class='textaligncenter title_post_standard' style='color: #fff;'>".$title."</h3>";
	$output.="				</div>";
	$output.="			</a>";
	$output.="		</div>";
	$output.="	</div>";
	$output.="</div>";

	return $output;
}



function ilgelo_blogsscrollpx(){
    $paged=1;
    $cate="*";
    $numpost=6;
    $rnd=0;
    if (isset($_POST['page_no'])) {
    	$paged = $_POST['page_no'];
    }
    if (isset($_POST['c'])) {
    	$cate = $_POST['c'];
    }
    if (isset($_POST['np'])) {
    	$numpost = $_POST['np'];
    }
    if (isset($_POST['rnd'])) {
    	$rnd = $_POST['rnd'];
    }
   	echo ilgelo_blogpx($paged);
    die();
}
add_action("wp_ajax_ilgelo_blogsscrollpx", "ilgelo_blogsscrollpx");
add_action("wp_ajax_nopriv_ilgelo_blogsscrollpx", "ilgelo_blogsscrollpx");
