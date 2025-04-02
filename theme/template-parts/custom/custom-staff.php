<?php if (have_rows('teachers',)): ?>
    <div class="py-8">
        <h3 class="text-3xl font-semibold text-secondary dark:text-white">Class Teachers</h3>
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <?php while (have_rows('teachers',)):
                the_row(); ?>
                <div class="bg-gray-100 px-3 py-5 rounded-xl dark:bg-primary flex justify-between">
                    <div>
                        <h4 class="font-semibold text-xl text-secondary dark:text-white">
                            <?php the_sub_field('teacher_role'); ?>

                        </h4>
                        <div>
                            <?php the_sub_field('teacher_name'); ?>

                        </div>

                    </div>
                    <span class="material-symbols-outlined md:!text-[30px] lg:!text-[60px]">
                        person
                    </span>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>




<?php if (have_rows('staff',)): ?>
    <div class="py-8">
        <h3 class="text-3xl font-semibold text-secondary  dark:text-white">Staff Members</h3>
        <div class="grid grid md:grid-cols-2 gap-4 mt-4">
            <?php while (have_rows('staff',)):
                the_row(); ?>
                <div class="bg-gray-100 px-3 py-5 rounded-xl dark:bg-primary flex justify-between">
                    <div>
                        <h4 class="font-semibold text-xl text-secondary dark:text-white">
                            <?php the_sub_field('staff_role'); ?>

                        </h4>
                        <div>
                            <?php the_sub_field('staff_name'); ?>

                        </div>
                    </div>
                    <span class="material-symbols-outlined md:!text-[30px] lg:!text-[60px]">
                        person
                    </span>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>