<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>

<h3 class="text-tertiary text-[24px] font-semibold pb-4">Get in touch</h3>
<div class="flex text-white font-light pb-3">
    <span class="material-symbols-outlined pr-4 text-tertiary">location_on</span>
    <p class="!leading-[1]"><?php the_field('contact_address', 'option'); ?></p>
</div>

<div class="flex text-white font-light pb-3">
    <span class="material-symbols-outlined  pr-4  text-tertiary">call</span>
    <p>


   <?php $field_value = get_field('contact_phone_number', 'option'); // Replace with your actual field name

    if ($field_value) {
        echo '(045) ' . esc_html($field_value);
    } ?>
</p>

</div>

<div class="flex text-white font-light pb-3">
    <span class="material-symbols-outlined  pr-4  text-tertiary">mail</span>
    <a href="mailto: <?php the_field('contact_email', 'option'); ?>"
        class="hover:text-tertiary transition-all duration-300">
        <?php the_field('contact_email', 'option'); ?></a>
</div>

<div class="flex text-white font-light">
    <span class="material-symbols-outlined pr-4  text-tertiary">&#xe8b5;</span>
  <p>  <?php the_field('contact_working_hours', 'option'); ?></p>
</div>