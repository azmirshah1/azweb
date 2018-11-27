<?php

require_once(get_template_directory().'/framework/include/function-ilgelo.php' );
require_once(get_template_directory().'/template/ilgelo-templates.php' );

function ilgelo_blog($paged) {
	global $post;
	global $ilgelo_options;
	$odd=true;
	$numpost = 6;
	$cont=0;
	$output="";

	//$paged = (get_query_var('page') ) ? get_query_var('page') : 1;

	$custom_args = array(
	  'post_type' => 'post',
	  'posts_per_page' => $numpost,
	  'paged' => $paged,
	  'post_status' => array('publish')
	);


	$custom_query = new WP_Query($custom_args);
	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			$output.="<div class='cont-total-infinite'>";
			if (get_post_format()=="quote") {
				$output.=ilgelo_blogquote();
			} elseif (get_post_format()=="link") {
				$output.=ilgelo_bloglink();
			} elseif ($odd) {
				$output.=ilgelo_blogcontent();
				$output.=ilgelo_blogimage($paged);
				$odd=!$odd;
			} else {
				$output.=ilgelo_blogimage($paged);
				$output.=ilgelo_blogcontent();
				$odd=!$odd;
			}
			$cont++;
			$output.="</div><!--  .row -->";
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
	return $output;
}


function ilgelo_blogimage($page) {
	global $post;
	global $ilgelo_options;
	$output="";
	$numrnd = rand();
	$images = null;

	if (class_exists('acf')) {
		$images = get_field('gallery_post');
	}

	$output.="<div class='col-md-7 no_padding_infblog fadeInUp wow animated'>";
	$post_id = get_the_ID();

	if ($images) {
		// Slide Image
		$output.= "<div class='slide_post_infinite owl-carousel owl-theme hide_gallery_img' id='slide-".$post_id."'>";
		foreach( $images as $image ) {
			$output.= "<div class='item'>";
			$output.= "	<div class='normal_cont'>";
			$output.= "		<figure class='effect-ig-feat-images'>";
			$output.= "			<img class='lazyOwl img_full_responsive grad_img' src='".$image['sizes']['indie-template-infinite-post']."' alt='".$image['alt']."'/>	";

			$output.= "		</figure>";
			$output.= "	</div>";
			$output.= "</div>";
		}
		$output.= "</div>";
		if ($page>1) {
			$output.="<script type='text/javascript'>";
			$output.="	jQuery(document).ready(function(){\n";
			$output.="		'use strict';";
			$output.="		jQuery('#slide-".$post_id."').owlCarousel({\n";
			$output.="			autoPlay: 3000, //Set AutoPlay to 3 seconds\n";
			$output.="			slideSpeed : 300,\n";
			$output.="			paginationSpeed : 400,\n";
			$output.="			singleItem:true,\n";
			$output.="			lazyLoad : true,\n";
			$output.="			pagination : false,\n";
			$output.="			navigation : false\n";
			$output.="		});\n";
			$output.="	});\n";
			$output.="</script>";
		}
	} else {
		// Featured Image
		$output.= "<div class='normal_cont hide_gallery_img grid'>";

		$output.= "	<figure class='effect-ig-feat-images effect-jazz'>";
		$output.= get_the_post_thumbnail($post_id, 'indie-template-infinite-post', array('class' => 'img_full_responsive hide_gallery_img responsive_img_infinite'));
		$output.= "		<figcaption>";
		$output.= "			<p><i class='ion-ios-book ico_footer_post'></i><br>";
		$output.="			        ".__( 'VIEW POST','ilgelo' )."</p>";
		$output.="				<a href='".get_permalink()."'>".__("View more", "ilgelo")."</a></p>";
		$output.= "		</figcaption>	";

		$output.= "	</figure>";
		$output.= "</div>";




	}
	$output.="</div><!-- col-md-7 -->";

	return $output;
}


