// Dark Mode Toggle
document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".darkModeToggle");
    const rootElement = document.documentElement; 

    // Check localStorage for dark mode preference
    if (localStorage.getItem("theme") === "dark") {
        rootElement.classList.add("dark");
    } else {
        rootElement.classList.remove("dark"); // Ensure light mode is applied
    }

    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            if (rootElement.classList.contains("dark")) {
                rootElement.classList.remove("dark");
                localStorage.setItem("theme", "light");
            } else {
                rootElement.classList.add("dark");
                localStorage.setItem("theme", "dark");
            }
        });
    });
});

 // Sidebar Toggle
 function openNav() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    if (!sidebar || !overlay) return; // Ensure elements exist before proceeding

    const isOpen = sidebar.getAttribute("data-state") === "open";

    sidebar.setAttribute("data-state", isOpen ? "closed" : "open");
    overlay.setAttribute("data-state", isOpen ? "closed" : "open");

    sidebar.classList.toggle("translate-x-full", isOpen);
    sidebar.classList.toggle("translate-x-0", !isOpen);

    overlay.classList.toggle("opacity-0", isOpen);
    overlay.classList.toggle("opacity-100", !isOpen);
    overlay.classList.toggle("hidden", isOpen);
    overlay.classList.toggle("block", !isOpen);
    overlay.classList.toggle("pointer-events-none", isOpen);
}

// Wait for the DOM to load before adding event listeners
document.addEventListener("DOMContentLoaded", () => {
    const homeBtn = document.getElementById("homeBtn");
    const menuBtn = document.getElementById("menuBtn");
    const closeBtn = document.getElementById("closeBtn");
    const overlay = document.getElementById("overlay");

    if (homeBtn) homeBtn.addEventListener("click", openNav);
    if (menuBtn) menuBtn.addEventListener("click", openNav);
    if (closeBtn) closeBtn.addEventListener("click", openNav);
    if (overlay) overlay.addEventListener("click", openNav);
});

// Apply Padding to Main
document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById('masthead');
    const siteMain = document.getElementById('main');

    if (header && siteMain) {
        siteMain.style.marginTop = `${header.offsetHeight}px`
    }

});