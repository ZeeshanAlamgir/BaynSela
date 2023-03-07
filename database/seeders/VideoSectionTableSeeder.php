<?php

namespace Database\Seeders;

use App\Models\VideoSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video_section = (new VideoSection())->create([
            'video_url'             => 'https://youtu.be/pT8BawF97jo',
            'image'                 => 'video_section_default.jpeg',
            'slug'                  => 'video-section',
            'page_id'               => 1,
            'order'                 => 2
        ]);

        $data = [
            [
                "field" => "heading",
                "value" => "Choose what pleases your senses and enriches your experience",
                "locale" => "en",
            ],
            [
                "field" => "heading",
                "value" => 'استمتع معنا في " بين " بتفاصيل تضيء مخيلتك وتلهم حواسك',
                "locale" => "ar",
            ],
            [
                "field" => "description",
                "value" => "video description",
                "locale" => "en",
            ],
            [
                "field" => "description",
                "value" => "وصف الفيديو",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($video_section, $data);
    }
}
