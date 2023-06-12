<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


class AppointmentController extends Controller
{
    public function docshow(Request $request)
    {
        $doctor = Auth::user();
        $appointments = Appointment::where('doctor_name', $doctor->name)->get();
        return view('appointments.docshow', ['doctor' => $doctor], ['appointments' => $appointments]);
    }

    public function create(Request $request)
    {
        $doctorId = $request->input('doctor');
        $doctor = User::find($doctorId);
        $appointments = Appointment::where('doctor_name', $doctor->name)->get();
        return view('appointments.create', ['doctor' => $doctor], ['appointments' => $appointments]);
    }
    public function createAppointment(Request $request)
{
    // Récupérer l'ID du médecin connecté
    $doctorId = json_decode($request->input('doctor'), true);
    $keys = array_keys($doctorId);
    $deuxiemeCle = $keys[1];
    $deuxiemeElement = $doctorId[$deuxiemeCle];
    $doctorName = $deuxiemeElement;

    // Valider les données du formulaire
    $validatedData = $request->validate([
        'time' => 'required',
        'date' => 'required',
    ]);
    
    $dateTime = $validatedData['date'] . ' ' . $validatedData['time'];

    $startDateTime = Carbon::parse($dateTime);
    $endDateTime = $startDateTime->addMinutes(30);
    // Créer un nouveau rendez-vous pour le médecin connecté
    $appointment = new Appointment();
    $appointment->doctor_name = $doctorName;
    $appointment->start_time = $startDateTime;
    $appointment->end_time = $endDateTime;
    $appointment->patient_name = Auth::user()->name;
    $appointment->save();

    // Rediriger vers la page des rendez-vous du médecin
    return redirect()->route('patients.home');
    }

    public function delete(Request $request)
{
    $doctor = Auth::user();

    $appointment = Appointment::where('doctor_name', $doctor->name)
        ->orderBy('start_time', 'asc')
        ->first();

    if ($appointment) {
        $appointment->delete();
       return view('doctors.home');
    }
    return view('welcome');
}
}

