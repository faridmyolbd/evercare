<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CRMController;

// ✅ Allow PUBLIC access to the CRM form
Route::get('/crm', [CRMController::class, 'index'])->name('crm.index');
Route::post('/crm/store', [CRMController::class, 'store'])->name('crm.store');

Auth::routes();

// Redirect root URL to Patients List if logged in
Route::get('/', function () {
    return redirect()->route('patients.index');
})->middleware('auth');

// Redirect `/dashboard` to `patients.index`
Route::get('/dashboard', function () {
    return redirect()->route('patients.index');
})->name('dashboard');

// ✅ Keep `patients` list PROTECTED (Only logged-in users can access)
Route::middleware(['auth'])->group(function () {
    Route::resource('patients', PatientController::class);
    Route::get('patients/export/excel', [PatientController::class, 'exportExcel'])->name('patients.exportExcel');
});

// ✅ Ensure logout redirects properly
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
