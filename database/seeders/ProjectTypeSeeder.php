<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_type = (new ProjectType())->create();

        $data = 
        [
            [
                "field" => "reg_project_type",
                "value" => "Reg Project Type1",
                "locale" => "en",
            ],
            [
                "field" => "reg_project_type",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($project_type, $data);
    }
}
