<?php
/* ==================================================
Ilgelo Framework Main Functions
================================================== */


require_once(get_template_directory().'/framework/include/function-blog.php' );
require_once(get_template_directory().'/framework/include/function-blog-parallax.php' );
require_once(get_template_directory().'/framework/include/meta-templates.php' );
require_once(get_template_directory().'/framework/include/ThemeSetup.php' );


//==========================================================================
//=========================  Ilgelo Panel  =================================
//==========================================================================

if (!class_exists('ReduxFramework' ) && file_exists(get_template_directory().'/framework/options/core/framework.php' ) ) {
	require_once(get_template_directory().'/framework/options/core/framework.php' );
}
if (!isset( $redux_demo ) && file_exists(get_template_directory().'/framework/options/config.php' ) ) {
	require_once(get_template_directory().'/framework/options/config.php' );
}

if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}



//==========================================================================
//=========================  Infinite Sidebar  =============================
//==========================================================================



require_once(get_template_directory() . '/framework/sidebar/ThemeAdmin.php');
require_once(get_template_directory() . '/framework/sidebar/ThemeSidebar.php');




//==========================================================================
//=============================== MENU =====================================
//==========================================================================




register_nav_menus( array(
		'top_menu' => __( 'Top Header Menu', 'ilgelo' ),
		'central_menu' => __( 'Bottom Header Menu', 'ilgelo' ),
		'mini_menu' => __( 'Scroll Menu', 'ilgelo' ),
		'mobile_menu' => __( 'Mobile Menu', 'ilgelo' ),
	));



//==========================================================================
//=========================== WIDGET ACTIVATION ============================
//==========================================================================


require_once(get_template_directory().'/framework/widget/widget.php' );


//==========================================================================
//=========================== PLUGIN ACTIVATION ============================
//==========================================================================


require_once(get_template_directory().'/framework/plugin-activation/init.php' );



//==========================================================================
//=========================== Language =====================================
//==========================================================================


load_theme_textdomain('ilgelo', get_template_directory() . '/languages/');



//==========================================================================
//===================== LOAD SCRIPTS =======================================
//==========================================================================


function indie_enqueue_scripts() {

	wp_enqueue_script('wow', get_template_directory_uri().'/include/js/wow.min.js', array("jquery"),'',false);
	wp_enqueue_script('plugin', get_template_directory_uri().'/include/js/plugin.js', array("jquery"),'',true);
	wp_enqueue_script('isotope', get_template_directory_uri().'/include/js/jquery.isotope.js', array("jquery"),'',true);
	wp_enqueue_script('modernizr', get_template_directory_uri().'/include/js/modernizr.js', array("jquery"),'',true);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/include/js/bootstrap.min.js', array("jquery"),'',true);
	wp_enqueue_script('carousel', get_template_directory_uri().'/include/js/owl.carousel.min.js', array("jquery"),'',true);
	wp_enqueue_script('main', get_template_directory_uri().'/include/js/main.js', array("jquery"),'',true);
	wp_enqueue_script('parallax', get_template_directory_uri().'/include/js/parallax.min.js', array("jquery"),'',true);
	wp_enqueue_script('vide', get_template_directory_uri().'/include/js/jquery.vide.js', array("jquery"),'',true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri().'/include/js/imagesloaded.pkgd.min.js', array("jquery"),'',true);


/*
	wp_enqueue_script('plugin');
	wp_enqueue_script('isotope');
	wp_enqueue_script('modernizr');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('carousel');
	wp_enqueue_script('parallax');
	wp_enqueue_script('wow');
	wp_enqueue_script('vide');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('main');
*/

	// Loads the javascript required for threaded comments
	if( is_singular() && comments_open() && get_option( 'thread_comments') )
        wp_enqueue_script( 'comment-reply' );

}
add_action('wp_enqueue_scripts', 'indie_enqueue_scripts');






//==========================================================================
//====================== LOAD STYLES =======================================
//==========================================================================



function indie_enqueue_dynamic_css() {
	//CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/include/css/bootstrap.css');

	wp_enqueue_style('animate-css', get_template_directory_uri().'/include/css/animate.css');

	wp_enqueue_style('carousel-css', get_template_directory_uri().'/include/css/owl-carousel/owl.carousel.css');

	wp_enqueue_style('fonts-etline', get_template_directory_uri().'/include/css/fonts/fonts-etline/etline-style.css');

	wp_enqueue_style('fonts-ionicons', get_template_directory_uri().'/include/css/fonts/fonts-ionicons/ionicons.min.css');

	wp_enqueue_style('fonts-monosocialicons', get_template_directory_uri().'/include/css/fonts/fonts-monosocialicons/monosocialiconsfont.css');

	//CSS-PHP
	//wp_register_style('custom-css', get_template_directory_uri() . '/include/css/custom.css.php?nn='.rand(5, 15));


	wp_enqueue_style('font-awesome', get_template_directory_uri().'/include/css/fonts/font-awesome/font-awesome.min.css');


	//CSS
}
add_action('wp_enqueue_scripts', 'indie_enqueue_dynamic_css');

function register_childcss() {
	wp_enqueue_style('main-css', get_stylesheet_directory_uri() . "/style.css");
	wp_enqueue_style("custom-css", get_template_directory_uri()."/include/css/custom.css.php?nn=".rand(5, 15));
}
add_action('wp_enqueue_scripts', 'register_childcss', 15);


