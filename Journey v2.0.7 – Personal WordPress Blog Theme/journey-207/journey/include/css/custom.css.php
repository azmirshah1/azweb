<?php header("Content-Type: text/css; charset=utf-8");
//Basics & WordPress Standards
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
require_once( $path_to_wp.'/wp-includes/functions.php');
$template_uri = get_template_directory_uri();
global $applebox;
?>


/* Journey css */




/* ====== Margin slider ======= */


.promo-item {
	margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-slide-spacing']['margin-top']) ?>;
	margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-slide-spacing']['margin-bottom']) ?>;
	margin-left: <?php echo esc_attr($ilgelo_options['ilgelo-slide-spacing']['margin-left']) ?>;
	margin-right: <?php echo esc_attr($ilgelo_options['ilgelo-slide-spacing']['margin-right']) ?>;
		height: <?php echo esc_attr($ilgelo_options['ilgelo-slide-row-height']) ?>px;

}



/* ====== Color Base ======= */



/* BG Color Hover */

.wpcf7-submit, #commentform .submit, #back-to-top,

.highlight-text, #wp-calendar tbody td:hover {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-button-post']) ?>;
}


/* Color Text button */

.wpcf7-submit, #commentform .submit, #back-to-top i,
.flex-direction-nav a.flex-next:before,
.flex-direction-nav a.flex-prev:before, .nav li.active > a, .nav a:hover, #wp-calendar tbody td:hover {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-color-button-post']) ?>;
	}

/* Post Social Share  */

.share_post a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
}

.share_post a:hover {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
}

/* ====== Body ====== */

body {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['line-height']) ?>;
     font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-weight']) ?>;

	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-background']['background-color']) ?>;
	background-image: url(<?php echo esc_attr($ilgelo_options['ilgelo-background']['background-image']) ?>);
	background-repeat: <?php echo esc_attr($ilgelo_options['ilgelo-background']['background-repeat']) ?>;
	background-size: <?php echo esc_attr($ilgelo_options['ilgelo-background']['background-size']) ?>;
	}




/* General Font  */
a.main_logo,
.main_subtitle,
.ig_meta_post_classic, .foot_post_cont_reading a, .foot_post_comment a, ul.post_tag li, .ig_widget .tagcloud a, .tit_prev span, .tit_next span, .fancy_one span, .comments-title span, p.fancy_one_tw_sider span, .effect-jazz figcaption p, a.ig_recent_big_post_title, a.ig_recent_post_title, .ig_recent_post_details span, .ig_recent_big_post_details span, .related-post-style1 p.r-p-date, .related-post-style2 p.r-p-date, .title_navigation_post_r p.r-p-date, .title_navigation_post p.r-p-date,.subtitle_post_standard a

{
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-general-font']['font-family']) ?>' !important;

}



::selection {
    background: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
    color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
}
::-moz-selection {
    background: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
    color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
}

a,
h1 a.main_logo {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
    }

a:hover,
a:active,
a:focus,
h1 a.main_logo:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
	}

/*
h2.title_post_standard a, h3.title_post_standard a, h4.title_post_standard a, .blog-post-content-grid h4 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
}


h2.title_post_standard a:hover, h3.title_post_standard a:hover, h4.title_post_standard a:hover, .blog-post-content-grid h4 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['color']) ?>;

}
*/



/* ====== Color Evidence ====== */

blockquote {
   border-left-color:  <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
}



/* ====== h1 - h2 - h3 - h4 - h5 - h6 ====== */




h1 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['letter-spacing']) ?>;
	word-spacing:  <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['word-spacing']) ?>;
	margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h1']['margin-top']) ?>;
	margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h1']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h1']['font-weight']) ?>;
    }
h1 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h1']['active']) ?>;
	}
h1 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h1']['hover']) ?>;
	}


h2 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['letter-spacing']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['word-spacing']) ?>;
     margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h2']['margin-top']) ?>;
     margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h2']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h2']['font-weight']) ?>;
    }
h2 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h2']['active']) ?>;
	}
