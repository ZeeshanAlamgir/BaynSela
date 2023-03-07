<?php

namespace Database\Seeders;

use App\Models\StoryImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new StoryImage())->create([
            'story_section_id'=>1,
        ]);
    }
}
