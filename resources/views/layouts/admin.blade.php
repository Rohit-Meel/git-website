<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Dashboard | Giga Infotech')
    </title>

    <meta
        name="description"
        content="Giga Infotech Admin Dashboard">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/admin.css') }}">

</head>


<body>


    <!-- ================= ADMIN APP ================= -->

    <div class="admin-app">


        <!-- ================= SIDEBAR ================= -->

        <aside
            class="admin-sidebar"
            id="adminSidebar">


            <div class="sidebar-top">


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="admin-brand">

                    <img
                        src="{{ asset('images/logo3.png') }}"
                        alt="Giga Infotech">

                </a>


                <button
                    class="sidebar-close"
                    id="sidebarClose"
                    aria-label="Close sidebar">
                    ×
                </button>


            </div>



            <!-- ================= NAVIGATION ================= -->

            <nav class="admin-nav">


                <!-- ================= MAIN ================= -->

                <div class="nav-section">

                    <span class="nav-section-title">
                        MAIN
                    </span>


                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <span class="nav-icon">
                            ⌂
                        </span>

                        <span>
                            Dashboard
                        </span>

                    </a>

                </div>



                <!-- ================= MANAGEMENT ================= -->

                <div class="nav-section">

                    <span class="nav-section-title">
                        MANAGEMENT
                    </span>


                    <!-- TEAM -->

                    <a
                        href="{{ route('admin.team.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">

                        <span class="nav-icon">
                            ◉
                        </span>

                        <span>
                            Team Members
                        </span>

                    </a>



                    <!-- SERVICES -->

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">

                        <span class="nav-icon">
                            ◆
                        </span>

                        <span>
                            Services
                        </span>

                    </a>


                </div>



                <!-- ================= COMMUNICATION ================= -->

                <div class="nav-section">

                    <span class="nav-section-title">
                        COMMUNICATION
                    </span>


                    <!-- ENQUIRIES -->

                    @php

                    $sidebarUnreadCount = \App\Models\Enquiry::where(
                    'status',
                    'new'
                    )->count();

                    @endphp


                    <a
                        href="{{ route('admin.enquiries.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">

                        <span class="nav-icon">
                            ✉
                        </span>

                        <span>
                            Enquiries
                        </span>


                        @if($sidebarUnreadCount > 0)

                        <span class="nav-badge">
                            {{ $sidebarUnreadCount }}
                        </span>

                        @endif


                    </a>


                </div>



                <!-- ================= SYSTEM ================= -->

                <div class="nav-section">

                    <span class="nav-section-title">
                        SYSTEM
                    </span>


                    <!-- SETTINGS -->

                    <a
                        href="{{ route('admin.settings.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">

                        <span class="nav-icon">
                            ⚙
                        </span>

                        <span>
                            Settings
                        </span>

                    </a>


                </div>


            </nav>



            <!-- ================= SIDEBAR BOTTOM ================= -->

            <div class="sidebar-bottom">


                <!-- ================= SIDEBAR ADMIN PROFILE ================= -->

                <div class="sidebar-profile-wrapper">


                    <button
                        type="button"
                        class="admin-mini-profile"
                        id="sidebarProfileButton"
                        aria-label="Open admin profile">

                        <div class="profile-avatar">
                            A
                        </div>


                        <div class="profile-info">

                            <strong>
                                Admin
                            </strong>

                            <span>
                                Administrator
                            </span>

                        </div>


                    </button>


                    <!-- SIDEBAR PROFILE DROPDOWN -->

                    <div
                        class="admin-profile-dropdown sidebar-profile-dropdown"
                        id="sidebarProfileDropdown">


                        <div class="profile-dropdown-header">

                            <div class="profile-dropdown-avatar">
                                A
                            </div>

                            <div>

                                <strong>
                                    Admin
                                </strong>

                                <span>
                                    Administrator
                                </span>

                            </div>

                        </div>


                        <div class="profile-dropdown-divider"></div>


                        <a
                            href="{{ route('admin.settings.index') }}"
                            class="profile-dropdown-item">

                            <span>
                                ⚙
                            </span>

                            <span>
                                Settings
                            </span>

                        </a>


                        <form
                            action="{{ route('admin.logout') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="profile-dropdown-item profile-dropdown-logout">

                                <span>
                                    ↪
                                </span>

                                <span>
                                    Logout
                                </span>

                            </button>

                        </form>


                    </div>


                </div>



                <!-- ================= LOGOUT ================= -->
