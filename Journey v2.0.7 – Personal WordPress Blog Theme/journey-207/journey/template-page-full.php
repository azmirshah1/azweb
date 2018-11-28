<?php
/*
Template Name: Page Full
*/
?>
<?php get_header(); ?>


<div class="container-full">
    <div class="container container_up">
	    <div class="row page-content"> 


    <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
     <!--  <h2 style="text-align: center;"><?php the_title(); ?>  </h2>-->

                  <?php the_content();?>
                  <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'ilgelo').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
              <?php endwhile; ?>
              <?php endif; ?>
		
  


	    </div><!--  .row -->
	    
	    <div class="col-md-8 col-md-offset-2">
               <?php comments_template( '', true );  ?>
         </div>

    </div><!--  .container -->
</div><!--  .container-full -->
<?php get_footer(); ?>