function ilgelo_blogcontent() {
	global $post;
	global $ilgelo_options;
	$output="";
	$outputc="";
	$outputt="";

	$title = get_the_title($post->ID);
	$categories = get_the_category($post->ID);
	$separator = "&nbsp;";
	if($categories){
		foreach($categories as $category) {
			if ($outputc!="") {
				$outputc.=$separator;
			}
			$outputc .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'ilgelo'), $category->name ) ) . '">'.$category->cat_name.'</a>';
		}
	}
	$posttags = get_the_tags();
	if ($posttags) {
		foreach($posttags as $tag) {
			if ($outputt!="") {
				$outputt.=" ";
			}
			$outputt.="<a href='".get_tag_link($tag->term_id)."'>";
			$outputt.=$tag->name;
			$outputt.="</a>";
		}
	}
	
	/* IMG + VIDEO + SLIDE IN RESPONSIVE */
	

		// Featured Image
		$output.= "<div class='normal_cont grid solomobile'>";

		$output.= "	<figure class='effect-ig-feat-images effect-jazz'>";
		$output.= get_the_post_thumbnail($post_id, 'indie-template-infinite-post', array('class' => 'img_full_responsive hide_in_desktop responsive_img_infinite'));
		$output.= "		<figcaption>";
		$output.= "			<p><i class='ion-ios-book ico_footer_post'></i><br>";
		$output.="			        ".__( 'VIEW POST','ilgelo' )."</p>";
		$output.="				<a href='".get_permalink()."'>".__("View more", "ilgelo")."</a></p>";
		$output.= "		</figcaption>	";

		$output.= "	</figure>";
		$output.= "</div>";


	/* END*/





	$output.="<div class='col-md-5 gelo_no_margin_l  fadeInUp wow animated'>";
	$output.="	<div class='blog-post-infbox-content ig-min-h'>";

	$output.="		<div class='textaligncenter subtitle_post_standard'>";
	$output.=$outputc;
	$output.="		</div>";
	$output.="		<a href='".get_permalink($post->ID)."'>";
	$output.="			<h3 class='textaligncenter title_post_standard'>";
	$output.= $title;
	$output.="			</h3>";
	$output.="		</a>";


	$output.=ilgelo_format_metapost(0);

	if ( !empty( $post->post_excerpt ) ) :
	$output.=get_the_excerpt();
	else :
	$output.=mvc_content_limit($post->post_content,30);
	endif;



	$output.="<div class='metaabsolute_bot'>";
	$output.="	<div class='aligncenter textaligncenter foot_post_cont_reading'>	";

	$output.="<a href='".get_permalink($post->ID)."'>";
	$output.="	<i class='ion-ios-book ico_footer_post'></i>";
	$output.="	<span class='nav-text'>";
	$output.=			__( "READ ARTICLE", 'ilgelo');
	$output.="	</span>";
	$output.="</a>";
	$output.="	</div>";




	$output.="</div><!-- metaabsolute_bot -->";
	$output.="</div><!--  END .blog-post-content -->";
	$output.="</div>";
	return $output;
}

function ilgelo_blogquote() {
	global $post;
	global $ilgelo_options;
	$output="";

	$title = get_the_title($post->ID);
	$post_id = get_the_ID();
	$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-link-format-infinite' );
	$url_slide = $thumb_slide_post["0"];
	$postClass = get_post_class();

	$output.="<div class='fadeInUp wow animated'>";
	$output.="<!-- Post  -->";
	$output.="	<div class='quote_style_infinite cover_section' id='post-".$post_id."' style='background-image: url(".esc_url($url_slide).");'>";
	$output.="		<div class='cont_logo_quote'>";
	$output.="			<div class='logo_quote'>";
	$output.="				<i class='ion-quote'></i>";
	$output.="			</div>";
	$output.="		</div>";
	$output.="		<!-- Title -->";
	$output.="		<h1 class='textaligncenter title_post_standard' style='color: #fff;'>".$title."</h1>";
	$output.="		<!-- Content -->";
	$output.="		<div class='textaligncenter max-widht-text-quote' style='color: #fff;'>".esc_attr($post->post_content)."</div>";
	$output.="	</div><!--  END .blog-post-content -->";
	$output.="</div><!--  END .fadeInUp wow animated -->";
	return $output;
}

function ilgelo_bloglink() {
	global $post;
	global $ilgelo_options;
	$output="";

	$title = get_the_title($post->ID);
	$post_id = get_the_ID();
	$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-link-format-infinite' );
	$url_slide = $thumb_slide_post["0"];
	$postClass = get_post_class();

	$output.="<div class='fadeInUp wow animated'>";
	$output.="<!-- Post  -->";
	$output.="<a href='".$post->post_content."' target='_blank'>";
	$output.="	<div class='link_style_infinite cover_section' id='post-".$post_id."' style='background-image: url(".esc_url($url_slide).");'>";
	$output.="		<div class='cont_logo_quote'>";
	$output.="			<div class='logo_quote'>";
	$output.="				<i class='ion-forward'></i>";
	$output.="			</div>";
	$output.="		</div>";
	$output.="		<!-- Title -->";
	$output.="		<h2 class='textaligncenter title_post_standard' style='color: #fff;'>".$title."</h2>";
	$output.="	</div><!--  END .blog-post-content -->";
	$output.="</a>";
	$output.="</div><!--  END .fadeInUp wow animated -->";
	return $output;
}

function ilgelo_blogsscroll(){
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
   	echo ilgelo_blog($paged);
    die();
}
add_action("wp_ajax_ilgelo_blogsscroll", "ilgelo_blogsscroll");
add_action("wp_ajax_nopriv_ilgelo_blogsscroll", "ilgelo_blogsscroll");

function ilgelo_get_comments_number_str($id, $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );

    $number = get_comments_number($id);

    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments','ilgelo') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments','ilgelo') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment','ilgelo') : $one;

    return apply_filters('comments_number', $output, $number);
}
