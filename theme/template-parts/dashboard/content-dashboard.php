<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div <?php _bless_content_class('entry-content'); ?>>
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

	<div class="grid grid-cols-12 gap-8 hidden">
		<div class="div col-span-7">
			<div class="grid  grid-cols-2 gap-8">
				<div class="div bg-gray-200 p-6 rounded-2xl">
					<h3 class="text-3xl font-semibold pb-4">How to add news article</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptates laborum voluptatibus, molestiae perferendis, nihil ipsam magnam obcaecati eveniet fugiat exercitationem expedita atque, optio illum facilis magni omnis excepturi maxime?</p>
				</div>
				<div class="div bg-gray-200 p-6 rounded-2xl">
					<h3 class="text-3xl font-semibold pb-4">How to add page</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptates laborum voluptatibus, molestiae perferendis, nihil ipsam magnam obcaecati eveniet fugiat exercitationem expedita atque, optio illum facilis magni omnis excepturi maxime?</p>
				</div>
				<div class="div bg-gray-200 p-6 rounded-2xl">
					<h3 class="text-3xl font-semibold pb-4">How to add images</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptates laborum voluptatibus, molestiae perferendis, nihil ipsam magnam obcaecati eveniet fugiat exercitationem expedita atque, optio illum facilis magni omnis excepturi maxime?</p>
				</div>
				<div class="div bg-gray-200 p-6 rounded-2xl">
					<h3 class="text-3xl font-semibold pb-4">How to edit homepage sections</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptates laborum voluptatibus, molestiae perferendis, nihil ipsam magnam obcaecati eveniet fugiat exercitationem expedita atque, optio illum facilis magni omnis excepturi maxime?</p>
				</div>
			</div>
		</div>
		<div class="div col-span-3 col-start-10">
			<div class="div bg-primary p-6 rounded-2xl text-white">
				<h3 class="text-3xl font-semibold pb-4">Need Support?</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptates laborum voluptatibus, molestiae perferendis, nihil ipsam magnam obcaecati eveniet fugiat exercitationem expedita atque, optio illum facilis magni omnis excepturi maxime?</p>
			</div>
		</div>
	</div>



</article><!-- #post-<?php the_ID(); ?> -->