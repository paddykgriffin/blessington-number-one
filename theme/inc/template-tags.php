<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package _bless
 */

if (!function_exists('_bless_posted_on')):
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function _bless_posted_on()
	{
		$time_format = 'j F'; // "j" = Day (without leading zero), "F" = Full month name

		$time_string = '<time datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date($time_format)),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		printf(
			'<div class="publish-date font-semibold"><a href="%1$s" rel="bookmark">%2$s</a></div>',
			esc_url(get_permalink()),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
endif;

if (!function_exists('_bless_posted_by')):
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function _bless_posted_by()
	{
		printf(
			/* translators: 1: posted by label, only visible to screen readers. 2: author link. 3: post author. */
			'<div class="publish-author"><span class="sr-only">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></div>',
			esc_html__('Posted by', '_bless'),
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			esc_html(get_the_author())
		);
	}
endif;

if (!function_exists('_bless_comment_count')):
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function _bless_comment_count()
	{
		if (!post_password_required() && (comments_open() || get_comments_number())) {
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link(sprintf(__('Leave a comment<span class="sr-only"> on %s</span>', '_bless'), get_the_title()));
		}
	}
endif;

if (!function_exists('_bless_entry_meta')):
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * This template tag is used in the entry header.
	 */
	function _bless_entry_meta()
	{

		// Hide author, post date, category and tag text for pages.
		if ('post' === get_post_type()) {

			// Posted by.
			_bless_posted_by();

			// Posted on.
			_bless_posted_on();

			_bless_categories();

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list('', __(', ', '_bless'));
			if ($tags_list) {
				printf(
					/* translators: 1: tags label, only visible to screen readers. 2: list of tags. */
					'<span class="sr-only">%1$s</span>%2$s',
					esc_html__('Tags:', '_bless'),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
		}

		// Comment count.
		if (!is_singular()) {
			_bless_comment_count();
		}

		// Edit post link.
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
	}
endif;

if (!function_exists('_bless_categories')):

	function _bless_categories()
	{
		/* translators: used between list items, there is a space after the comma. */
		$categories_list = get_the_category_list(__(', ', '_bless'));
		if ($categories_list) {
			printf(
				//%2$s - removed from sr-only line
				/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
				'<div class="publish-category"><span class="sr-only">%1$s</span>',
				esc_html__('Posted in', '_bless'),
				$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}

		$categories = get_the_category();
		$separator = ', ';
		$output = '';

		if ($categories) {
			foreach ($categories as $category) {
				$output .= '<a class="text-[14px] flex items-center dark:text-white hover:text-(--no1-red) transition-all duration-300 " href="' . get_category_link($category->term_id) . '">
						<span class="material-symbols-outlined text-[10px] text-(--no1-red)">bookmark</span>' . $category->name . '</a></div>' . $separator;
			}
			echo trim($output, $separator);
		}
	}
endif;

if (!function_exists('_bless_entry_footer')):
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _bless_entry_footer()
	{

		// Hide author, post date, category and tag text for pages.
		if ('post' === get_post_type()) {

			// Posted by.
			_bless_posted_by();

			// Posted on.
			_bless_posted_on();

			_bless_categories();

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list('', __(', ', '_bless'));
			if ($tags_list) {
				printf(
					/* translators: 1: tags label, only visible to screen readers. 2: list of tags. */
					'<span class="sr-only">%1$s</span>%2$s',
					esc_html__('Tags:', '_bless'),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
		}

		// Comment count.
		if (!is_singular()) {
			_bless_comment_count();
		}



		// Edit post link.
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

		// Print read more
		printf(
			'<div class="publish-link"><a href="%1$s" class="read-more">%2$s<span class="material-symbols-outlined !text-[16px] ml-1">%3$s</span></a></div>',
			esc_url(get_permalink()),
			esc_html__('Read More', '_bless'),
			'arrow_forward'
		);
	}
endif;

if (!function_exists('_bless_post_thumbnail')):
	/**
	 * Displays an optional post thumbnail, wrapping the post thumbnail in an
	 * anchor element except when viewing a single post.
	 */
	function _bless_post_thumbnail()
	{
		if (!_bless_can_show_post_thumbnail()) {
			return;
		}

		if (is_singular()):
?>

			<figure class="m-0 not-prose row-start-1 col-start-1 z-0">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php
		else:
		?>

			<?php
			$colors = ['bg-(--no1-red)', 'bg-(--no1-blue)', 'bg-(--no1-green)'];
			static $post_index = 0; // Keep track of the post index
			$color_class = $colors[$post_index % count($colors)];
			$post_index++;
			?>

			<figure class="rounded-2xl relative">

				<?php
				echo '<div class="' . $color_class . ' absolute z-10 py-2 px-3 rounded-md text-center left-3 top-3 " id="date">
                                    <span class="block font-bold leading-6 text-[30px] text-white">' . get_the_date('d') . '</span>
                                    <span class="block font-light leading-4 text-white">' . get_the_date('M') . '</span></div>';
				?>
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail('full', array('class' => 'rounded-2xl')); ?>
				</a>
			</figure>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('_bless_comment_avatar')):
	/**
	 * Returns the HTML markup to generate a user avatar.
	 *
	 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 */
	function _bless_get_user_avatar_markup($id_or_email = null)
	{

		if (!isset($id_or_email)) {
			$id_or_email = get_current_user_id();
		}

		return sprintf('<div class="vcard">%s</div>', get_avatar($id_or_email, _bless_get_avatar_size()));
	}
endif;

if (!function_exists('_bless_discussion_avatars_list')):
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 *
	 * @param array $comment_authors Comment authors to list as avatars.
	 */
	function _bless_discussion_avatars_list($comment_authors)
	{
		if (empty($comment_authors)) {
			return;
		}
		echo '<ol>', "\n";
		foreach ($comment_authors as $id_or_email) {
			printf(
				"<li>%s</li>\n",
				_bless_get_user_avatar_markup($id_or_email) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
		echo '</ol>', "\n";
	}
endif;

if (!function_exists('_bless_the_posts_navigation')):
	/**
	 * Wraps `the_posts_pagination` for use throughout the theme.
	 */
	function _bless_the_posts_navigation()
	{
		the_posts_pagination(
			array(
				'mid_size' => 2,
				'prev_text' => __('Newer posts', '_bless'),
				'next_text' => __('Older posts', '_bless'),
			)
		);
	}
endif;

if (!function_exists('_bless_content_class')):
	/**
	 * Displays the class names for the post content wrapper.
	 *
	 * This allows us to add Tailwind Typography’s modifier classes throughout
	 * the theme without repeating them in multiple files. (They can be edited
	 * at the top of the `../functions.php` file via the
	 * _BLESS_TYPOGRAPHY_CLASSES constant.)
	 *
	 * Based on WordPress core’s `body_class` and `get_body_class` functions.
	 *
	 * @param string|string[] $classes Space-separated string or array of class
	 *                                 names to add to the class list.
	 */
	function _bless_content_class($classes = '')
	{
		$all_classes = array($classes, _BLESS_TYPOGRAPHY_CLASSES);

		foreach ($all_classes as &$class_groups) {
			if (!empty($class_groups)) {
				if (!is_array($class_groups)) {
					$class_groups = preg_split('#\s+#', $class_groups);
				}
			} else {
				// Ensure that we always coerce class to being an array.
				$class_groups = array();
			}
		}

		$combined_classes = array_merge($all_classes[0], $all_classes[1]);
		$combined_classes = array_map('esc_attr', $combined_classes);

		// Separates class names with a single space, preparing them for the
		// post content wrapper.
		echo 'class="' . esc_attr(implode(' ', $combined_classes)) . '"';
	}
endif;
