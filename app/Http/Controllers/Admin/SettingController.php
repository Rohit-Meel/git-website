<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:150'],
            'admin_email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'website_email' => ['required', 'email', 'max:150'],
            'website_phone' => ['nullable', 'string', 'max:30'],
            'website_location' => ['nullable', 'string', 'max:200'],
        ]);

        $settings = Setting::first();

        if ($settings) {
            $settings->update($validated);
        } else {
            Setting::create($validated);
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}