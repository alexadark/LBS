<?php

if (!defined('ABSPATH')) {
	exit;
}

//Initialize theme constants
function wst_init_constants()
{
	$theme = wp_get_theme();

	define('THEME_NAME', $theme->get('Name'));
	define('THEME_URL', $theme->get('ThemeURI'));
	define('THEME_VERSION', $theme->get('Version'));
	define('TEXT_DOMAIN', $theme->get('TextDomain'));

	define('THEME_DIR', get_template_directory());
	define('THEME_URI', get_template_directory_uri());
	define('THEME_IMG', THEME_URI . '/assets/img');
	define('THEME_JS', THEME_URI . '/assets/js');
}

wst_init_constants();