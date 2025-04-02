<?php if (have_rows('school_polices',)): ?>
    <div class="policy-list grid lg:grid-cols-2 gap-4 mt-8">
        <?php while (have_rows('school_polices',)):
            the_row(); ?>

            <?php $link = get_sub_field('policy_url');

            if ($link): ?>
                <div class="">
                    <a href="<?php echo esc_url($link); ?>"
                        class="px-3 py-5 bg-gray-100  text-primary dark:text-white  transition-all duration-500 rounded-xl hover:bg-primary hover:text-white dark:bg-primary dark:hover:bg-secondary flex items-center gap-3 group justify-between" target="_blank">

                        <?php the_sub_field('policy_name'); ?>

                        <span class="material-symbols-outlined text-red-500 dark:text-white group-hover:text-white !text-[30px] lg:!text-[40px]">
                            picture_as_pdf
                        </span>

                    </a>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
<?php endif; ?>