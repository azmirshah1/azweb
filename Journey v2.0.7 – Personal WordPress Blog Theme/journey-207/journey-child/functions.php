<?php
/**
 * Indieground Child theme functions
 */


//==========================================================================
//=========================  Indieground Enqueue  ============================
//==========================================================================


function ilgelo_dequeue_parent_css() {
	//wp_dequeue_style("custom-css");
}
add_action( "wp_enqueue_scripts", "ilgelo_dequeue_parent_css");



// Reorder parent css
function ilgelo_reorder_child_css() {
	wp_enqueue_style( "parent-style", get_template_directory_uri()."/style.css");
}
add_action( "wp_enqueue_scripts", "ilgelo_reorder_child_css", 11);



//==========================================================================
//======================== Textdomain Child Theme ==========================
//==========================================================================

load_child_theme_textdomain(
    "ilgelo",
    get_stylesheet_directory()."/languages"
);








?>