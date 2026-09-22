@extends('layouts.app')

@section('title', 'About Us | Giga Infotech')

@section('description', 'Learn more about Giga Infotech, our approach, values and vision.')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
<!-- ================= ABOUT HERO ================= -->

<section class="page-hero">

    <div class="container">

        <span class="hero-badge">
            ABOUT GIGA INFOTECH
        </span>

        <h1>
            Technology That
            <span class="highlight">Moves Businesses Forward</span>
        </h1>

        <p>
            We build modern digital solutions by combining
            technology, creativity and practical business thinking.
        </p>

    </div>

</section>


<!-- ================= ABOUT INTRO ================= -->

<section class="section">

    <div class="container">

        <div class="about-intro">

            <div class="about-content">

                <span class="small-title">
                    WHO WE ARE
                </span>

                <h2>
                    Turning Ideas Into
                    Digital Experiences
                </h2>

                <p>
                    Giga Infotech is a technology-focused company
                    dedicated to creating modern digital solutions
                    for businesses and organizations.
                </p>

                <p>
                    Our approach focuses on understanding requirements,
                    selecting the right technology and creating solutions
                    that are simple, reliable and ready to grow.
                </p>

            </div>


            <div class="about-visual glass-card">

                <div class="about-icon">
                    <a href="{{url('/')}}">
                    <img src="{{asset('images/logo4.png')}}" alt="Giga Info Tech" >
                    </a>
                </div>

                <h3>
                    Digital Innovation
                </h3>

                <p>
                    Technology, creativity and strategy working together.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= OUR APPROACH ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="small-title">
                OUR APPROACH
            </span>

            <h2>
                Simple. Modern. Purposeful.
            </h2>

            <p>
                We believe technology should solve real problems
                while keeping the experience simple for users.
            </p>

        </div>


        <div class="features-grid">

            <div class="glass-card">

                <h3>
                    Understand
                </h3>

                <p>
                    We first understand the goals, requirements
                    and challenges behind every digital idea.
                </p>

            </div>


            <div class="glass-card">

                <h3>
                    Build
                </h3>

                <p>
                    We transform ideas into clean, functional
                    and modern digital solutions.
                </p>

            </div>


            <div class="glass-card">

                <h3>
                    Improve
                </h3>

                <p>
                    We focus on continuous improvement,
                    scalability and better user experience.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= VISION & MISSION ================= -->

<section class="section">

    <div class="container">

        <div class="vision-grid">

            <div class="glass-card">

                <span class="small-title">
                    OUR VISION
                </span>

                <h2>
                    Creating A Smarter
                    Digital Future
                </h2>

                <p>
                    To create meaningful digital experiences
                    that help businesses adapt, grow and
                    confidently move forward with technology.
                </p>

            </div>


            <div class="glass-card">

                <span class="small-title">
                    OUR MISSION
                </span>

                <h2>
                    Technology With
                    Real Purpose
                </h2>

                <p>
                    To deliver practical, modern and reliable
                    technology solutions while maintaining a
                    strong focus on quality and user experience.
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
                LET'S CONNECT
            </span>

            <h2>
                Have A Digital Idea?
            </h2>

            <p>
                Let's discuss how technology can help turn
                your idea into a useful digital solution.
            </p>

            <a href="{{ url('/contact') }}" class="btn btn-primary">
                Get In Touch
            </a>

        </div>

    </div>

</section>

@endsection