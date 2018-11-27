<?php
/*
Template Name: Page Sidebar Left
*/
?>
<?php get_header(); ?>


<div class="container container_up">
    <div class="row"> 
			
			
         <div class="col-md-3 sticky_sider">
<?php  if ($ilgelo_options['ilgelo-special-authors']==1) : ?>
          <?php include(TEMPLATEPATH."/template/sidebar/indie-sidebar.php");?>
<?php endif; ?> 
                   <?php get_sidebar( $name ); ?>
         </div><!--  END col-md-3 -->
	


         <div class="col-md-9  page-content">
<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
     <!--  <h2 style="text-align: center;"><?php the_title(); ?>  </h2>-->

             <?php the_content();?>
             <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'ilgelo').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
         <?php endwhile; ?>
         <?php endif; ?>
         
          <?php comments_template('', true);  ?>

         </div><!--  END col-md-9 -->



    </div><!--  .row -->
</div><!--  .container -->
<?php get_footer(); ?>