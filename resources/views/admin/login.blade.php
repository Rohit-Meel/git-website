@extends('layouts.admin-login')

@section('title', 'Admin Login | Giga Infotech')

@section('content')

<div class="login-page">

    <!-- Futuristic Background -->
    <div class="login-bg">
        <span class="glow glow-one"></span>
        <span class="glow glow-two"></span>

        <span class="grid-line line-horizontal one"></span>
        <span class="grid-line line-horizontal two"></span>
        <span class="grid-line line-horizontal three"></span>

        <span class="grid-line line-vertical one"></span>
        <span class="grid-line line-vertical two"></span>
        <span class="grid-line line-vertical three"></span>

        <span class="floating-dot dot-one"></span>
        <span class="floating-dot dot-two"></span>
        <span class="floating-dot dot-three"></span>
        <span class="floating-dot dot-four"></span>
    </div>


    <!-- Top Bar -->

    <!-- <header class="login-topbar">

        <a href="{{ url('/') }}" class="login-brand">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Giga Infotech"
            >

            <div>
                <strong>GIT</strong>
                <span>Giga Infotech</span>
            </div>

        </a>


        <button
            type="button"
            class="login-theme-toggle"
            id="loginThemeToggle"
            aria-label="Toggle theme"
        >
            <span id="loginThemeIcon">☾</span>
        </button>

    </header> -->


    <!-- Login Area -->

    <main class="login-container">

        <div class="login-card">


            <!-- Logo -->

            <div class="login-logo">

                <div class="login-logo-glow"></div>

                <img
                    src="{{ asset('images/logo3.png') }}"
                    alt="Giga Infotech"
                >

            </div>


            <!-- Heading -->

            <div class="login-heading">

                <span class="login-kicker">
                    GIGA INFOTECH
                </span>

                <h1>
                    Welcome
                    <span>Back.</span>
                </h1>

                <p>
                    Sign in to access your admin dashboard.
                </p>

            </div>


            <!-- Login Form -->

            <form
                action="{{ route('admin.login.submit') }}"
                method="POST"
                class="login-form"
            >

                @csrf


                <!-- Email -->

                <div class="login-field">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            @
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="admin@gigainfotech.com"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <!-- Password -->

                <div class="login-field">

                    <div class="password-label">

                        <label for="password">
                            Password
                        </label>

                        <a href="#">
                            Forgot Password?
                        </a>

                    </div>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ◈
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="passwordToggle"
                            aria-label="Show password"
                        >
                            ◉
                        </button>

                    </div>

                </div>


                <!-- Remember -->

                <div class="login-options">

                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span class="custom-checkbox"></span>

                        <span>
                            Remember me
                        </span>

                    </label>

                </div>


                <!-- Login -->

                <button
                    type="submit"
                    class="login-button"
                >

                    <span>
                        Sign In
                    </span>

                    <span class="login-arrow">
                        →
                    </span>

                </button>

            </form>


            <!-- Security -->

            <div class="login-security">

                <span class="security-icon">
                    ✓
                </span>

                <span>
                    Secure Admin Access
                </span>

            </div>


            <!-- Back -->

            <a
                href="{{ url('/') }}"
                class="back-to-site"
            >
                ← Back to Website
            </a>

        </div>

    </main>


    <!-- Footer -->

    <footer class="login-footer">

        © {{ date('Y') }} Giga Infotech.
        All Rights Reserved.

    </footer>

</div>

@endsection