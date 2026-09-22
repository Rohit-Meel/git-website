<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Giga Infotech')</title>

    <meta name="description"
        content="@yield('description', 'Giga Infotech - Innovative digital solutions, web development and technology services.')">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">
        <div class="nav-container">

            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/logo3.png') }}" alt="Giga Infotech">
            </a>

            <nav class="nav-menu" id="navMenu">

                <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ url('/about') }}"
                    class="{{ request()->is('about') ? 'active' : '' }}">
                    About
                </a>

                <a href="{{ url('/services') }}"
                    class="{{ request()->is('services') ? 'active' : '' }}">
                    Services
                </a>

                <a href="{{ url('/team') }}"
                    class="{{ request()->is('team') ? 'active' : '' }}">
                    Team
                </a>

                <a href="{{ url('/contact') }}"
                    class="{{ request()->is('contact') ? 'active' : '' }}">
                    Contact
                </a>

            </nav>

            <div class="nav-actions">

                <!-- Theme Toggle -->
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                    <span id="themeIcon">☾</span>
                </button>

                <!-- Mobile Menu -->
                <button class="menu-toggle" id="menuToggle" aria-label="Open menu">
                    ☰
                </button>

            </div>

        </div>
    </header>


    <!-- ================= PAGE CONTENT ================= -->

    <main>
        @yield('content')
    </main>


    <!-- ================= FOOTER ================= -->

    <footer class="footer">

        <div class="footer-container">

            <div class="footer-about">

                <img src="{{ asset('images/logo3.png') }}"
                    alt="Giga Infotech"
                    class="footer-logo">

                <p>
                    We create modern digital experiences and
                    technology solutions that help businesses grow.
                </p>

            </div>


            <div class="footer-links">

                <h3>Quick Links</h3>

                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/about') }}">About</a>
                <a href="{{ url('/services') }}">Services</a>
                <a href="{{ url('/team') }}">Team</a>
                <a href="{{ url('/contact') }}">Contact</a>

            </div>


            <div class="footer-services">

                <h3>Services</h3>

                <p>Web Development</p>
                <p>Software Development</p>
                <p>UI/UX Design</p>
                <p>Digital Solutions</p>

            </div>


            <div class="footer-contact">

                <h3>Get In Touch</h3>

                <p>Giga Infotech</p>
                <p>Email: info@gigainfotech.com</p>
                <p>Phone: +91 XXXXX XXXXX</p>

            </div>

        </div>


        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Giga Infotech. All Rights Reserved.
            </p>

        </div>

    </footer>


    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>