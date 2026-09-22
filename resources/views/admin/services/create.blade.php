@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')

<div class="admin-page-header">
    <div>
        <h1>Add Service</h1>
        <p>Create a new service for the website.</p>
    </div>

    <a href="{{ route('admin.services.index') }}" class="admin-btn">
        ← Back
    </a>
</div>

<div class="admin-form-card">

    <form
        action="{{ route('admin.services.store') }}"
        method="POST"
    >

        @csrf

        <div class="admin-form-grid">

            <div class="admin-form-group">

                <label for="name">
                    Service Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Web Development"
                    required
                >

                @error('name')
                    <small class="admin-error">{{ $message }}</small>
                @enderror

            </div>


            <div class="admin-form-group">

                <label for="icon">
                    Icon Text
                </label>

                <input
                    type="text"
                    id="icon"
                    name="icon"
                    value="{{ old('icon') }}"
                    placeholder="e.g. WEB"
                    maxlength="20"
                    required
                >

                @error('icon')
                    <small class="admin-error">{{ $message }}</small>
                @enderror

            </div>


            <div class="admin-form-group admin-form-full">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Enter service description..."
                    required
                >{{ old('description') }}</textarea>

                @error('description')
                    <small class="admin-error">{{ $message }}</small>
                @enderror

            </div>


            <div class="admin-form-group admin-form-full">

                <label for="tags">
                    Tags
                </label>

                <input
                    type="text"
                    id="tags"
                    name="tags"
                    value="{{ old('tags') }}"
                    placeholder="HTML, CSS, JavaScript, Laravel, MySQL"
                >

                <small class="admin-form-help">
                    Separate multiple tags with commas.
                </small>

                @error('tags')
                    <small class="admin-error">{{ $message }}</small>
                @enderror

            </div>


            <div class="admin-form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option value="active"
                        {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive"
                        {{ old('status') === 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>


            <div class="admin-form-group">

                <label for="sort_order">
                    Sort Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    value="{{ old('sort_order', 0) }}"
                    min="0"
                >

            </div>

        </div>


        <div class="admin-form-actions">

            <a
                href="{{ route('admin.services.index') }}"
                class="admin-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="admin-btn admin-btn-primary"
            >
                Add Service
            </button>

        </div>

    </form>

</div>

@endsection