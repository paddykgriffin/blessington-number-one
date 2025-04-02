<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _bless
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>



</head>

<body <?php body_class('bg-white text-black dark:bg-stone-950 dark:text-white font-display'); ?>>

	<?php wp_body_open(); ?>

	<div id="site-wrapper">
		<a href="#content" class="sr-only"><?php esc_html_e('Skip to content', '_bless'); ?></a>

		<?php get_template_part('template-parts/layout/header/header', 'content'); ?>

		<main id="main">