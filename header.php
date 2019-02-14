<!DOCTYPE html>
<html <?php language_attributes(); ?>>
      <?php global $ilgelo_options; ?>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php if (!defined('WPSEO_VERSION')){ ?>
			<title><?php wp_title( '-', true, 'right' ); ?></title>
			<meta name="description" content="<?php if ( is_single() ) {
			single_post_title('', true);
			} else {
			bloginfo('name'); echo " - "; bloginfo('description');
			}
			?>" />
		<?php } ?>

		<link rel="profile" href="http://gmpg.org/xfn/11" />


		<!-- Favicons  ================================================== -->
		<?php if (!function_exists('has_site_icon') || ! has_site_icon()) { ?>
			<?php if(!empty($ilgelo_options['ilgelo-icon-favicon'])) { ?>
				<link rel="shortcut icon" href="<?php echo esc_url($ilgelo_options['ilgelo-icon-favicon']['url'])?>" />
			<?php } ?>
		<?php } ?>


		<!-- RSS & Pingbacks  ================================================== -->
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

		<!-- Option HTML  ================================================== -->
		<?php echo  $ilgelo_options['ilgelo-custom-html']?>
		

		<!-- =============== // Scripts/CSS HEAD HOOK // =============== -->
		<?php
		/* Always have wp_head() just before the closing </head>
		* tag of your theme, or you will break many plugins, which
		* generally use this hook to add elements to <head> such
		* as styles, scripts, and meta tags.
		*/
		wp_head();
		?>
	</head>

	<body <?php body_class(); ?> id="vid-container">

		<!-- ==== Top Menu ======== -->

		<?php  if ($ilgelo_options['ilgelo-activate-top-menu']==1) : ?>
		<?php
			$menu_top_layout = "3";

			if (!empty($ilgelo_options['ilgelo-layout-top-menu'])) {
				$menu_top_layout=$ilgelo_options['ilgelo-layout-top-menu'];
			}

			if ($menu_top_layout=="1") {
				include(TEMPLATEPATH."/template/header/menutop_style_1.php");
			} else if ($menu_top_layout=="2") {
				include(TEMPLATEPATH."/template/header/menutop_style_2.php");
			} else if ($menu_top_layout=="3") {
				include(TEMPLATEPATH."/template/header/menutop_style_3.php");
			} else if ($menu_top_layout=="4") {
				include(TEMPLATEPATH."/template/header/menutop_style_4.php");
			} else if ($menu_top_layout=="5") {
				include(TEMPLATEPATH."/template/header/menutop_style_5.php");
			} else if ($menu_top_layout=="6") {
				include(TEMPLATEPATH."/template/header/menutop_style_6.php");
			}
		?>
		<?php endif; ?>



		<!-- ========================================
		     MOBILE MENU
		 ========================================-->

		<!-- ==== Search Popup ======== -->
			<div class="container_search">
				<div class="container">
					<?php  include(TEMPLATEPATH."/ilgelo-searchform.php"); ?>
				</div>
			</div>

		<!-- ==== Menu Popup ======== -->
			<div class="cd-primary-nav">
				<div class="container">
					<?php  include(TEMPLATEPATH."/template/header/menu-mobile.php"); ?>
				</div>
			</div>

		<div class="cont_mobile_nav">
			<!-- Buttom Menu/Social Mobile -->
			<div class="menu-button">
				<a class="menu-nav" href="javascript:void(0);">
			         <i class="ig-icon-menu fa fa-bars"></i>
				</a>
			</div>

			<div class="search-button">
				<a class="menu-nav" href="javascript:void(0);">
			         <i class="ig-icon-search fa fa-search"></i>
				</a>
			</div>
		</div>

		<!-- SCROOL MOBILE MENU
		 ========================================-->




<div id="mini-mobile-scroll">

			<div class="cont_mobile_nav">
			<!-- Buttom Menu/Social Mobile -->
			<div class="menu-button">
				<a class="menu-nav" href="javascript:void(0);">
			         <i class="ig-icon-menu fa fa-bars"></i>
				</a>
			</div>

			<div class="search-button">
				<a class="menu-nav" href="javascript:void(0);">
			         <i class="ig-icon-search fa fa-search"></i>
				</a>
			</div>
		</div>

</div><!-- End #mini-header -->




		<!-- ========================================
		     PHOTO IN HEADER OR COLOR
		 ========================================-->

		<?php
			$header_logo_layout = "2";

			if (!empty($ilgelo_options['ilgelo-header-style'])) {
				$header_logo_layout=$ilgelo_options['ilgelo-header-style'];
			}

			if ($header_logo_layout=="1") {
				include(TEMPLATEPATH."/template/header/header-style1.php");
			} else if ($header_logo_layout=="2") {
				include(TEMPLATEPATH."/template/header/header-style2.php");
			} else if ($header_logo_layout=="3") {
				include(TEMPLATEPATH."/template/header/header-style3.php");
			} else if ($header_logo_layout=="4") {
				include(TEMPLATEPATH."/template/header/header-style4.php");
			} else if ($header_logo_layout=="5") {
				include(TEMPLATEPATH."/template/header/header-style5.php");
			}
		?>

		<!-- ========================================
		     Navigation Menu under logo
		 ========================================-->

		<?php  if ($ilgelo_options['ilgelo-activate-bottom-menu']==1) : ?>
		<?php
			global $ilgelo_options;
			$menu_bottom_layout = "3";

			if (!empty($ilgelo_options['ilgelo-layout-bottom-menu'])) {
				$menu_bottom_layout=$ilgelo_options['ilgelo-layout-bottom-menu'];
			}

			if ($menu_bottom_layout=="1") {
				include(TEMPLATEPATH."/template/header/menubottom_style_1.php");
			} else if ($menu_bottom_layout=="2") {
				include(TEMPLATEPATH."/template/header/menubottom_style_2.php");
			} else if ($menu_bottom_layout=="3") {
				include(TEMPLATEPATH."/template/header/menubottom_style_3.php");
			} else if ($menu_bottom_layout=="4") {
				include(TEMPLATEPATH."/template/header/menubottom_style_4.php");
			} else if ($menu_bottom_layout=="5") {
				include(TEMPLATEPATH."/template/header/menubottom_style_5.php");
			} else if ($menu_bottom_layout=="6") {
				include(TEMPLATEPATH."/template/header/menubottom_style_6.php");
			}
		?>
		<?php endif; ?>


		<!-- ========================================
		     Mini Navigation on scroll
		 ========================================-->

		<?php  if ($ilgelo_options['ilgelo-activate-menu-scroll-layout']==1) : ?>
		<?php
			global $ilgelo_options;
			$menu_scroll_layout = "1";

			if (!empty($ilgelo_options['ilgelo-layout-menu-scroll-layout'])) {
				$menu_scroll_layout=$ilgelo_options['ilgelo-layout-menu-scroll-layout'];
			}

			if ($menu_scroll_layout=="1") {
				include(TEMPLATEPATH."/template/header/menu_scroll_style_1.php");
			} else if ($menu_scroll_layout=="2") {
				include(TEMPLATEPATH."/template/header/menu_scroll_style_2.php");
			}
		?>
		<?php endif; ?>