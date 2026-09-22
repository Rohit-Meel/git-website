<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Enquiry;
use App\Models\Setting;
use Carbon\Carbon;

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/services', function () {
    $services = Service::where('status', 'active')
        ->orderBy('sort_order')
        ->get();
    return view('services', compact('services'));
})->name('services');


Route::get('/team', function () {
    $teamMembers = TeamMember::where('status', 'active')
        ->orderBy('sort_order')
        ->get();
    return view('team', compact('teamMembers'));
})->name('team');


Route::get('/contact', function () {
    $settings = Setting::first();
    return view('contact', compact('settings'));
})->name('contact');


Route::post('/contact', function (Request $request) {

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:150'],
        'phone' => ['nullable', 'string', 'max:30'],
        'subject' => ['required', 'string', 'max:200'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    $validated['status'] = 'new';

    Enquiry::create($validated);

    return response()->json([
        'message' => 'Your message has been sent successfully. We will get back to you soon.'
    ]);

})->name('contact.submit');

Route::view('/admin/login', 'admin.login')->name('admin.login');

Route::post('/admin/login', [\App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::post('/admin/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin', function () {

    // ================= BASIC COUNTS =================

    $enquiryCount = Enquiry::count();

    $teamCount = TeamMember::where('status', 'active')->count();

    $serviceCount = Service::where('status', 'active')->count();

    $unreadCount = Enquiry::where('status', 'new')->count();


    // ================= RECENT ENQUIRIES =================

    $recentEnquiries = Enquiry::orderBy('created_at', 'desc')
        ->limit(3)
        ->get();


    // ================= ENQUIRY ANALYTICS =================

    $analytics = [];

    for ($i = 6; $i >= 0; $i--) {

        $date = Carbon::today()->subDays($i);

        $count = Enquiry::whereBetween('created_at', [
            $date->copy()->startOfDay(),
            $date->copy()->endOfDay(),
        ])->count();

        $analytics[] = [
            'label' => $date->format('D'),
            'date' => $date->format('d M'),
            'count' => $count,
        ];
    }


    // Highest enquiry count
    $maxCount = collect($analytics)->max('count');

    // Avoid division by zero
    if ($maxCount < 1) {
        $maxCount = 1;
    }


    // Calculate graph bar height
    foreach ($analytics as &$item) {

        if ($item['count'] > 0) {

            $item['height'] = max(
                10,
                round(($item['count'] / $maxCount) * 100)
            );
        } else {

            $item['height'] = 0;
        }
    }

    unset($item);


    return view('admin.dashboard', compact(
        'enquiryCount',
        'teamCount',
        'serviceCount',
        'unreadCount',
        'recentEnquiries',
        'analytics'
    ));
})->middleware('admin')->name('admin.dashboard');

Route::middleware('admin')->prefix('admin')->group(function () {
    // Team Members
    Route::get('/team', [TeamMemberController::class, 'index'])->name('admin.team.index');
    Route::get('/team/create', [TeamMemberController::class, 'create'])->name('admin.team.create');
    Route::post('/team', [TeamMemberController::class, 'store'])->name('admin.team.store');
    Route::get('/team/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin.team.edit');
    Route::put('/team/{teamMember}', [TeamMemberController::class, 'update'])->name('admin.team.update');
    Route::delete('/team/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin.team.destroy');
    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    // ENQUIRIES 
    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('admin.enquiries.index');
    Route::get('/enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('admin.enquiries.show');
    Route::put('/enquiries/{enquiry}/status', [EnquiryController::class, 'updateStatus'])->name('admin.enquiries.status');
    Route::delete('/enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('admin.enquiries.destroy');
    // SETTINGS 
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});
