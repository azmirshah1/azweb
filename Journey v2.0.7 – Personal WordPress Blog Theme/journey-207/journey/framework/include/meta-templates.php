<?php
add_action("admin_menu", "ilgelo_metabox_template_add");
add_action("save_post", "ilgelo_metabox_template_save");
add_filter("single_template", "ilgelo_metabox_template_filtersingle");

function ilgelo_metabox_template_add() {
	$post_types = array("post");
	foreach ($post_types as $i => $type) {
		add_meta_box("ilgelo", __("Post Template", "indieground"), "ilgelo_metabox_template_render", $type, "side");
	}
}
function ilgelo_metabox_template_render($post) {
	$templates=ilgelo_get_post_templates();
	$custom_template = ilgelo_get_custom_post_template($post->ID);
	echo "<label class='hidden' for='page_template'>".__( 'Post Template', 'custom-post-templates' )."</label>";
	if ($templates){
		echo "<select name='ilgelo_customposttemplate' id='ilgelo_customposttemplate'>";
		echo "<option";
		echo " value='default' ";
		if (!$custom_template) {
			echo " selected='selected' ";
		}
		echo ">".__('Default Template','ilgelo')."</option>";
		foreach( $templates AS $filename => $name ) {
			echo "<option value='".$filename."'";
			if ($custom_template==$filename) {
				echo " selected='selected' ";
			}
			echo ">".$name."</option>";
		}
		echo "</select>";
	} else {
		echo "<p>". __("This theme has no available custom post templates", "custom-post-templates")."</p>";
	}
}
function ilgelo_metabox_template_save($post_id) {
	if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
		return "";
	}
	if (!isset($_POST["ilgelo_customposttemplate"]))
		return (isset($post_id)) ? $post_id : 0;
	update_post_meta($post_id, "wpilgelo_posttemplate", $_POST["ilgelo_customposttemplate"]);
	return $post_id;
}

function ilgelo_get_post_templates() {
	$theme = wp_get_theme();
	$post_templates = array();
	$files = (array) $theme->get_files( 'php', 1 );
	foreach ( $files as $file => $full_path ) {
		$headers = get_file_data( $full_path, array( 'Template Name Posts' => 'Template Name Posts' ) );
		if ( empty( $headers['Template Name Posts'] ) )
			continue;
		$post_templates[ $file ] = $headers['Template Name Posts'];
	}
	return $post_templates;
}
function ilgelo_get_custom_post_template($post_id) {
	$custom_template = get_post_meta($post_id, "wpilgelo_posttemplate", true);
	return $custom_template;
}


function ilgelo_metabox_template_filtersingle($template) {
	global $wp_query;
	$post_id = $wp_query->post->ID;
	$template_file = ilgelo_get_custom_post_template($post_id);

	if (!$template_file || $template_file=="default") {
		$template_file=$template;
	}

	if (file_exists(trailingslashit(get_stylesheet_directory()).$template_file)) {
		$template_file= get_stylesheet_directory().DIRECTORY_SEPARATOR.$template_file;
	} else if (file_exists(get_stylesheet_directory().DIRECTORY_SEPARATOR.$template_file)) {
		$template_file=get_stylesheet_directory().DIRECTORY_SEPARATOR.$template_file;
	}

	return $template_file;
}