<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = (new Service())->create([
            'image' => 'media.jpg'
        ]);

        $data = [
            [
                "field" => "service_heading",
                "value" => "Media",
                "locale" => "en",
            ],
            [
                "field" => "service_heading",
                "value" => "وسائل الإعلام",
                "locale" => "ar",
            ],
            [
                "field" => "service_description",
                "value" => "Expose your campaign to reach new horizons.",
                "locale" => "en",
            ],
            [
                "field" => "service_description",
                "value" => "Expose your campaign to reach new horizons.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($service, $data);

        $service = (new Service())->create([
            'image' => 'influencers.jpg'
        ]);

        $data = [
            [
                "field" => "service_heading",
                "value" => "Influencers",
                "locale" => "en",
            ],
            [
                "field" => "service_heading",
                "value" => "Influencers ar",
                "locale" => "ar",
            ],
            [
                "field" => "service_description",
                "value" => "Expose your campaign to reach new horizons.",
                "locale" => "en",
            ],
            [
                "field" => "service_description",
                "value" => "Expose your campaign to reach new horizons ar.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($service, $data);
    }
}
