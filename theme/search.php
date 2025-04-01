<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<section id="search-results" class="page-centered posts py-8 lg:py-16">
	<div class="container mx-auto px-4 py-8">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__('Search results for:', '_bless'),
					get_search_query()
				);
				?>
			</header><!-- .page-header -->

			<div class="max-w-[60rem] mx-auto">
				<?php
				// Start the Loop.
				while (have_posts()) :
					the_post();

					// Check if the post type is 'post'
					if (get_post_type() === 'post') { ?>
						<div class="col-span-5">
							<?php get_template_part('template-parts/content/content', 'excerpt'); ?>
						</div>
					<?php } else { ?>
						<div class="">
							<?php get_template_part('template-parts/content/content', 'pages'); ?>
						</div>
				<?php }

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				_bless_the_posts_navigation();
				?>

			</div>
		<?php else :

			// If no content is found, get the `content-none` template part.
			get_template_part('template-parts/content/content', 'none');

		endif; ?>

	</div><!-- #main -->
</section><!-- #primary

<?php
get_footer();
