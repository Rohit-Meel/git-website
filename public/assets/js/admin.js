/* =========================================================
   GIGA INFOTECH ADMIN DASHBOARD
   ========================================================= */


/* =========================================================
   THEME
   ========================================================= */

const adminThemeToggle =
    document.getElementById("adminThemeToggle");

const adminThemeIcon =
    document.getElementById("adminThemeIcon");

const savedAdminTheme =
    localStorage.getItem("git-admin-theme");


function applyAdminTheme(theme) {

    if (theme === "dark") {

        document.body.classList.add("admin-dark");

        if (adminThemeIcon) {
            adminThemeIcon.textContent = "☀";
        }

    } else {

        document.body.classList.remove("admin-dark");

        if (adminThemeIcon) {
            adminThemeIcon.textContent = "☾";
        }
    }
}


if (savedAdminTheme === "dark") {

    applyAdminTheme("dark");

} else {

    applyAdminTheme("light");
}


adminThemeToggle?.addEventListener("click", () => {

    const isDark =
        document.body.classList.toggle("admin-dark");

    if (isDark) {

        localStorage.setItem(
            "git-admin-theme",
            "dark"
        );

        if (adminThemeIcon) {
            adminThemeIcon.textContent = "☀";
        }

    } else {

        localStorage.setItem(
            "git-admin-theme",
            "light"
        );

        if (adminThemeIcon) {
            adminThemeIcon.textContent = "☾";
        }
    }

});


/* =========================================================
   SIDEBAR
   ========================================================= */

const sidebar =
    document.getElementById("adminSidebar");

const sidebarToggle =
    document.getElementById("sidebarToggle");

const sidebarClose =
    document.getElementById("sidebarClose");

const sidebarOverlay =
    document.getElementById("sidebarOverlay");


function openSidebar() {

    sidebar?.classList.add("open");

    sidebarOverlay?.classList.add("active");

    document.body.style.overflow = "hidden";
}


function closeSidebar() {

    sidebar?.classList.remove("open");

    sidebarOverlay?.classList.remove("active");

    document.body.style.overflow = "";
}


sidebarToggle?.addEventListener(
    "click",
    openSidebar
);

sidebarClose?.addEventListener(
    "click",
    closeSidebar
);

sidebarOverlay?.addEventListener(
    "click",
    closeSidebar
);


/* Close sidebar with Escape */

document.addEventListener("keydown", (event) => {

    if (event.key === "Escape") {

        closeSidebar();

    }

});


/* =========================================================
   DYNAMIC GREETING
   ========================================================= */

function updateAdminGreeting() {

    const greetingElement =
        document.getElementById("adminGreeting");

    if (!greetingElement) {
        return;
    }


    const hour =
        new Date().getHours();


    let greeting;


    if (hour >= 5 && hour < 12) {

        greeting = "Good Morning";

    } else if (hour >= 12 && hour < 17) {

        greeting = "Good Afternoon";

    } else if (hour >= 17 && hour < 21) {

        greeting = "Good Evening";

    } else {

        greeting = "Good Night";

    }


    greetingElement.textContent =
        `${greeting}, Admin`;
}


updateAdminGreeting();


/* =========================================================
   CURRENT DATE
   ========================================================= */

function updateAdminDateTime() {

    const dateElement =
        document.getElementById("currentDate");

    const timeElement =
        document.getElementById("currentTime");


    const now = new Date();


    if (dateElement) {

        dateElement.textContent =
            now.toLocaleDateString(
                "en-IN",
                {
                    weekday: "long",
                    day: "numeric",
                    month: "short",
                    year: "numeric"
                }
            );
    }


    if (timeElement) {

        timeElement.textContent =
            now.toLocaleTimeString(
                "en-IN",
                {
                    hour: "2-digit",
                    minute: "2-digit",
                    second: "2-digit"
                }
            );
    }
}


updateAdminDateTime();


/* Update clock every second */

setInterval(
    updateAdminDateTime,
    1000
);


/* =========================================================
   CLOSE MOBILE SIDEBAR AFTER NAVIGATION
   ========================================================= */

const adminNavLinks =
    document.querySelectorAll(
        ".admin-nav-link"
    );


adminNavLinks.forEach((link) => {

    link.addEventListener(
        "click",
        () => {

            if (
                window.innerWidth <= 850
            ) {

                closeSidebar();

            }

        }
    );

});


/* =========================================================
   WINDOW RESIZE
   ========================================================= */