h2 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h2']['hover']) ?>;
	}


h3 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['letter-spacing']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['word-spacing']) ?>;
     margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h3']['margin-top']) ?>;
	margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h3']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h3']['font-weight']) ?>;
    }
h3 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h3']['active']) ?>;
	}
h3 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h3']['hover']) ?>;
	}


h4 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['letter-spacing']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['word-spacing']) ?>;
     margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h4']['margin-top']) ?>;
     margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h4']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h4']['font-weight']) ?>;
    }
h4 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h4']['active']) ?>;
	}
h4 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h4']['hover']) ?>;
	}


h5 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['letter-spacing']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['word-spacing']) ?>;
     margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h5']['margin-top']) ?>;
     margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h5']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-weight']) ?>;
    }
h5 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h5']['active']) ?>;
	}
h5 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h5']['hover']) ?>;
	}


 .title_navigation_post h5 a, .title_navigation_post_r h5 a  {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['line-height']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['word-spacing']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h5']['font-weight']) ?>;

 }




h6 {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-size']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['color']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['letter-spacing']) ?>;
	word-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['word-spacing']) ?>;
	margin-top: <?php echo esc_attr($ilgelo_options['ilgelo-m-h6']['margin-top']) ?>;
	margin-bottom: <?php echo esc_attr($ilgelo_options['ilgelo-m-h6']['margin-bottom']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-weight']) ?>;
    }
h6 a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h6']['active']) ?>;
	}
h6 a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-hover-h6']['hover']) ?>;
	}



/* ====== Header ====== */



.logo {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-logo']) ?>;
}



/*  Navigation */


/* -- Top menu */
header.header,
ul.sub-menu > li {
	background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;
}

/* -- Bottom menu */
.menu_post_header {
	background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;
}
.menu_post_header nav ul li ul.sub-menu {
		background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']); ?> !important;
}




/*  journey Menu Navigation */

.journey-menu ul.main-menu li {
     font-size: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-size']) ?>;
     font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-family']) ?>';
     }

.journey-menu ul.main-menu > li > a {
     font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-family']) ?>';
     font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-weight']) ?>;
     font-size: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-size']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['letter-spacing']) ?>;
     }

.button_home {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;

}


.main-menu > li > a {
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['letter-spacing']) ?>;
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
     font-size: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-size']) ?>;
     }
.main-menu > li > a:hover {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
     }
li.current-menu-item > a,
.current_page_item {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?> !important;
    }




/* Sub Navigation */

ul li ul.sub-menu > li:first-child {
     background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;
	}
ul li ul.sub-menu ul.sub-menu > li:first-child {
     background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;
	}
.main-menu li:hover > ul.sub-menu {
     background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-header']['rgba']) ?>;
	}
ul.sub-menu > li > a {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
       font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-family']) ?>';
     font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-weight']) ?>;
     font-size: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-size']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['letter-spacing']) ?>;
	}
ul.sub-menu > li > a:hover {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
     }


/* Menu Responsive */

.nav-mobile, .nav-mobile ul, .nav-mobile li {
      font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-family']) ?>';
     }

/*  Ico Search Navigation */



#top-search a  {
     font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-family']) ?>';
     font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-weight']) ?>;
     font-size: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['font-size']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-top-menu-typography']['letter-spacing']) ?>;
     color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
     }

#top-search a:hover  {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
     }
.click_search:after {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
}
.click_search:after:hover {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
}








/* top Search navigation + PopUp */

.container_search, .cd-primary-nav {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-mobile']) ?>;

  }




/* Mobile Search-Menu icon color  */

.menu-nav i {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-color-social-top']['regular']) ?>;
     }




/* Menu mobile */

.nav-mobile > li {
     background-color: ;
}
.nav-mobile ul.sub-menu > li > a, .nav li ul.sub-menu {
     background-color: ;
     }

.cont_mobile_nav {
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-mobile']) ?>;
}

.nav-mobile a {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-link-mobile']['regular']) ?>;

}
.nav-mobile a:hover {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-link-mobile']['hover']) ?>;

}
.nav-mobile li > a > span {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-link-mobile']['hover']) ?>;
}



