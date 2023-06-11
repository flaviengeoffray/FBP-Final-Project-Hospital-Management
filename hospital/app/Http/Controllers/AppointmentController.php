<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Afficher les rendez-vous de l'utilisateur
    public function index()
    {
        $appointments = auth()->user()->appointments;
        return view('appointments.index', compact('appointments'));
    }

    // Afficher les détails d'un rendez-vous
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    // Créer un rendez-vous
    public function store(Request $request)
    {
        // Valider les données du formulaire de création
        $validatedData = $request->validate([
            // inclure les règles de validation pour les champs nécessaires
        ]);

        // Créer le rendez-vous
        $appointment = auth()->user()->appointments()->create($validatedData);

        return redirect()->route('appointments.show', $appointment)->with('success', 'Rendez-vous créé avec succès !');
    }

    // Modifier un rendez-vous
    public function update(Request $request, Appointment $appointment)
    {
        // Valider les données du formulaire de mise à jour
        $validatedData = $request->validate([
            // inclure les règles de validation pour les champs nécessaires
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.show', $appointment)->with('success', 'Rendez-vous mis à jour avec succès !');
    }

    // Supprimer un rendez-vous
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé avec succès !');
    }
}