window.addEventListener(
    "resize",
    () => {

        if (
            window.innerWidth > 850
        ) {

            closeSidebar();

        }

    }
);
/* =========================================================
   NOTIFICATION DROPDOWN
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    const notificationButton =
        document.getElementById('notificationButton');

    const notificationDropdown =
        document.getElementById('notificationDropdown');


    if (
        notificationButton &&
        notificationDropdown
    ) {

        notificationButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle('show');

                notificationButton.setAttribute(
                    'aria-expanded',
                    notificationDropdown.classList.contains('show')
                );


                // Close profile dropdowns

                const topbarProfileDropdown =
                    document.getElementById(
                        'topbarProfileDropdown'
                    );

                const sidebarProfileDropdown =
                    document.getElementById(
                        'sidebarProfileDropdown'
                    );


                if (topbarProfileDropdown) {
                    topbarProfileDropdown.classList.remove('show');
                }


                if (sidebarProfileDropdown) {
                    sidebarProfileDropdown.classList.remove('show');
                }

            }
        );

    }



    /* =====================================================
       TOPBAR PROFILE
       ===================================================== */

    const topbarProfileButton =
        document.getElementById(
            'topbarProfileButton'
        );

    const topbarProfileDropdown =
        document.getElementById(
            'topbarProfileDropdown'
        );


    if (
        topbarProfileButton &&
        topbarProfileDropdown
    ) {

        topbarProfileButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                topbarProfileDropdown.classList.toggle(
                    'show'
                );

                topbarProfileButton.setAttribute(
                    'aria-expanded',
                    topbarProfileDropdown.classList.contains(
                        'show'
                    )
                );


                // Close notification

                const notificationDropdown =
                    document.getElementById(
                        'notificationDropdown'
                    );

                if (notificationDropdown) {

                    notificationDropdown.classList.remove(
                        'show'
                    );

                }


                // Close sidebar profile

                const sidebarProfileDropdown =
                    document.getElementById(
                        'sidebarProfileDropdown'
                    );

                if (sidebarProfileDropdown) {

                    sidebarProfileDropdown.classList.remove(
                        'show'
                    );

                }

            }
        );

    }



    /* =====================================================
       SIDEBAR PROFILE
       ===================================================== */

    const sidebarProfileButton =
        document.getElementById(
            'sidebarProfileButton'
        );

    const sidebarProfileDropdown =
        document.getElementById(
            'sidebarProfileDropdown'
        );


    if (
        sidebarProfileButton &&
        sidebarProfileDropdown
    ) {

        sidebarProfileButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                sidebarProfileDropdown.classList.toggle(
                    'show'
                );


                // Close notification

                const notificationDropdown =
                    document.getElementById(
                        'notificationDropdown'
                    );

                if (notificationDropdown) {

                    notificationDropdown.classList.remove(
                        'show'
                    );

                }


                // Close top profile

                const topbarProfileDropdown =
                    document.getElementById(
                        'topbarProfileDropdown'
                    );

                if (topbarProfileDropdown) {

                    topbarProfileDropdown.classList.remove(
                        'show'
                    );

                }

            }
        );

    }



    /* =====================================================
       OUTSIDE CLICK
       ===================================================== */

    document.addEventListener(
        'click',
        function () {


            const notificationDropdown =
                document.getElementById(
                    'notificationDropdown'
                );

            const topbarProfileDropdown =
                document.getElementById(
                    'topbarProfileDropdown'
                );

            const sidebarProfileDropdown =
                document.getElementById(
                    'sidebarProfileDropdown'
                );


            if (notificationDropdown) {

                notificationDropdown.classList.remove(
                    'show'
                );

            }


            if (topbarProfileDropdown) {

                topbarProfileDropdown.classList.remove(
                    'show'
                );

            }


            if (sidebarProfileDropdown) {

                sidebarProfileDropdown.classList.remove(
                    'show'
                );

            }


            const notificationButton =
                document.getElementById(
                    'notificationButton'
                );

            const topbarProfileButton =
                document.getElementById(
                    'topbarProfileButton'
                );


            if (notificationButton) {

                notificationButton.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (topbarProfileButton) {

                topbarProfileButton.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        }
    );



    /* =====================================================
       ESC KEY
       ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key !== 'Escape') {
                return;
            }


            const notificationDropdown =
                document.getElementById(
                    'notificationDropdown'
                );

            const topbarProfileDropdown =
                document.getElementById(
                    'topbarProfileDropdown'
                );

            const sidebarProfileDropdown =
                document.getElementById(
                    'sidebarProfileDropdown'
                );


            if (notificationDropdown) {

                notificationDropdown.classList.remove(
                    'show'
                );

            }


            if (topbarProfileDropdown) {

                topbarProfileDropdown.classList.remove(
                    'show'
                );

            }


            if (sidebarProfileDropdown) {

                sidebarProfileDropdown.classList.remove(
                    'show'
                );

            }

        }
    );

});