.nav-mobile li > a:hover > span {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-link-mobile']['hover']) ?>;
}







/*--- Mini Navigation menu ---*/


#mini-header {
	background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-mini-header']) ?>;
}
.menu-miniheader ul li ul.sub-menu li {
	background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-mini-header']) ?> !important;
}
#mini-header li:hover > ul.sub-menu {
	background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-mini-header']) ?> !important;
}

.menu-miniheader ul li a {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['regular']) ?> !important;

}
.menu-miniheader ul li a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['hover']) ?> !important;

}

.ig-social-right-miniheader a i, .social-nav-under-logo a i {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['regular']) ?> !important;
     }
.ig-social-right-miniheader a i:hover, .social-nav-under-logo  a i:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['hover']) ?> !important;
     }






header.header .downHeader li.current-menu-item > a, .current_page_item {
color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['hover']) ?> !important;
}

header.header .downHeader .main-menu > li > a {
color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['regular']) ?>;
}

header.header .downHeader .main-menu > li > a:hover,
.flexnav li a:hover, .flexnav li ul li a:hover {
color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['hover']) ?>;
}

header.header .downHeader ul.sub-menu > li > a {
color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['regular']) ?>;
background-color: ;
}

header.header .downHeader ul.sub-menu > li > a:hover {
color: <?php echo esc_attr($ilgelo_options['ilgelo-link-header-nav']['hover']) ?>;
}





/* Social Mobile UP  */

#up_container {
     background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
     }
#closer a, #closer i {
     color:  <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['regular']) ?>;
     }
#border_up_container {
     background-color: <?php echo esc_attr($ilgelo_options['ilgelo-menu-color-link-hover']['hover']) ?>;
     }
.ig-top-social a i,.ig-top-social a span, header.header.downHeader, header.header.downHeader #top-search a {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-color-social-top']['regular']) ?>;
     }
.ig-top-social a i:hover, .ig-top-social a span:hover, header.header.downHeader, header.header.downHeader #top-search a:hover, #top-search a:hover {
     color: <?php echo esc_attr($ilgelo_options['ilgelo-color-social-top']['hover']) ?>;
     }











/* ====== Widget ======= */


#widget-area .ig_widget ul li {
  border-bottom: 1px solid <?php echo esc_attr($ilgelo_options['ilgelo-line-color']) ?>;
}


/* ====== Footer ====== */


/* Social Footer Tooltip */


ul li.ig_share_buttom {
background-color:<?php echo esc_attr($ilgelo_options['ilgelo-bg-color-socialtooltip']) ?>;
border-left: solid 1px #fff;
    }


.ig_share_buttom i {
    color:  <?php echo esc_attr($ilgelo_options['ilgelo-color-socialtooltip']['active']) ?>;
    }


.ig_share_buttom:hover a,
.ig_share_buttom:hover a i {
    color:  <?php echo esc_attr($ilgelo_options['ilgelo-color-socialtooltip']['hover']) ?> !important;
    }







footer {
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-footer']) ?>;
    }


/* Footer Widget */

footer .ig_widget h6.foot-title {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-widget-title-footer']) ?>;
    }


/* Footer Widget / regular-active-hover  */
footer .ig_widget a {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    }

footer .ig_widget a:hover {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['hover']) ?>;
    }

footer .ig_widget p strong {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    }
footer .ig_widget p,
footer .textwidget {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['regular']) ?>;
    }

footer .ig_widget ul li  {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['regular']) ?>;
    }

footer .ig_widget ul li a {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    }

footer .ig_widget ul li a:hover {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['hover']) ?>;
    }

footer .ig_widget .tagcloud a {
    border: 1px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    }

footer .ig_widget .tagcloud a:hover {
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['hover']) ?>;
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-widget-footer']['active']) ?>;
    }
.mc_merge_var input[type=text], input[type=email], select,
footer .ig_widget .mc_merge_var input[type=text], input[type=email], select {
    background: <?php echo esc_attr($ilgelo_options['ilgelo-background']['background-color']) ?>;
}







