<?php

/**
 * Template Name: Parents Template 
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<div id="page" class="content-page py-8 lg:py-16">

    <div class="container mx-auto px-8 py-8">

        <div class="grid md:grid-cols-12 md:gap-16 lg:gap-0">
            <div class="md:col-span-8">
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
                <aside class="md:col-start-10 md:col-span-3 pt-8" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
                    <?php dynamic_sidebar('sidebar-parents'); ?>
                </aside>
            <?php endif; ?>

        </div>
    </div>


</div>


<?php
get_footer();
