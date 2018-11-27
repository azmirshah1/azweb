<div class="indie_aboutme">

	<div class="indie_cont_image">
		<section class="cover_section" style=" background-image: url(<?php echo  $ilgelo_options['ilgelo-img-s-author']['url']; ?>) ;
"></section>
     </div>

	<div class="widget textaligncenter ig_widget">
		<img class="indie_about indie_radius img_full_responsive aligncenter" src="<?php echo  $ilgelo_options['ilgelo-bg-s-author']['url']; ?>">


		<div class="title_special_aut"><?php echo  $ilgelo_options['ilgelo-name-s-author']; ?></div>
          <div class="local_special_aut">
	          <i class="ion-ios-location"></i>
	           <?php echo  $ilgelo_options['ilgelo-local-s-author']; ?>
	     </div>
		<p><?php

			$textauthor="";
			if (!empty($ilgelo_options['ilgelo-text-s-author'])) {
				$textauthor=$ilgelo_options['ilgelo-text-s-author'];
				if (function_exists('icl_translate' )){
					$textauthor = icl_translate('User values', 'Author About Text', $textauthor);
				}
			}
			echo esc_attr($textauthor);
		?></p>




<?php  if ($ilgelo_options['ilgelo-social-about-author']==1) : ?>
<!-- SOCIAL NAVIGATION  ig-top-social-right - ig-top-social-left - textaligncenter -->
	<div class="side_author_social ig-top-social textaligncenter margin-15top">
		<?php  include(TEMPLATEPATH."/template/social-icons-menu.php"); ?>
	</div>
<!-- END SOCIAL NAVIGATION -->
<?php endif; ?>




	</div>


</div><!-- .indie_aboutme -->