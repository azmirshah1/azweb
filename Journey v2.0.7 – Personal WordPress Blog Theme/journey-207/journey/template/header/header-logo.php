<!-- ========================================
     LOGO HEADER OR TEXT
========================================-->

<div class="bg-logo-container margin-head-page">

<?php
	global $ilgelo_options;
	$header_logo = "2";

	if (!empty($ilgelo_options['ilgelo-logo-activate'])) {
		$header_logo=$ilgelo_options['ilgelo-logo-activate'];
	}

	if ($header_logo=="1") {
		echo "	<div class='container' style='padding-top:".$ilgelo_options['ilgelo-logo-head-margin-top']."px;padding-bottom:".$ilgelo_options['ilgelo-logo-head-margin-bottom']."px;'>";
		echo "	    <div class='row textaligncenter'>";
		if (is_home()||is_front_page()) {
			echo "			<h1>";
		}
		echo "				<a class='main_logo' title='".get_bloginfo('name')."' href='".home_url('/')."'> ";
		if ($ilgelo_options['ilgelo-logo-head-retina']['url']) {
			echo "					<img width='".$ilgelo_options['ilgelo-logo-head-size-width']."' height='".  $ilgelo_options['ilgelo-logo-head-size-height']."' alt='".get_bloginfo('name')."'  rel='".get_bloginfo('name')."' src='".$ilgelo_options['ilgelo-logo-head-retina']['url']."'/>";
		} else {
			echo get_bloginfo('name');
		}
		echo "				</a>";
		if (is_home()||is_front_page()) {
			echo "			</h1>";
		}
		echo "	    </div><!-- end .row -->";
		echo "	</div><!-- end .container -->";
	} else if ($header_logo=="2") {
		echo "	<div class='container' style='padding-top:".$ilgelo_options['ilgelo-text-head-margin-top']."px;padding-bottom: ".$ilgelo_options['ilgelo-text-head-margin-bottom']."px;'>";
		echo "	<div class='row'>";
		echo "	       <div class='title_banner textaligncenter'>";
		if (is_home()||is_front_page()) {
			echo "				<h1 class='title_without_logo'>";
		}
		echo "					<a class='main_logo' title='".get_bloginfo('name')."' href='".home_url('/')."' '> ";
											   bloginfo('name');
		echo "					</a>";
		if (is_home()||is_front_page()) {
			echo "				</h1>";
			echo "				<div class='sub_title_without_logo'>";
		} else {
			echo "					<br>";
		}
		echo "					<a class='main_subtitle' title='".get_bloginfo('description')."' href='".home_url('/')."' '> ";
											  bloginfo('description');
		echo "					</a>";
		if (is_home()||is_front_page()) {
			echo "				</div>";
		}
		echo "	       </div>";

		echo "		</div><!-- end row -->";
		echo "	</div>";
	} else if ($header_logo=="3") {

		/* null */

	}


?>

</div><!-- end bg-logo-container -->