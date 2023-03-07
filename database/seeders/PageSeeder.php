<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Page())->create([
            'slug' => 'homepage'
        ]);
        (new Page())->create([
            'slug' => 'services'
        ]);
        (new Page())->create([
            'slug' => 'numbers'
        ]);
    }
}
