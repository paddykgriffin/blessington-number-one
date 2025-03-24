<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid grid-cols-2 max-w-7xl items-center mx-auto gap-16  md:py-32'); ?>>





	<div <?php _bless_content_class('home-block'); ?>>

		<header class="entry-header">
			<?php
			if (!is_front_page()) {
				the_title('<h1 class="entry-title">', '</h1>');
			} else {
				the_title('<h2 class="entry-title not-prose">', '</h2>');
			}
			?>
		</header><!-- .entry-header -->
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

	<div class="div">
		<?php _bless_post_thumbnail(); ?>
	</div>



	<?php if (get_edit_post_link()): ?>

		<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Edit <span class="sr-only">%s</span>', '_bless'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		?>

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->