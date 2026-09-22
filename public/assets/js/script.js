/* =========================================================
   GIGA INFOTECH - MAIN JAVASCRIPT
   ========================================================= */


/* ================= THEME TOGGLE ================= */

const themeToggle = document.getElementById("themeToggle");
const themeIcon = document.getElementById("themeIcon");


// Load saved theme
const savedTheme = localStorage.getItem("git-theme");

if (savedTheme === "dark") {
    document.body.classList.add("dark-mode");
    themeIcon.textContent = "☀";
} else {
    themeIcon.textContent = "☾";
}


// Toggle theme
themeToggle?.addEventListener("click", () => {

    document.body.classList.toggle("dark-mode");

    const isDark = document.body.classList.contains("dark-mode");

    if (isDark) {
        themeIcon.textContent = "☀";
        localStorage.setItem("git-theme", "dark");
    } else {
        themeIcon.textContent = "☾";
        localStorage.setItem("git-theme", "light");
    }

});


/* ================= MOBILE MENU ================= */

const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");


menuToggle?.addEventListener("click", () => {

    navMenu.classList.toggle("show");

});


/* Close mobile menu after clicking a link */

const navLinks = document.querySelectorAll(".nav-menu a");

navLinks.forEach(link => {

    link.addEventListener("click", () => {

        navMenu.classList.remove("show");

    });

});


/* ================= ESC KEY ================= */

document.addEventListener("keydown", (event) => {

    if (event.key === "Escape") {

        navMenu?.classList.remove("show");

    }

});