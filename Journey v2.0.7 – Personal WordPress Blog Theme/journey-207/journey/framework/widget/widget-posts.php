<?php

	/*
	*
	*	Custom Posts Widget
	*	------------------------------------------------
	*	Indieground
	*
	*/

	// Register widget
	add_action( 'widgets_init', 'ilgelo_recent_posts' );
	function ilgelo_recent_posts() { return register_widget('ilgelo_posts'); }

	class ilgelo_posts extends WP_Widget {
		function __construct() {
			parent::__construct( 'ilgelo_custom_posts', $name = 'INDIEGROUND Recent Posts' );
		}

		function widget( $args, $instance ) {
			global $post;
			extract($args);

			// Widget Options
			$title 	 = apply_filters('widget_title', $instance['title'] ); // Title
			$number	 = $instance['number']; // Number of posts to show

			echo $before_widget;

		    if ( $title ) echo $before_title . $title . $after_title;

			$recent_posts = new WP_Query(
				array(
					'post_type' => 'post',
					'posts_per_page' => $number,
					'tax_query' => array(
	 					array(
	 					'taxonomy' => 'post_format',
						 'field' => 'slug',
	 					'terms' => array( 'post-format-quote','post-format-link' ),
	 					'operator' => 'NOT IN',
	 					),
	 					)
					)
			);

			if( $recent_posts->have_posts() ) :

			?>

			<ul class="ig_recent_posts">

				<?php while( $recent_posts->have_posts()) : $recent_posts->the_post();

					$post_title = get_the_title();
					$post_author = get_the_author_link();
					$post_date = get_the_date();
					$post_categories = get_the_category_list();
					$post_comments = get_comments_number();
					$post_permalink = get_permalink();

					$image_wp = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'indie-small-posts');
					$image_url = $image_wp[0];


					?>
					<li>
						<figure>
							<a class="ig_bg_images" href="<?php echo esc_url($post_permalink); ?>">
								<?php if ($image_url) { ?>
									<img src="<?php echo esc_url($image_url); ?>"  width="90" height="70">
								<?php } ?>
							</a>
						</figure>
						<div class="ig_recent_post_details">
							<a class="ig_recent_post_title" href="<?php echo esc_url($post_permalink); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_attr($post_title); ?></a>
							<span><?php echo esc_attr($post_date) ?></span>
						</div>
					</li>

				<?php wp_reset_postdata(); endwhile; ?>
			</ul>

			<?php endif; ?>

			<?php

			echo $after_widget;
		}

		/* Widget control update */
		function update( $new_instance, $old_instance ) {
			$instance    = $old_instance;

			$instance['title']  = strip_tags( $new_instance['title'] );
			$instance['number'] = strip_tags( $new_instance['number'] );
			return $instance;
		}

		/* Widget settings */
		function form( $instance ) {

			    // Set defaults if instance doesn't already exist
			    if ( $instance ) {
					$title  = $instance['title'];
			        $number = $instance['number'];
			    } else {
				    // Defaults
					$title  = '';
			        $number = '5';
			    }

				// The widget form
				?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo __( 'Title:', 'ilgelo' ); ?></label>
					<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php echo __( 'Number of posts to show:', 'ilgelo' ); ?></label>
					<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
				</p>
		<?php
		}

	}

?>