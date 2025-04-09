<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('start_time');
            $table->unsignedInteger('end_time');
            $table->enum('type',['am','pm'])->default('am');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('number_of_appointments');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
