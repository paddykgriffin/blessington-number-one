<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _bless
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
 document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById("darkModeToggle");
            const rootElement = document.documentElement; // Use <html>

            // Check localStorage for dark mode preference
            if (localStorage.getItem("theme") === "dark") {
                rootElement.classList.add("dark");
            } else {
                rootElement.classList.remove("dark"); // Ensure light mode is applied
            }

            toggleButton.addEventListener("click", function () {
                if (rootElement.classList.contains("dark")) {
                    rootElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                } else {
                    rootElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                }
            });
        });
</script>

</body>
</html>
