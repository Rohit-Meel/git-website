@extends('layouts.app')

@section('title', 'Services | Giga Infotech')

@section('description', 'Explore web development, software development, UI/UX design and digital solutions by Giga Infotech.')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

<!-- ================= SERVICES HERO ================= -->

<section class="page-hero">

    <div class="container">

        <span class="hero-badge">
            OUR SERVICES
        </span>

        <h1>
            Digital Solutions
            <span class="highlight">Built For Growth</span>
        </h1>

        <p>
            From websites to customized software solutions,
            we create technology that supports modern business needs.
        </p>

    </div>

</section>


<!-- ================= MAIN SERVICES ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="small-title">
                WHAT WE OFFER
            </span>

            <h2>
                Our Core
                <span class="highlight">Services</span>
            </h2>

            <p>
                Practical and modern technology solutions designed
                around your business requirements.
            </p>

        </div>


        <div class="services-grid">

            @forelse($services as $service)

                <div class="service-card glass-card">

                    <div class="service-number">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <div class="service-icon">
                        {{ $service->icon }}
                    </div>

                    <h3>
                        {{ $service->name }}
                    </h3>

                    <p>
                        {{ $service->description }}
                    </p>

                    @if(!empty($service->tags))

                        <div class="service-tags">

                            @foreach($service->tags as $tag)

                                <span>
                                    {{ $tag }}
                                </span>

                            @endforeach

                        </div>

                    @endif

                </div>

            @empty

                <div class="service-card glass-card">

                    <div class="service-icon">
                        GIT
                    </div>

                    <h3>
                        Services Coming Soon
                    </h3>

                    <p>
                        Our services are currently being updated.
                        Please check back soon.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ================= HOW WE WORK ================= -->

<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="small-title">
                HOW WE WORK
            </span>

            <h2>
                From Idea To
                <span class="highlight">Solution</span>
            </h2>

            <p>
                A straightforward approach focused on understanding,
                building and delivering useful digital solutions.
            </p>

        </div>


        <div class="process-grid">


            <div class="process-item">

                <div class="process-step">
                    01
                </div>

                <h3>
                    Discover
                </h3>

                <p>
                    Understand the idea, requirements and goals.
                </p>

            </div>


            <div class="process-line"></div>


            <div class="process-item">

                <div class="process-step">
                    02
                </div>

                <h3>
                    Design
                </h3>

                <p>
                    Plan the structure and user experience.
                </p>

            </div>


            <div class="process-line"></div>


            <div class="process-item">

                <div class="process-step">
                    03
                </div>

                <h3>
                    Develop
                </h3>

                <p>
                    Build the solution using suitable technologies.
                </p>

            </div>


            <div class="process-line"></div>


            <div class="process-item">

                <div class="process-step">
                    04
                </div>

                <h3>
                    Deliver
                </h3>

                <p>
                    Finalize the solution and prepare it for use.
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
                START A CONVERSATION
            </span>

            <h2>
                Looking For A Digital Solution?
            </h2>

            <p>
                Tell us about your requirements and let's explore
                the right technology approach for your idea.
            </p>

            <a href="{{ url('/contact') }}" class="btn btn-primary">
                Contact Us
            </a>

        </div>

    </div>

</section>

@endsection