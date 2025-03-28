<button id="darkModeToggle" class="darkModeToggle hidden lg:block bg-secondary rounded-sm cursor-pointer hover:opacity-75 px-0.5 py-0.5">
    <span class="material-symbols-outlined dark:!block !hidden">
        dark_mode
    </span>
    <span class="material-symbols-outlined text-white !block dark:!hidden">
        sunny
    </span>
</button>
<?php if (have_rows('boxes', 'option')): ?>
    <div class="hidden lg:flex gap-2">
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
    </div>
<?php endif; ?>
<button id="menuBtn" class="lg:hidden text-white " aria-controls="primary-menu"
    aria-expanded="false">
    <span class="material-symbols-outlined !block !text-[40px]">menu</span>
    <p class="sr-only"> <?php esc_html_e('Primary Menu', '_bless'); ?>
    </p>
</button>