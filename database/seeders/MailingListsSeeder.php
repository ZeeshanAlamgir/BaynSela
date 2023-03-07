<?php

namespace Database\Seeders;

use App\Models\MailingList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailingListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new MailingList())->create([
            'email'=>'contact@bayn.sela.sa'
        ]);
    }
}

