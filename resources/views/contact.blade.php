@extends('layouts.app')

@section('title', 'Contact Us | Giga Infotech')

@section('description', 'Get in touch with Giga Infotech for web development, software development and digital solutions.')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/team.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">


<!-- ================= CONTACT HERO ================= -->

<section class="page-hero">

    <div class="container">

        <span class="hero-badge">
            CONTACT US
        </span>

        <h1>
            Let's Build Something
            <span class="highlight">Great Together</span>
        </h1>

        <p>
            Have an idea, project or requirement?
            Let's start a conversation.
        </p>

    </div>

</section>



<!-- ================= CONTACT SECTION ================= -->

<section class="section">

    <div class="container">

        <div class="contact-grid">


            <!-- ================= CONTACT INFORMATION ================= -->

            <div class="contact-info">

                <span class="small-title">
                    GET IN TOUCH
                </span>

                <h2>
                    Let's Talk About
                    <span class="highlight">Your Idea</span>
                </h2>

                <p>
                    Whether you need a website, software solution
                    or a customized digital experience, we'd be
                    happy to discuss your requirements.
                </p>


                <!-- CONTACT DETAILS -->

                <div class="contact-details">


                    <!-- ================= EMAIL ================= -->

                    <a
                        href="mailto:{{ $settings?->website_email ?? 'info@gigainfotech.com' }}"
                        class="contact-item contact-link"
                    >

                        <div class="contact-icon">
                            @
                        </div>

                        <div>

                            <span>
                                Email
                            </span>

                            <strong>
                                {{ $settings?->website_email ?? 'info@gigainfotech.com' }}
                            </strong>

                        </div>

                    </a>



                    <!-- ================= PHONE ================= -->

                    <a
                        href="tel:{{ $settings?->website_phone ?? '' }}"
                        class="contact-item contact-link"
                    >

                        <div class="contact-icon">
                            ☎
                        </div>

                        <div>

                            <span>
                                Phone
                            </span>

                            <strong>
                                {{ $settings?->website_phone ?? '+91 XXXXX XXXXX' }}
                            </strong>

                        </div>

                    </a>



                    <!-- ================= LOCATION ================= -->

                    @php

                        $location = $settings?->website_location
                            ?? 'Jaipur, Rajasthan, India';

                        $mapUrl = 'https://www.google.com/maps/search/?api=1&query='
                            . urlencode($location);

                    @endphp


                    <a
                        href="{{ $mapUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="contact-item contact-link"
                    >

                        <div class="contact-icon">
                            ⌖
                        </div>

                        <div>

                            <span>
                                Location
                            </span>

                            <strong>
                                {{ $location }}
                            </strong>

                        </div>

                    </a>


                </div>

            </div>



            <!-- ================= CONTACT FORM ================= -->

            <div class="contact-form glass-card">


                <div class="form-heading">

                    <span class="small-title">
                        SEND A MESSAGE
                    </span>

                    <h3>
                        Tell Us About Your Project
                    </h3>

                </div>



                <!-- ================= CONTACT FORM ================= -->

                <form
                    id="contactForm"
                    action="{{ route('contact.submit') }}"
                    method="POST"
                >

                    @csrf


                    <!-- ================= NAME + EMAIL ================= -->

                    <div class="form-row">


                        <div class="form-group">

                            <label for="name">
                                Your Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your name"
                                required
                            >

                        </div>



                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                    </div>



                    <!-- ================= PHONE ================= -->

                    <div class="form-group">

                        <label for="phone">
                            Phone Number
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="Enter your phone number"
                        >

                    </div>



                    <!-- ================= SUBJECT ================= -->

                    <div class="form-group">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            placeholder="What do you need help with?"
                            required
                        >

                    </div>



                    <!-- ================= MESSAGE ================= -->

                    <div class="form-group">

                        <label for="message">
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Tell us about your project..."
                            required
                        >{{ old('message') }}</textarea>

                    </div>



                    <!-- ================= SUBMIT ================= -->

                    <button
                        type="submit"
                        class="btn btn-primary contact-submit"
                    >
                        Send Message
                    </button>


                </form>


            </div>


        </div>

    </div>

</section>



<!-- ================= CONTACT CTA ================= -->

<section class="section">

    <div class="container">

        <div class="cta-box glass-card">

            <span>
                GIGA INFOTECH
            </span>

            <h2>
                Let's Turn Your Idea Into Reality.
            </h2>

            <p>
                Tell us what you're planning and let's explore
                the right digital solution for your needs.
            </p>

        </div>

    </div>

</section>



<!-- ================= CONTACT TOAST ================= -->

<div
    id="contactToast"
    class="contact-toast"
    role="alert"
    aria-live="polite"
></div>



<!-- ================= CONTACT AJAX ================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('contactForm');
    const toast = document.getElementById('contactToast');

    if (!form || !toast) {
        return;
    }


    form.addEventListener('submit', async function (event) {

        event.preventDefault();


        const submitButton = form.querySelector('.contact-submit');

        if (!submitButton) {
            return;
        }


        const originalText = submitButton.innerHTML;


        submitButton.disabled = true;
        submitButton.innerHTML = 'Sending...';


        try {

            const formData = new FormData(form);


            const response = await fetch(form.action, {

                method: 'POST',

                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },

                body: formData,

                credentials: 'same-origin'

            });


            const responseText = await response.text();

            let data = null;


            try {

                data = JSON.parse(responseText);

            } catch (jsonError) {

                data = null;

            }


            // SUCCESS

            if (response.ok) {

                showContactToast(
                    data?.message ||
                    'Your message has been sent successfully.',
                    'success'
                );


                form.reset();

                return;
            }


            // VALIDATION ERROR

            if (response.status === 422 && data?.errors) {

                const firstField = Object.keys(data.errors)[0];

                const firstError = data.errors[firstField][0];


                showContactToast(
                    firstError,
                    'error'
                );


                return;
            }


            // CSRF ERROR

            if (response.status === 419) {

                showContactToast(
                    'Page expired. Please refresh the page and try again.',
                    'error'
                );


                return;
            }


            // OTHER ERROR

            console.error(
                'Contact form response:',
                response.status,
                responseText
            );


            showContactToast(
                data?.message ||
                'Something went wrong. Please try again.',
                'error'
            );


        } catch (error) {

            console.error(
                'Contact form request failed:',
                error
            );


            showContactToast(
                'Unable to send your message. Please try again.',
                'error'
            );


        } finally {

            submitButton.disabled = false;

            submitButton.innerHTML = originalText;

        }

    });



    // TOAST

    function showContactToast(message, type) {

        toast.textContent = message;

        toast.className = 'contact-toast ' + type;


        requestAnimationFrame(function () {

            toast.classList.add('show');

        });


        setTimeout(function () {

            toast.classList.remove('show');

        }, 4000);

    }

});

</script>


@endsection