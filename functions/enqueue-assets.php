<?php

add_action('wp_enqueue_scripts', 'wst_styles_and_scripts');
function wst_styles_and_scripts()
{
	wp_enqueue_style('wst-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap', false);
	wp_enqueue_script('custom-js', THEME_JS . '/index-min.js', ['jquery'], '1.0.0', true);
}