<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid xl:grid-cols-12 mb-8 gap-4 md:gap-8 border border-gray-300 dark:border-gray-100/25 rounded-2xl md:rounded-l-2xl items-center'); ?>>
	<div class="xl:col-span-5">
		<?php _bless_post_thumbnail(); ?>
	</div>
	<div class="xl:col-span-7 md:pr-8">
		<header class="entry-header post-header px-4 xl:px-0">
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
		</header>
		<!-- .entry-header -->

		<div <?php _bless_content_class('entry-content md:pb-4 px-4 xl:px-0'); ?>>

			<?php echo get_the_excerpt();
			wp_link_pages(
				array(
					'before' => '<div>' . __('Pages:', '_bless'),
					'after' => '</div>',
				)
			); ?>



		</div>
		<!-- .entry-content -->

		<footer class="flex justify-between lg:items-center md:flex-col lg:flex-row lg:justify-between gap-2 md:gap-4 md:pt-6 px-4 xl:px-0 py-6 xl:py-0">
			<?php _bless_entry_footer(); ?>
		</footer>
		<!-- .entry-footer -->
	</div>
</article><!-- #post-${ID} -->