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
		'prose prose-neutral max-w-none prose-a:text-primary'
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
				'menu-4' => __('Subpage Menu', '_bless'),
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
		remove_theme_support('block-templates');
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
			'name' => __('Footer', '_bless'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your footer.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s text-center mx-auto">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => __('Content Pages', '_bless'),
			'id' => 'sidebar-2',
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

// 

/**
 * Function to change continue reading to a string
 */
function custom_excerpt_more($more)
{
	return '..'; // Removes the default "..."
}
add_filter('excerpt_more', 'custom_excerpt_more');


function wrap_last_word($text, $class = "highlight")
{
	$words = explode(' ', $text);
	if (count($words) > 1) {
		$last_word = array_pop($words);
		return implode(' ', $words) . " <span class=\"$class\">$last_word</span>";
	}
	return $text; // Return unchanged if there's only one word
}

function add_menu_link_class($atts, $item, $args, $depth)
{
	if ($args->theme_location === 'menu-2') { // Change 'primary' to your menu location
		$atts['class'] = 'py-1 block hover:text-tertiary transition-all duration-300'; // Add your custom class
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 4);

function add_menu_link_class2($atts, $item, $args, $depth)
{
	if ($args->theme_location === 'menu-3') { // Change 'primary' to your menu location
		$atts['class'] = 'py-1 block hover:text-tertiary transition-all duration-300'; // Add your custom class
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class2', 10, 4);