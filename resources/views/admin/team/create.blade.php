@extends('layouts.admin')

@section('title', 'Add Team Member | Admin')
@section('page', 'Add Team Member')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Add Team Member</h1>
        <p>Add a new member to the Giga Infotech team.</p>
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
        action="{{ route('admin.team.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


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
                    value="{{ old('name') }}"
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
                    value="{{ old('role') }}"
                    placeholder="e.g. Frontend Developer"
                    required
                >

            </div>


            <!-- IMAGE -->

            <div class="admin-form-group full">

                <label for="image">
                    Profile Image
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >

                <small class="admin-form-help">
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
                    placeholder="Write a short description about the team member..."
                >{{ old('bio') }}</textarea>

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
                    value="{{ old('email') }}"
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
                    value="{{ old('phone') }}"
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
                        {{ old('status', 'active') === 'active' ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="inactive"
                        {{ old('status') === 'inactive' ? 'selected' : '' }}
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
                    value="{{ old('sort_order', 0) }}"
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
                Add Team Member
            </button>

        </div>


    </form>

</div>

@endsection