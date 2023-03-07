<?php

namespace Database\Seeders;

use App\Models\ProjectDuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_duration = (new ProjectDuration())->create();

        $data = 
        [
            [
                "field" => "reg_project_duration",
                "value" => "Reg Project Duration1",
                "locale" => "en",
            ],
            [
                "field" => "reg_project_duration",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($project_duration, $data);
    }
}
