<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid grid-cols-12 mb-8 gap-8 border-b border-gray-300 dark:border-gray-100/25 items-center pb-8'); ?>>






	<div class="col-span-7 pr-8">
		<header class="entry-header">
			<?php
			if (is_sticky() && is_home() && ! is_paged()) {
				printf('%s', esc_html_x('Featured', 'post', '_bless'));
			}
			the_title(sprintf('<h2 class="news-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
			?>
		</header><!-- .entry-header -->



		<div <?php _bless_content_class('entry-content pb-4'); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="flex justify-between lg:items-center md:flex-col lg:flex-row lg:justify-between md:gap-4">
			<?php _bless_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-${ID} -->