<!-- 
                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                    class="admin-logout-form">

                    @csrf


                    <button
                        type="submit"
                        class="admin-logout-btn">

                        <span class="logout-icon">
                            ↪
                        </span>

                        <span>
                            Logout
                        </span>

                    </button>


                </form> -->


            </div>


        </aside>



        <!-- ================= SIDEBAR OVERLAY ================= -->

        <div
            class="sidebar-overlay"
            id="sidebarOverlay"></div>



        <!-- ================= MAIN AREA ================= -->

        <div class="admin-main">



            <!-- ================= TOPBAR ================= -->

            <header class="admin-topbar">


                <div class="topbar-left">


                    <button
                        class="sidebar-toggle"
                        id="sidebarToggle"
                        aria-label="Open sidebar">
                        ☰
                    </button>


                </div>



                <div class="topbar-right">


                    <!-- ================= SEARCH ================= -->

                    <div class="admin-search">

                        <span class="search-icon">
                            ⌕
                        </span>


                        <input
                            type="text"
                            placeholder="Search..."
                            id="adminSearch">

                    </div>



                    <!-- ================= THEME ================= -->

                    <button
                        class="admin-icon-button"
                        id="adminThemeToggle"
                        aria-label="Toggle theme">

                        <span id="adminThemeIcon">
                            ☾
                        </span>

                    </button>



                    <!-- ================= NOTIFICATION ================= -->

                    <div class="notification-wrapper">


                        <button
                            type="button"
                            class="admin-icon-button notification-button"
                            id="notificationButton"
                            aria-label="Notifications"
                            aria-expanded="false">

                            <span>
                                ♢
                            </span>


                            @if($sidebarUnreadCount > 0)

                            <span class="notification-dot"></span>

                            @endif


                        </button>



                        <!-- NOTIFICATION DROPDOWN -->

                        <div
                            class="notification-dropdown"
                            id="notificationDropdown">


                            <div class="notification-header">

                                <div>

                                    <strong>
                                        Notifications
                                    </strong>

                                    <span>
                                        {{ $sidebarUnreadCount }} unread
                                    </span>

                                </div>


                                @if($sidebarUnreadCount > 0)

                                <span class="notification-count">
                                    {{ $sidebarUnreadCount }}
                                </span>

                                @endif

                            </div>



                            <div class="notification-list">


                                @php

                                $latestNotifications = \App\Models\Enquiry::where(
                                'status',
                                'new'
                                )
                                ->orderBy(
                                'created_at',
                                'desc'
                                )
                                ->limit(5)
                                ->get();

                                @endphp


                                @forelse($latestNotifications as $notification)


                                <a
                                    href="{{ route('admin.enquiries.show', $notification) }}"
                                    class="notification-item">


                                    <div class="notification-item-icon">
                                        ✉
                                    </div>


                                    <div class="notification-item-content">

                                        <strong>
                                            New enquiry
                                        </strong>

                                        <p>
                                            {{ $notification->name }}
                                        </p>

                                        <span>

                                            {{ $notification->created_at
                                                    ? $notification->created_at->diffForHumans()
                                                    : 'Recently'
                                                }}

                                        </span>

                                    </div>


                                </a>


                                @empty


                                <div class="notification-empty">

                                    <div class="notification-empty-icon">
                                        ✓
                                    </div>

                                    <strong>
                                        All caught up
                                    </strong>

                                    <span>
                                        No new enquiries.
                                    </span>

                                </div>


                                @endforelse


                            </div>



                            <div class="notification-footer">

                                <a
                                    href="{{ route('admin.enquiries.index') }}">

                                    View All Enquiries

                                    <span>
                                        →
                                    </span>

                                </a>

                            </div>


                        </div>


                    </div>



                    <!-- ================= PROFILE ================= -->

                    <div class="topbar-profile-wrapper">


                        <button
                            type="button"
                            class="topbar-profile"
                            id="topbarProfileButton"
                            aria-label="Open admin profile"
                            aria-expanded="false">


                            <div class="topbar-avatar">
                                A
                            </div>


                            <div class="topbar-profile-info">

                                <strong>
                                    Admin
                                </strong>

                                <span>
                                    Administrator
                                </span>

                            </div>


                        </button>



                        <!-- PROFILE DROPDOWN -->

                        <div
                            class="admin-profile-dropdown topbar-profile-dropdown"
                            id="topbarProfileDropdown">


                            <div class="profile-dropdown-header">

                                <div class="profile-dropdown-avatar">
                                    A
                                </div>

                                <div>

                                    <strong>
                                        Admin
                                    </strong>

                                    <span>
                                        Administrator
                                    </span>

                                </div>

                            </div>


                            <div class="profile-dropdown-divider"></div>


                            <a
                                href="{{ route('admin.settings.index') }}"
                                class="profile-dropdown-item">

                                <span>
                                    ⚙
                                </span>

                                <span>
                                    Settings
                                </span>

                            </a>


                            <a
                                href="{{ route('admin.enquiries.index') }}"
                                class="profile-dropdown-item">

                                <span>
                                    ✉
                                </span>

                                <span>
                                    Enquiries
                                </span>

                            </a>


                            <div class="profile-dropdown-divider"></div>


                            <form
                                action="{{ route('admin.logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="profile-dropdown-item profile-dropdown-logout">

                                    <span>
                                        ↪
                                    </span>

                                    <span>
                                        Logout
                                    </span>

                                </button>

                            </form>


                        </div>


                        </div>


                    </div>


            </header>



            <!-- ================= PAGE CONTENT ================= -->

            <main class="admin-content">

                @yield('content')

            </main>



            <!-- ================= FOOTER ================= -->

            <footer class="admin-footer">


                <span>
                    © {{ date('Y') }} Giga Infotech
                </span>


                <span>
                    Admin Panel
                </span>


            </footer>


        </div>


    </div>



    <!-- ================= ADMIN JS ================= -->

    <script src="{{ asset('assets/js/admin.js') }}"></script>


</body>

</html>