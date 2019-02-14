<?php
	
	
	/*
	*
	*	Social
	*	------------------------------------------------
	*	Indieground
	*
	*/
	
	class ilgelo_wSocial extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'ilgelo clearfix', 'description' => __( 'Displays Social Icons in navigation bar!', 'ilgelo') );
			parent::__construct('lw_social', __('INDIEGROUND Social', 'ilgelo'), $widget_ops);
			$this->alt_option_name = 'ilgelo';
		}

		// Creating widget front-end
		public function widget( $args, $instance ) {
			global $ilgelo_options;

			$title = apply_filters( 'widget_title', $instance['title'] );

			echo "<div class='ig_widget'>";
			if (!empty($title)) {
				echo "<div class='fancy_one'><span>";
				echo esc_attr($title)."<br>";
				echo "</span></div>";
			}
			echo "<div class='box_widget_social'>";



			echo "<div class='ig-social-widget textaligncenter margin-15top'>";
			$icons_social_library = "1";
			if (!empty($ilgelo_options['ilgelo-social-library'])) {
				$icons_social_library=$ilgelo_options['ilgelo-social-library'];
			}
			if ($icons_social_library=="1") {
				/* Mono Social Icons  http://drinchev.github.io/monosocialiconsfont/ */
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-facebook'],"<span class='symbol'>roundedfacebook</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-twitter'],"<span class='symbol'>roundedtwitterbird</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-google'],"<span class='symbol'>roundedgoogleplus</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-behance'],"<span class='symbol'>roundedbehance</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-dribbble'],"<span class='symbol'>roundeddribble</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-linkedin'],"<span class='symbol'>roundedlinkedin</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-flickr'],"<span class='symbol'>roundedflickr</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-vimeo'],"<span class='symbol'>roundedvimeo</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-soundcloud'],"<span class='symbol'>roundedsoundcloud</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-deviantart'],"<span class='symbol'>roundeddeviantart</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-instagram'],"<span class='symbol'>roundedinstagram</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-pinterest'],"<span class='symbol'>roundedpinterest</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-youtube'],"<span class='symbol'>roundedyoutube</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tumblr'],"<span class='symbol'>roundedtumblr</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-rss'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-etsy'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-bandcamp'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-500px'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tripadvisor'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-snapchat'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-spotify'],"<span class='symbol'>roundedblip</span>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-email'],"<span class='symbol'>roundedblip</span>");

			} else if ($icons_social_library=="2") {
				/* Fort Awesome Social Icons  http://fortawesome.github.io/Font-Awesome/icon/ */
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-facebook'],"<i class='fa fa-facebook-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-twitter'],"<i class='fa fa-twitter-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-google'],"<i class='fa fa-google-plus-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-behance'],"<i class='fa fa-behance-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-dribbble'],"<i class='fa fa-dribbble'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-linkedin'],"<i class='fa fa-linkedin-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-flickr'],"<i class='fa fa-flickr'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-vimeo'],"<i class='fa fa-vimeo'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-soundcloud'],"<i class='fa fa-soundcloud'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-deviantart'],"<i class='fa fa-deviantart'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-instagram'],"<i class='fa fa-instagram'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-pinterest'],"<i class='fa fa-pinterest-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-youtube'],"<i class='fa fa-youtube-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tumblr'],"<i class='fa fa-tumblr-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-rss'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-etsy'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-bandcamp'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-500px'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-tripadvisor'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-snapchat'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-spotify'],"<i class='fa fa-rss-square'></i>");
				echo indie_social_getecho_header($ilgelo_options['Ilgelo-social-email'],"<i class='fa fa-rss-square'></i>");
			}
			echo "</div>";



			echo "</div>";
	        echo "<div class='tit_widget_bottom'></div>";
			echo "</div>";
			echo "<div class='clear'></div>";
		}

		// Widget Backend
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'New title', 'ilgelo' );
			}

			// Widget admin form
			?>
			<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title:', 'ilgelo'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}


		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}
} // Class wpb_widget ends here


function wsocial_getecho($url_social, $icon_social) {
	$output = "";
	if ($url_social!="") {
		$output.="		<a href='".$url_social."' target='_blank'>\n";
		$output.="	<span class='symbol'>".$icon_social."</span>\n";
		$output.="		</a>\n";
	}
	return $output;
}


?>