/* ====== Central Footer ====== */

footer.central_footer {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-central-footer']) ?>;
}


/* Color widget Mali Chimp */

footer .ig_widget h6 {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-title-mailchimp']) ?>;
}

#mc_subheader {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-title-mailchimp']) ?>;
}

#mc_signup_submit {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-color-button-post']) ?>;
}

 /* Mail chimp submit  */

 footer .ig_widget #mc_signup_submit {
  background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-botton-mailchimp']) ?> !important;
    color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-botton-mailchimp']) ?> !important;
}



/* ====== Sub Footer ====== */

.sub_footer {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-subfooter']) ?>;
}




/* Sub Footer Text / regular-active-hover  */

.sub_footer span {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-link-color-subfooter']['regular']) ?>;
}

.sub_footer span a {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-link-color-subfooter']['active']) ?>;
}

.sub_footer span a:hover {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-link-color-subfooter']['hover']) ?>;
}




/* ====== Blog ====== */




/* ====== General Color ======= */



.blog-post-content, .blog-post-infbox-content, .total-content-list, .blog-post-content-list, .blog-post-content-list-sider, .blog-post-content-grid, .blog-post-single-content, .content-related-post, .content-comment, .comment-respond, .content-author, .page-content, .page-central-content, .ig_widget, .box_author, .ig_bg_image, .bg_slide_post, .title-content, .container-select-box select, .container-select-box:after, .panel-body .widget_search form input[type="search"], .cont_prev_left, .cont_next_right, .category_bg, #widget-area, #commentform textarea, #disqus_thread {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
   }




.fancy_one span:before, .fancy_one span:after, .tit_prev span:after, .tit_next span:before, .tit_next span:after, .comments-title span:before, .comments-title span:after, #reply-title span:after, #reply-title span:before {
	border-bottom: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}

#ig-slide-post.owl-theme .owl-controls .owl-buttons div,
.slide_post.owl-theme .owl-controls .owl-buttons div  {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}


/* Widget Search  */

.widget_search form input[type="search"] {
	border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-line-color']) ?>;
	background: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
}

::-webkit-input-placeholder {
color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';

}
:-moz-placeholder { /* Firefox 18- */
color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
}
::-moz-placeholder {  /* Firefox 19+ */
color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
}
:-ms-input-placeholder {
color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
}









/* Widget twitter  */

.ig_widget, .ig_widget .ig_widget_twitter li span {

	color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
}




.fancy_one_tw_sider span i  {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}





.ig_widget .tagcloud a  {
	border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}

.ig_widget .tagcloud a:hover {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
}

.post_divider_classic {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-line-color']) ?>;
}


.ig_meta_post_classic span:before, .ig_meta_post_classic span:after {
	border-bottom: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-line-color']) ?> !important;
}



ul.children li > div,
ol.commentlist li > div {
	border-bottom: 1px solid <?php echo esc_attr($ilgelo_options['ilgelo-line-color']) ?>;
	}







.button_cont, #commentform .submit, .wpcf7 .wpcf7-submit, footer .ig_widget #mc_signup_submit {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-button-post']) ?>;
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-button-post']) ?>;
	border: solid 2px <?php echo esc_attr($ilgelo_options['ilgelo-color-border-button-post']) ?>;
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['line-height']) ?>;
	letter-spacing: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['letter-spacing']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-family']) ?>';
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-size']) ?> !important;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-weight']) ?>;
	text-transform: <?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['text-transform']) ?>;
   }

.button_cont:hover,
.button_cont:active,
.button_cont:focus {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-button-post']) ?>;
	}


/* Layout Post */

.subtitle_post_standard a  {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
	border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
     }
.subtitle_post_standard a:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
     }

i.ico_footer_post {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?> !important;
	background-color: transparent !important;

 }


figure.effect-jazz figcaption::after {
	border-top: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
	border-bottom: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}




/* tag in single post*/

ul.post_tag li {
	border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}



/* Pagination */

