@extends('layouts.admin')

@section('title', 'Enquiry Details')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Enquiry Details</h1>
        <p>View and manage this contact enquiry.</p>
    </div>

    <a
        href="{{ route('admin.enquiries.index') }}"
        class="admin-btn"
    >
        ← Back
    </a>

</div>


@if(session('success'))
    <div class="admin-alert success">
        {{ session('success') }}
    </div>
@endif


<div class="admin-enquiry-layout">


    <!-- Enquiry Details -->

    <div class="admin-form-card">

        <div class="admin-enquiry-heading">

            <div class="admin-enquiry-avatar">
                {{ strtoupper(substr($enquiry->name, 0, 1)) }}
            </div>

            <div>

                <h2>
                    {{ $enquiry->name }}
                </h2>

                <p>
                    Received
                    {{ $enquiry->created_at?->format('d M Y, h:i A') }}
                </p>

            </div>

        </div>


        <div class="admin-enquiry-details">

            <div class="admin-enquiry-detail">

                <span>Email</span>

                <strong>
                    {{ $enquiry->email }}
                </strong>

            </div>


            <div class="admin-enquiry-detail">

                <span>Phone</span>

                <strong>
                    {{ $enquiry->phone ?: 'Not provided' }}
                </strong>

            </div>


            <div class="admin-enquiry-detail">

                <span>Subject</span>

                <strong>
                    {{ $enquiry->subject ?: 'No subject' }}
                </strong>

            </div>

        </div>


        <div class="admin-enquiry-message">

            <span>Message</span>

            <p>
                {{ $enquiry->message }}
            </p>

        </div>

    </div>


    <!-- Status -->

    <div class="admin-form-card">

        <h3 class="admin-enquiry-side-title">
            Update Status
        </h3>


        <form
            action="{{ route('admin.enquiries.status', $enquiry) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="admin-form-group">

                <label for="status">
                    Enquiry Status
                </label>

                <select
                    name="status"
                    id="status"
                    required
                >

                    <option
                        value="new"
                        {{ $enquiry->status === 'new' ? 'selected' : '' }}
                    >
                        New
                    </option>

                    <option
                        value="read"
                        {{ $enquiry->status === 'read' ? 'selected' : '' }}
                    >
                        Read
                    </option>

                    <option
                        value="replied"
                        {{ $enquiry->status === 'replied' ? 'selected' : '' }}
                    >
                        Replied
                    </option>

                    <option
                        value="closed"
                        {{ $enquiry->status === 'closed' ? 'selected' : '' }}
                    >
                        Closed
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="admin-btn admin-btn-primary"
                style="margin-top: 15px; width: 100%;"
            >
                Update Status
            </button>

        </form>


        <form
            action="{{ route('admin.enquiries.destroy', $enquiry) }}"
            method="POST"
            onsubmit="return confirm('Delete this enquiry permanently?');"
            style="margin-top: 10px;"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="admin-btn admin-btn-delete"
                style="width: 100%;"
            >
                Delete Enquiry
            </button>

        </form>

    </div>

</div>

@endsection