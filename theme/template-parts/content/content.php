<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid grid-cols-12 mb-8 gap-8 border border-gray-300 dark:border-gray-100/25 rounded-l-2xl items-center'); ?>>


	<div class="col-span-5">
		<?php _bless_post_thumbnail(); ?>

	</div>
	<div class="col-span-7 pr-8">
		<header class="entry-header post-header ">
			<?php
			if (is_sticky() && is_home() && !is_paged()) {
				printf('<span">%s</span>', esc_html_x('Featured', 'post', '_bless'));
			}
			if (is_singular()):
				the_title('<h1 class="entry-title">', '</h1>');
			else:
				the_title(sprintf('<h2 class="news-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
			endif;
			?>
		</header><!-- .entry-header -->

		<div <?php _bless_content_class('entry-content pb-4'); ?>>

			<?php echo get_the_excerpt();
			wp_link_pages(
				array(
					'before' => '<div>' . __('Pages:', '_bless'),
					'after' => '</div>',
				)
			); ?>
		</div><!-- .entry-content -->

		<footer class="flex justify-between lg:items-center md:flex-col lg:flex-row lg:justify-between md:gap-4 pt-6">

			<?php _bless_entry_footer(); ?>
			<?php _bless_permalink(); ?>
		</footer><!-- .entry-footer -->

		</footer>



</article><!-- #post-${ID} -->