<?php

/**
 * Template Name: Parents Template 
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>

<div id="page" class="content-page py-8 lg:py-16">

    <div class="container mx-auto px-4 py-8">

        <div class="grid">
            <div class="col-span-9">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content/content', 'page');


                    // If comments are open, or we have at least one comment, load
                    // the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }

                endwhile; // End of the loop.
                ?>
            </div>

            <?php if (is_active_sidebar('sidebar-parents')) : ?>
                <aside class="col-start-10 col-span-3 pt-8" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
                    <?php dynamic_sidebar('sidebar-parents'); ?>
                </aside>
            <?php endif; ?>

        </div>
    </div>


</div>


<?php
get_footer();
