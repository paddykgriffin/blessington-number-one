<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (!is_front_page()) {
			the_title('<h1 class="entry-title">', '</h1>');
		} else {
			the_title('<h2 class="entry-title">', '</h2>');
		}
		?>
	</header><!-- .entry-header -->
	<div <?php _bless_content_class('entry-content'); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', '_bless'),
				'after' => '</div>',
			)
		);
		?>
	</div>
	<!-- .entry-content sample -->
</article><!-- #post-<?php the_ID(); ?> -->