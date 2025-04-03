<?php

/**
 * Template Name: Contact
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<div id="page" class="contact-page py-8 lg:py-16">
    <div class="container mx-auto px-8 py-8 text-center">
        <div class="grid xl:grid-cols-12 md:gap-16 lg:gap-0">
            <div class="md:col-span-12">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content/content', 'contact');
                    // If comments are open, or we have at least one comment, load
                    // the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }

                endwhile; // End of the loop.
                ?>


                <div class="md:grid md:grid-cols-12 md:gap-8 pb-12 justify-center md:pt-8">
                    <div class="md:col-span-5 xl:col-span-4">
                        <?php if (is_active_sidebar('sidebar-contact')) : ?>
                            <div class="bg-gray-100 px-4 py-6 pb-0 dark:bg-transparent dark:border-[1px] dark:border-gray-100/20">
                                <h3 class="md:text-left">Send us a message</h3>
                                <?php dynamic_sidebar('sidebar-contact'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="md:col-span-7 xl:col-span-8">
                        <div class="py-12 md:py-0">
                            <div class="grid md:grid-cols-12 bg-primary dark:bg-stone-900 items-center">
                                <div class="col-span-6">
                                    <?php get_template_part('template-parts/custom/custom', 'getintouch'); ?>
                                </div>
                                <div class="col-span-6 contact-featured-img">
                                    <?php
                                    _bless_post_thumbnail();
                                    ?>

                                </div>
                            </div>
                        </div>
                        <?php get_template_part('template-parts/custom/custom', 'map'); ?>
                    </div>
                </div>
                <!-- .grid -->
            </div>
            <!-- page content -->
        </div>
        <!-- .grid -->
    </div>
    <!-- .container -->
</div>
<!-- #page -->





<?php
get_footer();
