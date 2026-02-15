<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebPlan;
use App\Models\WebPlanImage;
use App\Models\WebPlanFeature;
use App\Models\WebPlanUsage;

class WebPlanesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            $jsonPath = database_path('seeders/data/web_planes.json');
            $planesData = json_decode(file_get_contents($jsonPath), true);

            foreach ($planesData as $plan) {
                $webPlan = WebPlan::create([
                    'name' => $plan['name'],
                    'slug' => $plan['slug'],
                    'description' => $plan['description'] ?? null,
                    'demo_url' => $plan['demo_url'] ?? null,
                    'price_clp' => $plan['price_clp'],
                    'number_of_months' => $plan['number_of_months'],
                    'final_price_clp' => $plan['price_clp'] * $plan['number_of_months'],
                ]);

                // Insertar imágenes asociadas
                if (!empty($plan['images'])) {
                    foreach ($plan['images'] as $imageUrl) {
                        WebPlanImage::create([
                            'web_plan_id' => $webPlan->id,
                            'image_url' => $imageUrl,
                        ]);
                    }
                }

                // Insertar características asociadas

                if (!empty($plan['features'])) {
                    foreach ($plan['features'] as $feature) {
                        WebPlanFeature::create([
                            'web_plan_id' => $webPlan->id,
                            'feature' => $feature,
                        ]);
                    }
                }

                // Insertar usos asociados

                if (!empty($plan['usages'])) {
                    foreach ($plan['usages'] as $usage) {
                        WebPlanUsage::create([
                            'web_plan_id' => $webPlan->id,
                            'usage' => $usage,
                        ]);
                    }
                }
            }
    }
}
