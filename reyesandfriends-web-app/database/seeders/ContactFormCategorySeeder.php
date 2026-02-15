<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactFormCategory;

class ContactFormCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('seeders/data/contact_form_categories.json');
        $categoriesData = json_decode(file_get_contents($jsonPath), true);

        foreach ($categoriesData as $category) {
            ContactFormCategory::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
            ]);
        }

    }
}
