/* =========================================================
   GIGA INFOTECH
   ADMIN LOGIN
   ========================================================= */


/* =========================================================
   THEME
   ========================================================= */

const loginThemeToggle =
    document.getElementById("loginThemeToggle");

const loginThemeIcon =
    document.getElementById("loginThemeIcon");


const savedLoginTheme =
    localStorage.getItem("git-admin-theme");


function applyLoginTheme(theme) {

    if (theme === "dark") {

        document.body.classList.add("login-dark");

        if (loginThemeIcon) {
            loginThemeIcon.textContent = "☀";
        }

    } else {

        document.body.classList.remove("login-dark");

        if (loginThemeIcon) {
            loginThemeIcon.textContent = "☾";
        }

    }
}


if (savedLoginTheme === "dark") {

    applyLoginTheme("dark");

} else {

    applyLoginTheme("light");

}


loginThemeToggle?.addEventListener(
    "click",
    () => {

        const isDark =
            document.body.classList.toggle("login-dark");


        if (isDark) {

            localStorage.setItem(
                "git-admin-theme",
                "dark"
            );

            if (loginThemeIcon) {
                loginThemeIcon.textContent = "☀";
            }

        } else {

            localStorage.setItem(
                "git-admin-theme",
                "light"
            );

            if (loginThemeIcon) {
                loginThemeIcon.textContent = "☾";
            }

        }

    }
);


/* =========================================================
   SHOW / HIDE PASSWORD
   ========================================================= */

const passwordInput =
    document.getElementById("password");

const passwordToggle =
    document.getElementById("passwordToggle");


passwordToggle?.addEventListener(
    "click",
    () => {

        if (!passwordInput) {
            return;
        }


        if (
            passwordInput.type === "password"
        ) {

            passwordInput.type = "text";

            passwordToggle.textContent = "◉";

            passwordToggle.setAttribute(
                "aria-label",
                "Hide password"
            );

        } else {

            passwordInput.type = "password";

            passwordToggle.textContent = "◉";

            passwordToggle.setAttribute(
                "aria-label",
                "Show password"
            );

        }

    }
);