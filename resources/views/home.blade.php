@extends('layouts.app')

@section('title', 'Giga Infotech | Digital Solutions')

@section('description', 'Giga Infotech provides modern web development, software solutions and digital technology services.')

@section('content')

<!-- ================= HERO SECTION ================= -->

<section class="hero">

    <div class="hero-container">

        <div class="hero-content">

            <span class="hero-badge">
                Giga Infotech
            </span>

            <h1>
                Building Digital
                <span class="highlight">Solutions</span>
                For Modern
                Businesses
            </h1>

            <p class="hero-description">
                We create modern, scalable and user-focused digital
                solutions that help businesses establish a strong
                presence in the digital world.
            </p>

            <div class="hero-buttons">

                <a href="{{ url('/services') }}" class="btn btn-primary">
                    Explore Services
                </a>

                <a href="{{ url('/contact') }}" class="btn btn-outline">
                    Get In Touch
                </a>

            </div>

        </div>


        <!-- FUTURISTIC VISUAL -->

        <div class="hero-visual">

            <div class="hero-orbit">

                <div class="hero-core">
                    <div class="hero-core-text">
                        <img src="{{asset('images/logo4.png')}}" alt="Giga Info Tech">
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= ABOUT PREVIEW ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span>WHO WE ARE</span>

            <h2>
                <span class="highlight">Technology</span>
                With Purpose
            </h2>

            <p>
                At Giga Infotech, we combine technology, creativity
                and practical thinking to build digital experiences
                that make a difference.
            </p>

        </div>


        <div class="glass-card">

            <p>
                We focus on creating reliable and modern web
                solutions for businesses and organizations.
                From website development to customized software
                solutions, our goal is to turn ideas into useful
                digital products.
            </p>

            <br>

            <a href="{{ url('/about') }}" class="btn btn-outline">
                Know More About Us
            </a>

        </div>

    </div>

</section>


<!-- ================= SERVICES PREVIEW ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span>WHAT WE DO</span>

            <h2>
                Our <span class="highlight">Services</span>
            </h2>

            <p>
                Digital solutions designed to support modern
                business requirements.
            </p>

        </div>


        <div class="services-grid">


            <div class="glass-card">

                <h3>Web Development</h3>

                <p>
                    Modern, responsive and scalable websites
                    designed for today's digital world.
                </p>

            </div>


            <div class="glass-card">

                <h3>Mobile App Development</h3>

                <p>
                    Customized mobile applications built around
                    specific business requirements.
                </p>

            </div>


            <div class="glass-card">

                <h3>UI/UX Design</h3>

                <p>
                    Clean and intuitive interfaces focused on
                    usability and better user experiences.
                </p>

            </div>


            <div class="glass-card">

                <h3>Digital Solutions</h3>

                <p>
                    Technology-driven solutions that help
                    businesses improve their digital presence.
                </p>

            </div>


        </div>


        <div class="center-button">

            <a href="{{ url('/services') }}" class="btn btn-primary">
                View All Services
            </a>

        </div>

    </div>

</section>


<!-- ================= WHY GIT ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span>WHY GIGA INFOTECH</span>

            <h2>
                Built Around Your
                <span class="highlight">Goals</span>
            </h2>

        </div>


        <div class="features-grid">


            <div class="glass-card">

                <h3>Modern Technology</h3>

                <p>
                    We use modern development practices and
                    technologies to create future-ready solutions.
                </p>

            </div>


            <div class="glass-card">

                <h3>User Focused</h3>

                <p>
                    Every solution is designed with usability,
                    accessibility and user experience in mind.
                </p>

            </div>


            <div class="glass-card">

                <h3>Scalable Solutions</h3>

                <p>
                    Our approach focuses on creating solutions
                    that can grow with changing requirements.
                </p>

            </div>


        </div>

    </div>

</section>


<!-- ================= CTA ================= -->

<section class="section">

    <div class="container">

        <div class="cta-box glass-card">

            <span>LET'S BUILD SOMETHING</span>

            <h2>
                Have an Idea?
                Let's Turn It Into Reality.
            </h2>

            <p>
                Let's discuss your requirements and explore
                the right digital solution for your business.
            </p>

            <a href="{{ url('/contact') }}" class="btn btn-primary">
                Contact Giga Infotech
            </a>

        </div>

    </div>

</section>

@endsection