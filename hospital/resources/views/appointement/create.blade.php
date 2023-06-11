<!-- resources/views/appointments/create.blade.php -->

<h1>Créer un rendez-vous</h1>

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <!-- Champs du formulaire -->
    <div>
        <label for="appointment_date">Date du rendez-vous</label>
        <input type="datetime-local" name="appointment_date" id="appointment_date">
    </div>

    <!-- Autres champs du formulaire si nécessaire -->

    <button type="submit">Créer</button>
</form>