//==========================================================================
//====================== THEME SUPPORT =====================================
//==========================================================================

	add_theme_support( 'post-formats', array(
	    'quote', 'link'
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

// 1- Classic Blog
	add_image_size('indie-image-slide', 800, 480, true);

// 2- List Blog Full
     add_image_size('indie-image-list-blog', 99999999, 9999999, true);

// 3- List Blog Sidebar
     add_image_size('indie-image-list-blog-sider', 280, 250, true);

// 4- Grig Blog Full
     add_image_size('indie-image-grid-blog', 370, 278, true);

// 5- Infinite Post
	add_image_size('indie-link-format-infinite', 1170, 333, true);

// 6- Recent Small Posts - Related Big Posts (Style 2)
	add_image_size('indie-medium-posts', 290, 180, true);

// 7- Infinite Post
	add_image_size('indie-template-infinite-post', 685, 452, true);

// 8- Recent Small Posts - Related Small Posts (Style 1)
     add_image_size('indie-small-posts', 105, 65, true);

// 9- Post Carusel 4 colum
	add_image_size('indie-post-carusel-image-four', 360, 450, true);

// 10- Post Carusel 3 colum
	add_image_size('indie-post-carusel-image-three', 470, 600, true);

// 11- Post Carusel 3 and 5 colums
	add_image_size('indie-post-carusel-horizontal', 360, 250, true);

// 12- Parallax Blog
	add_image_size('indie-parallax-blog', 1600, 900, true);




//==========================================================================
//===================== SIDEBAR ============================================
//==========================================================================




//Blog Sidebar


	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'Ilgelo' ),
		'id' => 'blog-sidebar',
		'description' => __( 'The blog sidebar left and rigth ', 'ilgelo' ),
		'before_widget' => '<div class="ig_widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="fancy_one"><span>',
		'after_title' => '</span></div>',
	) );



//Central Instagram Footer
	register_sidebar(array(
		'name' => 'Instagram Footer',
		'id' => 'instagram_footer',
		'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-title">',
		'after_title' => '</h4>',
		'description' => 'Use the Instagram widget here. IMPORTANT: For best result select "Large" under "Photo Size" and set number of photos to 6.',
	));





//Footer Sidebar

// 1
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'Ilgelo' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'ilgelo' ),
		'before_widget' => '<div class="ig_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="foot-title">',
		'after_title' => '</h6>',


	) );

// 2
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'Ilgelo' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'ilgelo' ),
		'before_widget' => '<div class="ig_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="foot-title">',
		'after_title' => '</h6>',
	) );

// 3
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'Ilgelo' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'ilgelo' ),
		'before_widget' => '<div class="ig_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="foot-title">',
		'after_title' => '</h6>',
	) );

// 4
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'Ilgelo' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'ilgelo' ),
		'before_widget' => '<div class="ig_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="foot-title">',
		'after_title' => '</h6>',

	) );





//==========================================================================
//============================= EXCERPT ====================================
//==========================================================================

function mvc_content_limit($content, $limit) {
	$content = wp_strip_all_tags($content);
	$content = explode(' ', $content, $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;
}

//==========================================================================
//========================= PAGINATION  ====================================
//==========================================================================

function ilgelo_pagination($numpages = '',$pagerange = '',$paged='', $tipo='') {
	if (empty($pagerange)) {
		$pagerange = 2;
	}

	if (empty($paged)) {
		$paged = 1;
	}
	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
			$numpages = 1;
		}
	}

	$strpage='paged';

	$pagination_args = array(
		//'base' => @add_query_arg($strpage,'%#%'),
		//'format' => '?'+$strpage+'=%#%',
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
		echo "<nav class='ilgelo_pagination'>";
		echo $paginate_links;
		echo "</nav>";
		echo "<div class='clear'></div>";
	}
}


function ilgelo_getpage() {
	$paged=1;

	if (get_query_var('paged')) {
		$paged = get_query_var('paged');
	} elseif (get_query_var('page')) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	return $paged;
}

//==========================================================================
//========================= SOCIAL ICON ====================================
//==========================================================================
function indie_social_getecho_header($url_social, $icon_social) {
	$output = "";
	if ($url_social!="") {
		$output.="		<a href='".$url_social."' target='_blank'>".$icon_social."</a>";
	}
	return $output;
}


//==========================================================================
//================================= ACF ====================================
//==========================================================================

require_once(get_template_directory().'/framework/acf/acf-options.php' );



//==========================================================================
//================================= WP TITLE FILTER ========================
//==========================================================================


add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}


//==========================================================================
//=============================== VISUAL COMPOSER ==========================
//==========================================================================

add_action( 'vc_after_init_base', 'indie_add_more_custom_layouts' );
function indie_add_more_custom_layouts() {
    global $vc_row_layouts;
    array_push( $vc_row_layouts, array(
        'cells' => '13_23',
        'mask' => '29',
        'title' => 'Custom 1/3 + 2/3',
        'icon_class' => 'l_13_23' )
    );

     array_push( $vc_row_layouts, array(
        'cells' => '16_46_16',
        'mask' => '',
        'title' => 'Custom 1/6 + 1/24 + 1/6',
        'icon_class' => '' )
    );



}

?>