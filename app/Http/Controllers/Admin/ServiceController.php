<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $tags = [];

        if (!empty($validated['tags'])) {
            $tags = array_values(
                array_filter(
                    array_map(
                        'trim',
                        explode(',', $validated['tags'])
                    )
                )
            );
        }

        $validated['tags'] = $tags;

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service added successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $tags = [];

        if (!empty($validated['tags'])) {
            $tags = array_values(
                array_filter(
                    array_map(
                        'trim',
                        explode(',', $validated['tags'])
                    )
                )
            );
        }

        $validated['tags'] = $tags;

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}