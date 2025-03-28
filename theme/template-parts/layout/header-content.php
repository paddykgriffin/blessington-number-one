<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<header id="masthead" class="bg-primary dark:bg-stone-900 border-b-4 border-secondary dark:border-stone-800 py-3">

	<div class="container px-4 xl:px-0">
		<div class="grid grid-cols-2 lg:grid-cols-12 items-center md:gap-6 ">
			<?php
			if (is_front_page()):
			?>
				<div class="md:col-span-1 lg:col-span-2 xl:col-span-1">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" class="w-16 md:w-24" />
					</a>
				</div>
			<?php
			else:
			?>
				<div class="md:col-span-2 xl:col-span-1">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" class="w-30" />
					</a>
				</div>
			<?php
			endif;

			$_bless_description = get_bloginfo('description', 'display');
			if ($_bless_description || is_customize_preview()):
			?>
				<p><?php echo $_bless_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?></p>
			<?php endif; ?>


			<div class="col-span-8 xl:col-span-9 text-center hidden lg:block">
				<nav id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', '_bless'); ?>" class="flex justify-center">


					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => false,
							'menu_id' => 'primary-menu',
							'menu_class' => ' gap-12 lg:gap-8 xl:gap-12 hidden md:flex',
							'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="md:col-span-1 lg:col-span-2">
				<div class="flex justify-end gap-2 items-center">
					<?php get_template_part('template-parts/layout/header', 'icons'); ?>

				</div>
			</div>


		</div>
	</div>
	<!-- .container -->
</header><!-- #masthead -->