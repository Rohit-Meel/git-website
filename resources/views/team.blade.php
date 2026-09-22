@extends('layouts.app')

@section('title', 'Our Team | Giga Infotech')

@section('description', 'Meet the team behind Giga Infotech and the people building modern digital solutions.')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/team.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">


<!-- ================= TEAM HERO ================= -->

<section class="page-hero">

    <div class="container">

        <span class="hero-badge">
            OUR TEAM
        </span>

        <h1>
            Meet Our
            <span class="highlight">Team</span>
        </h1>

        <p>
            A team of passionate people working together to
            create meaningful and modern digital solutions.
        </p>

    </div>

</section>


<!-- ================= FEATURED CEO ================= -->

<section class="section featured-ceo-section">

    <div class="container">

        <div class="featured-ceo glass-card">


            <!-- LEFT SIDE : CEO IMAGE -->

            <div class="featured-ceo-image">

                <img
                    src="{{ asset('images/team/member-1.webp') }}"
                    alt="Vishal Saini - CEO & Founder"
                >

            </div>


            <!-- RIGHT SIDE : CEO DETAILS -->

            <div class="featured-ceo-content">

                <span class="featured-label">
                    LEADERSHIP
                </span>

                <h1 class="featured-ceo-name">
                    Vishal Saini
                </h1>

                <span class="team-role">
                    CEO & FOUNDER
                </span>

                <h3>
                    Founder & Strategic Lead
                </h3>

                <p>
                    As the Founder and CEO of Giga Infotech,
                    Vishal Saini focuses on shaping the company's
                    vision, driving innovation and building
                    technology solutions that create real value
                    for businesses and their customers.
                </p>


                <div class="featured-divider"></div>


                <div class="featured-points">

                    <span>
                        <i>●</i>
                        Technology & Innovation
                    </span>

                    <span>
                        <i>●</i>
                        Business Strategy
                    </span>

                    <span>
                        <i>●</i>
                        Digital Growth
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= TEAM MEMBERS ================= -->

<section class="section team-members-section">

    <div class="container">

        <div class="section-heading">

            <!-- <span class="small-title">
                OUR PEOPLE
            </span> -->

            <h2>
                Meet The <span class="highlight">Team Members</span>
            </h2>

            <p>
                Talented people bringing ideas, creativity and
                technology together.
            </p>

        </div>


        <!-- DYNAMIC TEAM MEMBERS -->

        <div class="team-grid">

            @forelse($teamMembers as $member)

                <div class="team-card glass-card">

                    <div class="team-image">

                        @if($member->image)

                            <img
                                src="{{ asset('storage/' . $member->image) }}"
                                alt="{{ $member->name }}"
                            >

                        @else

                            <div class="team-image-placeholder">
                                GIT
                            </div>

                        @endif

                    </div>


                    <div class="team-info">

                        <h1 class="member-name">
                            {{ $member->name }}
                        </h1>

                        <span class="team-role">
                            {{ strtoupper($member->role) }}
                        </span>

                        @if($member->bio)

                            <p>
                                {{ $member->bio }}
                            </p>

                        @endif

                    </div>

                </div>

            @empty

                <div class="team-empty">

                    <h3>
                        No Team Members Available
                    </h3>

                    <p>
                        Team members will appear here once they are
                        added from the admin panel.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ================= TEAM VALUES ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="small-title">
                HOW WE WORK
            </span>

            <h2>
                One <span class="highlight">Team.</span>
                One <span class="highlight">Direction.</span>
            </h2>

            <p>
                We believe great digital products come from
                collaboration, creativity and continuous learning.
            </p>

        </div>


        <div class="features-grid">

            <div class="glass-card">

                <h3>
                    Collaboration
                </h3>

                <p>
                    Working together and sharing ideas to create
                    better solutions.
                </p>

            </div>


            <div class="glass-card">

                <h3>
                    Creativity
                </h3>

                <p>
                    Looking for simple and creative approaches
                    to solve digital challenges.
                </p>

            </div>


            <div class="glass-card">

                <h3>
                    Growth
                </h3>

                <p>
                    Continuously learning new technologies and
                    improving our skills.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= CTA ================= -->

<section class="section">

    <div class="container">

        <div class="cta-box glass-card">

            <span>
                LET'S WORK TOGETHER
            </span>

            <h2>
                Have A Project In Mind?
            </h2>

            <p>
                Let's discuss your idea and find the right
                technology solution for it.
            </p>

            <a href="{{ url('/contact') }}" class="btn btn-primary">
                Get In Touch
            </a>

        </div>

    </div>

</section>


@endsection