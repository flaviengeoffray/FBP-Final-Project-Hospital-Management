<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('medication_id');
            $table->unsignedBigInteger('doctor_id');
            // Ajoutez d'autres colonnes d'attributs de prescription ici
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('medication_id')->references('id')->on('medications');
            $table->foreign('doctor_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}

