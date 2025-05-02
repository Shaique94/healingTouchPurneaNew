<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Doctor; // Adjust namespace if needed

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Add the slug column (nullable initially)
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('qualification');
        });

        // Step 2: Populate slugs for existing records
        $doctors = Doctor::withTrashed()->get(); // Include soft-deleted records
        foreach ($doctors as $doctor) {
            // Generate slug based on user name or fallback to ID
            $userName = $doctor->user ? $doctor->user->name : 'doctor-' . $doctor->id;
            $baseSlug = Str::slug($userName);
            $slug = $baseSlug;
            $counter = 1;

            // Ensure uniqueness
            while (Doctor::withTrashed()->where('slug', $slug)->where('id', '!=', $doctor->id)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $doctor->slug = $slug;
            $doctor->save();
        }

        // Step 3: Make slug unique and not nullable
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};