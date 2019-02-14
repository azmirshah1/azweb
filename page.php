<?php get_header(); ?>

         <div class="container container_up">
         <div class="row page-content">

<h1 class="textaligncenter"><?php the_title(); ?> </h1>	          


              <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
                  <?php the_content();?>
                  <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'ilgelo').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
              <?php endwhile; ?>
              <?php endif; ?>
              

         </div>
         

         
         </div>
         
         <div class="col-md-8 col-md-offset-2">
               <?php comments_template( '', true );  ?>
         </div>





<?php get_footer(); ?>

