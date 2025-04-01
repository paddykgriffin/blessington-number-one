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


	</div><!-- .entry-content sample -->



</article><!-- #post-<?php the_ID(); ?> -->