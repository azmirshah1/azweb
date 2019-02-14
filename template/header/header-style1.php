<!-- ========================================
     Fixed Image Background
========================================-->

<section class="main_section cover_section" style="background-image: url(<?php echo  $ilgelo_options['ilgelo-fixed-image']['url'];?>);">

	<span class="section_mask" style="background-color: <?php echo  $ilgelo_options['ilgelo-color-fixed-mask']?>; opacity: <?php echo  $ilgelo_options['ilgelo-fixed-opacity-mask']?>;"></span>

	<div class="container"  style="min-height:<?php echo esc_attr($ilgelo_options['ilgelo-no-logo-header']); ?>px;">
		<div class="row">
			<?php  include(TEMPLATEPATH."/template/header/header-logo.php"); ?>
		</div><!-- end row -->
	</div><!-- end container-fluid -->

</section>