<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\LocationController;

// ✅ Publicly accessible CRM form
Route::get('/appointment/create', [CRMController::class, 'index'])->name('crm.index');
Route::post('/appointment/store', [CRMController::class, 'store'])->name('crm.store');

Auth::routes();

// ✅ Redirect root URL to the appointments list (only for logged-in users)
Route::get('/', function () {
    return redirect()->route('appointments.index');
})->middleware('auth');

// ✅ Redirect `/dashboard` to `appointments.index`
Route::get('/dashboard', function () {
    return redirect()->route('appointments.index');
})->name('dashboard');

// ✅ Secure the appointments list (Only for Admins)
Route::middleware(['auth'])->group(function () {
    Route::resource('appointments', AppointmentController::class);
    Route::get('appointments/export/excel', [AppointmentController::class, 'exportExcel'])->name('appointments.exportExcel');
});

// ✅ Get districts based on division
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get.districts');
Route::get('/get-thanas', [LocationController::class, 'getThanas'])->name('get.thanas');


// ✅ Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
