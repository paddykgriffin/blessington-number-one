<section id="latest-posts" class="home-posts py-22">
    <div class="container px-8 xl:px-0 ">
        <h2 class="entry-title">Latest posts</h2>
        <div class="grid md:grid-cols-3 lg:grid-cols-3 gap-8 md:gap-2 lg:gap-8 xl:gap-16 pt-8  lg:max-w-full mx-auto">
            <?php
            // the query
            $the_query = new WP_Query(array(

                'posts_per_page' => 3,
            ));
            ?>
            <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()):
                    $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/custom/custom', 'post-item'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>
        </div>
        <div class="pt-16 text-center lg:text-left max-w-[25rem] lg:max-w-full mx-auto ">
            <a href="<?php
                        $news_page = get_page_by_path('latest-news');
                        if ($news_page) {
                            echo get_permalink($news_page->ID);
                        }
                        ?>" class="btn default-transition">Read
                all
                news</a>
        </div>
    </div>
</section>