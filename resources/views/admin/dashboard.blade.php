@extends('layouts.admin')

@section('title', 'Dashboard | Giga Infotech')
@section('page', 'Dashboard')

@section('content')


<!-- ================= WELCOME ================= -->

<section class="dashboard-welcome">

    <div>

        <span class="welcome-label">
            GIGA INFOTECH ADMIN
        </span>

        <h1 id="adminGreeting">
            Good Morning, Admin
        </h1>

        <p>
            Welcome back. Here's what's happening
            with your website today.
        </p>

    </div>


    <div class="welcome-date">

        <span class="date-icon">
            ◷
        </span>

        <div>

            <strong id="currentDate">
                Loading...
            </strong>

            <span id="currentTime">
                Loading...
            </span>

        </div>

    </div>

</section>



<!-- ================= STAT CARDS ================= -->

<section class="stats-grid">


    <!-- Enquiries -->

    <div class="stat-card">

        <div class="stat-card-top">

            <div class="stat-icon green">
                ✉
            </div>

            <span class="stat-change positive">
                Live
            </span>

        </div>

        <div class="stat-value">
            {{ $enquiryCount }}
        </div>

        <div class="stat-label">
            Total Enquiries
        </div>

        <div class="stat-footer">
            Total messages received
        </div>

    </div>



    <!-- Team -->

    <div class="stat-card">

        <div class="stat-card-top">

            <div class="stat-icon blue">
                ◉
            </div>

            <span class="stat-change neutral">
                Active
            </span>

        </div>

        <div class="stat-value">
            {{ str_pad($teamCount, 2, '0', STR_PAD_LEFT) }}
        </div>

        <div class="stat-label">
            Team Members
        </div>

        <div class="stat-footer">
            Current active team members
        </div>

    </div>



    <!-- Services -->

    <div class="stat-card">

        <div class="stat-card-top">

            <div class="stat-icon purple">
                ◆
            </div>

            <span class="stat-change positive">
                Live
            </span>

        </div>

        <div class="stat-value">
            {{ str_pad($serviceCount, 2, '0', STR_PAD_LEFT) }}
        </div>

        <div class="stat-label">
            Services
        </div>

        <div class="stat-footer">
            Active services available
        </div>

    </div>



    <!-- Unread -->

    <div class="stat-card">

        <div class="stat-card-top">

            <div class="stat-icon orange">
                ●
            </div>

            <span class="stat-change warning">
                New
            </span>

        </div>

        <div class="stat-value">
            {{ str_pad($unreadCount, 2, '0', STR_PAD_LEFT) }}
        </div>

        <div class="stat-label">
            Unread Enquiries
        </div>

        <div class="stat-footer">
            Need your attention
        </div>

    </div>

</section>



<!-- ================= MAIN DASHBOARD GRID ================= -->

<section class="dashboard-grid">


    <!-- ================= ANALYTICS ================= -->

    <!-- ================= ANALYTICS ================= -->

    <div class="dashboard-card analytics-card">

        <div class="card-header">

            <div>

                <span class="card-kicker">
                    OVERVIEW
                </span>

                <h2>
                    Enquiry Analytics
                </h2>

            </div>

            <div class="period-select">
                Last 7 Days
            </div>

        </div>


        <div class="chart-area">

            <div class="chart-y-axis">

                <span>
                    {{ max(5, ceil($maxCount ?? 1)) }}
                </span>

                <span>
                    {{ max(3, ceil(($maxCount ?? 1) * 0.66)) }}
                </span>

                <span>
                    {{ max(1, ceil(($maxCount ?? 1) * 0.33)) }}
                </span>

                <span>
                    0
                </span>

            </div>


            <div class="chart">

                <div class="chart-grid-line line-1"></div>
                <div class="chart-grid-line line-2"></div>
                <div class="chart-grid-line line-3"></div>
                <div class="chart-grid-line line-4"></div>


                <div class="chart-bars">

                    @foreach($analytics as $day)

                    <div
                        class="chart-column"
                        title="{{ $day['date'] }} — {{ $day['count'] }} enquiries">

                        <div
                            class="chart-bar"
                            data-height="{{ $day['height'] }}"></div>

                        <span>
                            {{ $day['label'] }}
                        </span>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>



    <!-- ================= QUICK ACTIONS ================= -->

    <div class="dashboard-card quick-card">

        <div class="card-header">

            <div>

                <span class="card-kicker">
                    SHORTCUTS
                </span>

                <h2>
                    Quick Actions
                </h2>

            </div>

        </div>


        <div class="quick-actions">


            <a
                href="{{ route('admin.team.create') }}"
                class="quick-action">

                <div class="quick-action-icon green">
                    +
                </div>

                <div>

                    <strong>
                        Add Team Member
                    </strong>

                    <span>
                        Create a new team profile
                    </span>

                </div>

                <span class="action-arrow">
                    →
                </span>

            </a>



            <a
                href="{{ route('admin.services.create') }}"
                class="quick-action">

                <div class="quick-action-icon blue">
                    +
                </div>

                <div>

                    <strong>
                        Add Service
                    </strong>

                    <span>
                        Create a new service
                    </span>

                </div>

                <span class="action-arrow">
                    →
                </span>

            </a>



            <a
                href="{{ route('admin.enquiries.index') }}"
                class="quick-action">

                <div class="quick-action-icon purple">
                    →
                </div>

                <div>

                    <strong>
                        View Enquiries
                    </strong>

                    <span>
                        Check customer messages
                    </span>

                </div>

                <span class="action-arrow">
                    →
                </span>

            </a>


        </div>

    </div>

</section>



<!-- ================= RECENT ENQUIRIES ================= -->

<section class="dashboard-card recent-card">

    <div class="card-header">

        <div>

            <span class="card-kicker">
                COMMUNICATION
            </span>

            <h2>
                Recent Enquiries
            </h2>

        </div>

        <a
            href="{{ route('admin.enquiries.index') }}"
            class="view-all">
            View All →
        </a>

    </div>


    <div class="table-wrapper">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>
                        Customer
                    </th>

                    <th>
                        Subject
                    </th>

                    <th>
                        Date
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($recentEnquiries as $enquiry)

                <tr>

                    <td>

                        <div class="customer-cell">

                            <div class="customer-avatar">
                                {{ strtoupper(substr($enquiry->name, 0, 1)) }}
                            </div>

                            <div>

                                <strong>
                                    {{ $enquiry->name }}
                                </strong>

                                <span>
                                    {{ $enquiry->email }}
                                </span>

                            </div>

                        </div>

                    </td>


                    <td>

                        {{ $enquiry->subject ?: 'No subject' }}

                    </td>


                    <td>

                        {{ $enquiry->created_at?->format('d M Y') }}

                    </td>


                    <td>

                        @php

                        $statusClass = match($enquiry->status) {

                        'new' => 'unread',

                        'read' => 'read',

                        'replied' => 'read',

                        'closed' => 'read',

                        default => 'read',

                        };

                        $statusText = match($enquiry->status) {

                        'new' => 'Unread',

                        'read' => 'Read',

                        'replied' => 'Replied',

                        'closed' => 'Closed',

                        default => ucfirst($enquiry->status),

                        };

                        @endphp


                        <span class="status {{ $statusClass }}">

                            {{ $statusText }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="4"
                        style="text-align: center; padding: 30px;">

                        No enquiries received yet.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>
<script>
    document.querySelectorAll('.chart-bar').forEach(function (bar) {

        const height = bar.dataset.height;

        bar.style.height = height + '%';

    });
</script>

@endsection