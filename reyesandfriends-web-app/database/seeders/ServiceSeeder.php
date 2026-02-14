<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('seeders/data/services.json');
        $services = json_decode(file_get_contents($jsonPath), true);

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'slug' => $service['slug'],
                'image' => $service['image'],
                'description' => $service['description'],
                'icon' => $service['icon'],
            ]);
        }
    }
}
