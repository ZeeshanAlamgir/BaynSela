<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutsection = (new AboutSection())->create([
            'page_id' => 1,
            'order'    => 1,
            "slug" => 'about-section'
        ]);

        $data = [
            [
                "field" => "about_heading",
                "value" => "What partners say about us",
                "locale" => "en",
            ],
            [
                "field" => "about_heading",
                "value" => "ماذا يقول الشركاء عنا",
                "locale" => "ar",
            ],
            [
                "field" => "about_description",
                "value" => "Lorem ipsum dolor sit amet.",
                "locale" => "en",
            ],
            [
                "field" => "about_description",
                "value" => "أبجد هوز دولور الجلوس امات.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($aboutsection, $data);



    }
}
