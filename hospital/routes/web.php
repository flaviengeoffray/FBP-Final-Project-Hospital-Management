<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/  

// Créer un rendez-vous
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// Afficher les rendez-vous de l'utilisateur
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');

// Afficher les détails d'un rendez-vous
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');

// Modifier un rendez-vous
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

// Supprimer un rendez-vous
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/doctors/home', function () {
    return view('/doctors/home');
})->middleware(['auth', 'verified'])->name('doctors.home');


Route::get('/patients/home', function () {
    return view('/patients/home');
})->middleware(['auth', 'verified'])->name('patients.home');

Route::delete('/prescriptions/{id}', [ProfileController::class, 'destroyPres'])->name('prescriptions.destroy');

Route::get('/nurses/home', [ProfileController::class, 'printnurse'])->name('nurses.home');

Route::get('/medications/create', [ProfileController::class, 'create'])->name('medications.create');

Route::post('/medications', [ProfileController::class, 'store'])->name('medications.store');

Route::get('/medications/patient', [ProfileController::class, 'patientMedications'])->name('medications.patient');

Route::get('/prescriptions/{patient}', [ProfileController::class, 'showPrescriptions'])->name('prescriptions.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
