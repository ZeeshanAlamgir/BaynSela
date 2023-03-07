<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Contact())->create([

            'type' => 'project',
            'name' => 'Saeed',
            'email' => 'saeed@gmail.com ',
            'phone' => '0503225125',
            'message' => 'Test',
            'file' => 'contact.pdf',

        ]);
    }
}
