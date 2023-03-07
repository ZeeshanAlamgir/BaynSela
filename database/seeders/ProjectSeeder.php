<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_section = (new Project())->create([
            'image' => 'project.png'
        ]);

        $data = 
        [
            [
                "field" => "project_heading",
                "value" => "Our Project",
                "locale" => "en",
            ],
            [
                "field" => "project_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "project_description",
                "value" => "Bayn is a comprehensive digital greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "project_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة،وتشكل لديهم رؤية واضوالاحترافية.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($project_section, $data);
    }
}
