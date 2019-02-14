<?php
class ThemeSidebar {

	public function __construct() {
		add_action( 'admin_init', array($this, 'sidebarMetaBox'));
		add_action( 'save_post', array($this, 'saveSidebar'));
	}

	public function sidebarMetaBox() {
		add_meta_box("sidebar-meta", "Sidebar", array(&$this, 'sidebarMetaOptions'), "post", "side", "low");
		add_meta_box("sidebar-meta", "Sidebar", array(&$this, 'sidebarMetaOptions'), "page", "side", "low");
	}



	public function sidebarMetaOptions() {
		global $post;
		global $wp_registered_sidebars;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		$custom = get_post_custom($post->ID);
		$sidebar = "";
		if ($custom) {
			$sidebar = $custom["sidebar"][0];
		}
?>
		<label>Sidebar:</label>
		<select name="sidebar">
			<?php
			foreach($wp_registered_sidebars as $bar) {
				$bar_name = $bar['name'];
			?>
				<option value="<?php echo esc_attr($bar_name); ?>" <?php if($bar_name == $sidebar) { ?> selected="selected" <?php } ?>><?php echo esc_attr($bar_name); ?></option>
			<?php

			}
			?>
		</select>
    <?php
	}

	public function saveSidebar(){
		global $post;

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
			return $post_id;
		}else{
			if (isset($_POST["sidebar"])) {
				update_post_meta($post->ID, 'sidebar', $_POST["sidebar"]);
			}
		}
	}



}

$sidebar = new ThemeSidebar();
?>
