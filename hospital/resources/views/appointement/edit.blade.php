<!-- resources/views/appointments/edit.blade.php -->

<h1>Modifier le rendez-vous</h1>

<form action="{{ route('appointments.update', $appointment) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Champs du formulaire pré-remplis avec les valeurs actuelles -->
    <div>
        <label for="appointment_date">Date du rendez-vous</label>
        <input type="datetime-local" name="appointment_date" id="appointment_date" value="{{ $appointment->appointment_date }}">
    </div>

    <!-- Autres champs du formulaire si nécessaire -->

    <button type="submit">Modifier</button>
</form>
