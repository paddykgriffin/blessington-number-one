<button id="darkModeToggle" class="bg-secondary rounded-sm w-[28px] h-[28px] cursor-pointer hover:opacity-75">
    <div class="dark:block hidden "><span class="mt-[3px] material-symbols-outlined !text-[22px]">
            dark_mode
        </span></div>
    <div class="block dark:hidden col-start-1 row-start-1"><span class="mt-[3px] !text-[22px] material-symbols-outlined text-white">
            sunny
        </span></div>
</button>
<?php if (have_rows('boxes', 'option')): ?>

    <?php while (have_rows('site_links_repeat', 'option')):
        the_row(); ?>

        <?php
        $link = get_sub_field('site_link_url');

        if ($link): ?>
            <a href="<?php echo esc_url($link); ?>"
                class="hover:opacity-75 transition-all duration-300" target="_blank">
                <?php
                $image = get_sub_field('site_link_icon'); // Get image field

                if ($image && is_array($image) && isset($image['url'])): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
                <?php endif; ?>

            </a>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>