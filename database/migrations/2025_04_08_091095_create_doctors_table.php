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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->json('available_days')->nullable();
            $table->bigInteger('fee')->default(500);
            $table->enum('status', [0, 1, 2])->default(0); // 0: inactive, 1: active, 2: disable
            $table->string('image')->nullable();
            $table->string('qualification')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    protected $casts = [
        'available_days' => 'array',
    ];

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
