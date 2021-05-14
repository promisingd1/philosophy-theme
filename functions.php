<?php
if(site_url() == 'http://localhost/learnwithpromise' ){
	define('VERSION', time());
} else {
	define('VERSION', wp_get_theme()->get("VERSION"));
}
function philosophy_theme_setup() {
	load_theme_textdomain('philosophy-theme');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'comment-form']);
	add_theme_support('post-formats', ['image', 'video', 'audio', 'link', 'gallery', 'quote']);
	add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'philosophy_theme_setup');

function philosophy_assets() {
	wp_enqueue_style('fontawesome-css', get_theme_file_uri('assets/css/font-awesome/font-awesome.css'), null, '1.0');
	wp_enqueue_style('fonts-css', get_theme_file_uri('assets/css/fonts.css'), null, '0.0');
	wp_enqueue_style('base-css', get_theme_file_uri('assets/css/base.css'), null, '1.0');
	wp_enqueue_style('vendor-css', get_theme_file_uri('assets/css/vendor.css'), null, '1.0');
	wp_enqueue_style('main-css', get_theme_file_uri('assets/css/main.css'), null, '1.0');
	wp_enqueue_style('philosophy-css', get_stylesheet_uri(), 'null', VERSION);

	wp_enqueue_script('modernizer-js', get_theme_file_uri('assets/js/modernizr.js'), null, '1.0', false);
	wp_enqueue_script('base-js', get_theme_file_uri('assets/js/pace.min.js'), null, '1.0', false);
	wp_enqueue_script('plugins-js', get_theme_file_uri('assets/js/plugins.js'), ['jquery'], '1.0', true);
	wp_enqueue_script('main-js', get_theme_file_uri('assets/js/main.js'), ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'philosophy_assets');