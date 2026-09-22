<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(Enquiry $enquiry)
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied,closed'],
        ]);

        $enquiry->update($validated);

        return redirect()
            ->route('admin.enquiries.show', $enquiry)
            ->with('success', 'Enquiry status updated successfully.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }
}