a.page-numbers {
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
    font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-general-font']['font-family']) ?>' !important;
    }
 a.page-numbers:hover {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
	}

.page-numbers.current {
    color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
    background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;
	}








 /* Contact Form */

.wpcf7 input, .wpcf7 textarea {
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-post']) ?>;
   border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;

	}

.wpcf7 .wpcf7-submit {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-button-post']) ?>;

}

/* Comment Form */

textarea, #commentform input {
   border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['hover']) ?>;

	}






/* ====== Custom VC ====== */


.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-size-xs {
background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
}

 /* VC Base Style  */



.wpb_wrapper {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['line-height']) ?>;
    font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-weight']) ?>;
	}


 /* Tab VC  */

.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a, .wpb_content_element .wpb_accordion_header a {
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
	color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
 }
/* Current Tab */
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-color-button-post']) ?> !important;
   background-color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-button-post']) ?>;
}

/* Disable Tab */
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
   color: <?php echo esc_attr($ilgelo_options['ilgelo-bg-button-post']) ?>;
   font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-typo-h6']['font-family']) ?>';

}


/*
   TEAM - ilgelo Vc Shortcode
================================================== */

.team figure {
	 color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
	 }
.team a:hover img {
	 border-color:  <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
	 }
.team  a:hover figure {
      color:  <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
	 }
.team figure figcaption em {
	 color: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['color']) ?>;
	 }


/*
   Dropcaps - ilgelo Vc Shortcode
================================================== */


.dropcap_extra {
border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
color: <?php echo esc_attr($ilgelo_options['ilgelo-color-link-hover']['active']) ?>;
}



/*
   Comments form
================================================== */

span.reply {
	border: 2px solid <?php echo esc_attr($ilgelo_options['ilgelo-color-evidence']) ?>;
}

/*
   MAIN - About
================================================== */


.indie_aboutme .title_special_aut,
.indie_big_aboutme .title_special_aut {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-style-name-s-author']['color']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-style-name-s-author']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-style-name-s-author']['font-family']) ?>';
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-style-name-s-author']['line-height']) ?>;
	font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-style-name-s-author']['font-weight']) ?>;
	}


.indie_aboutme .local_special_aut,
.indie_big_aboutme .local_special_aut {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-style-local-s-author']['color']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-style-local-s-author']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-style-local-s-author']['font-family']) ?>';
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-style-local-s-author']['line-height']) ?>;
    font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-style-local-s-author']['font-weight']) ?>;
	}


.color_big_author,
.indie_aboutme .ig_widget {
	background-color: <?php echo esc_attr($ilgelo_options['ilgelo-color-bg-author']) ?>;
	}

.indie_aboutme .ig_widget p,
.indie_big_aboutme p {
		color: <?php echo esc_attr($ilgelo_options['ilgelo-color-text-author']) ?>;
	font-size: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-size']) ?>;
	font-family: '<?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-family']) ?>';
	line-height: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['line-height']) ?>;
     font-weight: <?php echo esc_attr($ilgelo_options['ilgelo-body-typography']['font-weight']) ?>;

}




.indie_big_aboutme .ig-top-social a span {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-social-about-author']['active']) ?> !important;
}



.indie_big_aboutme .ig-top-social a span:hover {
	color: <?php echo esc_attr($ilgelo_options['ilgelo-color-social-about-author']['hover']) ?> !important;
}


/* ====== Video Background ======= */


#video_bg {
	height:<?php echo esc_attr($ilgelo_options['ilgelo-video-bg-height']); ?>px;
}
 @media (max-width: 480px) {
	#video_bg {
		height: auto;
	}

}


	
/* ======================================
	CSS Admin bar
=========================================*/

<?php if ( is_admin_bar_showing() ) : ?>
    #mini-header {
    	top: 32px;
    }
<?php endif; ?>	




/* ====== Custom CSS from panel ======= */
<?php if (!empty($ilgelo_options['ilgelo-custom-css'])) : ?>
		 <?php  echo esc_attr($ilgelo_options['ilgelo-custom-css']);  ?>
<?php endif;   ?>

