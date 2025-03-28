<div class="bg-secondary dark:bg-stone-900 text-white py-8 md:py-3">
    <div class="container flex flex-col lg:flex-row md:justify-between md:items-center px-8 xl:px-0 ">
        <?php
        $_bless_blog_info = get_bloginfo('name');
        if (!empty($_bless_blog_info)):
        ?>
            <div class="font-light text-sm text-center lg:text-left pb-8 md:pb-0">
                <span class="block lg:inline pb-2 md:pb-0"> &copy;
                    <?php echo date("Y"); ?>
                    <?php bloginfo('name'); ?> </span>
                <span class="block lg:inline pb-2 lg:pb-0">All rights reserved</span>
                <span class="block lg:inline ">
                    <?php the_field('charity_label', 'option'); ?>
                    <?php the_field('charity_number', 'option'); ?>
                </span>
            </div>
        <?php
        endif;

        /* translators: 1: WordPress link, 2: WordPress. */
        // printf(
        //     '<a href="%1$s">proudly powered by %2$s</a>.',
        //     esc_url(__('https://wordpress.org/', '_bless')),
        //     'WordPress'
        // );
        ?>



        <a href="<?php the_field('site_credit_link', 'option'); ?>"
            class="font-light text-sm hover:text-tertiary transition-all duration-300 text-center md:text-left" target="_blank">
            <?php the_field('site_credit_label', 'option'); ?>
        </a>

    </div>
</div>