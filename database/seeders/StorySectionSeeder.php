<?php

namespace Database\Seeders;

use App\Models\StoryImage;
use App\Models\StorySection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StorySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $story_section = (new StorySection())->create([

            'slug'                  => 'story-section',
            'happy_partner'         =>100,
            'successful_projects'=> '200+',
            'total_investments'=>   '2B',
            'year_of_exp'=>5,
            'page_id'               => 1,
            'order'=>6,

        ]);

        $storyimg=(new StoryImage())->create([
            'story_section_id'=>1
        ]);

        $data = [
            [
                "field" => "story_heading",
                "value" => "What partners say about us",
                "locale" => "en",
            ],
            [
                "field" => "story_heading",
                "value" => "ماذا يقول الشركاء عنا",
                "locale" => "ar",
            ],
            [
                "field" => "story_description",
                "value" => "Lorem ipsum dolor sit amet.",
                "locale" => "en",
            ],
            [
                "field" => "story_description",
                "value" => "أبجد هوز دولور الجلوس امات.",
                "locale" => "ar",
            ],
        ];

        // $data = [
        //     [
        //         "field" => "story_heading",
        //         "value" => "Numbers with stories to tell",
        //         "locale" => "en",
        //     ],
        //     [
        //         "field" => "story_heading",
        //         "value" => "تصف الأرقام انجازاً غني عن التعريف",
        //         "locale" => "ar",
        //     ],
        //     [
        //         "field" => "story_description",
        //         "value" => "We can take your idea and bring it to life, no matter the scale or complexity",
        //         "locale" => "en",
        //     ],
        //     [
        //         "field" => "story_description",
        //         "value" => "يمكننا تحويل فكرتك إلى واقع ، بغض النظر عن الحجم أو التعقيد",
        //         "locale" => "ar",
        //     ],
        // ];

        storeMultiValue($story_section, $data);
        // storeMultiValue($storyimg, $data);

    }
}
