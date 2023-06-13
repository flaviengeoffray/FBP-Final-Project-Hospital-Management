<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dosage');
            $table->text('instructions');
            $table->timestamps();
        });
        DB::table('medications')->insert([
        ['name' => 'DOLIPRANE', 'dosage' => '1g', 'instructions' => 'take with water'],
        ['name' => 'IMODIUM', 'dosage' => '10mg', 'instructions' => 'keep in your mouth'],
        ['name' => 'SPASFON', 'dosage' => '500mg', 'instructions' => 'take with water'],

        ]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
