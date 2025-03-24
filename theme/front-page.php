<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

get_header();
?>

<section id="primary">
    <main id="main">
        <?php
        /* Start the Loop */
        while (have_posts()):
            the_post();

            get_template_part('template-parts/content/content', 'home');

            // If comments are open, or we have at least one comment, load
            // the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile; // End of the loop.
        ?>

        <div class="div">
            custom ACF blocks go here...
        </div>


        <div class="bg-yellow-500 py-[48px]">
            <div class="max-w-7xl mx-auto">
                <h2 class="entry-title">Latest posts</h2>
                <div class="grid grid-cols-3 gap-16">
                    <?php
                    // the query
                    $the_query = new WP_Query(array(

                        'posts_per_page' => 3,
                    ));
                    ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <div class="post-wrapper">
                                <?php the_title('<h3 class="not-prose">', '</h3>'); ?>
                                <?php the_category(); ?>
                                <?php the_excerpt(); ?>
                                <?php _bless_post_thumbnail(); ?>
                                <?php the_date(); ?>

                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
                                    title="Read more about this post">Read
                                    More</a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php else: ?>
                        <p><?php __('No News'); ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
