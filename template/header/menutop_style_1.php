<!-- ========================================
  TOP STYLE 1
 ========================================-->

<header class="header">
	<div class="container">

		<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>">
			<div class="button_home  ">
				<i class="ion-home"></i>
			</div> <!-- button_home -->
		</a>

		<!-- ==== Search Popup ======== -->
		<section class="alignright"  id="top-search">
			<a class="click_search" href="#0">| &nbsp;&nbsp;&nbsp;<?php _e( 'search' ,'ilgelo' ) ?></a>
		</section> <!--  -->

		<!-- Menu Primary Full  alignright - alignleft-->
		<nav class="nav-ilgelo-main journey-menu alignleft">
		<?php wp_nav_menu(array(
		      'container' => 'ul',
		      'container_id'    => 'ig_menu',
			 'menu_class'      => 'main-menu',
		      'theme_location' => 'top_menu',
		      'depth'           => 4,
		      'fallback_cb'=> ''

		      )
		   );
		?>
		</nav>


		<!-- SOCIAL NAVIGATION  ig-top-social-right - ig-top-social-left - textaligncenter -->
		<div class="ig-top-social ig-top-social-right ">
			<?php  include(TEMPLATEPATH."/template/social-icons-menu.php"); ?>
		</div>
		<!-- END SOCIAL NAVIGATION -->

	</div><!-- end .container -->
</header>