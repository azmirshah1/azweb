<?php
/*
Template Name: Infinite Post
*/
?>
<?php get_header(); ?>

	<?php ilgelo_post_author() ?>
	<?php ilgelo_post_slide() ?>

	<div class="container container_up">
		<div id="blog"><?php echo ilgelo_blog(0); ?></div>
		<div class="clear"></div>

		<div style="display:none" id="blog-wait">
			<center><i class="fa fa-refresh fa-spin"></i></center>
		</div>

		<div class="load_more_post textaligncenter" id="blog-loadmore">
				<a class="button_cont  button_large" style="margin-top: 40px; margin-bottom: 30px;" href="javascript:ilgelo_blog_loadMore();">
					<?php echo __("VIEW MORE", "ilgelo"); ?>
				</a>
		</div>
	</div><!--  .container -->


	<script type="text/javascript">
		var _pagbs = 1;
		function ilgelo_blog_loadMore() {
			_pagbs+=1;
			jQuery("#blog-wait").css("display","block");
			jQuery("#blog-loadmore").css("display","none");
			jQuery.ajax({
				url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
				type:"POST",
				data: "action=ilgelo_blogsscroll&page_no="+_pagbs,
				success: function(html){
					jQuery("#blog-wait").css("display","none");
					if (html.trim()!="") {
						jQuery("#blog").append(html);
						jQuery("#blog-loadmore").css("display","block");
					}
				}
			});
		}
	</script>

<?php get_footer(); ?>