<?php
/**
 * The footer.
 *
 */
?>

<?php global $ilgelo_options; ?>

<?php if ($ilgelo_options['top-botton']==1) : ?>
		<!-- Back To Top -->
				<a href="#0" class="cd-top">
					<i class="fa fa-angle-up"></i>
				</a>
		<!-- Back To Top -->
<?php endif;   ?>



<?php if ($ilgelo_options['ilgelo-footer-socialtooltip']==1) : ?>


<ul class="ig_social_share">
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][1])) : ?>
		<li class="ig_share_buttom">
		     <a target="_blank"  href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][1]) ?>">
		         <i class="fa fa-twitter"></i>
		     </a>
		</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][2])) : ?>
		<li class="ig_share_buttom">
		     <a target="_blank"  href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][2]) ?>">
		         <i class="fa fa-facebook"></i>
		     </a>
		</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][3])) : ?>
		<li class="ig_share_buttom">
			<a target="_blank" href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][3]) ?>">
			    <i class="fa fa-google-plus"></i>
			</a>
		</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][4])) : ?>
		<li class="ig_share_buttom">
		    <a  href="mailto:<?php echo esc_attr($ilgelo_options['ilgelo-link-socialtooltip'][4]) ?>">
		        <i class="fa fa-envelope"></i>
		    </a>
		</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][5])) : ?>
	<li class="ig_share_buttom">
			<a target="_blank"  href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][5]) ?>">
			    <i class="fa fa-instagram"></i>
			</a>
	</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][6])) : ?>
	<li class="ig_share_buttom">
			<a target="_blank" href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][6]) ?>">
			    <i class="fa fa-pinterest"></i>
			</a>
	</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][7])) : ?>
	<li class="ig_share_buttom">
			<a target="_blank" class="gelotooltip" href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][7]) ?>" data-placement="top" data-toggle="tooltip" title="Tumblr" data-original-title="Tumblr">
			    <i class="fa fa-tumblr"></i>
			</a>
	</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][8])) : ?>
	<li class="ig_share_buttom">
			<a target="_blank" class="gelotooltip" href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][8]) ?>" data-placement="top" data-toggle="tooltip" title="Rss" data-original-title="Rss">
			    <i class="fa fa-rss"></i>
			</a>
	</li>
	<?php endif; ?>
	<?php  if (!empty($ilgelo_options['ilgelo-link-socialtooltip'][9])) : ?>
	<li class="ig_share_buttom">
			<a target="_blank" class="gelotooltip" href="<?php echo esc_url($ilgelo_options['ilgelo-link-socialtooltip'][9]) ?>" data-placement="top" data-toggle="tooltip" title="Bloglovin" data-original-title="Bloglovin">
			    <i class="fa fa-heart"></i>
			</a>
	</li>
	<?php endif; ?>
</ul>
<?php endif; ?>




	<div id="instagram-footer">
		<?php  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('instagram_footer') ) ?>
	</div>













<?php if ($ilgelo_options['ilgelo-central-footer']==1) : ?>
	<footer class="central_footer medium_padding widget_central">
		<div class="container">

		     <!--  LOGO -->
		    	<div class="logo-footer margin-10">
		      	<a class="aligncenter" href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"  class="button_slide_logo nav-to">
	  		        <img class="aligncenter" src="<?php echo esc_url($ilgelo_options['ilgelo-logofooter-retina']['url']); ?>" height="<?php echo esc_attr($ilgelo_options['ilgelo-logo-footer-size-height']) ?>" width="<?php echo esc_attr($ilgelo_options['ilgelo-logo-footer-size-width']) ?>" title="<?php bloginfo('name'); ?>"  alt="<?php bloginfo('name'); ?>">
		      	</a>
		    	</div><!-- end .logo-footer -->

	    </div><!-- .container-->
	</footer>
<?php endif;   ?>

<?php if ($ilgelo_options['ilgelo-footer-widget']==1) : ?>
	<footer class="medium_padding">
		<div class="container">
			<div class="row column">
			<?php //loads sidebar-footer.php
				get_sidebar( 'footer' );
			?>
               </div><!--  row -->
	    </div><!-- .container-->
	</footer>
<?php endif;   ?>

<?php if ($ilgelo_options['ilgelo-subfooter']==1) : ?>
	<div class="sub_footer">
		<div class="container">
		      <div class="row">
                     <div class="xxsmall_padding textaligncenter">
					    <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <?php echo $ilgelo_options['ilgelo-text-subfooter'];?> </span>
				</div>
		      </div><!-- end .row -->
		</div><!-- end .container-fluid -->
	</div><!-- .sub_footer-->
<?php endif;   ?>

<?php if ($ilgelo_options['ilgelo-sticky-sider']==1) : ?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		"use strict";
		jQuery('.sticky_cont, .sticky_sider').theiaStickySidebar({
			// Settings
			additionalMarginTop: 80
		});
	});
</script>
<?php endif;   ?>


<script type="text/javascript">
(function() {
    window.PinIt = window.PinIt || { loaded:false };
    if (window.PinIt.loaded) return;
    window.PinIt.loaded = true;
    function async_load(){
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = "http://assets.pinterest.com/js/pinit.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent)
        window.attachEvent("onload", async_load);
    else
        window.addEventListener("load", async_load, false);
})();
</script>

<!-- =============== //WORDPRESS FOOTER HOOK // =============== -->

<?php wp_footer();?>

</body>
</html>