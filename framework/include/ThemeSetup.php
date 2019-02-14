<?php

class clsThemeSetup {
	function __construct() {
		add_action('after_setup_theme', array($this, 'init'));
	}

	function init() {
		add_theme_support('title-tag');
	}
}

$indieground_theme = new clsThemeSetup();