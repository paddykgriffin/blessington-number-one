<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

		<?php if (! is_page()) : ?>
			<div class="entry-meta py-4 mb-4 flex justify-center items-center">
				<?php _bless_entry_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php _bless_post_thumbnail(); ?>

	<div <?php _bless_content_class('entry-content pt-6'); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Continue reading<span class="sr-only"> "%s"</span>', '_bless'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', '_bless'),
				'after'  => '</div>',
			)
		);
		?>


	</div><!-- .entry-content -->

	<footer class="entry-footer py-4 mb-4 bg-indigo-500 flex justify-between items-center">
		<?php _bless_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->