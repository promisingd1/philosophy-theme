<?php

require_once (get_theme_file_path('/inc/tgm.php'));
require_once (get_theme_file_path('/inc/attachments.php'));
require_once (get_theme_file_path('/widgets/social-icons-widget.php'));

if (site_url() == 'http://localhost/learnwithpromise') {
	define('VERSION', time());
} else {
	define('VERSION', wp_get_theme()->get("VERSION"));
}

function philosophy_theme_setup()
{
	load_theme_textdomain('philosophy-theme');
	add_theme_support('custom-logo');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'comment-form']);
	add_theme_support('post-formats', ['image', 'video', 'audio', 'link', 'gallery', 'quote']);
	add_editor_style('/assets/css/editor-style.css');

	register_nav_menu('philosophy_top_menu', __('Philosophy Menu', 'philosophy-theme'));
	register_nav_menus( array(
		'footer-menu-left' => __('Footer Left Menu', 'philosophy-theme'),
		'footer-menu-middle' => __('Footer Middle Menu', 'philosophy-theme'),
		'footer-menu-right' => __('Footer Right Menu', 'philosophy-theme'),
	) );
	add_image_size('philosophy-home-square', 320, 320, true);
}
add_action('after_setup_theme', 'philosophy_theme_setup');

function philosophy_assets()
{
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

function philosophy_paginate_links()
{
	global $wp_query;
	$links = paginate_links(array(
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type' => 'list',
		'mid_size' => 5
	));
	$links = str_replace("page-numbers", "pgn__num", $links);
	$links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
	$links = str_replace("next pgn__num", "pgn__next", $links);
	$links = str_replace("prev pgn__num", "pgn__prev", $links);
	echo $links;
}

remove_action('term_description', 'wpautop');

function philosophy_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Philosophy About Us Sidebar', 'philosophy-theme' ),
		'id'            => 'about-us',
		'description'   => __( 'This side bar is shown in the about us page', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Contact Map Sidebar', 'philosophy-theme' ),
		'id'            => 'contact-map',
		'description'   => __( 'This side bar is shown in the about us page', 'philosophy-theme' ),
		'before_widget' => '<div id="map-wrap %1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Contact Page Sidebar', 'philosophy-theme' ),
		'id'            => 'contact-info',
		'description'   => __( 'This side bar is shown in the about us page', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Footer Before Sidebar', 'philosophy-theme' ),
		'id'            => 'footer-before',
		'description'   => __( 'This is philosophy footer before sidebar, right side', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Footer Right', 'philosophy-theme' ),
		'id'            => 'footer-right',
		'description'   => __( 'This is philosophy footer right sidebar, right side', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Footer Left Bottom', 'philosophy-theme' ),
		'id'            => 'footer-left-bottom',
		'description'   => __( 'This is philosophy footer left bottom sidebar, left bottom side', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="s-footer__copyright %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Philosophy Header Social Sidebar', 'philosophy-theme' ),
		'id'            => 'header-social-sidebar',
		'description'   => __( 'This side bar is shown Header Left Section', 'philosophy-theme' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action('widgets_init', 'philosophy_sidebar');

function philosophy_search_form($home) {
	$home_url = home_url('/');
	$label = _e('Search for', 'philosophy-theme');
	$btn_label = _e('Search', 'philosophy-theme');
	$newform = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$home_url}">
  <label>
	   <span class="hide-content"><?php echo $label ?></span>
	   <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
  </label>
  <input type="submit" class="search-submit" value="{$btn_label}">
</form>
FORM;
	return $newform;
}
add_action('get_search_form', 'philosophy_search_form');
