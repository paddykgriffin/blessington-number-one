<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

get_header();
?>
<section id="archive-posts" class="posts py-8 lg:py-16">
	<div class="container mx-auto px-4 py-8">
		<div class="grid grid-cols-12 gap-8">
			<div class="col-span-8">
				<?php if (have_posts()) : ?>

					<header class="page-header">
						<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
					</header><!-- .page-header -->

				<?php
					// Start the Loop.
					while (have_posts()) :
						the_post();
						get_template_part('template-parts/content/content', 'excerpt');

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					_bless_the_posts_navigation();

				else :

					// If no content, include the "No posts found" template.
					get_template_part('template-parts/content/content', 'none');

				endif;
				?>
			</div>
			<?php if (is_active_sidebar('news-sidebar')) : ?>
				<aside class="col-start-10 col-span-3 pt-8" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
					<?php dynamic_sidebar('news-sidebar'); ?>
				</aside>
			<?php endif; ?>
		</div>


		</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
