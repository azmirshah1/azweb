<?php

	//ilgelo_format_content_classic


	function ilgelo_format_content($template,$paged,$cont) {
		global $post;
		global $ilgelo_options;

		$output="";

		if ($template>0 && $template<10){
			$output.=ilgelo_format_content_classic($template,$paged,$cont);
		} else if ($template>10 && $template<20){
			$output.=ilgelo_format_content_grid($template,$paged,$cont);
		} else if ($template>20 && $template<30){
			$output.=ilgelo_format_content_list($template,$paged,$cont);
		} else if ($template>30 && $template<40){
			if ($cont==0) {
				$output.=ilgelo_format_content_classic($template,$paged,$cont);
			} else {
				$output.=ilgelo_format_content_grid($template,$paged,$cont);
			}
		}

		return $output;
	}

	function ilgelo_format_quote($template) {
		global $post;
		global $ilgelo_options;
		$output="";

		$title = get_the_title($post->ID);
		$post_id = get_the_ID();
		$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-link-format-infinite' );
		$url_slide = $thumb_slide_post["0"];
		$postClass = get_post_class();

		$cclass2="quote_style";

		if (($template>30 && $template<40) || ($template>10 && $template<20)){
			$cclass="";
			$cclass2="";
			if ($template==TEMPLATE_BLOG_PRIMARY_FULL || $template==TEMPLATE_BLOG_GRID_FULL) {
				$cclass="col-full-3";
			} else {
				$cclass="col-full-2";
			}
			$output.="<div class='single_box ".$cclass." isotopeItem_masonry masonry_pad'>";
		}

		$output.="<div class='fadeInUp wow animated'>";
		$output.="	<div class='".$cclass2." cover_section padding_link_quote' style='background-image: url(".esc_url($url_slide).");'>";
		$output.="		<div class='cont_logo_quote'>";
		$output.="			<div class='logo_quote'>";
		$output.="				<i class='ion-quote'></i>";
		$output.="			</div>";
		$output.="		</div>";
		$output.="		<!-- Title -->";
		$output.="		<h2 class='textaligncenter title_post_standard' style='color: #fff;'>".$title."</h2>";
		$output.="		<!-- Content -->";
		$output.="		<div class='textaligncenter' style='color: #fff;'>".esc_attr($post->post_content)."</div>";
		$output.="	</div><!--  END .blog-post-content -->";
		$output.="</div><!--  END .fadeInUp wow animated -->";


		if (($template>30 && $template<40) || ($template>10 && $template<20)){
			$output.="</div>";
		}

		return $output;
	}

	function ilgelo_format_link($template) {
		global $post;
		global $ilgelo_options;
		$output="";

		$title = get_the_title($post->ID);
		$post_id = get_the_ID();
		$thumb_slide_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indie-link-format-infinite' );
		$url_slide = $thumb_slide_post["0"];
		$postClass = get_post_class();

		$cclass2="link_style";

		if (($template>30 && $template<40) || ($template>10 && $template<20)){
			$cclass="";
			$cclass2="";
			if ($template==TEMPLATE_BLOG_PRIMARY_FULL || $template==TEMPLATE_BLOG_GRID_FULL) {
				$cclass="col-full-3";
			} else {
				$cclass="col-full-2";
			}
			$output.="<div class='single_box ".$cclass." isotopeItem_masonry masonry_pad'>";
		}

		$output.="<div class='fadeInUp wow animated'>";
		$output.="<a href='".get_the_permalink($post_id)."' target='_blank'>";
		$output.="	<div class='".$cclass2." cover_section medium_padding' style='background-image: url(".esc_url($url_slide).");'>";
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

		if (($template>30 && $template<40) || ($template>10 && $template<20)){
			$output.="</div>";
		}

		return $output;
	}


	function ilgelo_format_metapost($template) {
		global $post;

		$output="";

		$output.="<div class='fancy_one ig_meta_post_classic textaligncenter'>";
		$output.="	<span>";

		$output.="<div class='indie_author'>";
		$output.=__("By", "ilgelo")." <b> <div class='vcard author'>".get_the_author_posts_link()."</div> </b> ";
		$output.="</div>";
		$output.="<div class='indie_on'>";
		$output.="".__("on", "ilgelo")." ";
		$output.="</div>";
		$output.="<div class='updated indie_date'>";
		$output.="	<b> ".get_the_date()."</b> ";
		$output.="	</div>";


		$output.="	</span>";
		$output.="</div>";

		return $output;
	}




	function ilgelo_footer_post($template) {
		global $post;
		global $ilgelo_options;

		$output="";

		$output.="<div class='post_divider_classic'></div>";

		$output.="<div class='footer_classic_post'>";
		$output.="	<div class='row'>";

		$output.="          <div class='col-md-3 textalign_foot_reading foot_post_cont_reading'>";
		$output.="			<a href=".get_permalink()."><i class='ion-ios-book ico_footer_post'></i>";
		$output.="			<span class='nav-text'>";
		$output.=				 __( "READ ARTICLE", 'ilgelo');
		$output.="			</span>";
		$output.="			</a>";
		$output.="		</div><!--  col-md-3  -->";

		$output.="          <div class='col-md-6'>";
		$output.="              <div class='textaligncenter'>";

		 						if($ilgelo_options['ilgelo-ico-share']==1):
		$output.=					ilgelo_format_postsocialshare($template);
								endif;

		$output.="			</div><!-- End .textaligncenter-->";
		$output.="		</div><!--  col-md-6  -->";

		$output.="          <div class='col-md-3 textalign_foot_comment foot_post_comment'>";

		 if( comments_open( $post->ID ) ) {
		$output.="			<span><i class='ion-chatbubble ico_footer_post'></i>";
		$output.=				get_comments_popup_link(__("Post a Comment", "ilgelo"),__("1 Comment","ilgelo"),__("% Comments","ilgelo"));
		$output.="			</span> ";
		}

		$output.="		</div><!--  col-md-3  -->";

		$output.="	</div><!--  row  -->";
		$output.="</div><!-- End .footer_classic_post -->";


		return $output;
	}


	function ilgelo_footer_post_list_sidebar($template) {
		global $post;
		global $ilgelo_options;

		$output="";

		$output.="<div class='footer_classic_post'>";

		$output.="          <div class='textalignleft foot_post_cont_reading'>";
		$output.="			<a href=".get_permalink()."><i class='ion-ios-book ico_footer_post'></i>";
		$output.="			<span class='nav-text'>";
		$output.=				 __( "READ ARTICLE", 'ilgelo');
		$output.="			</span>";
		$output.="			</a>";
		$output.="		</div><!--  foot_post_cont_reading  -->";

		$output.="</div><!-- End .footer_classic_post -->";

		return $output;
	}



	function ilgelo_format_postsocialshare($template) {
		global $post;
		global $ilgelo_options;

		$twitter_href="http://twitter.com/share?url=".get_permalink();
		$twitter_href.="&text=".get_the_title();

		$icon_mail="";
		$icon_google="";
		$icon_twitter="";
		$icon_pinterest="";
		$icon_fb="";

		$icons_social_library = "1";
		if (!empty($ilgelo_options['ilgelo-social-library'])) {
			$icons_social_library=$ilgelo_options['ilgelo-social-library'];
		}
		if ($icons_social_library=="1") {
			$icon_mail="<span class='symbol'>roundedemail</span>";
			$icon_google="<span class='symbol'>roundedgoogleplus</span>";
			$icon_twitter="<span class='symbol'>roundedtwitterbird</span>";
			$icon_pinterest="<span class='symbol'>roundedpinterest</span>";
			$icon_fb="<span class='symbol'>roundedfacebook</span>";
			$icon_linkedin="<span class='symbol'>roundedlinkedin</span>";
		} else if ($icons_social_library=="2") {
			$icon_mail="<i class='fa fa-envelope'></i>";
			$icon_google="<i class='fa fa-google-plus'></i>";
			$icon_twitter="<i class='fa fa-twitter'></i>";
			$icon_pinterest="<i class='fa fa-pinterest'></i>";
			$icon_fb="<i class='fa fa-facebook'></i>";
			$icon_linkedin="<i class='fa fa-linkedin'></i>";

		}

		$output="";
		$output.="<div class='share_post'>"; /* ig_social_prod */
		$output.="	<a href='http://www.facebook.com/sharer.php?u=".get_permalink()."' target='_blank'>".$icon_fb."</a>";
		$output.="	<a title='".get_the_title()."' target='_blank'  href='".$twitter_href."'>".$icon_twitter."</a>";
		$output.="	<a target='_blank' href='https://plus.google.com/share?url= ".get_permalink()."'>";
		$output.="	".$icon_google."</a>";



		$pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));

		$output.="<a data-pin-do='skipLink' data-pin-custom='true' target='_blank' href='https://pinterest.com/pin/create/button/?url=".get_the_permalink()."&media=".$pin_image."&description=".get_the_title()."'>";
		$output.="	".$icon_pinterest."</a>";

		//$output.="	<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>";
		//$output.="	".$icon_pinterest."</a>";

		$output.="	<a href='mailto:?subject=I wanted to share this post with you from ".get_bloginfo('name')." &amp;body=".get_the_title()." &#32;&#32; ".get_permalink()."' title='Email to a friend/colleague'>".$icon_mail."</a>";

		$output.="	<a target='_blank'  href='http://www.linkedin.com/shareArticle?mini=true&url=".get_permalink()."&title=".get_the_title()."&summary=&source=".get_bloginfo('name')."'>".$icon_linkedin."</a>";


		$output.="</div>";

		return $output;
	}

	function ilgelo_format_metagridlist($template) {
		global $post;
		global $ilgelo_options;

		$twitter_href="http://twitter.com/share?url=".get_permalink();
		$twitter_href.="&text=".get_the_title();

		$icon_mail="";
		$icon_google="";
		$icon_twitter="";
		$icon_pinterest="";
		$icon_fb="";

		$icons_social_library = "1";
		if (!empty($ilgelo_options['ilgelo-social-library'])) {
			$icons_social_library=$ilgelo_options['ilgelo-social-library'];
		}
		if ($icons_social_library=="1") {
			$icon_mail="<span class='symbol'>roundedemail</span>";
			$icon_google="<span class='symbol'>roundedgoogleplus</span>";
			$icon_twitter="<span class='symbol'>roundedtwitterbird</span>";
			$icon_pinterest="<span class='symbol'>roundedpinterest</span>";
			$icon_fb="<span class='symbol'>roundedfacebook</span>";
			$icon_linkedin="<span class='symbol'>roundedlinkedin</span>";
		} else if ($icons_social_library=="2") {
			$icon_mail="<i class='fa fa-envelope'></i>";
			$icon_google="<i class='fa fa-google-plus-square'></i>";
			$icon_twitter="<i class='fa fa-twitter-square'></i>";
			$icon_pinterest="<i class='fa fa-pinterest-square'></i>";
			$icon_fb="<i class='fa fa-facebook-square'></i>";
			$icon_linkedin="<i class='fa fa-linkedin-square'></i>";
		}

		$output="";
		$output.="<div class='ig_social_prod'>";
		$output.="	<a class='oo'  class='fade2' href='http://www.facebook.com/sharer.php?u=".get_permalink()."' target='_blank'>".$icon_fb."</a>";
		$output.="	<a title='".get_the_title()."' href='".$twitter_href."'>".$icon_twitter."</a>";
		$output.="	<a href='https://plus.google.com/share?url= ".get_permalink()."'>";
		$output.="	".$icon_google."</a>";
		$output.="	<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>";
		$output.="	".$icon_pinterest."</a>";
		$output.="	<a href='mailto:?subject=I wanted to share this post with you from ".get_bloginfo('name')."".get_the_title()."".get_permalink()."' title='Email to a friend/colleague'>".$icon_mail."</a>";

		$output.="	<a href='http://www.linkedin.com/shareArticle?mini=true&url=".get_permalink()."&title=".get_the_title()."&summary=&source=".get_bloginfo('name')."'>".$icon_linkedin."</a>";

		$output.="</div>";




		return $output;
	}


	function ilgelo_format_content_classic($template,$paged,$cont) {
		global $post;
		global $ilgelo_options;

		$output="";
		$outputc="";
		$ctemplate=0;

		if ($template>30 && $template<40) {
			$ctemplate=TEMPLATE_BLOG_CLASSIC_FULL;
		} else {
			$ctemplate=$template;
		}


		$post_id = get_the_ID();
		$postClass = implode(' ',get_post_class('custom-class', $post_id));
		$title = get_the_title($post_id);
		$categories = get_the_category($post_id);
		$separator = "&nbsp;";
		$images = null;

		if($categories){
			foreach($categories as $category) {
				if ($outputc!="") {
					$outputc.=$separator;
				}
				$outputc.='<a href="'.get_category_link($category->term_id ).'" title="'.esc_attr(sprintf( __( "View all posts in %s", 'ilgelo'), $category->name ) ) . '">'.$category->cat_name.'</a>';
			}
		}
		if (class_exists('acf')) {
			$images = get_field('gallery_post');
			$bg_twitter_status = get_field('bg_twitter_status_post');
		}


		if (class_exists('acf') && get_field('iframe_video_music')) {
			$output.=get_field('iframe_video_music');
		} else if (class_exists('acf') && get_field('twitter_status_post')) {
			$output.=" 	<div class='twitter_status_wrapper'>";
			$output.="     <section class='main_section cover_section  small_padding'style='background-image: url('.esc_url($bg_twitter_status).'); background-repeat: no-repeat;'>";
			$output.= get_field('twitter_status_post');
			$output.="     </section>";
			$output.="	</div>";
		} else if ($images) {
			$output.="	<div class='slide_post owl-carousel owl-theme'>";
			foreach($images as $image ) {
				$output.="	<div class='item'>";
				$output.="		<div class='normal_cont'>";
				$output.="				<img class='lazyOwl img_full_responsive grad_img' src='".$image['sizes']['indie-image-slide']."' alt='".$image['alt']."'/>";
				$output.="		</div>";
				$output.="	</div>";
			}
			$output.="</div>";
		} else {




			$output.="	<div class='grid fadeInUp wow animated'>";
			$output.="		<figure class='effect-jazz'>";
			$output.= get_the_post_thumbnail($post_id, 'indie-image-slide', array('class' => 'img_full_responsive'));


			$output.="			<figcaption>";
			$output.="				<p><i class='ion-ios-book ico_footer_post'></i><br>";
			$output.=					__( "VIEW POST", 'ilgelo');
			$output.="				</p>";


			$output.="				<a href='".get_permalink()."'>".__("View more", "ilgelo")."</a>";
			$output.="			</figcaption>";
			$output.="		</figure>";

			$output.="	</div>";

/* Remove the icon animation

			$output.="	<div class='grid fadeInUp wow animated'>";
			$output.="		<figure class='effect-jazz'>";

			$output.="<a href='".get_permalink()."'>";
			$output.= get_the_post_thumbnail($post_id, 'indie-image-slide', array('class' => 'img_full_responsive'));
			$output.="	</a>";

			$output.="		</figure>";
			$output.="	</div>";

*/




		}


		$output.="	<div class='blog-post-content ".$postClass."'>";

	     $output.="<div class='fadeInUp wow animated'>";
		$output.="	<div class='title-content ".$postClass."'>";

		$output.="		<div class='textaligncenter subtitle_post_standard'>".$outputc."</div>";
		$output.="		<h2 class='title_post_standard textaligncenter'>";
		$output.="			<a href='".get_permalink()."'>".$title."</a>";
		$output.="		</h2>";

		$output.=ilgelo_format_metapost($ctemplate);

		$output.="	</div>";

		if ( !empty( $post->post_excerpt ) ) :
		$output.=get_the_excerpt();
		else :
		$output.=mvc_content_limit($post->post_content,50);
		endif;


	//	$output.=get_the_content();



		$output.=ilgelo_footer_post($template);


		$output.="	</div><!--  END .fadeInUp wow animated -->";
		$output.="</div><!--  END .blog-post-content -->";


		return $output;
	}


	function ilgelo_format_content_grid($template,$paged,$cont) {
		global $post;
		global $ilgelo_options;

		$output="";
		$outputc="";

		$post_id = get_the_ID();
		$postClass = implode(' ',get_post_class('custom-class', $post_id));
		$title = get_the_title($post_id);
		$categories = get_the_category($post_id);
		$separator = "&nbsp;";
		$images = null;

		if($categories){
			foreach($categories as $category) {
				if ($outputc!="") {
					$outputc.=$separator;
				}
				$outputc.='<a href="'.get_category_link($category->term_id ).'" title="'.esc_attr(sprintf( __( "View all posts in %s", 'ilgelo'), $category->name ) ) . '">'.$category->cat_name.'</a>';
			}
		}
		if (class_exists('acf')) {
			$images = get_field('gallery_post');
			$bg_twitter_status = get_field('bg_twitter_status_post');
		}



/* ===================================================
Template Grid Full - Grid sidebar - Blog Primary Grid
======================================================*/



		if ($template==TEMPLATE_BLOG_GRID_RIGHT_SIDEBAR || $template==TEMPLATE_BLOG_PRIMARY_RIGHT_SIDEBAR) {
			$output.="<div class='single_box col-full-2 isotopeItem_masonry masonry_pad'>";
		} else {
			$output.="<div class='single_box col-full-3 isotopeItem_masonry masonry_pad'>";
		}

		if (class_exists('acf') && get_field('iframe_video_music')) {
			$output.=get_field('iframe_video_music');
		} else if ($images) {

			$output.="<div class='slide_post owl-carousel owl-theme fadeInUp'>";
			foreach($images as $image ) {
				$output.="	<div class='item'>";
				$output.="		<div class='normal_cont'>";
				$output.="				<img class='lazyOwl img_full_responsive grad_img' src='".$image['sizes']['indie-image-slide']."' alt='".$image['alt']."'/>";
				$output.="		</div>";
				$output.="	</div>";
				}
			$output.="</div>";

		} else {


			$output.="	<div class='grid fadeInUp'>";
			$output.="		<figure class='effect-jazz'>";
			$output.= get_the_post_thumbnail($post_id, 'indie-image-slide', array('class' => 'img_full_responsive'));
			$output.="			<figcaption class='layout_grig'>";
			$output.="				<p><i class='ion-ios-book ico_footer_post'></i><br>";
			$output.=						__( "VIEW POST", 'ilgelo');
			$output.="				</p>";
			$output.="				<a href='".get_permalink()."'>".__("View more", "ilgelo")."</a>";
			$output.="			</figcaption>";
			$output.="		</figure>";
			$output.="	</div>";


/*
			$output.="	<div class='grid fadeInUp wow animated'>";

			$output.="<a href='".get_permalink()."'>";
			$output.= get_the_post_thumbnail($post_id, 'indie-image-slide', array('class' => 'img_full_responsive'));
			$output.="	</a>";

			$output.="	</div>";

*/




		}

		$output.="	<div class='blog-post-content-grid fadeInUp'>";
		$output.="		<div class='textaligncenter subtitle_post_standard'>".$outputc."</div>";

		$output.="		<h3 class='textaligncenter title_post_standard'><a href='".get_permalink()."'>".$title."</a></h3>";

		$output.=ilgelo_format_metapost($template);

		if ( !empty( $post->post_excerpt ) ) :
		$output.=get_the_excerpt();
		else :
		$output.=mvc_content_limit($post->post_content,25);
		endif;

		$output.="          <div class='aligncenter textaligncenter foot_post_cont_reading'>";
		$output.="			<a href=".get_permalink()."><i class='ion-ios-book ico_footer_post'></i>";
		$output.="			<span class='nav-text'>";
		$output.=				 __( "READ ARTICLE", 'ilgelo');
		$output.="			</span>";
		$output.="			</a>";
		$output.="		</div><!--  col-md-3  -->";




		$output.="	</div>";
		$output.="</div>";

		return $output;
	}

	function ilgelo_format_content_list($template,$paged,$cont) {
		global $post;
		global $ilgelo_options;

		$output="";
		$outputc="";

		$post_id = get_the_ID();
		$postClass = implode(' ',get_post_class('custom-class', $post_id));
		$title = get_the_title($post_id);
		$categories = get_the_category($post_id);
		$separator = "&nbsp;";
		$images = null;

		if($categories){
			foreach($categories as $category) {
				if ($outputc!="") {
					$outputc.=$separator;
				}
				$outputc.='<a href="'.get_category_link($category->term_id ).'" title="'.esc_attr(sprintf( __( "View all posts in %s", 'ilgelo'), $category->name ) ) . '">'.$category->cat_name.'</a>';
			}
		}
		if (class_exists('acf')) {
			$images = get_field('gallery_post');
			$bg_twitter_status = get_field('bg_twitter_status_post');
		}

		if ($template==TEMPLATE_BLOG_LIST_RIGHT_SIDEBAR) {
			$cclass="blog-post-content-list-sider";
			$margin="27%";
			$limit=15;
			$imgsize="indie-image-list-blog";
			$footer_post=ilgelo_footer_post_list_sidebar($template);
		} else {
			$cclass="blog-post-content-list";
			$margin="24%";
			$limit=30;
			$imgsize="indie-image-list-blog";
			$footer_post=ilgelo_footer_post($template);
		}

		$output.="<div class='fadeInUp wow animated'>";
		$output.="	<div class='total-content-list'>";
		$output.="		<div class='col-xs-4 col-md-4 list_img'>";

		//	$output.="			<div class='grid normal_cont'>";
		//	$output.="		<figure class='effect-jazz '>";

			$output.="				<a href='".get_permalink()."'>";
			$output.= get_the_post_thumbnail($post->ID, $imgsize, array('class' => 'indie-image-list-blog'));
			$output.="	</a>";

		//	$output.="			<figcaption class='layout_grig'>";
		//	$output.="				<p><i class='ion-ios-book ico_footer_post'></i><br>";
		//	$output.=					__( "VIEW POST", 'ilgelo');
		//	$output.="				</p>";



		//	$output.="				<a href='".get_permalink()."'></a>";
		//	$output.="			</figcaption>";
		//	$output.="		</figure>";
		//	$output.="	</div>";

		$output.="		</div>";
		$output.="		<div class='col-xs-8 col-md-8'>";
		$output.="			<div class='".$cclass."'>";
		$output.="				<div class='textalignleft subtitle_post_standard'>".$outputc."</div>";


		$output.="		<h3 class='title_post_standard'>";
		$output.="			<a href='".get_permalink()."'>".$title."</a>";
		$output.="		</h3>";

		$output.=ilgelo_format_metapost($template);

		if ( !empty( $post->post_excerpt ) ) :
		$output.=get_the_excerpt();
		else :
		$output.=mvc_content_limit($post->post_content,$limit);
		endif;


		//$output.="$footer_post";


		$output.="			</div>";
		$output.="		</div>";
		$output.="	</div>";
		$output.="</div>";

		return $output;
	}


	function ilgelo_format_pagination($numpages = '', $pagerange = '', $paged='') {
		$output="";
		global $wp_query;

		if (empty($pagerange)) {
			$pagerange = 2;
		}

		if (empty($paged)) {
			$paged = 1;
		}
		if ($numpages == '') {
			$numpages = $wp_query->max_num_pages;
			if(!$numpages) {
				$numpages = 1;
			}
		}

		$strpage='paged';
		if (is_category() || is_archive()) {
			$strpage='page';
		}

		$pagination_args = array(
			//'base' => @add_query_arg($strpage,'%#%'),
			//'format' => '?'.$strpage.'=%#%',
			'total'           => $numpages,
			'current'         => $paged,
			'show_all'        => False,
			'end_size'        => 1,
			'mid_size'        => $pagerange,
			'prev_next'       => True,
			'prev_text'       => __('&laquo;', 'ilgelo'),
			'next_text'       => __('&raquo;', 'ilgelo'),
			'type'            => 'plain',
			'add_args'        => false,
			'add_fragment'    => ''
		);

		$paginate_links = paginate_links($pagination_args);

		if ($paginate_links) {
			$output.="<nav class='ilgelo_pagination'>";
			$output.=$paginate_links;
			$output.="</nav>";
		}
		return $output;
	}
