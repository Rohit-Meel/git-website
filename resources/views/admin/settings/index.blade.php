@extends('layouts.admin')

@section('title', 'Settings | Giga Infotech')

@section('content')


<!-- ================= PAGE HEADER ================= -->

<div class="admin-page-header">

    <div>

        <h1>
            Settings
        </h1>

        <p>
            Manage your website and company information.
        </p>

    </div>

</div>



<!-- ================= SUCCESS MESSAGE ================= -->

@if(session('success'))

    <div class="admin-alert success">

        {{ session('success') }}

    </div>

@endif



<!-- ================= VALIDATION ERRORS ================= -->

@if($errors->any())

    <div class="admin-alert error">

        <strong>
            Please fix the following:
        </strong>

        <ul>

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif



<!-- ================= SETTINGS FORM ================= -->

<form
    action="{{ route('admin.settings.update') }}"
    method="POST"
>

    @csrf
    @method('PUT')


    <div class="admin-form-card">


        <!-- ================= COMPANY ================= -->

        <div class="settings-section">

            <div class="settings-section-header">

                <div>

                    <span class="card-kicker">
                        COMPANY
                    </span>

                    <h2>
                        Company Information
                    </h2>

                    <p>
                        Basic information about your company.
                    </p>

                </div>

            </div>


            <div class="admin-form-grid">


                <!-- COMPANY NAME -->

                <div class="admin-form-group">

                    <label for="company_name">
                        Company Name
                    </label>

                    <input
                        type="text"
                        id="company_name"
                        name="company_name"
                        value="{{ old('company_name', $settings?->company_name ?? 'Giga Infotech') }}"
                        placeholder="Enter company name"
                        required
                    >

                </div>



                <!-- ADMIN EMAIL -->

                <div class="admin-form-group">

                    <label for="admin_email">
                        Admin Email
                    </label>

                    <input
                        type="email"
                        id="admin_email"
                        name="admin_email"
                        value="{{ old('admin_email', $settings?->admin_email ?? '') }}"
                        placeholder="Enter admin email"
                        required
                    >

                </div>



                <!-- PHONE -->

                <div class="admin-form-group">

                    <label for="phone">
                        Company Phone
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $settings?->phone ?? '') }}"
                        placeholder="Enter phone number"
                    >

                </div>



                <!-- ADDRESS -->

                <div class="admin-form-group">

                    <label for="address">
                        Company Address
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        placeholder="Enter company address"
                    >{{ old('address', $settings?->address ?? '') }}</textarea>

                </div>


            </div>

        </div>



        <!-- ================= WEBSITE ================= -->

        <div class="settings-section">


            <div class="settings-section-header">

                <div>

                    <span class="card-kicker">
                        WEBSITE
                    </span>

                    <h2>
                        Website Contact Information
                    </h2>

                    <p>
                        Information displayed on the public website.
                    </p>

                </div>

            </div>



            <div class="admin-form-grid">


                <!-- WEBSITE EMAIL -->

                <div class="admin-form-group">

                    <label for="website_email">
                        Website Email
                    </label>

                    <input
                        type="email"
                        id="website_email"
                        name="website_email"
                        value="{{ old('website_email', $settings?->website_email ?? '') }}"
                        placeholder="info@example.com"
                        required
                    >

                </div>



                <!-- WEBSITE PHONE -->

                <div class="admin-form-group">

                    <label for="website_phone">
                        Website Phone
                    </label>

                    <input
                        type="text"
                        id="website_phone"
                        name="website_phone"
                        value="{{ old('website_phone', $settings?->website_phone ?? '') }}"
                        placeholder="+91 XXXXX XXXXX"
                    >

                </div>



                <!-- LOCATION -->

                <div class="admin-form-group full-width">

                    <label for="website_location">
                        Website Location
                    </label>

                    <input
                        type="text"
                        id="website_location"
                        name="website_location"
                        value="{{ old('website_location', $settings?->website_location ?? '') }}"
                        placeholder="Jaipur, Rajasthan, India"
                    >

                </div>


            </div>

        </div>



        <!-- ================= SAVE ================= -->

        <div class="settings-actions">

            <button
                type="submit"
                class="admin-btn admin-btn-primary"
            >
                Save Settings
            </button>

        </div>


    </div>

</form>


@endsection