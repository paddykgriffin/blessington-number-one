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
    <div class="container mx-auto px-8 py-8 ext-center ">
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


                <div class="grid grid-cols-12 gap-8 pb-12">
                    <div class="col-span-12 xl:col-span-4">
                        <?php if (is_active_sidebar('sidebar-contact')) : ?>
                            <div class="bg-gray-100 px-6 py-3 rounded-2xl md:max-w-[36rem] mx-auto">
                                <?php dynamic_sidebar('sidebar-contact'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-span-12 xl:col-span-8 xl:col-start-5">
                        <?php get_template_part('template-parts/layout/footer/footer', 'touch'); ?>

                        <h3 class="text-4xl text-secondary pb-4 font-semibold">Find our school on maps</h3>
                        <?php echo do_shortcode('[wpgmza id="1"]'); ?>

                    </div>



                </div>





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
