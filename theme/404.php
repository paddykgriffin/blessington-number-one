<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<section id="section" class="page-centered py-8 lg:py-16">
	<div class="container mx-auto px-4 py-8">
		<div class="max-w-content mx-auto">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Page Not Found', '_bless'); ?></h1>
			</header><!-- .page-header -->

			<div <?php _bless_content_class('page-content text-center'); ?>>
				<p><?php esc_html_e('This page could not be found. It might have been removed or renamed, or it may never have existed.', '_bless'); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div>

	</div><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
