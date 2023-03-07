<?php

namespace Database\Seeders;

use App\Models\OurClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ourClient = (new OurClient())->create();

        $data = [
            [
                "field" => "client_heading",
                "value" => "Our Client",
                "locale" => "en",
            ],
            [
                "field" => "client_heading",
                "value" => "نسعد بمشاركتك وتلقي استفساراتكم",
                "locale" => "ar",
            ],

        ];

        storeMultiValue($ourClient, $data);
    }
}
