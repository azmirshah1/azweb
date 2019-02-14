<!-- ========================================
  MENU SCROLL STYLE 1
 ========================================-->

<div id="mini-header">
	<div class="container">

<?php  if ($ilgelo_options['ilgelo-logo-mininavigation']==1) : ?>
	<div class="alignleft logo_mini_header">
	         <a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>">
			  <img width="<?php echo  $ilgelo_options['ilgelo-logo-scrool-menu-width']?>" height="<?php echo  $ilgelo_options['ilgelo-logo-scrool-menu-height']?>" alt="<?php bloginfo('name'); ?>"  rel="<?php bloginfo('name'); ?>" src="<?php echo  $ilgelo_options['ilgelo-logo-scrool-menu']['url']; ?>"/>
	         </a>
	 </div><!-- End .textalignleft  -->
<?php endif; ?>

		<!-- Menu Primary Full  alignright - alignleft textaligncenter  -->
		<nav class="nav-ilgelo-main journey-menu alignleft menu-miniheader">
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