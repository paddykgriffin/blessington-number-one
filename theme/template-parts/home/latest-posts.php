<section id="latest-posts" class="py-22">
    <div class="container px-8 xl:px-0 ">
        <h2 class="entry-title">Latest posts</h2>
        <div class="grid md:grid-cols-3 gap-8 md:gap-4 lg:gap-16 pt-8">
            <?php
            // the query
            $the_query = new WP_Query(array(

                'posts_per_page' => 3,
            ));
            ?>

            <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()):
                    $the_query->the_post(); ?>

                    <?php
                    $colors = ['bg-(--no1-red)', 'bg-(--no1-blue)', 'bg-(--no1-green)'];
                    static $post_index = 0; // Keep track of the post index
                    $color_class = $colors[$post_index % count($colors)];
                    $post_index++;
                    ?>

                    <div class="post-wrapper flex flex-col border-gray-200 border shadow-lg dark:border-gray-100/25">
                        <div class="grid relative">
                            <?php
                            echo '<div class="' . $color_class . ' absolute z-10 py-2 px-3 rounded-md text-center left-4 top-4 " id="date">
                                    <span class="block font-bold leading-6 text-[30px] text-white">' . get_the_date('d') . '</span>
                                    <span class="block font-light leading-4 text-white">' . get_the_date('M') . '</span></div>';
                            ?>
                            <?php _bless_post_thumbnail(); ?>
                        </div>
                        <div class="px-4 py-6 bg-background dark:bg-transparent">
                            <?php the_title('<h3 class="not-prose text-[28px] text-secondary dark:text-(--no1-yellow) font-semibold md:leading-8">', '</h3>'); ?>

                            <p class="py-3  dark:text-white"><?php echo get_the_excerpt(); ?></p>
                            <div class="flex justify-between lg:items-center md:flex-col lg:flex-row lg:justify-between md:gap-4 pt-6">
                                <?php
                                $categories = get_the_category();
                                $separator = ', ';
                                $output = '';

                                if ($categories) {
                                    foreach ($categories as $category) {
                                        $output .= '<a class="text-[14px] flex items-center dark:text-white hover:text-(--no1-red) transition-all duration-300  hover:px-3" href="' . get_category_link($category->term_id) . '">
                                                <span class="material-symbols-outlined text-[10px] text-(--no1-red)">bookmark</span>' . $category->name . '</a>' . $separator;
                                    }
                                    echo trim($output, $separator);
                                }
                                ?>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" title="Read more about this post"
                                    class="text-[14px] flex items-center font-medium hover:text-(--no1-green) transition-all duration-300 hover:px-3 dark:text-white">Read
                                    More<span class="material-symbols-outlined !text-[16px] ml-1">
                                        arrow_forward
                                    </span></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else: ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

        </div>
        <div class="pt-16 text-center md:text-left">
            <a href="latest-news" class="btn">Read
                all
                news</a>
        </div>
    </div>
</section>