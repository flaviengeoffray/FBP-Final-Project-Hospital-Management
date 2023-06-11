<!-- resources/views/appointments/index.blade.php -->

<h1>Liste des rendez-vous</h1>

@foreach ($appointments as $appointment)
    <div>
        <h3>Date du rendez-vous: {{ $appointment->appointment_date }}</h3>
        <!-- Afficher d'autres informations du rendez-vous si nécessaire -->
    </div>
    <hr>
@endforeach
