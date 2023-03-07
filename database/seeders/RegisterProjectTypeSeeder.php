<?php

namespace Database\Seeders;

use App\Models\RegisterProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_type = (new RegisterProjectType())->create([
            'user_id'   => 1,
            'project_type_id'   => 1
        ]);

        $data = [
             
            [
                "field" => 'project_type_heading',
                "value" => 'Project Type En',
                "locale" => 'en'
            ],
            [
                "field" => 'project_type_heading',
                "value" => 'Project Type Ar',
                "locale" => 'ar'
            ],
        ];

        storeMultiValue($project_type,$data);
    }
}
