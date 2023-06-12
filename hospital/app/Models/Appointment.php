<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'start_time',
        'prescription',
    ];

    // Relation avec l'utilisateur (patient)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le médecin
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

