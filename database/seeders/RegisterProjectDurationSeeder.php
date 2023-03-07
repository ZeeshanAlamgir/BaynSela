<?php

namespace Database\Seeders;

use App\Models\RegisterProjectDuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterProjectDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_type = (new RegisterProjectDuration())->create([
            'user_id'   => 1,
            'project_duration_id'   => 1
        ]);

        $data = [
             
            [
                "field" => 'project_duration_heading',
                "value" => 'Project Duration En',
                "locale" => 'en'
            ],
            [
                "field" => 'project_duration_heading',
                "value" => 'Project Duration Ar',
                "locale" => 'ar'
            ],
        ];

        storeMultiValue($project_type,$data);
    }
}
