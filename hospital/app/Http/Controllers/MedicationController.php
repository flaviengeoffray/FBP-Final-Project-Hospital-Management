<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Medication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MedicationController extends Controller
{


    public function create()
    {
        $medications = Medication::all();
        return view('medications.create', compact('medications'));
    }

    public function store(Request $request)
    {
        $medications = Medication::all();
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


        return redirect()->route('doctor.home')->with('success', 'Médicament prescrit avec succès');
    }
}

