<!-- ========================================
  MENU SCROLL STYLE 2
 ========================================-->

<div id="mini-header">
	<div class="container">
		<!-- Menu Primary Full  alignright - alignleft textaligncenter  -->
		<nav class="nav-ilgelo-main journey-menu textaligncenter menu-miniheader">
		<?php wp_nav_menu(array(
			'container' => 'ul',
			'container_id'    => 'ig_menu',
			'menu_class'      => 'main-menu',
			'theme_location' => 'mini_menu',
			'depth'           => 4,
			'fallback_cb'=> ''
			)
		);
		?>
		</nav>
	</div><!-- End container -->
</div><!-- End #mini-header -->