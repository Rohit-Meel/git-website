@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div class="admin-page-header">
    <div>
        <h1>Services</h1>
        <p>Manage all website services from here.</p>
    </div>

    <a href="{{ route('admin.services.create') }}" class="admin-btn admin-btn-primary">
        + Add Service
    </a>
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
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($services as $service)

                    <tr>

                        <td>
                            {{ $service->sort_order ?? 0 }}
                        </td>

                        <td>
                            <div class="admin-service-icon">
                                {{ $service->icon }}
                            </div>
                        </td>

                        <td>
                            <strong>{{ $service->name }}</strong>
                        </td>

                        <td>
                            <div class="admin-service-description">
                                {{ $service->description }}
                            </div>
                        </td>

                        <td>
                            <div class="admin-service-tags">

                                @foreach($service->tags ?? [] as $tag)
                                    <span>{{ $tag }}</span>
                                @endforeach

                            </div>
                        </td>

                        <td>

                            @if($service->status === 'active')

                                <span class="admin-status active">
                                    Active
                                </span>

                            @else

                                <span class="admin-status inactive">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="admin-action-buttons">

                                <a
                                    href="{{ route('admin.services.edit', $service) }}"
                                    class="admin-btn admin-btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.services.destroy', $service) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this service?');"
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
                            No services found.
                            <br><br>

                            <a
                                href="{{ route('admin.services.create') }}"
                                class="admin-btn admin-btn-primary"
                            >
                                Add Your First Service
                            </a>
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection