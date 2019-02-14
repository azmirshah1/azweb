<?php

	function ilgelo_format_single_headerparallax() {
		global $post;
		global $ilgelo_options;

		if (class_exists('acf') && get_field('header_parallax_post')) {
			echo "<div class='parallax-postimg'  data-parallax='scroll' data-bleed='0' position='center' speed='0.2' data-image-src='" . get_field("post_header_image") . "'>";

			echo "<span class='section_mask' style='background-color: " . get_field("color_mask") . "; opacity: ".get_field("opacity_mask").";'></span>";


			echo " <div class='container-fluid parallax_post_padding'>";
			echo "     <div class='row against_row'>";
			echo "          <div class='col-md-12'>";
			echo "				<h2 class='textaligncenter' style='color: ".get_field("color_title").";'>".get_the_title()."</h2>";
			echo "				<div class='textaligncenter subtitle_post_standard cat_in_parallax' style='color: ".get_field("color_title").";'>";
			the_category("&nbsp;");
			echo "				</div>";
			echo "			</div> <!-- end col-md-12 -->";
			echo "		</div><!-- end row -->";
			echo "	</div><!-- end container-fluid -->";
			echo "</div> <!-- end parallax-postimg -->";
			echo "<script>";

			echo "	var img = new Image();";
			echo "	img.onload = function() {";
			echo "		jQuery(function($){";
			echo "			jQuery('.parallax-postimg').parallax({imageSrc: '" . get_field("post_header_image") . "'});";
			echo "		});";
			echo "	};";
			echo "	img.src = '".get_field("post_header_image")."';";

			//echo "jQuery(function($){";
			//echo "	'use strict';";
			//echo "	$('.parallax-postimg').parallax({imageSrc: '" . get_field("post_header_image") . "'});";
			//echo "});";
			echo "</script>";
			echo "<style>";
			echo ".cat_in_parallax a {
			color: ".get_field('color_title')." !important;
			border: 2px solid ".get_field('color_title')." !important;
			}";
			echo "</style>";

		}
	}

?>