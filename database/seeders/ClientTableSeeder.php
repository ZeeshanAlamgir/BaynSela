<?php

namespace Database\Seeders;

use App\Models\OurClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $our_client = (new OurClient())->create();

        $data = [
            [
                "field" => "heading",
                "value" => "Our Clients",
                "locale" => "en",
            ],
            [
                "field" => "heading",
                "value" => "تعرفوا علينا",
                "locale" => "ar",
            ],
            
        ];

        storeMultiValue($our_client, $data);
    }
}
