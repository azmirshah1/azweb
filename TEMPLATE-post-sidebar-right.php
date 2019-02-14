<?php
/*
Template Name Posts: Post Sidebar Right
*/
?>

<?php get_header(); ?>


<?php
	if (have_posts()):
		while(have_posts()) : the_post();
			ilgelo_format_single_headerparallax();
			$post_id = get_the_ID();
			$if_class_up = "";
			$if_title = "";
			$images = null;
			$bg_twitter_status = "";

			if (class_exists('acf')) {
				$if_class_up = get_field('header_parallax_post');
				$if_title = get_field('header_parallax_post');
				$images = get_field('gallery_post');
				$bg_twitter_status = get_field('bg_twitter_status_post');
			}

?>
			<div class="container container_up">
				<div class="row">
					<div class="col-md-9">
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php

								if (class_exists('acf') && get_field("iframe_video_music")) {
									the_field('iframe_video_music');
								} else if (class_exists('acf') && get_field("twitter_status_post")) {
									echo"<div class='twitter_status_wrapper'>";
									echo "     <section class='main_section cover_section  small_padding'style='background-image: url( ".$bg_twitter_status." ); background-repeat: no-repeat;'>";
									the_field('twitter_status_post');
									echo "     </section>";
									echo "</div>";
								} else if ($images) {
									echo "<div class='slide_post owl-carousel'>";
									foreach( $images as $image ) {
										 echo "<div class='item'>";
										 echo "<img class='lazyOwl img_full_responsive grad_img' src='".$image['sizes']['indie-image-slide']."' alt='".$image['alt']."'/>	";
										 echo "</div>";
										 }
									echo "</div>";
								} else if (class_exists('acf') && get_field('featured_image_post')=="1") {
									echo get_the_post_thumbnail($post_id, 'image-featured', array('class' => 'img_full_responsive'));
								}
							?>

	<div class="blog-post-single-content margin-50">
								<?php	if (empty($if_title)) {
										echo '<div class="title-content">';

										echo '<div class="textaligncenter subtitle_post_standard">';
										echo '     '.the_category('&nbsp;').'';
										echo '</div>';
										echo ' <h1 class="textaligncenter title_post_standard entry-title">';
										echo '     '.the_title().'';
										echo '</h1>';
										echo '</div>';
										}
								?>

								<?php echo ilgelo_format_metapost(TEMPLATE_BLOG_CLASSIC_FULL); ?>

								<?php the_content();?>




<?php if($ilgelo_options['ilgelo-ico-share']==1): ?>
<div class='footer_classic_post margin-10top'>
	<div class='col-md-12'>
	          <div class='textaligncenter'>
				<?php echo ilgelo_format_postsocialshare($template); ?>
			</div><!-- End .textaligncenter-->
	</div><!--  col-md-6  -->
</div><!--  footer_classic_post  -->
<?php endif; ?>




<div class='indie_tag fancy_one textaligncenter margin-40top'>
	<span><?php echo __('TAGS', 'ilgelo' ); ?></span>
</div>

<?php the_tags( '<ul class="post_tag"><li>', '</li><li>', '</li></ul>' ); ?>



									</div><!-- .blog-post-single-content -->










<?php if($ilgelo_options['ilgelo-next-prev-post']==1): ?>
<!-- /////////  Start previous/next post link  /////////  -->
<div class="ig_navigation margin-40">
	<?php
		$prevPost = get_previous_post();
		if ($prevPost) {
			$prevthumbnail = get_the_post_thumbnail($prevPost->ID,'indie-small-posts', array(105,65) );
			$prevdate = get_the_date("",$prevPost->ID);
	?>
		<div class='cont_prev_left'>
			<div>
				<div class="tit_prev">
					<span><?php previous_post_link(
                            '%link',
                            '&lt; ' . __('PREVIOUS POST', 'ilgelo') . ''
                            ); ?>
                         </span>
				</div>
				<div class="img_navigation_post">
					<?php previous_post_link('%link', $prevthumbnail); ?>
				</div>

				<div class="title_navigation_post">
					<h5><?php previous_post_link('<strong>%link</strong>'); ?></h5>
					<p class="r-p-date"><?php echo $prevdate; ?></p>
				</div>
			</div>
		</div><!--  cont_prev_left  -->
	<?php } ?>
	<?php
		$nextPost = get_next_post();
		if ($nextPost) {
			$nextthumbnail = get_the_post_thumbnail($nextPost->ID,'indie-small-posts', array(105,65) );
			$nextdate = get_the_date("",$nextPost->ID);

	?>
		<div class='cont_next_right'>
			<div>
				<div class="tit_next">
					<span><?php next_post_link('%link',
							'' . __('NEWER POST', 'ilgelo') . ' &gt;'
							 ); ?>
					</span>
				</div>
				<div class="title_navigation_post_r">
					<h5><?php next_post_link('<strong>%link</strong>'); ?></h5>
					<p class="r-p-date"><?php echo $nextdate; ?></p>						</div>
				<div class="img_navigation_post_r">
					<?php next_post_link('%link', $nextthumbnail); ?>
				</div>
			</div>
		</div><!--  cont_next_right  -->
	<?php } ?>


</div> <!-- end ig_navigation -->
<?php endif; ?>






<!-- ///////// Related Post  /////////-->


<?php if($ilgelo_options['ilgelo-related-post']==1): ?>
	<?php ilgelo_post_related(); ?>
<?php endif; ?>




<!-- ///////// About Author  /////////-->
							<div class="content-author">
								<?php if($ilgelo_options['ilgelo-info-author']==1): ?>
									<div class="margin-50">
										<div class="box_author">

<div class='fancy_one'>
	<span><?php echo __('WRITTEN BY', 'ilgelo' ); ?></span>
</div>

											<div class="author-img-left">
												<?php echo get_avatar( get_the_author_meta('ID'), 100 ); ?>
											</div>

											<div class="author-description">
												<h4><?php the_author(); ?></h4>
												<p> <?php the_author_meta('description') ?> </p>


<div class='footer_classic_post'>
	          <div class='textalignleft'>
				<?php echo ilgelo_format_postsocialshare($template); ?>
			</div><!-- End .textaligncenter-->
</div><!--  footer_classic_post  -->

											</div>

											<div class="clear"></div>
										</div>
									</div>
								<?php endif; ?><!-- End About Author -->
							</div>



								<?php comments_template('', true); ?>




						</div><!--  .post_class -->
					</div><!--  .col-md-9 -->

					<div class="col-md-3 sticky_sider">
						<?php  if ($ilgelo_options['ilgelo-special-authors']==1) : ?>
						          <?php include(TEMPLATEPATH."/template/sidebar/indie-sidebar.php");?>
						<?php endif; ?>
						<?php get_sidebar( $name ); ?>
					</div><!--  .col-md-3 -->
				</div>
			</div>

		</div>
	<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>