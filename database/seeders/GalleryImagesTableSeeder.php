<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['ICU', 'Reception', 'Laboratory', 'Ward', 'OT', 'Lobby'];

        foreach (range(1, 20) as $i) {
            DB::table('gallery_images')->insert([
                'filename' => "sample{$i}.jpg",
                'alt' => 'Hospital Facility ' . $i,
                'category' => $categories[array_rand($categories)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
