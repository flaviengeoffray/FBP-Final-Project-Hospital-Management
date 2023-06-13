<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Prescription;
use App\Models\Medication;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
     public function homepatient()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('/patients/home',compact('doctors'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function create()
    {
        $medications = Medication::all();
        $patients = User::where('role', 'patient')->get();
        return view('medications.create', compact('medications'), compact('patients'));
    }

    public function patientMedications()
    {
        $medications = Auth::user()->prescriptions()->with('medication')->get();
        return view('patients.patient', compact('medications'));
    }

    public function printnurse()
    {
        $patients = User::where('role', 'patient')->get();
        return view('nurses/home', compact('patients'));
    }

    public function destroyPres($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();

        $patients = User::where('role', 'patient')->get();

        return view('nurses.home', compact('patients'));
    }


    public function showPrescriptions(Request $request, User $patient)
    {
        $prescriptions = $patient->prescriptions()->with('medication')->get();
        return view('prescriptions.show', compact('prescriptions', 'patient'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient' => 'required',
            'medication_id' => 'required',
            // Autres champs de validation
        ]);
        $prescription = new Prescription();
        $prescription->patient_id = $validatedData['patient'];
        $prescription->medication_id = $validatedData['medication_id'];
        $prescription->doctor_id = Auth::user()->id;
        // Autres attributs de prescription
        $prescription->save();


        return view('/doctors/home')->with('success', 'Médicament prescrit avec succès');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
