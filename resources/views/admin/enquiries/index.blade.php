@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Enquiries</h1>
        <p>Manage contact enquiries received from the website.</p>
    </div>

</div>


@if(session('success'))
    <div class="admin-alert success">
        {{ session('success') }}
    </div>
@endif


<div class="admin-table-card">

    <div class="admin-table-wrapper">

        <table class="admin-table">

            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($enquiries as $enquiry)

                    <tr>

                        <td>
                            {{ $enquiry->created_at?->format('d M Y, h:i A') }}
                        </td>

                        <td>
                            <strong>{{ $enquiry->name }}</strong>
                        </td>

                        <td>
                            {{ $enquiry->email }}
                        </td>

                        <td>
                            {{ $enquiry->phone ?: '—' }}
                        </td>

                        <td>
                            {{ $enquiry->subject ?: '—' }}
                        </td>

                        <td>

                            @php
                                $statusClass = match($enquiry->status) {
                                    'new' => 'new',
                                    'read' => 'read',
                                    'replied' => 'replied',
                                    'closed' => 'closed',
                                    default => 'inactive',
                                };
                            @endphp

                            <span class="admin-enquiry-status {{ $statusClass }}">
                                {{ ucfirst($enquiry->status) }}
                            </span>

                        </td>

                        <td>

                            <div class="admin-action-buttons">

                                <a
                                    href="{{ route('admin.enquiries.show', $enquiry) }}"
                                    class="admin-btn admin-btn-edit"
                                >
                                    View
                                </a>

                                <form
                                    action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this enquiry?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="admin-btn admin-btn-delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="admin-empty-state">

                            <strong>No enquiries yet.</strong>

                            <br>

                            Contact form submissions will appear here.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection