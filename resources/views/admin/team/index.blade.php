@extends('layouts.admin')

@section('title', 'Team Members | Admin')
@section('page', 'Team Members')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Team Members</h1>
        <p>Manage your Giga Infotech team members.</p>
    </div>

    <a href="{{ route('admin.team.create') }}" class="admin-primary-btn">
        + Add Team Member
    </a>

</div>


@if(session('success'))
<div class="admin-alert success">
    {{ session('success') }}
</div>
@endif


<div class="admin-table-card">

    <div class="admin-table-header">
        <h2>All Team Members</h2>

        <span>
            {{ $teamMembers->count() }} Members
        </span>
    </div>


    <div class="admin-table-wrapper">

        <table class="admin-table">

            <thead>
                <tr>
                    <th>Member</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($teamMembers as $member)

                <tr>

                    <td>

                        <div class="admin-member-cell">

                            @if($member->image)

                            <img
                                src="{{ asset('storage/' . $member->image) }}"
                                alt="{{ $member->name }}"
                                class="admin-member-thumb">

                            @endif

                            <strong>
                                {{ $member->name }}
                            </strong>

                        </div>

                    </td>

                    <td>
                        {{ $member->role }}
                    </td>

                    <td>
                        {{ $member->email ?? '—' }}
                    </td>

                    <td>
                        <span class="status-badge {{ $member->status }}">
                            {{ ucfirst($member->status) }}
                        </span>
                    </td>

                    <td>
                        {{ $member->sort_order ?? 0 }}
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('admin.team.edit', $member->_id) }}"
                                class="table-action edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.team.destroy', $member->_id) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this team member?');">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="table-action delete">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="empty-table">
                        No team members added yet.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection