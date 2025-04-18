<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<section id="posts" class="posts py-8 lg:py-16">

	<div class="container mx-auto px-8 py-8">
		<div class="grid md:grid-cols-12 md:gap-16 xl:gap-0">
			<div class="md:col-span-8 xl:col-span-8 posts-content">



				<?php
				if (have_posts()) {

					if (is_home() && ! is_front_page()) :
				?>
						<header class="entry-header pb-8">
							<h1 class="entry-title"><?php single_post_title(); ?></h1>
						</header><!-- .entry-header -->


						<?php echo get_search_form(); ?>
						<div class="posts-wrapper grid gap-8">
					<?php
					endif;

					// Load posts loop.
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content/content');
					}

					// Previous/next page navigation.
					_bless_the_posts_navigation();
				} else {

					// If no content, include the "No posts found" template.
					get_template_part('template-parts/content/content', 'none');
				}
					?>
						</div>




			</div>
			<?php if (is_active_sidebar('news-sidebar')) : ?>
				<aside class="md:col-start-9 xl:col-start-10 md:col-span-4 xl:col-span-3 pt-8 posts-sidebar" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
					<?php echo get_search_form(); ?>
					<?php dynamic_sidebar('news-sidebar'); ?>
				</aside>
			<?php endif; ?>
		</div>
	</div><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
