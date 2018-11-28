<!-- ========================================
  BOTTOM STYLE 2
 ========================================-->

<div class="menu_post_header">
	<div class="container">

		<!-- SOCIAL NAVIGATION  ig-top-social-right - ig-top-social-left - textaligncenter -->
		<div class="ig-top-social ig-top-social-left ">
			<?php  include(TEMPLATEPATH."/template/social-icons-menu.php"); ?>
		</div>
		
		<!-- END SOCIAL NAVIGATION -->

		<!-- ==== Search Popup - alignright  - alignleft  ======== -->
		<section class="alignright"  id="top-search">
			<a class="click_search" href="#0"><?php _e( 'search' ,'ilgelo' ) ?></a>
		</section> <!--  -->

		<!-- Menu Primary Full  alignright - alignleft textaligncenter  -->
		<nav class="nav-ilgelo-main  journey-menu textaligncenter">
			<?php wp_nav_menu(array(
				'container' => 'ul',
				'container_id'    => 'ig_menu',
				'menu_class'      => 'main-menu',
				'theme_location' => 'central_menu',
				'depth'           => 4,
				'fallback_cb'=> ''

				)
			);
			?>
		</nav>

	</div> <!-- menu_post_header -->
</div> <!-- Container -->