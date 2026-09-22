@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Service</h1>
        <p>Update service information.</p>
    </div>

    <a
        href="{{ route('admin.services.index') }}"
        class="admin-btn"
    >
        ← Back
    </a>

</div>


<div class="admin-form-card">

    <form
        action="{{ route('admin.services.update', $service) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="admin-form-grid">

            <div class="admin-form-group">

                <label for="name">
                    Service Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $service->name) }}"
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
                    value="{{ old('icon', $service->icon) }}"
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
                    required
                >{{ old('description', $service->description) }}</textarea>

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
                    value="{{ old('tags', implode(', ', $service->tags ?? [])) }}"
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
                        {{ old('status', $service->status) === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive"
                        {{ old('status', $service->status) === 'inactive' ? 'selected' : '' }}>
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
                    value="{{ old('sort_order', $service->sort_order ?? 0) }}"
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
                Update Service
            </button>

        </div>

    </form>

</div>

@endsection