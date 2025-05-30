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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('appointment_no')->nullable();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('status', ['pending','checked_in' ,'confirmed', 'cancelled'])->default('pending');
            $table->string('payment_method')->default('cash')->nullable();
            $table->integer('queue_number')->nullable();
            $table->string('barcode_path')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')
            ->nullable() 
            ->constrained('users')
            ->onDelete('set null') ;           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
