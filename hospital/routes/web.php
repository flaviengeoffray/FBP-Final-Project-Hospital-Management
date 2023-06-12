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
Route::post('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments/createap', [AppointmentController::class, 'createAppointment'])->name('appointments.apcreate');
Route::post('/appointments/docshow', [AppointmentController::class, 'docshow'])->name('appointements.docshow');
Route::post('/appointments/delete', [AppointmentController::class, 'delete'])->name('appointments.delete');



Route::get('/', function () {
    return view('welcome');
})->name('H');

Route::get('/doctors/home', function () {
    return view('/doctors/home');
})->middleware(['auth', 'verified'])->name('doctors.home');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role=='doctor') {
            return view('/doctors/home');
        } elseif ($user->role=='patient') {
            return redirect('/patients/home');
        } elseif ($user->role=='nurse') {
            return redirect('nurses.home');
        }
    }

    // Si aucun rôle correspondant n'est trouvé, vous pouvez rediriger vers une vue par défaut
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/patients/home', function () {
    return view('/patients/home');
})->middleware(['auth', 'verified'])->name('patients.home');

Route::get('/patients/home', [ProfileController::class, 'homepatient'])->name('patients.home');


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
