<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order')->get();

        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'role' => ['required', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'bio' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'status' => ['required', 'in:active,inactive'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('team', 'public');
        }

        TeamMember::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'role' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'bio' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'status' => ['required', 'in:active,inactive'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {

            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }

            $validated['image'] = $request->file('image')
                ->store('team', 'public');
        }

        $teamMember->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }
}