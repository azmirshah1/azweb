<?php
/*
Template Name: Parallax Blog
*/
?>
<?php get_header(); ?>
	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

<!--
	<div class="container container_up">
	<div class="row page-content">
        <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
              <?php the_content();?>
              <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'ilgelo').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			  <?php endwhile; ?>
        <?php endif; ?>
</div>
	</div>
-->

<div class="container-full">
	<div id="blog"><?php echo ilgelo_blogpx(0); ?></div>
	<div class="clear"></div>
	<div style="display:none" id="blog-wait">
		<center><i class="fa fa-refresh fa-spin"></i></center>
	</div>
	<div class="load_more_post textaligncenter" id="blog-loadmore">
		<a class="button_cont  button_large" style="margin-top: 40px; margin-bottom: 30px;" href="javascript:ilgelo_blogpx_loadMore();">
			<?php echo __("VIEW MORE", "ilgelo"); ?>
		</a>
	</div>
</div><!--  .container -->

<script type="text/javascript">
	var _pagbs = 1;
	function ilgelo_blogpx_loadMore() {
		_pagbs+=1;
		jQuery("#blog-wait").css("display","block");
		jQuery("#blog-loadmore").css("display","none");
		jQuery.ajax({
			url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
			type:"POST",
			data: "action=ilgelo_blogsscrollpx&page_no="+_pagbs+"&page_id=<?php echo the_ID() ?>",
			success: function(html){
				jQuery("#blog-wait").css("display","none");
				if (html.trim()!="") {
					var el = jQuery(html);
					el.imagesLoaded(function () {
						console.log("stocazzo");
						jQuery('#blog').append(el);
						jQuery(".parallax-element").each(function(index) {
							jQuery(this).parallax();
							jQuery(window).trigger("resize");
						});
						jQuery("#blog-loadmore").css("display","block");
					});
				}
			}
		});
	}
	//jQuery(".parallax-element").parallax();
</script>


<?php get_footer(); ?>