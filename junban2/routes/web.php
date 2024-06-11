<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaitingController;
use App\Http\Controllers\PatientController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Waitings/Top', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('waitings.top');

Route::resource('waitings', WaitingController::class);

Route::delete('/waitings/delete/{patient_id}', [WaitingController::class, 'destroyWithoutId'])
->name('waitings.destroyWithoutId')->middleware(['auth','verified']);

Route::get('/dashboard', function () {
    return Inertia::render('Patients/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('patients', PatientController::class)
->middleware(['auth','verified']);

Route::post('/patients/confirm', [PatientController::class, 'confirm'])
->name('patients.confirm')->middleware(['auth','verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
