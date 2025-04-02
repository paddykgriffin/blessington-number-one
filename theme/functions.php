<?php

/**
 * _bless functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _bless
 */

if (!defined('_BLESS_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('_BLESS_VERSION', '0.1.0');
}

if (!defined('_BLESS_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `_bless_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'_BLESS_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary dark:text-white'
	);
}

if (!function_exists('_bless_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _bless_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _bless, use a find and replace
		 * to change '_bless' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('_bless', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', '_bless'),
				'menu-2' => __('Footer Left Menu', '_bless'),
				'menu-3' => __('Footer Right Menu', '_bless'),
				'menu-4' => __('About Pages Menu', '_bless'),
				'menu-5' => __('Parents Pages Menu', '_bless'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);


		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		//remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', '_bless_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _bless_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Main Sidebar', '_bless'),
			'id' => 'sidebar',
			'description' => __('Here you can add widgets to the main sidebar.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s mb-8">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name' => __('News Sidebar', '_bless'),
			'id' => 'news-sidebar',
			'description' => __('Add widgets here on the latest news page.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s mb-8">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => __('About Sidebar', '_bless'),
			'id' => 'sidebar-about',
			'description' => __('Add widgets here to appear pages sidebar.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name' => __('Parents Sidebar', '_bless'),
			'id' => 'sidebar-parents',
			'description' => __('Add widgets here to appear pages sidebar.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => __('Contact Sidebar', '_bless'),
			'id' => 'sidebar-contact',
			'description' => __('Add widgets here to appear pages sidebar.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', '_bless_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function _bless_scripts()
{
	wp_enqueue_style('_bless-style', get_stylesheet_uri(), array(), _BLESS_VERSION);
	wp_enqueue_script('_bless-script', get_template_directory_uri() . '/js/script.min.js', array(), _BLESS_VERSION, true);
	wp_enqueue_script('_bless-custom-script', get_template_directory_uri() . '/js/custom.min.js', array(), _BLESS_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', '_bless_scripts');

/**
 * Enqueue the block editor script.
 */
function _bless_enqueue_block_editor_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'_bless-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			_BLESS_VERSION,
			true
		);
		wp_add_inline_script('_bless-editor', "tailwindTypographyClasses = '" . esc_attr(_BLESS_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', '_bless_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function _bless_tinymce_add_class($settings)
{
	$settings['body_class'] = _BLESS_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', '_bless_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
function wpse_remove_edit_post_link($link)
{
	return '';
}
add_filter('edit_post_link', 'wpse_remove_edit_post_link');


// 

/**
 * Excerpt length
 */
function custom_excerpt_length($length)
{
	return 20; // Set to 30 words
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


/**
 * Function to change continue reading to a string
 */
function custom_excerpt_more($more)
{
	return '..'; // Removes the default "..."
}
add_filter('excerpt_more', 'custom_excerpt_more');


/**
 * Wrap a class around the last word of a string
 */
function wrap_last_word($text, $class = "highlight")
{
	$words = explode(' ', $text);
	if (count($words) > 1) {
		$last_word = array_pop($words);
		return implode(' ', $words) . " <span class=\"$class\">$last_word</span>";
	}
	return $text; // Return unchanged if there's only one word
}

/**
 * Function custom link on the primary menu
 */
function add_primary_menu_link($atts, $item, $args, $depth)
{

	$menu_locations = ['menu-1']; // Define the menu locations

	if (in_array($args->theme_location, $menu_locations)) {
		$atts['class'] = 'primary-link'; // Add your custom class
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_primary_menu_link', 10, 4);



/**
 * Function custom link on the footer menus
 */
function add_menu_link_class($atts, $item, $args, $depth)
{

	$menu_locations = ['menu-2', 'menu-3']; // Define the menu locations

	if (in_array($args->theme_location, $menu_locations)) {
		$atts['class'] = 'py-1 block hover:text-tertiary transition-all duration-300 font-light'; // Add your custom class
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 4);


/**
 * Function add google fonts to wp-head
 */
function enqueue_google_fonts()
{
	wp_enqueue_style('google-quicksand', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');


/**
 * Function add google fonts to wp-head
 */
function enqueue_google_fonts2()
{
	wp_enqueue_style('google-source-sans', 'https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts2');


/**
 * Function add google icons to wp-head
 */
function enqueue_google_icons()
{
	wp_enqueue_style('google-material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');
}
add_action('wp_enqueue_scripts', 'enqueue_google_icons');



/**
 * Increase upload size
 */
function increase_upload_size()
{
	return 128 * 1024 * 1024; // 128MB
}
add_filter('upload_size_limit', 'increase_upload_size');


/**
 * Allow extra mine types
 */
function custom_upload_mimes($mimes)
{
	$mimes['mp4'] = 'video/mp4';
	return $mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');

/**
 * Hide admin bar
 */
add_filter('show_admin_bar', '__return_false');


function custom_search_form($form)
{
	$form = '
    <form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label class="sr-only">
           Search
        </label>
		 <input type="search" class="search-field" placeholder="' . esc_attr__('Search', '_bless') . '" value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit">
            <span class="material-symbols-outlined text-primary">search</span>
        </button>
    </form>';
	return $form;
}
add_filter('get_search_form', 'custom_search_form');


function custom_breadcrumbs()
{
	$separator = ' <span class="px-3 material-symbols-outlined text-stone-700 dark:text-white">chevron_right</span> ';
	echo '<nav class="breadcrumbs bg-gray-100 dark:bg-stone-900 py-2 "><div class="container flex items-center px-4 ">';

	if (!is_home() && !is_front_page()) {
		echo '<a href="' . home_url() . '">Home</a>' . $separator;

		if (is_category()) {
			echo single_cat_title('', false);
		} elseif (is_single()) {
			the_category(', ');
			echo $separator;
			the_title();
		} elseif (is_page()) {
			the_title();
		} elseif (is_404()) {
			echo '404';
		} elseif (is_search()) {
			echo 'Search results for "' . get_search_query() . '"';
		} elseif (is_archive()) {
			the_archive_title();
		}
	} else {
		echo '<a href="' . home_url() . '" class="text-stone-700">Home</a>' . $separator .
			'<span class="text-secondary">Latest News</span>'; // Optional message for index.php
	}

	echo '</div></nav>';
}
