@extends('layouts.admin')

@section('title', 'Edit Team Member | Admin')
@section('page', 'Edit Team Member')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Team Member</h1>
        <p>Update team member information and profile image.</p>
    </div>

    <a href="{{ route('admin.team.index') }}" class="admin-secondary-btn">
        ← Back
    </a>

</div>


@if($errors->any())

    <div class="admin-alert error">

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

@endif


<div class="admin-form-card">

    <form
        action="{{ route('admin.team.update', $teamMember->_id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="admin-form-grid">


            <!-- NAME -->

            <div class="admin-form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $teamMember->name) }}"
                    placeholder="Enter team member name"
                    required
                >

            </div>


            <!-- ROLE -->

            <div class="admin-form-group">

                <label for="role">
                    Role
                </label>

                <input
                    type="text"
                    id="role"
                    name="role"
                    value="{{ old('role', $teamMember->role) }}"
                    placeholder="e.g. Frontend Developer"
                    required
                >

            </div>


            <!-- CURRENT IMAGE -->

            <div class="admin-form-group full">

                <label>
                    Current Profile Image
                </label>

                @if($teamMember->image)

                    <div class="current-team-image">

                        <img
                            src="{{ asset('storage/' . $teamMember->image) }}"
                            alt="{{ $teamMember->name }}"
                        >

                    </div>

                @else

                    <p>
                        No image uploaded.
                    </p>

                @endif

            </div>


            <!-- NEW IMAGE -->

            <div class="admin-form-group full">

                <label for="image">
                    Change Profile Image
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small class="admin-form-help">
                    Leave empty to keep the current image.
                    JPG, JPEG, PNG or WebP. Maximum size: 2 MB.
                </small>

            </div>


            <!-- BIO -->

            <div class="admin-form-group full">

                <label for="bio">
                    Bio
                </label>

                <textarea
                    id="bio"
                    name="bio"
                    rows="5"
                    placeholder="Write a short description..."
                >{{ old('bio', $teamMember->bio) }}</textarea>

            </div>


            <!-- EMAIL -->

            <div class="admin-form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $teamMember->email) }}"
                    placeholder="example@gigainfotech.com"
                >

            </div>


            <!-- PHONE -->

            <div class="admin-form-group">

                <label for="phone">
                    Phone
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $teamMember->phone) }}"
                    placeholder="Enter phone number"
                >

            </div>


            <!-- STATUS -->

            <div class="admin-form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option
                        value="active"
                        {{ old('status', $teamMember->status) === 'active' ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="inactive"
                        {{ old('status', $teamMember->status) === 'inactive' ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <!-- SORT ORDER -->

            <div class="admin-form-group">

                <label for="sort_order">
                    Display Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}"
                    min="0"
                    placeholder="0"
                >

            </div>


        </div>


        <div class="admin-form-actions">

            <a
                href="{{ route('admin.team.index') }}"
                class="admin-secondary-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="admin-primary-btn"
            >
                Update Team Member
            </button>

        </div>


    </form>

</div>

@endsection