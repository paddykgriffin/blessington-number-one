<?php
if (is_page('school-polices')): // page slug
    if (have_rows('school_polices', 'option')): ?>
        <div class="policy-list">
            <?php while (have_rows('school_polices', 'option')):
                the_row(); ?>
                <?php $link = get_sub_field('policy_url');
                if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>"
                        class="policy-block default-transition group" target="_blank">
                        <h4 class="group-hover:text-white "> <?php the_sub_field('policy_name'); ?></h4>
                        <span class="material-symbols-outlined text-red-500 dark:text-white group-hover:text-white !text-[30px] lg:!text-[40px]">
                            picture_as_pdf
                        </span>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
<?php endif;
endif; ?>