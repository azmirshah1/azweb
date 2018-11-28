<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>


<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
            <div class="container container_up">
                <div class="row">
                	<div class="col-md-9">
                		<?php //edit_post_link( __('Edit', 'ilgelo'), '<span class="edit-post">[', ']</span>' ); ?>
        				<?php the_content(); ?>
                    
                    <section class="widget widget_archives">
                        <div class="widget_title">
                            <h4><?php _e('All Pages', 'ilgelo'); ?></h4>
                        </div>
                       <ul><?php wp_list_pages('title_li='); ?></ul> 
                    </section>
                    
                    <section class="widget widget_archives">
                        <div class="widget_title">
                            <h4><?php _e('Latest 30 Posts', 'ilgelo'); ?></h4>
                        </div>
                       <ul><?php wp_get_archives('type=postbypost&limit=30&show_post_count=1'); ?></ul> 
                    </section>
                    
                    </div>
                    
                    <div class="col-md-3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bolg-sidebar') ) : ?>
        <div class="widget">
            <h4>Widget Area</h4>
            <p>This section is widgetized. To add widgets here, go to the <a href="<?php echo admin_url(); ?>widgets.php">Widgets</a> panel in your WordPress admin, and add the widgets you would like to <strong>Right Sidebar</strong>.</p>
            <p><small>*This message will be overwritten after widgets have been added</small></p>
        </div>
    <?php endif; ?>
                    </div>
                  
                </div>
            </div>
        
    <?php endwhile; endif; ?>
</div>
    
<?php get_footer(); ?>