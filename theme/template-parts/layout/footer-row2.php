<div class="bg-secondary text-white py-3">
    <div class="container flex justify-between items-center">
        <?php
        $_bless_blog_info = get_bloginfo('name');
        if (!empty($_bless_blog_info)):
            ?>
            <div class="font-light text-sm">
                &copy;
                <?php echo date("Y"); ?>
                <?php bloginfo('name'); ?> . All rights reserved |
                <?php the_field('charity_label', 'option'); ?>
                <?php the_field('charity_number', 'option'); ?>
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
            class="font-light text-sm hover:text-tertiary transition-all duration-300" target="_blank">
            <?php the_field('site_credit_label', 'option'); ?>
        </a>

    </div>
</div>