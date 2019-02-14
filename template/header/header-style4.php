<!-- ========================================
     Parallax Image Background
========================================-->


<!--  data-natural-width="1600" data-natural-height="300"-->

<div class="parallax-window"  data-parallax="scroll" data-bleed="0" position="center" speed="0.2"  data-image-src="<?php echo  $ilgelo_options['ilgelo-parallax-image']['url'];?>">

	<span class="section_mask" style="background-color: <?php echo  $ilgelo_options['ilgelo-color-parallax-mask']?>; opacity: <?php echo  $ilgelo_options['ilgelo-opacity-mask']?>;"></span>

<div class="container"  style="min-height:<?php echo esc_attr($ilgelo_options['ilgelo-no-logo-header']); ?>px;">
	<?php  include(TEMPLATEPATH."/template/header/header-logo.php"); ?>
</div><!-- end container -->

	<script>
		jQuery(function($){

		$('.parallax-window').parallax({imageSrc: '<?php echo  $ilgelo_options['ilgelo-parallax-image']['url'];?>'});
		});
	</script>


</div><!-- end parallax-window -->