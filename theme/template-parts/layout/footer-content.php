<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<footer id="colophon" class="bg-primary">

	<div class="max-w-7xl mx-auto grid grid-cols-3 gap-4">

		<div class="div flex">
			<?php if (has_nav_menu('menu-2')): ?>
				<nav aria-label="<?php esc_attr_e('Footer Col 1 Menu', '_bless'); ?>" class="bg-yellow-500">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_class' => 'footer-menu',
							'depth' => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>

			<?php if (has_nav_menu('menu-3')): ?>
				<nav aria-label="<?php esc_attr_e('Footer Col 2 Menu', '_bless'); ?>" class="bg-red-500">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-3',
							'menu_class' => 'footer-menu',
							'depth' => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>

		<?php if (is_active_sidebar('sidebar-1')): ?>
			<aside role="complementary" aria-label="<?php esc_attr_e('Footer', '_bless'); ?>">
				<?php dynamic_sidebar('sidebar-1'); ?>
			</aside>
		<?php endif; ?>

		<div>
			ACF Get in touch content...
		</div>





		<div>
			<?php
			$_bless_blog_info = get_bloginfo('name');
			if (!empty($_bless_blog_info)):
				?>
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
				<?php
			endif;

			/* translators: 1: WordPress link, 2: WordPress. */
			printf(
				'<a href="%1$s">proudly powered by %2$s</a>.',
				esc_url(__('https://wordpress.org/', '_bless')),
				'WordPress'
			);
			?>
		</div>

	</div>
</footer><!-- #colophon -->