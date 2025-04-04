<?php
if (is_page('staff-information')): // page slug
    $field_object = get_field_object('teachers', 'option');
    if (have_rows('teachers', 'option')): ?>
        <div class="staff-list">
            <?php if (!empty($field_object['label'])): ?>
                <h2>
                    <?php echo esc_html($field_object['label']); ?>
                </h2>
            <?php endif; ?>
            <div class="staff-list-wrapper">
                <?php while (have_rows('teachers', 'option')):
                    the_row(); ?>
                    <div class="staff-list-block">
                        <div class="staff-content">
                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <h3>
                                    <?php the_sub_field('job_title'); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <p>
                                    <?php the_sub_field('name'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="staff-icon">
                            <span class="material-symbols-outlined md:!text-[30px] lg:!text-[60px]">
                                person
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php endif;
endif; ?>

<?php
if (is_page('staff-information')):  // page slug
    $field_object = get_field_object('staff', 'option');
    if (have_rows('staff', 'option')): ?>
        <div class="staff-list">
            <?php if (!empty($field_object['label'])): ?>
                <h2>
                    <?php echo esc_html($field_object['label']); ?>
                </h2>
            <?php endif; ?>
            <div class="staff-list-wrapper">
                <?php while (have_rows('staff', 'option')):
                    the_row(); ?>
                    <div class="staff-list-block">
                        <div class="staff-content">
                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <h3>
                                    <?php the_sub_field('job_title'); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <p>
                                    <?php the_sub_field('name'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="staff-icon">
                            <span class="material-symbols-outlined md:!text-[30px] lg:!text-[60px]">
                                person
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php endif;
endif; ?>


<?php
if (is_page('staff-information')):  // page slug
    $field_object = get_field_object('staff_bom', 'option');
    if (have_rows('staff_bom', 'option')): ?>
        <div class="staff-list">
            <?php if (!empty($field_object['label'])): ?>
                <h2>
                    <?php echo esc_html($field_object['label']); ?>
                </h2>
            <?php endif; ?>
            <div class="staff-list-wrapper">
                <?php while (have_rows('staff_bom', 'option')):
                    the_row(); ?>
                    <div class="staff-list-block">
                        <div class="staff-content">
                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <h3>
                                    <?php the_sub_field('job_title'); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty(get_sub_field('job_title'))): ?>
                                <p>
                                    <?php the_sub_field('name'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="staff-icon">
                            <span class="material-symbols-outlined md:!text-[30px] lg:!text-[60px]">
                                person
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php endif;
endif; ?>